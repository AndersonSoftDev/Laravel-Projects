<?php

namespace App\Enums;

enum MetodoPagamento: string
{
    case MPESA ='MPESA';
    case EMOLA = 'EMOLA';
    case CARTAO= 'CARTAO';
    case CONTA = 'CONTA';
}
