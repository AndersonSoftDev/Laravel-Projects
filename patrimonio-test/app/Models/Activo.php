<?php

namespace App\Models;

use App\Enums\TipoComprovativo;
use App\Enums\TipoInventario;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = [
        'ordem',
        'nip',
        'tipo_inventario',
        'tipo_comprovativo',
        'nr_comprovativo',
        'seguro',
        'assistencia_tecnica',
        'data_garantia',
        'status',
        'uge_id',
        'ugb_id',
        'sector_id',
        'fornecedor_id'
    ];

    protected function casts()
    {
        return[
            'tipo_comprovativo' => TipoComprovativo::class,
            'tipo_inventario' =>TipoInventario::class
        ];
    }
}
