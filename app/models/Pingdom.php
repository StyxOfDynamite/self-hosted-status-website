<?php

namespace Model;

class Pingdom
{


    public function latency()
    {
        $context = stream_context_create(
            array(
                'http' => array(
                    'header'  => array(
                        'header'  => 'Authorization: Basic ' . base64_encode(PINGDOM_USERNAME.':'.PINGDOM_PASSWORD),
                        'App-Key: '.PINGDOM_APPLICATION_KEY
                    )
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $data = file_get_contents(
            'https://api.pingdom.com/api/2.0/summary.hoursofday/'.PINGDOM_CHECKID.'?from='.strtotime('-1 week'),
            false,
            $context
        );
        $data = json_decode($data, true);
        return $data;
    }


    public function performance()
    {
        $context = stream_context_create(
            array(
                'http' => array(
                    'header'  => array(
                        'header'  => 'Authorization: Basic ' . base64_encode(PINGDOM_USERNAME.':'.PINGDOM_PASSWORD),
                        'App-Key: '.PINGDOM_APPLICATION_KEY
                    )
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $data = file_get_contents(
            'https://api.pingdom.com/api/2.0/summary.performance/'.PINGDOM_CHECKID.'?from='.strtotime('-1 week')
            .'&resolution=hour&includeuptime=true',
            false,
            $context
        );
        $data = json_decode($data, true);
        $data = $data['summary'];
        return $data;
    }


    public function summary()
    {
        $context = stream_context_create(
            array(
                'http' => array(
                    'header'  => array(
                        'header'  => 'Authorization: Basic ' . base64_encode(PINGDOM_USERNAME.':'.PINGDOM_PASSWORD),
                        'App-Key: '.PINGDOM_APPLICATION_KEY
                    )
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $data = file_get_contents(
            'https://api.pingdom.com/api/2.0/summary.average/'.PINGDOM_CHECKID.'?includeuptime=true&from='
            .strtotime('-1 week'),
            false,
            $context
        );
        $data = json_decode($data, true);
        $data = $data['summary'];
        return $data;
    }


    public function uptime()
    {
        $context = stream_context_create(
            array(
                'http' => array(
                    'header'  => array(
                        'header'  => 'Authorization: Basic ' . base64_encode(PINGDOM_USERNAME.':'.PINGDOM_PASSWORD),
                        'App-Key: '.PINGDOM_APPLICATION_KEY
                    )
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $data = file_get_contents(
            'https://api.pingdom.com/api/2.0/summary.outage/'.PINGDOM_CHECKID.'?from='.strtotime('-1 week'),
            false,
            $context
        );
        $data = json_decode($data, true);
        $data = $data['summary'];
        return $data;
    }
}
