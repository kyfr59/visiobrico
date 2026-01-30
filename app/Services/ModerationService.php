<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;

class ModerationService
{
    /**
     * Vérifie si le texte contient des données personnelles ou interdites.
     *
     * @param string $text
     * @return array ['allowed' => bool, 'reason' => string]
     */
    public function checkText(string $text): array
    {
        // Vérification rapide via regex (emails, téléphone)
        if ($this->containsPersonalInfo($text)) {
            return [
                'allowed' => false,
                'reason' => 'Le texte contient des informations personnelles (email, téléphone…).'
            ];
        }

        // Vérification plus fine via ChatGPT
        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4.1-mini',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Tu es un modérateur de contenu. Indique si le texte contient des informations personnelles comme email, numéro de téléphone, adresse, ou autres coordonnées sensibles. Répond uniquement avec {"allowed": true|false, "reason": string}.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $text
                    ]
                ],
            ]);

            $reply = $response->choices[0]->message->content ?? '';

            // Empty response
            if (empty($reply)) {
                Log::warning('Empty response from OpenAI with text : ').$text;
                return [
                    'allowed' => false,
                    'reason' => 'Erreur lors de la vérification.'
                ];
            }

            $reply = json_decode($reply, true);
            if (!is_array($reply) || !array_key_exists('allowed', $reply) || !array_key_exists('reason', $reply)) {
                Log::warning('Invalid array from OpenAI with text : ').$text;
                return [
                    'allowed' => false,
                    'reason' => 'Erreur lors de la vérification.'
                ];
            }

            return $reply;

        } catch (\OpenAI\Exceptions\RateLimitException $e) {
            Log::warning('Rate limit OpenAI : '.$e->getMessage());
            return [
                'allowed' => false,
                'reason' => 'Trop de requêtes, réessayez dans quelques secondes.'
            ];
        } catch (\Exception $e) {
            Log::error('Erreur OpenAI Moderation : '.$e->getMessage());
            return [
                'allowed' => false,
                'reason' => 'Erreur lors de la vérification.'
            ];
        }
    }

    /**
     * Vérifie rapidement via regex la présence d'email ou numéro de téléphone.
     */
    private function containsPersonalInfo(string $text): bool
    {
        // Emails
        $emailPattern = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i';

        // Numéros de téléphone simplifié
        $phonePattern = '/(\+?\d{1,3}[\s.-]?)?(\(?\d{2,4}\)?[\s.-]?)?\d{3,4}[\s.-]?\d{3,4}/';

        return preg_match($emailPattern, $text) || preg_match($phonePattern, $text);
    }
}
