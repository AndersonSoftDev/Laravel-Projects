<?php

namespace Database\Seeders;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use App\Models\Vaga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Vagas para carros
        for ($i = 1; $i <= 10; $i++) {
            Vaga::create([
                'codigo' => 'CAR-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipo' => TipoVeiculo::CARRO,
                'status' => StatusVaga::LIVRE
            ]);
        }

        // Vagas para motos
        for ($i = 1; $i <= 5; $i++) {
            Vaga::create([
                'codigo' => 'MOT-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipo' => TipoVeiculo::MOTO,
                'status' => StatusVaga::LIVRE
            ]);
        }

        // Vagas para camiões
        for ($i = 1; $i <= 3; $i++) {
            Vaga::create([
                'codigo' => 'CAM-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipo' => TipoVeiculo::CAMINHAO,
                'status' => StatusVaga::LIVRE
            ]);
        }
    }

}
