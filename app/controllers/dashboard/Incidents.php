<?php

namespace Controller\Dashboard;

use Source\Request      as Request;
use Source\Response     as Response;
use Source\Router       as Router;
use Source\Session      as Session;
use Source\View         as View;

use Model\Component     as Component;
use Model\Form          as Form;
use Model\Incident      as Incident;
use Model\Template      as Template;
use Model\Page          as Page;

class Incidents
{


    public function __construct()
    {
        Session::start();
        if (Session::get('authenticated') !== true) {
            Response::redirect('/dashboard');
        }
    }


    public function get()
    {
        $path       = Router::path();
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
        }

        $view = View::render(
            '_dashboard',
            [
                'path'          => $path,
                'template'      => $template,
                'incidents'     => $incidents
            ]
        );
        $view = str_replace(array("\t", "\n"), "", $view);
        Response::html($view);
    }


    public function post()
    {
        $post       = Request::post();
        $form       = new Form();

        if (DEMO) {
            Response::redirect('/dashboard/incidents');
        }

        if ($post['form'] === 'create-incident') {
            $form->createIncident($post);
        }

        if ($post['form'] === 'update-create-incident') {
            $form->updateCreateIncident($post);
        }

        Response::redirect('/dashboard/incidents');
    }
}
