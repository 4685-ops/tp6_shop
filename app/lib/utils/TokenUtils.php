<?php

namespace app\lib\utils;

class TokenUtils
{
    public static function getLoginToken($string)
    {

        $str = md5(uniqid(md5(microtime(true)), true));

        return sha1($str . $string);
    }


    public static function getLoginTokenExpire($type = 1)
    {
        $type = in_array($type, [1, 2]) ? $type : 1;
        if ($type == 1) {
            $day = $type * 7;
        } else {
            $day = $type * 30;
        }

        return $day * 24 * 3600;
    }
}
