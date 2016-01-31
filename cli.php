<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;

define('BASE_PATH', 'http://192.168.0.166:8080/rest/items/BueroAlle');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$e = new \Openhab\Execute('http://192.168.0.166:8080/');
$climate = new \League\CLImate\CLImate();


/*
$response = $e->executeGet('http://192.168.0.166:8080/rest/items/');

$factory = new \Openhab\Factories\ItemFactory($response);
$itemCollection = $factory->getItemCollection();

$filter = new \Openhab\Item\FilterItem();
$filter->setType('SwitchItem');
$result = $itemCollection->findByFilter($filter);


*/

//this is what counts
$response = $e->executeGet('http://192.168.0.166:8080/rest/sitemaps');
$factory = new \Openhab\Factories\SiteMapFactory($response);
$siteMap = $factory->getSiteMap();
//@todo sitemap darstellen
#$result  = $e->executeGet($siteMap->getLink());


#$climate->blue((string)$siteMap->label);
$factory = new ItemFactory();
$items  = array();
foreach ($siteMap->homepage->widget as $widget) {
	$object = $factory->createBySimpleXmlElement($widget);
	$items[] = $object;

}
$to = new \Openhab\Textoutput($items, $climate);
$to->echoSiteMap();
#var_dump($siteMap);
die();
#$result =$e->executePost('http://192.168.0.166:8080/rest/items/ALL_WZ_Alle_WHITE_MODE', \Openhab\Items\Command::OFF);

/*
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


*/