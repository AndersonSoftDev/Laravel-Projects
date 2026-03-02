<?php

namespace App\Enums;

enum TipoTransacao: string
{
    case CREDITO = "Credito";
    case DEBITO = "Debito";
}
