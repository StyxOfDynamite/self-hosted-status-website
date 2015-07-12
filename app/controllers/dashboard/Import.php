<?php

namespace Controller\Dashboard;

use Source\Request      as Request;
use Source\Response     as Response;
use Source\Router       as Router;
use Source\Session      as Session;
use Source\View         as View;

use Model\Component     as Component;
use Model\Incident      as Incident;
use Model\Template      as Template;
use Model\Page          as Page;

class Import
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

        $view = View::render(
            '_dashboard',
            [
                'path'      => $path,
                'template'  => $template
            ]
        );
        $view = str_replace(array("\t", "\n"), "", $view);
        Response::html($view);
    }


    public function post()
    {
        $path       = Router::path();
        $post       = Request::post();
        $incident   = new Incident();
        $template   = new Template();
        $template   = $template->get();

        if (DEMO) {
            Response::redirect('/dashboard/import');
        }

        if (isset($post['import']['url'])) {
            if (strpos($post['import']['url'], 'history.rss') === false) {
                $view = View::render(
                    '_dashboard',
                    [
                        'path'      => $path,
                        'template'  => $template,
                        'error'     => 'Invalid URL - looking for /history.rss'
                    ]
                );
                Response::html($view);
            }

            if (!@file_get_contents($post['import']['url'])) {
                $view = View::render(
                    '_dashboard',
                    [
                        'path'      => $path,
                        'template'  => $template,
                        'error'     => 'Invalid URL - could not load '.$post['import']['url']
                    ]
                );
                Response::html($view);
            }

            $incident->import($post['import']['url']);
        }
        Response::redirect('/dashboard/incidents');
    }
}
