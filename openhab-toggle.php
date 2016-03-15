<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */


require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';


$uri = (new \Openhab\Request\UriBuilder())->getUriForRoute('items/');
$e = new \Openhab\Request\Execute();

/*
 * toggle item
 */
if (count($argv) === 2) {
	$item = $argv[1];
	(new \Openhab\Request\Toggle($e))->toggle($uri . $item);
}
