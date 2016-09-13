<?php
/**
* Read configuration from
* config file in ~/.openhab-cli-config.json
* create if file does not exist
*/
define('PATH_TO_CONFIG_FILE', $_SERVER['HOME'] . '/.openhab-cli-config.json');
if (false === file_exists(PATH_TO_CONFIG_FILE)) {
echo "create default config in ~/.openhab-cli-config.json" . PHP_EOL;
$defaultConfig = [
'baseUrl' => 'http://192.168.0.166:8080/rest/'
];
file_put_contents(PATH_TO_CONFIG_FILE, json_encode($defaultConfig));
}

$config = json_decode(file_get_contents(PATH_TO_CONFIG_FILE));

define('BASE_URL', $config->baseUrl);