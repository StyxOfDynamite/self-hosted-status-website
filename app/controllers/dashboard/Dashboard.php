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

class Dashboard
{


    public function __construct()
    {
        Session::start();
        Session::set('authenticated', false);
    }


    public function get()
    {
        $path       = Router::path();
        $template   = new Template();
        $template   = $template->get();

        $view = View::render(
            '_signin',
            [
                'path'          => $path,
                'template'      => $template
            ]
        );
        $view = str_replace(array("\t", "\n"), "", $view);
        Response::html($view);
    }


    public function post()
    {
        $post       = Request::post();
        $users      = json_decode(ADMIN_AUTHENTICATION, true);

        if (DEMO) {
            Session::set('authenticated', true);
            Response::redirect('/dashboard/components');
        }

        if (isset($users[$post['username']]) &&
            ($users[$post['username']] == $post['password'])) {
            Session::set('authenticated', true);
            Response::redirect('/dashboard/components');
        } else {
            $path       = Router::path();
            $template   = new Template();
            $template   = $template->get();

            $view = View::render(
                '_signin',
                [
                    'path'      => $path,
                    'template'  => $template,
                    'error'     => 'Incorrect username & password'
                ]
            );
            Response::html($view);
        }
    }
}
