<?php

namespace Database\Seeders;

use App\Enums\StatusVaga;
use App\Models\Bloco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlocoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $andares = 3;

        for ($i = 1; $i <= $andares; $i++) {
            Bloco::create([
                'bloco' => chr(64 + $i), // A, B, C
                'andar' => $i,
                'disponibilidade' => StatusVaga::LIVRE
            ]);
        }
    }
}
