<?php

namespace Model;

class UptimeRobot
{


    public function summary()
    {
        $context = stream_context_create(
            array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        $data = file_get_contents(
            'https://api.uptimerobot.com/getMonitors?apiKey='
            .UPTIMEROBOT_MONITOR_KEY
            .'&logs=1&responseTimes=1&customUptimeRatio=30&format=json&noJsonCallback=1',
            false,
            $context
        );
        $data = json_decode($data, true);

        $log            = $data['monitors']['monitor'][0]['log'];
        $responsetime   = $data['monitors']['monitor'][0]['responsetime'];

        $logs = array();
        $response = array();

        for ($x = 0; $x < count($log); $x++) {
            $time = strtotime($log[$x]['datetime']);
            if ($time > (strtotime('-8 day', time()))) {
                $logs[] = array(
                    'type' => intval($log[$x]['type']),
                    'time' => $time
                );
            }
        }

        for ($x = 0; $x < count($responsetime); $x++) {
            $time = strtotime($responsetime[$x]['datetime']);
            if ($time > (strtotime('-8 day', time()))) {
                $response[] = array(
                    'value' => intval($responsetime[$x]['value']),
                    'time' => $time
                );
            }
        }

        return array(
            'log' => $logs,
            'responsetime' => $response
        );
    }
}
