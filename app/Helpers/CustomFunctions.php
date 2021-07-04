<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Facade;

class CustomFunctions extends Facade {
    public static function checkIfPartiallyMatched($str1, $str2): bool
    {
        return true;
    }
}
