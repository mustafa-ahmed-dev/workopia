<?php

namespace App\Enums;

enum WorkSite: string
{
    case OnSite = "On-Site";
    case Remote = 'Remote';
    case Hybrid = 'Hybrid';

    // Optional: Helper method to get all values as an array
    public static function values(): array
    {
        return array_map(function (self $type) {
            return $type->value;
        }, self::cases());
    }
}
