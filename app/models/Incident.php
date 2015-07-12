<?php

namespace Model;

use Source\Database as Database;

class Incident
{
    
    private $database;
    private $table = 'incident';
    private $columns = array(
        'page',
        'description',
        'status',
        'date',
        'time'
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
        usort($data, function ($incdent1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incdent1['time']);
        });
        return $data;
    }


    public function create(array $data = array())
    {
        $cache = new Cache();
        $cache->clear();
        if (!isset($data['date'])) {
            $data['date'] = date('Y-m-d');
        }
        if (!isset($data['time'])) {
            $data['time'] = date('F j Y, H:i T');
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
        ;
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


    public function import($feed)
    {
        $context = stream_context_create(
            array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $feed   = file_get_contents($feed, false, $context);
        $xml    = simplexml_load_string($feed);
        $json   = json_encode($xml);
        $array  = json_decode($json, true);
        $items  = $array['channel']['item'];
        $incidents = array();
        $pages     = array();
        foreach ($items as $item) {
            $key = explode('/', $item['link']);
            $key = end($key);
            if (!empty($key)) {
                $statuses = $item['description'];
                preg_match_all('('.preg_quote('<p>').'(.*?)'.preg_quote('</p>').')is', $statuses, $descriptions);
                $descriptions = $descriptions[1];
                foreach ($descriptions as $description) {
                    $text = explode('</strong> - ', $description);
                    $text = end($text);
                    preg_match(
                        '('.preg_quote('<small>').'(.*?)'.preg_quote('</small>').')is',
                        $description,
                        $time
                    );
                    preg_match_all(
                        '('.preg_quote('<strong>').'(.*?)'.preg_quote('</strong>').')is',
                        $description,
                        $status
                    );
                    $status = $status[1];
                    if (isset($status[0]) && isset($time[1]) && $status[0] !== 'Postmortem') {
                        $correct_time = (string) date('M d,', strtotime($time[1]))
                                            .' '.date('Y', strtotime($item['pubDate']))
                                            .' '.date(' H:i T', strtotime($time[1]));
                        if (strtotime($correct_time) > time()) {
                            $correct_time = (string) date('M d,', strtotime($time[1]))
                                .' '.(date('Y', strtotime($item['pubDate'])) - 1)
                                .' '.date(' H:i T', strtotime($time[1]));
                        }
                        $incident = array(
                            'key'           => substr(md5($status[0].$correct_time), 0, 12),
                            'page'          => $key,
                            'name'          => $item['title'],
                            'description'   => strip_tags($text),
                            'status'        => strtolower($status[0]),
                            'date'          => date('Y-m-d', strtotime($correct_time)),
                            'time'          => date('F j Y, H:i T', strtotime($correct_time)),
                        );
                        $incidents[] = $incident;
                    }
                }
            }
        }
        foreach ($incidents as $incident) {
            $pages[$incident['page']]['key']            = $incident['page'];
            $pages[$incident['page']]['name']           = $incident['name'];
            $pages[$incident['page']]['incidents'][]    = $incident['key'];
        }
        foreach ($incidents as $incident) {
            $this->create($incident);
        }
        foreach ($pages as $page) {
            $createdPage = new Page();
            $createdPage->create($page);
        }

        return true;
    }
}
