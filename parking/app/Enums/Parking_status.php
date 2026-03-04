<?php

namespace App\Enums;

enum Parking_status:string
{
     case FREE = "Free";
    case OCCUPIED = "Occupied";
    case UNAVAILABLE = "Unavailable";
}
