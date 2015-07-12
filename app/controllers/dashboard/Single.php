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

class Single
{


    public function __construct()
    {
        Session::start();
        if (Session::get('authenticated') !== true) {
            Response::redirect('/dashboard');
        }
    }


    public function get($key)
    {
        $path       = Router::path();
        $template   = new Template();
        $template   = $template->get();
        $key        = explode('/', $key);
        $key        = end($key);
        $incident   = new Incident();
        $incidents  = array();
        $page       = new Page();
        $page       = $page->get($key);

        if (!isset($page['name'])) {
            Response::redirect('/dashboard/incidents');
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
            '_dashboard',
            [
                'path'          => $path,
                'template'      => $template,
                'page'          => $page,
                'incidents'     => $incidents
            ]
        );
        $view = str_replace(array("\t", "\n"), "", $view);
        Response::html($view);
    }


    public function post($key)
    {
        $post       = Request::post();
        $key        = explode('/', $key);
        $key        = end($key);
        $form       = new Form();
        
        if (DEMO) {
            Response::redirect('/dashboard/incidents/'.$key);
        }

        if ($post['form'] === 'update-page') {
            $form->updatePage($post);
            if ($post['action'] === 'delete') {
                Response::redirect('/dashboard/incidents');
            }
        }

        if ($post['form'] === 'update-incident') {
            $form->updateIncident($post);
        }

        if ($post['form'] === 'update-create-incident') {
            $form->updateCreateIncident($post);
        }

        Response::redirect('/dashboard/incidents/'.$key);
    }
}
