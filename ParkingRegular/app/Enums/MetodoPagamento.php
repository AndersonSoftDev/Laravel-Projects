<?php

namespace App\Enums;

enum MetodoPagamento: string
{
    case MPESA ='Mpesa';
    case EMOLA = 'Emola';
    case CARTAO= 'Cartao';
}
