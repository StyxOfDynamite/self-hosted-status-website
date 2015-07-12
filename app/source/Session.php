<?php

namespace Source;

use Predis\Session\Handler as Handler;
use Predis\Client as Client;

class Session
{


    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            if (REDIS) {
                $handler = new Handler(
                    new Client(
                        array(
                            'host'      => REDIS_HOST,
                            'port'      => REDIS_POST,
                            'password'  => REDIS_PASSWORD
                        )
                    ),
                    array(
                        'gc_maxlifetime' => 86400
                    )
                );
                $handler->register();
            }
            session_start();
            if (DEMO) {
                Session::set('authenticated', true);
            }
        }
    }


    public static function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return false;
    }


    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return true;
    }
}
