<?php

namespace Model;

class Webhook
{


    public static function send($data = array())
    {
        if (!WEBHOOK) {
            return false;
        }
        $urls = json_decode(WEBHOOK_URLS);
        $data = (array) $data;
        $data = json_encode($data, JSON_PRETTY_PRINT);

        foreach ($urls as $url) {
            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $context = stream_context_create(
                    array(
                        'http' => array(
                            'method'  => 'POST',
                            'header'  => 'Content-Type: application/json',
                            'content' => $data
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                        ),
                    )
                );
                file_get_contents($url, false, $context);
            }
        }

        return true;
    }


    public static function slack($message)
    {
        if (!SLACK_WEBHOOK) {
            return false;
        }
        $data = json_encode(array('text' => $message));
        $context = stream_context_create(
            array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-Type: application/json',
                    'content' => $data
                ),
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ),
            )
        );
        file_get_contents(SLACK_WEBHOOK_URL, false, $context);
        return true;
    }
}
