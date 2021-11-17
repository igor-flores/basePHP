<?php


class Utils
{
    public static function dump($data)
    {
        return "<pre>". print_r($data, true)."</pre>";
    }

    public static function setIfExist($var, $default)
    {
        return (isset($var) && !empty($var)) ? $var : $default;
    }
}