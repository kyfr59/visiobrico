<?php

namespace App\Services;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Demand;
use App\Models\LoginToken;
use Illuminate\Support\Str;
use App\Mail\MagicLoginMail;
use Illuminate\Support\Facades\Mail;

class SendLinkService
{
    /**
     * Send link to validate a demand
     *
     * @param User $user
     * @param Demand $demand
     * @return bool|string Returns token
     */
    public function validateDemand(User $user, Demand $demand)
    {
        // Create token in database
        $token = $this->storeToken($user->email, 'demand', $demand->id);

        // Send validation email
        Mail::to($user->email)->send(new MagicLoginMail($token));

        return $token;
    }

    private function storeToken($email, $type, $infos)
    {
        $token = Str::random(64);
        DB::table('login_tokens')->insert([
            'email' => $email,
            'token' => hash('sha256', $token),
            'type' => $type,
            'infos' => $infos,
            'expires_at' => Carbon::now()->addMinutes(30),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return $token;
    }
}