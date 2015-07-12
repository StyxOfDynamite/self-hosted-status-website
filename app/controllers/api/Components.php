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

class Components
{


    public function get()
    {
        $cache      = new Cache();
        if ($json = $cache->get('api:components')) {
            Response::json($json);
        }

        $component  = new Component();
        $components = $component->all();

        if (count($components) < 1) {
            $message = array(
                'error' => true,
                'message' => 'There are currently no components.',
            );
            Response::json($message);
        }

        for ($x = 0; $x < count($components); $x++) {
            ksort($components[$x]);
        }
        
        $cache->set('api:components', $components);
        Response::json($components);
    }
}
