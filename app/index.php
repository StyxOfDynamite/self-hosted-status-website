<?php

require 'source/autoload.php';
require 'vendor/autoload.php';

$routes = new Config\Routes();
Source\Router::serve($routes->routes());
