<?php

namespace Database\Seeders;

use App\Enums\TipoVeiculo;
use App\Models\Tarifa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Tarifa::create([
            'tipo' => TipoVeiculo::CARRO,
            'valor' => 50
        ]);

          Tarifa::create([
            'tipo' => TipoVeiculo::MOTO,
            'valor' => 25
        ]);

          Tarifa::create([
            'tipo' => TipoVeiculo::CAMINHAO,
            'valor' => 100
        ]);
    }
}
