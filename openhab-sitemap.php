<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'readConfig.php';

$e = new \Openhab\Request\Execute();
$climate = new \League\CLImate\CLImate();


$url = (new \Openhab\Request\UriBuilder())->getUriForRoute('sitemaps');
$response = $e->executeGet($url);

$factory = new \Openhab\Factories\SiteMapFactory($response);
$siteMap = $factory->getSiteMap();
$factory = new ItemFactory();
$items = array();
foreach ($siteMap->homepage->widget as $widget) {
	$object = $factory->createBySimpleXmlElement($widget);
	$items[] = $object;

}

$to = new \Openhab\Textoutput($items, $climate);
$to->echoSiteMap();


