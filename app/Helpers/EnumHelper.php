<?php

namespace App\Helpers;

class EnumHelper
{
    /**
     * Map enum values for select input.
     *
     * @param string $enum The enum class name
     * @return array
     */
    public static function mapValuesForSelectInput(string $enum): array
    {
        /*
            Takes the enum values and creates an associative array with keys of (value, and text)
            The value is the same value as the enum value
            The text is the same as the value but the dashes are replaced with a space
        */
        return array_map(function ($enumCase) {
            return [
                'value' => $enumCase->value,
                'text' => str_replace('-', ' ', $enumCase->value),
            ];
        }, $enum::cases());
    }
}
