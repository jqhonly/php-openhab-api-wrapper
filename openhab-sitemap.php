<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;

define('BASE_PATH', 'http://192.168.0.166:8080/rest/items/BueroAlle');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$climate = new \League\CLImate\CLImate();

//this is what counts
$response = $e->executeGet('http://192.168.0.166:8080/rest/sitemaps');
$factory = new \Openhab\Factories\SiteMapFactory($response);
$siteMap = $factory->getSiteMap();
$factory = new ItemFactory();
$items  = array();
foreach ($siteMap->homepage->widget as $widget) {
	$object = $factory->createBySimpleXmlElement($widget);
	$items[] = $object;

}
$to = new \Openhab\Textoutput($items, $climate);
$to->echoSiteMap();
