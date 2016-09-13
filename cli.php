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


//Get All Items...
$url = (new \Openhab\Request\UriBuilder())->getUriForRoute('items');
try {
$response = $e->executeGet($url);
} catch (\Zend\Http\Client\Adapter\Exception\RuntimeException $e) {

	echo 'There seems to be something wrong with your configuration in ' . PATH_TO_CONFIG_FILE;
	echo PHP_EOL;
	echo 'Current configuration:' .PHP_EOL;
	echo file_get_contents(PATH_TO_CONFIG_FILE);
	echo PHP_EOL;
	die();
}

$factory = new \Openhab\Factories\ItemFactory($response);

	$itemCollection = $factory->getItemCollection();

$filter = new \Openhab\Item\FilterItem();
$filter->setType('SwitchItem');
$result = $itemCollection->findByFilter($filter);

foreach ($itemCollection->getItems()
		 as $item) {
	echo $item->getType() . "\t" . $item->getName() . "\n";
}


