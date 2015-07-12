[![Codacy Badge](https://www.codacy.com/project/badge/be7133fbc936414b9653a88facbb8a33)](https://www.codacy.com/app/sam/self-hosted-status-website)

### MIT License

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

----

### Configuration

To configure, please only edit the CONFIGURATION.php file in the root. No other files need to be touched.

You will see a couple of files in the root directory that look slightly odd. You DO NOT need to touch them however. Here is a quick explanation of them:

| File              |                                                                                                            |
|-------------------|------------------------------------------------------------------------------------------------------------|
| .htaccess         | This is a default override file for Apache servers. Heroku uses it as well.                                |
| .user.ini         | This is a default override on the memory limit for Heroku. This enables 19 PHP processes vs the default 4. |
| composer.json     | This is a configuration file for autoloading components.                                                   |
| composer.lock     | This is used for the composer.json. Don't touch this or the json, they've already been optimized for you.  |
| CONFIGURATION.php | This is the ONLY file you should touch. It holds all the settings for the status page.                     |
| index.php         | This is the main entry file that loads your configurations.                                                |
| Procfile          | This is a configuration file for Heroku that tells Heroku to use PHP.                                      |
| README.md         | This is the readme                                                                                         |
| /app/             | This is where the application logic is.          

You will never have to touch anything within the /app/ folder. If you are not using Heroku, your data will be stored in /app/data/

----

### Installing & Troubleshooting

#### php.ini configuration

If you are on PHP 5.6 and are recieving depreaction warning as following:

>Deprecated: Automatically populating $HTTP_RAW_POST_DATA is deprecated and will be removed in a future version. To avoid this warning set 'always_populate_raw_post_data' to '-1' in php.ini and use the php://input stream instead.


You will need to change your php.ini configuration to the following:
```
always_populate_raw_post_data=-1
```

Relevant link: http://stackoverflow.com/questions/26261001/warning-about-http-raw-post-data-being-deprecated

----

### Server Configuration

#### Server requirements
- PHP 5.4+

#### Apache

You may need to add the following snippet in your Apache HTTP server virtual host configuration or **.htaccess** file.

```apacheconf
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond $1 !^(index\.php)
RewriteRule ^(.*)$ /index.php/$1 [L]
```

Alternatively, if you’re lucky enough to be using a version of Apache greater than 2.2.15, then you can instead just use this one, single line:
```apacheconf
FallbackResource /index.php
```

#### IIS

For IIS you will need to install URL Rewrite for IIS and then add the following rule to your `web.config`:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<configuration>
    <system.webServer>
        <rewrite>
          <rule name="Toro" stopProcessing="true">
            <match url="^(.*)$" ignoreCase="false" />
              <conditions logicalGrouping="MatchAll">
                <add input="{REQUEST_FILENAME}" matchType="IsFile" ignoreCase="false" negate="true" />
                <add input="{REQUEST_FILENAME}" matchType="IsDirectory" ignoreCase="false" negate="true" />
                <add input="{R:1}" pattern="^(index\.php)" ignoreCase="false" negate="true" />
              </conditions>
            <action type="Rewrite" url="/index.php/{R:1}" />
          </rule>
        </rewrite>
    </system.webServer>
</configuration>
```

#### Nginx

Under the `server` block of your virtual host configuration, you only need to add three lines.
```conf
location / {
  try_files $uri $uri/ /index.php?$args;
}
```

----

### API

#### /api/v1/components

**Request Headers**
```
GET /api/v1/components HTTP/1.1
```

**Response Headers**
```
Content-Type: application/json
```

**Response Body**
```
{
    "error": true,
    "message": "There are currently no components."
}
```

**Response Body**
```
[
    {
        "description": "API Description",
        "key": "1f2cccdf99b7",
        "name": "API",
        "sort": 0,
        "status": "operational"
    },
    {
        "description": "Web Application Description",
        "key": "9576f14926dd",
        "name": "Web Application",
        "sort": 1,
        "status": "operational"
    }
]
```

#### /api/v1/incidents

**Request Headers**
```
GET /api/v1/components HTTP/1.1
```

**Response Headers**
```
Content-Type: application/json
```

**Response Body**
```
{
    "error": true,
    "message": "There are currently no incidents."
}
```

**Response Body**
```
[
    {
        "date": "2015-06-28",
        "description": "This incident has been resolved.",
        "key": "cdeffd27df3f",
        "name": "Minor web traffic drop",
        "page": "9j9sm21khqry",
        "status": "resolved",
        "time": "2015-06-28T08:00:00-05:00"
    },
    {
        "date": "2015-06-28",
        "description": "A recent configuration change caused 1 minute of web traffic to be dropped, the configuration change was reverted and traffic has resumed.",
        "key": "720bc965747e",
        "name": "Minor web traffic drop",
        "page": "9j9sm21khqry",
        "status": "monitoring",
        "time": "2015-06-28T07:22:00-05:00"
    },
    {
        "date": "2015-06-28",
        "description": "This incident has been resolved.",
        "key": "f277f0696af3",
        "name": "Metric fetch failures",
        "page": "g0v52v1wwsrf",
        "status": "resolved",
        "time": "2015-06-28T06:15:00-05:00"
    },
    {
        "date": "2015-06-28",
        "description": "Our single metric-fetching instance suddenly went offline at approximately 3:52am MT for reasons unknown. Monitoring systems alerted our on-call personnel, and we were able to spin up more worker processes on a different machine while the metrics-fetching instance was assigned to another physical host. \n\nAll systems are back to normal now, and metric operations have resumed. We're continuing to monitor for any regressions.",
        "key": "e1fb6512c14a",
        "name": "Metric fetch failures",
        "page": "g0v52v1wwsrf",
        "status": "monitoring",
        "time": "2015-06-28T05:50:00-05:00"
    },
    ...
]
```

#### /api/v1/incidents/{PAGE}

**Request Headers**
```
GET /api/v1/components HTTP/1.1
```

**Response Headers**
```
Content-Type: application/json
```

**Response Body**
```
{
    "error": true,
    "message": "This page does not exist."
}
```

**Response Body**
```
[
    {
        "date": "2015-06-28",
        "description": "This incident has been resolved.",
        "key": "cdeffd27df3f",
        "page": "9j9sm21khqry",
        "status": "resolved",
        "time": "2015-06-28T08:00:00-05:00"
    },
    {
        "date": "2015-06-28",
        "description": "A recent configuration change caused 1 minute of web traffic to be dropped, the configuration change was reverted and traffic has resumed.",
        "key": "720bc965747e",
        "page": "9j9sm21khqry",
        "status": "monitoring",
        "time": "2015-06-28T07:22:00-05:00"
    }
]
```

#### /api/v1/status

**Request Headers**
```
GET /api/v1/components HTTP/1.1
```

**Response Headers**
```
Content-Type: application/json
```

**Response Body**
```
[
    "operational"
]
```

