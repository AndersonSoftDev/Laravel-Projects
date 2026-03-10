<?php

namespace App\Enums;

enum TipoComprovativo:string
{
    case FACTURA = 'Factura';
    case RECIBO = 'Recibo';
    case ESCRITURA_COMPRA_VENDA = 'Escritura';
    case CONTRATO ='Contrato';
}
