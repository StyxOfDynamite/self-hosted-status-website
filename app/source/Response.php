<?php

namespace Source;

class Response
{


    public static function redirect($location = '/')
    {
        header('Location: '.$location);
        return self::end();
    }


    public static function json($data = array())
    {
        $data = (array) $data;
        $response = json_encode($data, JSON_PRETTY_PRINT);
        header('Content-Type: application/json');
        echo $response;
        return self::end();
    }


    public static function html($html)
    {
        header('Content-Type: text/html');
        header('Content-language: en');
        echo $html;
        return self::end();
    }


    public static function end()
    {
        exit();
        return;
    }


    public static function xml($response)
    {
        header('Content-Type: application/xml; charset=UTF-8');
        echo $response;
        return self::end();
    }
}
