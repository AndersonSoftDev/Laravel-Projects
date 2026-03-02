<?php

namespace App\Enums;

enum Availability: string
{
    case IN_STOCK = 'In_Stock';
    case OUT_OF_STOCK = 'Out_of_Stock';
}
