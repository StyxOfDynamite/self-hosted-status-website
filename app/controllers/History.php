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

class History
{


    public function get()
    {
        $cache      = new Cache();
        if ($view = $cache->get('history:'.date('Y:m'))) {
            Response::html($view);
        }

        $path       = Router::path();
        $template   = new Template();
        $template   = $template->get();
        $component  = new Component();
        $components = $component->all();
        $incident   = new Incident();
        $incidents  = $incident->all();
        $incidents  = array_slice($incidents, 0, 150);
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
        }

        $view = View::render(
            '_history',
            [
                'path'          => $path,
                'template'      => $template,
                'components'    => $components,
                'incidents'     => $incidents
            ]
        );

        $view = str_replace(array("\t", "\n"), "", $view);
        $cache->set('history:'.date('Y:m'), $view);
        Response::html($view);
    }
}
