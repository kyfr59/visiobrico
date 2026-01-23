<?php

namespace App\Services;

use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MagicLoginService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function connect(string $token)
    {
        $hashed = hash('sha256', $token);

        $record = DB::table('login_tokens')
            ->where('token', $hashed)
            ->where('expires_at', '>', now())
            ->first();

        abort_if(!$record, 403);

        $user = User::where('email', $record->email)->first();

        Auth::login($user);

        //DB::table('login_tokens')->where('email', $record->email)->delete();

        return $record;
    }
}
