<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anagclifor', function (Blueprint $table) {
            $table->id();
            $table->string('ID_anag_clifor', 8);
            $table->string('ID_tipo_anag', 2);
            $table->string('rag_sociale', 180);
            $table->string('ID_AGENTE', 8);
            $table->integer('ID_AZIENDA');
            $table->timestamps(2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anagclifor');
    }
};
