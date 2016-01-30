<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;

define('BASE_PATH', 'http://192.168.0.166:8080/rest/items/BueroAlle');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$e = new \Openhab\Execute('http://192.168.0.166:8080/');

/*
 * switch item
 */
if(count($argv) === 3) {
	$item = $argv[1];
	$value = $argv[2];
	$e->executePost('http://192.168.0.166:8080/rest/items/' . $item , $value);
}
