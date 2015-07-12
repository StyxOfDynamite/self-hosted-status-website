<?php

namespace Controller\Api\UptimeRobot;

use Source\Request      as Request;
use Source\Response     as Response;
use Source\Router       as Router;
use Source\Session      as Session;
use Source\View         as View;

use Model\Cache         as Cache;
use Model\UptimeRobot   as UptimeRobot;

class Summary
{


    public function get()
    {
        if (UPTIMEROBOT) {
            $cache = new Cache();
            if ($view = $cache->get('api:uptimerobot:summary:'.date('Y:m:d:H'))) {
                Response::json($view);
            }
            $uptimerobot = new UptimeRobot();
            $summary = $uptimerobot->summary();
            $cache->set('api:uptimerobot:summary:'.date('Y:m:d:H'), $summary);
            Response::json($summary);
        }
    }
}
