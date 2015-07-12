<?php

namespace Source;

use Flintstone\Flintstone as Flintstone;
use Flintstone\Formatter\JsonFormatter;
use Predis\Client as Redis;

class Database
{

    private $database;
    private $table;


    public function __construct($table, $cache = false)
    {
        $this->table = $table;
        if (REDIS) {
            $this->database = new Redis(
                array(
                    'host'      => REDIS_HOST,
                    'port'      => REDIS_POST,
                    'password'  => REDIS_PASSWORD
                )
            );
        } else {
            $this->database = Flintstone::load(
                $table,
                array(
                    'dir'       => DATA_DIR,
                    'cache'     => $cache,
                    'formatter' => new JsonFormatter()
                )
            );
        }
    }


    public function load($table)
    {
        $this->table = $table;
        if (REDIS) {
            $this->database = new Redis(
                array(
                    'host'      => REDIS_HOST,
                    'port'      => REDIS_POST,
                    'password'  => REDIS_PASSWORD
                )
            );
        } else {
            $this->database = Flintstone::load(
                $table,
                array(
                    'dir'       => DATA_DIR,
                    'formatter' => new JsonFormatter()
                )
            );
        }
        return true;
    }


    public function delete($key)
    {
        if (!$this->database || !$this->table) {
            return false;
        }
        if (REDIS) {
            return $this->database->hdel($this->table, $key);
        } else {
            return $this->database->delete($key);
        }
    }


    public function flush()
    {
        if (!$this->database || !$this->table) {
            return false;
        }
        if (REDIS) {
            return $this->database->del($this->table);
        } else {
            return $this->database->flush();
        }
    }


    public function get($key)
    {
        if (!$this->database || !$this->table) {
            return false;
        }
        if (REDIS) {
            return json_decode($this->database->hget($this->table, $key), true);
        } else {
            return $this->database->get($key);
        }
    }


    public function getKeys()
    {
        if (!$this->database || !$this->table) {
            return false;
        }
        if (REDIS) {
            return $this->database->hkeys($this->table);
        } else {
            return $this->database->getKeys();
        }
    }


    public function set($key, $data)
    {
        if (!$this->database || !$this->table) {
            return false;
        }
        if (REDIS) {
            return $this->database->hset($this->table, $key, json_encode($data));
        } else {
            return $this->database->set($key, $data);
        }
    }
}
