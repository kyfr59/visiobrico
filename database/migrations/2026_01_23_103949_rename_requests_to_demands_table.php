<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Renommer la table requests en demands
        Schema::rename('requests', 'demands');
    }

    public function down(): void
    {
        // Revenir en arrière si rollback
        Schema::rename('demands', 'requests');
    }
};