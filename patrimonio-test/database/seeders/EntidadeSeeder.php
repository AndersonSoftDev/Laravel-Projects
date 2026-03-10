<?php

namespace Database\Seeders;

use App\Models\Entidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entidades = [
            ['nome' => 'Ministerio da Educacao','codigo'=>'UGE001', 'designacao' => 'Uge'],
            ['nome' => 'Direcao Provincial Maputo','codigo'=>'UGE002', 'designacao' => 'Uge'],
            ['nome' => 'Hospital Central','codigo'=>'UGB001', 'designacao' => 'Ugb']
        ];

        foreach ($entidades as $entidade) {
            Entidade::create($entidade);
        }
    }
}
