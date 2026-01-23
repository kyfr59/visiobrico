<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('login_tokens', function (Blueprint $table) {
            $table->enum('type', ['connect', 'demand', 'requester', 'provider'])
                  ->default('connect')
                  ->after('token');
            $table->text('infos')->nullable()->after('type');
        });
    }

    public function down(): void
    {
        Schema::table('login_tokens', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('infos');
        });
    }
};