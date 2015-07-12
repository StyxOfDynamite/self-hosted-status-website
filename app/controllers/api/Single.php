<?php

namespace Controller\Api;

use Source\Response as Response;
use Source\Request  as Request;
use Source\Router   as Router;
use Source\View     as View;

use Model\Cache     as Cache;
use Model\Component as Component;
use Model\Incident  as Incident;
use Model\Page      as Page;

class Single
{


    public function get($key)
    {
        $cache      = new Cache();
        if ($view = $cache->get('api:single:'.$key)) {
            Response::json($view);
        }

        $key        = explode('/', $key);
        $key        = end($key);
        $incident   = new Incident();
        $incidents  = array();
        $page       = new Page();
        $page       = $page->get($key);

        if (!isset($page['name'])) {
            $message = array(
                'error'     => true,
                'message'   => 'This page does not exist.',
            );
            Response::json($message);
        }

        if (isset($page['incidents'])) {
            foreach ($page['incidents'] as $incidentKey) {
                $incidents[] = $incident->get($incidentKey);
            }
        }

        usort($incidents, function ($incident1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incident1['time']);
        });

        for ($x = 0; $x < count($incidents); $x++) {
            $incidents[$x]['time'] = date("c", strtotime($incidents[$x]['time']));
            ksort($incidents[$x]);
        }

        $cache->set('api:single:'.$key, $incidents);
        Response::json($incidents);
    }


    public function post($key)
    {
        $post           = Request::post();
        $key            = explode('/', $key);
        $key            = end($key);
        $incident       = new Incident();
        $page           = new Page();
        $currentPage    = $page->get($key);

        if (DEMO) {
            $message = array(
                'error'     => true,
                'message'   => 'Currently in DEMO mode',
            );
            Response::json($message);
        }

        if (APIKEY !== $post['apikey']) {
            $message = array(
                'error' => true,
                'message' => 'The parameter `apikey` did not match your secret key.',
            );
            Response::json($message);
        }

        if (!isset($currentPage['name'])) {
            $message = array(
                'error'     => true,
                'message'   => 'This page does not exist.',
            );
            Response::json($message);
        }

        if (!isset($post['status']) || empty($post['status'])) {
            $message = array(
                'error'     => true,
                'message'   => 'Expected a parameter `status` with the status of the incident.',
            );
            Response::json($message);
        }

        if (!isset($post['description']) || empty($post['description'])) {
            $message = array(
                'error'     => true,
                'message'   => 'Expected a parameter `description` with a description of the incident.',
            );
            Response::json($message);
        }

        $createdIncident = $incident->create(
            array(
                'page'          => $currentPage['key'],
                'description'   => $post['description'],
                'status'        => strtolower($post['status']),
            )
        );
        $currentPage['incidents'][] = $createdIncident['key'];
        $page->create($currentPage);

        $message = array(
            'success'   => true,
            'error'     => false,
            'message'   => 'Created a new incident on the page '.$key,
            'incident'  => $createdIncident
        );
        Response::json($message);
    }
}
