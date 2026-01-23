<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Services\SendLinkService;
use Illuminate\Http\Request;
use App\Models\User;

class DemandController extends Controller
{
    public function index()
    {
        return view('public.demand');
    }

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
                'title' => 'Nouvelle demande', // tu peux remplacer par un champ titre si nécessaire
                'description' => $request->description,
                'user_id' => $user->id,
                'status' => 'pending',
            ];
            $demand = Demand::create($data);

            // On envoi le lien pour valider la demande
            $sendLinkService->validateDemand($user, $demand);
            dd("dd");
        }
    }
}
