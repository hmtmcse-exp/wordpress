<?php
/**
 * Created by PhpStorm.
 * User: hmtmc
 * Date: 10/03/2018
 * Time: 08:41 PM
 */

class WPCommon
{

    public static function camelCaseTo($string, $separator = "_"){
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1$separator$2", $string));
    }

    public static function dashesToCamelCase($string, $capitalizeFirstCharacter = false){
        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
        if (!$capitalizeFirstCharacter) {
            $str[0] = strtolower($str[0]);
        }
        return $str;
    }

}