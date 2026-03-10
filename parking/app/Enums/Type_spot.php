<?php

namespace App\Enums;

enum Type_spot:string
{
    case CAR = "Car";
    case BIKE = "Bike";
    case DISABLED = "Disabled";

    public function category():string{
        return match($this){
            self::CAR => 'A',
            self::BIKE => 'B',
            self::DISABLED => 'C'
        };
    }
}
