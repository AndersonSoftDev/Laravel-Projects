<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectores = [
            ['nome' => 'Direcção Municipal de Maputo','codigo'=>'SECT001', 'entidade_id' => '1'],
            ['nome' => 'Direcao Provincial Maputo','codigo'=>'SECT002', 'entidade_id' => '3'],
            ['nome' => 'Hospital Central','codigo'=>'SECT003', 'entidade_id' => '2']
        ];

        foreach ($sectores as $sector) {
            Sector::create($sector);
        }
    }
}
