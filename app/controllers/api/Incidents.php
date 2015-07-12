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

class Incidents
{


    public function get()
    {
        $cache      = new Cache();
        if ($json = $cache->get('api:incidents')) {
            Response::json($json);
        }

        $incident   = new Incident();
        $incidents  = $incident->all();
        $page       = new Page();

        if (count($incidents) < 1) {
            $message = array(
                'error' => true,
                'message' => 'There are currently no incidents.',
            );
            Response::json($message);
        }

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
            $incidents[$x]['time'] = date("c", strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        $cache->set('api:incidents', $incidents);
        Response::json($incidents);
    }


    public function post()
    {
        $post           = Request::post();
        $incident       = new Incident();
        $page           = new Page();

        if (DEMO) {
            $message = array(
                'error' => true,
                'message' => 'Currently in DEMO mode',
            );
            Response::json($message);
        }

        if (!isset($post['apikey']) || (APIKEY !== $post['apikey'])) {
            $message = array(
                'error' => true,
                'message' => 'Expected a parameter `apikey` did not match your secret key.',
            );
            Response::json($message);
        }

        if (!isset($post['name']) || empty($post['name'])) {
            $message = array(
                'error' => true,
                'message' => 'Expected a parameter `name` with the name of the incident.',
            );
            Response::json($message);
        }

        if (!isset($post['status']) || empty($post['status'])) {
            $message = array(
                'error' => true,
                'message' => 'Expected a parameter `status` with the status of the incident.',
            );
            Response::json($message);
        }

        if (!isset($post['description']) || empty($post['description'])) {
            $message = array(
                'error' => true,
                'message' => 'Expected a parameter `description` with a description of the incident.',
            );
            Response::json($message);
        }

        $pageKey    = substr(md5(uniqid()), 0, 12);

        $createdIncident = $incident->create(
            array(
                'page'          => $pageKey,
                'description'   => $post['description'],
                'status'        => strtolower($post['status']),
            )
        );

        $page->create(
            array(
                'key'           => $pageKey,
                'name'          => $post['name'],
                'incidents'     => array($createdIncident['key']),
            )
        );

        ksort($createdIncident);

        $message = array(
            'success' => true,
            'error' => false,
            'message' => 'Created a new incident and a new page',
            'incident' => $createdIncident
        );
        Response::json($message);
    }
}
