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
        Schema::create('activos', function (Blueprint $table) {
            $table->id();
            $table->integer("ordem");
            $table->string('nip')->nullable();
            $table->string('tipo_inventario');
            $table->string('tipo_comprovativo')->nullable();
            $table->string('nr_comprovativo')->nullable();
            $table->boolean('seguro')->default(false);
            $table->boolean('assistencia_tecnica')->default(false);
            $table->date('data_garantia')->nullable();
            $table->string('status');
            $table->foreignId('uge_id')
            ->constrained('entidades')
            ->onDelete('cascade');
            $table->foreignId('ugb_id')
            ->constrained('entidades')
            ->onDelete('cascade');
            $table->foreignId('sector_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('fornecedor_id')
            ->nullable()
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
        Schema::dropIfExists('activos');
    }
};
