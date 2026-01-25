<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demand;
use Illuminate\Http\Request;
use App\Services\SendLinkService;
use App\Services\MagicLoginService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DemandController extends Controller
{
    public function add(Request $request, SendLinkService $sendLinkService)
    {
        // Validate fields
        $request->validate([
            'email' => 'required|email',
            'description' => 'required|string',
        ]);

        // Check if user exists
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Create temp demand
            $data = [
                'title' => 'Nouvelle demande',
                'description' => $request->description,
                'user_id' => $user->id,
                'status' => 'pending',
            ];
            $demand = Demand::create($data);

            // On envoi le lien pour valider la demande
            $sendLinkService->validateDemand($user, $demand);
        }
    }

    public function validation(Request $request, MagicLoginService $magicLogin)
    {
        // Check request
        $validator = Validator::make(['token' => $request->token], [
            'token' => ['required', 'string', 'size:64']
        ], [
            'token.required' => 'Le token est requis.',
            'token.string' => 'Le token doit être une chaîne de caractères.',
            'token.size' => 'Le token doit contenir exactement :size caractères.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('error')
            ->withErrors($validator)
            ->withInput();
        }

        // Connect user and retrieve pending demand ID
        $record = $magicLogin->connect($request->token);
        $demandeId = $record->infos;
        if (empty($demandeId)) {
            return redirect()->route('error')->withErrors(['error' => "Impossible de récupérer l'identifiant de la demande à valider"]);
        }

        // Retreive demand in database
        $demand = Demand::find($demandeId);
        if (!$demand) {
            return redirect()->route('error')
                ->withErrors(['error' => "Impossible de récupérer la demande à valider"]);
        }

        // Check demand has pending status
        if ($demand->status != Demand::STATUS_PENDING) {
            return redirect()->route('error')
                ->withErrors(['error' => "Cette demande est déjà validée"]);
        }

        // Activate demand
        $demand->update([
            'status' => Demand::STATUS_ACTIVE
        ]);

        return redirect()->route('requester.home');
    }
}
