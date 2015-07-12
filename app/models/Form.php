<?php

namespace Model;

class Form
{


    public function createComponent($post)
    {
        $component = new Component();
        if (!empty($post['component']['name'])) {
            $item = array(
                'name'        => $post['component']['name'],
                'description' => $post['component']['description'],
                'sort'        => 99,
                'status'      => 'operational'
            );
            $component->create($item);
            return true;
        }
        return false;
    }


    public function updateComponent($post)
    {
        $component = new Component();
        if ($post['action'] === 'save') {
            $component->create($post['component']);
            return true;
        }
        if ($post['action'] === 'delete') {
            $component->delete($post['component']['key']);
            return true;
        }
        return false;
    }


    public function updateComponents($post)
    {
        $component = new Component();
        if (isset($post['component'])) {
            $items      = $post['component'];
            $sort       = 0;
            foreach ($items as $key => $value) {
                $piece           = $component->get($key);
                $piece['sort']   = $sort;
                $piece['status'] = $value;
                $component->create($piece);
                $sort++;
            }
            return true;
        }
        return false;
    }


    public function createIncident($post)
    {
        $incident = new Incident();
        $page = new Page();
        if (!empty($post['incident']['name'])
            && !empty($post['incident']['description'])) {
            $pageKey    = substr(md5(uniqid()), 0, 12);
            $status     = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $createdIncident = $incident->create(
                array(
                    'page'          => $pageKey,
                    'description'   => $post['incident']['description'],
                    'status'        => strtolower($status),
                )
            );
            $page->create(
                array(
                    'key'           => $pageKey,
                    'name'          => $post['incident']['name'],
                    'incidents'     => array($createdIncident['key']),
                )
            );
            Webhook::slack("[Status Update] ".$post['incident']['name']
                ." \n Currently ".ucfirst($post['incident']['status'])."... "
                ." \n ".$post['incident']['description']
                ." \n <".BASE_URL."/incidents/".$pageKey."|Click here for more updates> ");
            return true;
        }
        return false;
    }


    public function updateIncident($post)
    {
        if ($post['action'] === 'save') {
            return $this->updateIncidentSave($post);
        }
        if ($post['action'] === 'delete') {
            return $this->updateIncidentDelete($post);
        }
        return false;
    }


    public function updateIncidentSave($post)
    {
        $incident = new Incident();
        if (!empty($post['page']['key']) &&
            !empty($post['incident']['description']) &&
            !empty($post['incident']['key'])) {
            $status = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $incident->create(
                array(
                    'key'           => $post['incident']['key'],
                    'page'          => $post['page']['key'],
                    'description'   => $post['incident']['description'],
                    'status'        => strtolower($status),
                )
            );
            return true;
        }
        return false;
    }


    public function updateIncidentDelete($post)
    {
        $incident = new Incident();
        $page = new Page();
        $currentPage = $page->get($post['page']['key']);
        $newIncidents = array();
        foreach ($currentPage['incidents'] as $currentIncident) {
            if ($currentIncident !== $post['incident']['key']) {
                $newIncidents[] = $currentIncident;
            }
        }
        $currentPage['incidents'] = $newIncidents;
        $page->create($currentPage);
        $incident->delete($post['incident']['key']);
        return true;
    }


    public function updateCreateIncident($post)
    {
        $incident = new Incident();
        $page = new Page();
        if (!empty($post['page']['key']) &&
            !empty($post['incident']['description'])) {
            $status = $post['incident']['status'];
            if ($status === 'custom') {
                $status = $post['incident']['custom'];
                if (empty($status)) {
                    $status = 'investigating';
                }
            }
            $currentPage     = $page->get($post['page']['key']);
            $createdIncident = $incident->create(
                array(
                    'page'          => $post['page']['key'],
                    'description'   => $post['incident']['description'],
                    'status'        => strtolower($status),
                )
            );
            $currentPage['incidents'][] = $createdIncident['key'];
            $page->create($currentPage);
            Webhook::slack("[Status Update] ".$currentPage['name']
                ." \n Currently ".ucfirst($post['incident']['status'])."... "
                ." \n ".$post['incident']['description']
                ." \n <".BASE_URL."/incidents/".$currentPage['key']."|Click here for more updates> ");
            return true;
        }
        return false;
    }


    public function updatePage($post)
    {
        if ($post['action'] === 'save') {
            return $this->updatePageSave($post);
        }
        if ($post['action'] === 'delete') {
            return $this->updatePageDelete($post);
        }
        return false;
    }


    public function updatePageSave($post)
    {
        $page = new Page();
        $currentPage = $page->get($post['page']['key']);
        $currentPage['name'] = $post['page']['name'];
        $page->create($currentPage);
        return true;
    }


    public function updatePageDelete($post)
    {
        $incident = new Incident();
        $page = new Page();
        $currentPage = $page->get($post['page']['key']);
        foreach ($currentPage['incidents'] as $currentIncident) {
            $incident->delete($currentIncident);
        }
        $page->delete($post['page']['key']);
        return true;
    }
}
