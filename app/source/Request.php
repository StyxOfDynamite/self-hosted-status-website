<?php

namespace Source;

class Request
{


    public static function get()
    {
        return $_GET;
    }


    public static function headers()
    {
        return getallheaders();
    }


    public static function post()
    {
        return $_POST;
    }


    public static function pjaxRequest()
    {
        $headers = self::headers();
        return isset($headers['X-PJAX']);
    }


    public static function server()
    {
        return $_SERVER;
    }


    public static function site()
    {
        $server = self::server();
        return $server['SERVER_NAME'];
    }


    public static function xhrRequest()
    {
        $server = self::server();
        return isset($server['HTTP_X_REQUESTED_WITH']) && $server['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}
