<?php

namespace App\Enums;

enum JobType: string
{
    case FullTime = 'Full-Time';
    case PartTime = 'Part-Time';
    case Contract = 'Contract';
    case Temporary = 'Temporary';
    case Internship = 'Internship';
    case Volunteer = 'Volunteer';
    case OnCall = 'On-Call';

    // Optional: Helper method to get all values as an array
    public static function values(): array
    {
        return array_map(function (self $type) {
            return $type->value;
        }, self::cases());
    }
}
