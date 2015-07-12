<?php

date_default_timezone_set(TIMEZONE);
define('ROOT_DIR', __DIR__.'/../../');
define('CONFIG_DIR', ROOT_DIR.'app/config');
define('DATA_DIR', ROOT_DIR.'app/data');
define('CACHE_DIR', ROOT_DIR.'app/data/cache');
define('VIEWS_DIR', ROOT_DIR.'app/views');
define('PUBLIC_DIR', ROOT_DIR.'public');

if (!defined('REDIS')) {
    define('REDIS', false);
}

if (!defined('REDIS_HOST')) {
    define('REDIS_HOST', '127.0.0.1');
}

if (!defined('REDIS_PORT')) {
    define('REDIS_PORT', '6379');
}

if (!defined('REDIS_PASSWORD')) {
    define('REDIS_PASSWORD', '');
}

if (!defined('SLACK_WEBHOOK')) {
    define('SLACK_WEBHOOK', false);
}

if (!defined('SLACK_WEBHOOK_URL')) {
    define('SLACK_WEBHOOK_URL', '');
}

if (!defined('PINGDOM')) {
    define('PINGDOM', false);
}

if (!defined('PINGDOM_UPTIME')) {
    define('PINGDOM_UPTIME', false);
}

if (!defined('PINGDOM_RESPONSE_TIME')) {
    define('PINGDOM_RESPONSE_TIME', false);
}

if (!defined('PINGDOM_UPTIME')) {
    define('PINGDOM_UPTIME', false);
}

if (!defined('PINGDOM_USERNAME')) {
    define('PINGDOM_USERNAME', '');
}

if (!defined('PINGDOM_PASSWORD')) {
    define('PINGDOM_PASSWORD', '');
}

if (!defined('PINGDOM_APPLICATION_KEY')) {
    define('PINGDOM_APPLICATION_KEY', '');
}

if (!defined('PINGDOM_CHECKID')) {
    define('PINGDOM_CHECKID', '');
}

if (!defined('UPTIMEROBOT')) {
    define('UPTIMEROBOT', false);
}

if (!defined('UPTIMEROBOT_RESPONSE_TIME')) {
    define('UPTIMEROBOT_RESPONSE_TIME', false);
}

if (!defined('UPTIMEROBOT_MONITOR_KEY')) {
    define('UPTIMEROBOT_MONITOR_KEY', '');
}

define('PREMIUM', true);
define('DEMO', false);
