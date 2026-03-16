<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activos')->insert([

            [
                'ordem' => '1',
                'nip' => 'INV-2026-001',
                'tipo_inventario' => 'Veiculo',
                'tipo_comprovativo' => 'Factura',
                'nr_comprovativo' => 'FT-12345',
                'seguro' => true,
                'assistencia_tecnica' => true,
                'data_garantia' => '2027-03-10',
                'status' => 'ACTIVO',
                'uge_id' => 1,
                'ugb_id' => 3,
                'sector_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'ordem' => '2',
                'nip' => 'INV-2026-002',
                'tipo_inventario' => 'Moveis',
                'tipo_comprovativo' => 'Recibo',
                'nr_comprovativo' => 'RC-67890',
                'seguro' => false,
                'assistencia_tecnica' => false,
                'data_garantia' => null,
                'status' => 'ACTIVO',
                'uge_id' => 1,
                'ugb_id' => 2,
                'sector_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'ordem' => '3',
                'nip' => 'INV-2026-003',
                'tipo_inventario' => 'Livros',
                'tipo_comprovativo' => 'Factura',
                'nr_comprovativo' => 'FT-54321',
                'seguro' => false,
                'assistencia_tecnica' => false,
                'data_garantia' => null,
                'status' => 'ACTIVO',
                'uge_id' => 2,
                'ugb_id' => 3,
                'sector_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
