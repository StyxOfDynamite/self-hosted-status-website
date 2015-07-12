<?php

namespace Source;

use League\Plates\Engine as Engine;

class View
{

    public static $handler = null;


    private static function getHandler()
    {
        if (self::$handler) {
            return self::$handler;
        }

        self::$handler = new Engine(VIEWS_DIR);

        return self::$handler;
    }


    public static function __callStatic($name, $args)
    {
        $callback = array(self::getHandler(), $name);
        return call_user_func_array($callback, $args);
    }
}
