<?php

namespace Model;

use Source\Database as Database;

class Cache
{
    
    private $database;
    private $table = 'cache';


    public function __construct()
    {
        $this->database = new Database($this->table, true);
    }


    public function clear()
    {
        return $this->database->flush();
    }


    public function get($key)
    {
        return $this->database->get($key);
    }


    public function set($key, $value)
    {
        $this->database->set($key, $value);
        return $this->get($key);
    }
}
