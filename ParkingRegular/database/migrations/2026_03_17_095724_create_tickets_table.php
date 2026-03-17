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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->foreignId('veiculo_id')
            ->constrained()
            ->onDelete('cascade');
            $table->string('vaga_id')
            ->constrained()
            ->onDelete('cascade');
            $table->timestamp('entrada');
            $table->timestamp('saida')->nullable();
            $table->float('valor_pago')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
