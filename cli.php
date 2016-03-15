<?php
/**
 * http://demo.openhab.org:9080/doc/index.html
 *
 */

use Openhab\SiteMap\Items\Factory as ItemFactory;

define('BASE_PATH', 'http://192.168.0.166:8080/rest/items/BueroAlle');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';
$e = new \Openhab\Request\Execute();
$climate = new \League\CLImate\CLImate();


//Get All Items...
$url = (new \Openhab\Request\UriBuilder())->getUriForRoute('items');
$response = $e->executeGet($url);
$factory = new \Openhab\Factories\ItemFactory($response);
$itemCollection = $factory->getItemCollection();

$filter = new \Openhab\Item\FilterItem();
$filter->setType('SwitchItem');
$result = $itemCollection->findByFilter($filter);

foreach ($itemCollection->getItems()
		 as $item) {
	echo $item->getType() . "\t" . $item->getName() . "\n";
}


