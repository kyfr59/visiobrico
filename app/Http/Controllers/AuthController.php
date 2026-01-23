<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Mail\MagicLoginMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function sendlink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(64);

        DB::table('login_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => hash('sha256', $token),
                'expires_at' => now()->addMinutes(15),
            ]
        );

        Mail::to($request->email)->send(
            new MagicLoginMail($token)
        );

        return back()->with('success', 'Lien envoyé par email');
    }

    public function connect($token)
    {
        $hashed = hash('sha256', $token);

        $record = DB::table('login_tokens')
            ->where('token', $hashed)
            ->where('expires_at', '>', now())
            ->first();

        abort_if(!$record, 403);

        $user = User::firstOrCreate(
            ['email' => $record->email],
            [
            'name' => 'test',
            'password' => 'test',
            'email' => $record->email,
        ]);

        Auth::login($user);

        DB::table('login_tokens')->where('email', $record->email)->delete();

        return redirect('/prestataire');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
