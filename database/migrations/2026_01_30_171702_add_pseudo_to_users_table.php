<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'pseudo')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('pseudo')->nullable()->after('name');
            });
        }

        $users = DB::table('users')->get();
        foreach ($users as $user) {
            if (empty($user->pseudo)) {
                DB::table('users')->where('id', $user->id)->update([
                    'pseudo' => 'user_' . Str::random(6),
                ]);
            }
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('pseudo')->unique()->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pseudo');
        });
    }
};
