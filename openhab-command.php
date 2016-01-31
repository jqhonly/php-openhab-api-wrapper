<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;


require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once  dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';

$e = new \Openhab\Request\Execute();

/*
 * switch item
 */
if(count($argv) === 3) {
	$item = $argv[1];
	$value = $argv[2];
	$e->executePost('http://192.168.0.166:8080/rest/items/' . $item , $value);
}
