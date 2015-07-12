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

class Settings
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
        $template   = new Template();
        $post['template']['days_to_show'] = intval($post['template']['days_to_show']);

        if (DEMO) {
            Response::redirect('/dashboard/settings');
        }

        if (PREMIUM) {
            $post['template']['custom_header']  = ($post['template']['custom_header'] === 'true');
            $post['template']['custom_footer']  = ($post['template']['custom_footer'] === 'true');
        }

        if (!is_numeric($post['template']['days_to_show'])) {
            $post['template']['days_to_show'] = 30;
        }

        $template->create($post['template']);
        Response::redirect('/dashboard/settings');
    }
}
