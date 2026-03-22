<?php

namespace App\Enums;

enum StatusVaga:string
{
    case LIVRE = 'LIVRE';
    case OCUPADO = 'OCUPADO';
    case MANUTENCAO = 'MANUTENCAO';
}
