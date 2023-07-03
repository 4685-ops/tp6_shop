<?php

namespace app\lib\utils;

class Md5Utils
{
    public static function encryption($password, $slot): string
    {
        return md5($password . $slot);
    }

}
