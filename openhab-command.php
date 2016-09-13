<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */


require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'readConfig.php';


$uri = (new \Openhab\Request\UriBuilder())->getUriForRoute('items/');
$e = new \Openhab\Request\Execute();

/*
 * switch item
 */
if (count($argv) === 3) {
	$item = $argv[1];
	$value = $argv[2];
	$e->executePost($uri . $item, $value);
}
