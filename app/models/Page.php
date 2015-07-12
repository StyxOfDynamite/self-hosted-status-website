<?php

namespace Model;

use Source\Database as Database;

class Page
{
    
    private $database;
    private $table = 'page';
    private $columns = array(
        'name',
        'incidents'
    );


    public function __construct()
    {
        $this->database = new Database($this->table);
    }


    public function all()
    {
        $data = array();
        $keys = $this->database->getKeys();
        foreach ($keys as $key) {
            $data[] = $this->get($key);
        }
        return $data;
    }


    public function create(array $data = array())
    {
        $cache = new Cache();
        $cache->clear();
        if (!isset($data['key'])) {
            $key = substr(md5(uniqid()), 0, 12);
        } else {
            $key = $data['key'];
        }
        $data = array_intersect_key($data, array_flip($this->columns));
        $this->database->set($key, $data);
        $item = $this->get($key);
        $hook = $item;
        $hook['action'] = $this->table;
        Webhook::send($hook);
        return $item;
    }

    
    public function delete($key)
    {
        $cache = new Cache();
        $cache->clear();
        return $this->database->delete($key);
    }


    public function get($key)
    {
        $data = $this->database->get($key);
        $data['key'] = $key;
        return $data;
    }
}
