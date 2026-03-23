<?php

namespace Database\Seeders;

use App\Enums\StatusVaga;
use App\Enums\TipoVeiculo;
use App\Models\Bloco;
use App\Models\Vaga;
use Illuminate\Database\Seeder;

class VagaSeeder extends Seeder
{
    public function run(): void
    {
        $blocos = Bloco::all();

        foreach ($blocos as $bloco) {

            // 🔵 Carros
            for ($i = 1; $i <= 10; $i++) {
                Vaga::create([
                    'bloco_id' => $bloco->id,
                    'codigo' => $bloco->bloco . '-CAR-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'tipo' => TipoVeiculo::CARRO,
                    'status' => StatusVaga::LIVRE
                ]);
            }

            // 🟡 Motos
            for ($i = 1; $i <= 5; $i++) {
                Vaga::create([
                    'bloco_id' => $bloco->id,
                    'codigo' => $bloco->bloco . '-MOT-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'tipo' => TipoVeiculo::MOTO,
                    'status' => StatusVaga::LIVRE
                ]);
            }

            // 🔴 Camiões
            for ($i = 1; $i <= 3; $i++) {
                Vaga::create([
                    'bloco_id' => $bloco->id,
                    'codigo' => $bloco->bloco . '-CAM-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'tipo' => TipoVeiculo::CAMINHAO,
                    'status' => StatusVaga::LIVRE
                ]);
            }
        }
    }
}
