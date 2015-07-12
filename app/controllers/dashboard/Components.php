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

/**
 *
 * @package default
 */
class Components
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
        $component  = new Component();
        $components = $component->all();

        $view = View::render(
            '_dashboard',
            [
                'path'          => $path,
                'template'      => $template,
                'components'    => $components
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
            Response::redirect('/dashboard/components');
        }

        if ($post['form'] === 'create-component') {
            $form->createComponent($post);
        }

        if ($post['form'] === 'update-component') {
            $form->updateComponent($post);
        }

        if ($post['form'] === 'update-components') {
            $form->updateComponents($post);
        }

        Response::redirect('/dashboard/components');
    }
}
