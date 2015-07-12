<?php

namespace Controller;

use Source\Response as Response;
use Source\Router   as Router;
use Source\View     as View;

use Model\Cache     as Cache;
use Model\Component as Component;
use Model\Incident  as Incident;
use Model\Template  as Template;
use Model\Page      as Page;

class Rss
{


    public function get()
    {
        $cache      = new Cache();
        if ($view = $cache->get('rss')) {
            Response::xml($view);
        }
        
        $template   = new Template();
        $template   = $template->get();
        $incident   = new Incident();
        $incidents  = $incident->all();
        $page       = new Page();

        for ($x = 0; $x < count($incidents); $x++) {
            $name = $page->get($incidents[$x]['page']);
            if (isset($name['name'])) {
                $name = $name['name'];
            } else {
                $name = '';
            }
            $incidents[$x]['name'] = $name;
            if (empty($incidents[$x]['name'])) {
                $incidents[$x]['name'] = '';
            }
            $incidents[$x]['time'] = date('c', strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        $xml = new \SimpleXMLElement('<rss/>');
        $xml->addAttribute('version', '2.0');
        $channel = $xml->addChild('channel');
        $channel->title         = $template['headline'].' status updates';
        $channel->link          = BASE_URL.'/rss';
        $channel->description   = $template['about'];
        $channel->pubDate       = date("c", time());

        foreach ($incidents as $incident) {
            $item = $channel->addChild('item');
            $item->title        = $incident['name'] . ' - '. ucfirst($incident['status']);
            $item->description  = $incident['description'];
            $item->pubDate      = $incident['time'];
            $item->link         = BASE_URL.'/incidents/'.$incident['page'];
            $item->guid         = BASE_URL.'/incidents/'.$incident['page'];
        }

        $xml = $xml->asXML();
        $cache->set('set', $xml);
        Response::xml($xml);
    }
}
