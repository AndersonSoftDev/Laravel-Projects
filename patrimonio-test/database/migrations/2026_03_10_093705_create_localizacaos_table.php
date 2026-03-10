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
        Schema::create('localizacaos', function (Blueprint $table) {
            $table->id();
            $table->string('provincia');
            $table->string('distrito');
            $table->string('localidade');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('tipo_administracao');
            $table->foreignId('sector_id')
            ->constrained()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacaos');
    }
};
