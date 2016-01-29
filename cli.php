<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */
define('BASE_PATH', 'http://192.168.0.166:8080/rest/items/BueroAlle' );

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$e = new \Openhab\Execute('http://192.168.0.166:8080/');


$response = $e->executeGet('rest/items/');
$factory = new \Openhab\Items\ItemFactory($response);
$itemCollection = $factory->getItemCollection();

$filter = new \Openhab\Items\FilterItem();
$filter->setType('Switch');
$result = $itemCollection->findByFilter($filter);
die();


function getState(){
	$result = file_get_contents(BASE_PATH . '/state');
	return $result;
	var_dump($r);

}

function setState($value) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,            BASE_PATH );
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_POST,           1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS,     $value );
	curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain'));
	$result=curl_exec ($ch);

}
$state = getState();
if('ON'=== $state ){
	setState('OFF');
	echo 'turn light off';

} else {
	setState('ON');
	echo 'turn light on';
}


