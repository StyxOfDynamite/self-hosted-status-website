<?php

namespace Controller\Api\Pingdom;

use Source\Request      as Request;
use Source\Response     as Response;
use Source\Router       as Router;
use Source\Session      as Session;
use Source\View         as View;

use Model\Cache         as Cache;
use Model\Pingdom       as Pingdom;

class Summary
{


    public function get()
    {
        if (PINGDOM) {
            $cache = new Cache();
            if ($view = $cache->get('api:pingdom:summary:'.date('Y:m:d:H'))) {
                Response::json($view);
            }
            $pingdom = new Pingdom();
            $summary = $pingdom->summary();
            $cache->set('api:pingdom:summary:'.date('Y:m:d:H'), $summary);
            Response::json($summary);
        }
    }
}
