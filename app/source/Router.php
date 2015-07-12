<?php

namespace Source;

class Router
{


    public static function serve($routes)
    {
        $server = Request::server();
        $request_method = strtolower($server['REQUEST_METHOD']);
        $path_info = Router::path();
        $discovered_handler = null;
        $regex_matches = array();
        if (isset($routes[$path_info])) {
            $discovered_handler = $routes[$path_info];
        } elseif ($routes) {
            $tokens = array(
                '*'  => '([a-zA-Z0-9-_]+)'
            );
            foreach ($routes as $pattern => $handler_name) {
                $pattern = strtr($pattern, $tokens);
                if (preg_match('#^/?' . $pattern . '/?$#', $path_info, $matches)) {
                    $discovered_handler = $handler_name;
                    $regex_matches = $matches;
                    break;
                }
            }
        }
        $handler_instance = null;
        if ($discovered_handler) {
            if (is_string($discovered_handler)) {
                $handler_instance = new $discovered_handler();
            } elseif (is_callable($discovered_handler)) {
                $handler_instance = $discovered_handler();
            }
        }
        if ($handler_instance) {
            if (method_exists($handler_instance, $request_method)) {
                call_user_func_array(array($handler_instance, $request_method), $regex_matches);
            } else {
                header('Location: /');
            }
        } else {
            header('Location: /');
        }
    }


    public static function path()
    {
        $server = Request::server();
        $path_info = '/';
        if (! empty($server['PATH_INFO'])) {
            $path_info = $server['PATH_INFO'];
        } elseif (! empty($server['ORIG_PATH_INFO']) && $server['ORIG_PATH_INFO'] !== '/index.php') {
            $path_info = $server['ORIG_PATH_INFO'];
        } else {
            if (! empty($server['REQUEST_URI'])) {
                $path_info = (strpos($server['REQUEST_URI'], '?') > 0) ?
                    strstr($server['REQUEST_URI'], '?', true) : $server['REQUEST_URI'];
            }
        }
        if (strlen($path_info) > 1) {
            $path_info = rtrim($path_info, '/');
        }
        return $path_info;
    }
}
