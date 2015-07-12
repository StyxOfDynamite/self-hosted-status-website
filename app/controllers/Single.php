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

class Single
{


    public function get($key)
    {
        $cache      = new Cache();
        if ($view = $cache->get('single:'.$key)) {
            Response::html($view);
        }
        
        $path       = Router::path();
        $key        = explode('/', $key);
        $key        = end($key);
        $template   = new Template();
        $template   = $template->get();
        $incident   = new Incident();
        $incidents  = array();
        $page       = new Page();
        $page       = $page->get($key);

        if (!isset($page['name'])) {
            Response::redirect('/');
        }

        if (isset($page['incidents'])) {
            foreach ($page['incidents'] as $incidentKey) {
                $incidents[] = $incident->get($incidentKey);
            }
        }

        usort($incidents, function ($incident1, $incident2) {
            return strtotime($incident2['time']) - strtotime($incident1['time']);
        });

        $view = View::render(
            '_single',
            [
                'path'          => $path,
                'template'      => $template,
                'page'          => $page,
                'incidents'     => $incidents
            ]
        );
        
        $view = str_replace(array("\t", "\n"), "", $view);
        $cache->set('single:'.$key, $view);
        Response::html($view);
    }
}
