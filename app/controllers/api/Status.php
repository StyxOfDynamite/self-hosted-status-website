<?php

namespace Controller\Api;

use Source\Request      as Request;
use Source\Response     as Response;
use Source\Router       as Router;
use Source\Session      as Session;
use Source\View         as View;

use Model\Cache         as Cache;
use Model\Component     as Component;
use Model\Incident      as Incident;
use Model\Template      as Template;
use Model\Page          as Page;

class Status
{


    public function get()
    {
        $cache      = new Cache();
        if ($json = $cache->get('api:status')) {
            Response::json($json);
        }

        $component  = new Component();
        $components = $component->all();
        $incident   = new Incident();
        $incidents  = $incident->all();
        $status = 'operational';

        if (isset($incidents[0])) {
            if (strtolower($incidents[0]['status']) !== 'resolved'
                && strtolower($incidents[0]['status']) !== 'completed') {
                $status = 'issues';
            }
        }

        foreach ($components as $component) {
            if ($component['status'] !== 'operational') {
                $status = 'issues';
            }
        }

        $response = array(
            'status' => $status,
        );
        
        $cache->set('api:status', $response);
        Response::json($status);
    }
}
