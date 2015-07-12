<?php

namespace Model;

use Source\Database as Database;

class Component
{
    
    private $database;
    private $table = 'component';
    private $columns = array(
        'name',
        'description',
        'status',
        'sort'
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
        usort($data, function ($component1, $component2) {
            return $component1['sort'] - $component2['sort'];
        });
        return $data;
    }


    public function create(array $data = array())
    {
        $cache = new Cache();
        $cache->clear();
        if (!isset($data['sort'])) {
            $data['sort'] = 1;
        }
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
