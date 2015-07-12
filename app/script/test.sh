# phpunit --bootstrap ./config/config.inc.php --verbose ./tests/Core/ApplicationTest
./vendor/bin/phpcs -d -e -p --standard=PSR2,./script/CodeSniffer.xml --tab-width=4 --colors ./
./vendor/bin/phpcbf -d -e -p --standard=PSR2,./script/CodeSniffer.xml --tab-width=4 --colors ./