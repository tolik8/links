<?php

namespace App\Helpers;

class Str
{
    public static function emptyToNull($value)
    {
        return is_string($value) && $value === '' ? null : $value;
    }

}
