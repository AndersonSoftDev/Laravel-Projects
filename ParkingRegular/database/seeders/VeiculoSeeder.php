<?php

namespace Database\Seeders;

use App\Enums\TipoVeiculo;
use App\Models\Veiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Veiculo::create([
            'matricula' => 'ABC-123-MP',
            'tipo' => TipoVeiculo::CARRO,
            'cor' => 'Preto'
        ]);

        Veiculo::create([
            'matricula' => 'AJK-456-MP',
            'tipo' => TipoVeiculo::MOTO,
            'cor' => 'Vermelho'
        ]);

        Veiculo::create([
            'matricula' => 'AKS-789-MP',
            'tipo' => TipoVeiculo::CAMINHAO,
            'cor' => 'Branco'
        ]);
    }
}
