<?php

namespace app\lib\utils;

class RandNumberUtils
{
    public static function getCode($length = 6): int
    {
        $min = pow(10, ($length - 1));
        $max = pow(10, $length) - 1;
        return rand($min, $max);
    }
}
