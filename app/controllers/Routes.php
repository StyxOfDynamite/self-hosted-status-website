<?php

namespace Config;

class Routes
{

    public $api_routes = array(
        '/api/v1/components'            => 'Controller\Api\Components',
        '/api/v1/incidents'             => 'Controller\Api\Incidents',
        '/api/v1/incidents/*'           => 'Controller\Api\Single',
        '/api/v1/status'                => 'Controller\Api\Status',
    );

    public $app_routes = array(
        '/dashboard'                    => 'Controller\Dashboard\Dashboard',
        '/dashboard/components'         => 'Controller\Dashboard\Components',
        '/dashboard/incidents'          => 'Controller\Dashboard\Incidents',
        '/dashboard/incidents/*'        => 'Controller\Dashboard\Single',
        '/dashboard/import'             => 'Controller\Dashboard\Import',
        '/dashboard/settings'           => 'Controller\Dashboard\Settings',
    );

    public $site_routes = array(
        '/'                             => 'Controller\Status',
        '/history'                      => 'Controller\History',
        '/incidents/*'                  => 'Controller\Single',
        '/rss'                          => 'Controller\Rss',
    );

    public $premium_routes = array(
        '/api/v1/pingdom/latency'       => 'Controller\Api\Pingdom\Latency',
        '/api/v1/pingdom/performance'   => 'Controller\Api\Pingdom\Performance',
        '/api/v1/pingdom/summary'       => 'Controller\Api\Pingdom\Summary',
        '/api/v1/pingdom/uptime'        => 'Controller\Api\Pingdom\Uptime',
        '/api/v1/uptimerobot/summary'   => 'Controller\Api\UptimeRobot\Summary',
    );

    public function routes()
    {
        if (PREMIUM) {
            return $this->api_routes + $this->app_routes + $this->site_routes + $this->premium_routes;
        }
        return $this->api_routes + $this->app_routes + $this->site_routes;
    }
}
