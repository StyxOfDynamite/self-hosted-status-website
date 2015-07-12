<?php 


/*
  _____ _                  _____                     
 |_   _(_)_ __ ___   ___  |__  /___  _ __   ___  ___ 
   | | | | '_ ` _ \ / _ \   / // _ \| '_ \ / _ \/ __|
   | | | | | | | | |  __/  / /| (_) | | | |  __/\__ \
   |_| |_|_| |_| |_|\___| /____\___/|_| |_|\___||___/
                                                     
*/

/*
	Please set your timezone.

	Most common timezones for US:
		America/New_York
		America/Chicago
		America/Denver
		America/Phoenix
		America/Los_Angeles
		Pacific/Honolulu

	For more:
		http://php.net/manual/en/timezones.php
*/
define('TIMEZONE', 'America/Chicago');


/*
  _   _ ____  _     
 | | | |  _ \| |    
 | | | | |_) | |    
 | |_| |  _ <| |___ 
  \___/|_| \_\_____|
                    
*/

/*
	The base url used for generating RSS feed links. 
	Make sure this resolves to the homepage.	
*/
define('BASE_URL', 'http://localhost:3000');


/*
  _   _                   
 | | | |___  ___ _ __ ___ 
 | | | / __|/ _ \ '__/ __|
 | |_| \__ \  __/ |  \__ \
  \___/|___/\___|_|  |___/
                          
*/

/*
	Usernames and passwords that have access to the dashboard.

	Please only touch values inside the array with the format:
		'username' => 'password',
*/
define('ADMIN_AUTHENTICATION', json_encode([

	'username' => 'password',
	'username2' => 'password',
	'username3' => 'password',

]));


/*
  _   _                _            ____          _ _     
 | | | | ___ _ __ ___ | | ___   _  |  _ \ ___  __| (_)___ 
 | |_| |/ _ \ '__/ _ \| |/ / | | | | |_) / _ \/ _` | / __|
 |  _  |  __/ | | (_) |   <| |_| | |  _ <  __/ (_| | \__ \
 |_| |_|\___|_|  \___/|_|\_\\__,_| |_| \_\___|\__,_|_|___/
                                                          
*/

/*
	Do you want to use Redis or a Flat File database?
	true or false
*/
define('REDIS', false);

/*
	If REDIS is true, fill these in correctly.
*/
define('REDIS_HOST', '127.0.0.1');
define('REDIS_POST', '6379');
define('REDIS_PASSWORD', '');


/*
     _    ____ ___ 
    / \  |  _ \_ _|
   / _ \ | |_) | | 
  / ___ \|  __/| | 
 /_/   \_\_|  |___|
                   
*/

/*
	Want to use the API? Set an API key.
*/
define('APIKEY', '');


/*
 __        __   _     _   _             _        
 \ \      / /__| |__ | | | | ___   ___ | | _____ 
  \ \ /\ / / _ \ '_ \| |_| |/ _ \ / _ \| |/ / __|
   \ V  V /  __/ |_) |  _  | (_) | (_) |   <\__ \
    \_/\_/ \___|_.__/|_| |_|\___/ \___/|_|\_\___/
                                                                                          
*/

/*
	If WEBHOOK is true, we will send outgoing webhook requests to the WEBHOOK_URLS.
*/
define('WEBHOOK', false);

/*
	If WEBHOOK is true, we will send outgoing webhook requests to the following WEBHOOK_URLS.
*/
define('WEBHOOK_URLS', json_encode([

	'',
	'',

]));


/*
  ____  _            _    
 / ___|| | __ _  ___| | __
 \___ \| |/ _` |/ __| |/ /
  ___) | | (_| | (__|   < 
 |____/|_|\__,_|\___|_|\_\
                          
*/

/*
	Set up a new incoming webhook integration here:
		https://my.slack.com/services/new/incoming-webhook/

	Set SLACK_WEBHOOK to true or false depending if you want it on or off.
	Set SLACK_WEBHOOK_URL to the incoming webhook url you generated.

*/
define('SLACK_WEBHOOK', false);
define('SLACK_WEBHOOK_URL', '');


/*
  ____  _                 _                 
 |  _ \(_)_ __   __ _  __| | ___  _ __ ___  
 | |_) | | '_ \ / _` |/ _` |/ _ \| '_ ` _ \ 
 |  __/| | | | | (_| | (_| | (_) | | | | | |
 |_|   |_|_| |_|\__, |\__,_|\___/|_| |_| |_|
                |___/                       
*/

/*
	Do you want enable Pingdom graphs?
	true or false
*/
define('PINGDOM', false);

/*
	Do you want enable the Pingdom Uptime graph?
	true or false
*/
define('PINGDOM_UPTIME', false);

/*
	Do you want enable the Pingdom Response Time graph?
	true or false
*/
define('PINGDOM_RESPONSE_TIME', false);

/*
	If PINGDOM is true, fill these in correctly.
*/
define('PINGDOM_USERNAME', '');
define('PINGDOM_PASSWORD', '');
define('PINGDOM_APPLICATION_KEY', '');
define('PINGDOM_CHECKID', '');


/*
  _   _       _   _                ____       _           _   
 | | | |_ __ | |_(_)_ __ ___   ___|  _ \ ___ | |__   ___ | |_ 
 | | | | '_ \| __| | '_ ` _ \ / _ \ |_) / _ \| '_ \ / _ \| __|
 | |_| | |_) | |_| | | | | | |  __/  _ < (_) | |_) | (_) | |_ 
  \___/| .__/ \__|_|_| |_| |_|\___|_| \_\___/|_.__/ \___/ \__|
       |_|                                                    
*/

/*
	Do you want to enable Uptime Robot graphs?
	true or false
*/
define('UPTIMEROBOT', false);

/*
	Do you want to enable Uptime Robot Response Time graph?
	true or false
*/
define('UPTIMEROBOT_RESPONSE_TIME', false);

/*
	If UPTIMEROBOT is true, fill this in correctly.
*/
define('UPTIMEROBOT_MONITOR_KEY', '');


/*
	Turn off all errors
*/
// error_reporting(0);

/*
	Report all errors
*/
error_reporting(-1);