<?php


namespace Openhab\Factories;

use Openhab\Collections\ItemCollection;
use Openhab\Item\Item;
use Openhab\Item\StringItem;
use Openhab\Item\SwitchItem;


class ItemFactory
{

	protected $items;

	function xml2array($xmlObject, $out = array())
	{
		foreach ((array)$xmlObject as $index => $node)
			$out[$index] = (is_object($node)) ? xml2array($node) : $node;

		return $out;
	}


	public function __construct($httpResponse)
	{
		$xml = simplexml_load_string($httpResponse)->children();


		$this->items = $this->xml2array($xml)['item'];
	}


	/**
	 * @return ItemCollection
	 * @throws \Exception
	 */
	public function getItemCollection()
	{
		$itemCollection = new ItemCollection();

		foreach ($this->items as $item) {
			switch ($item->type) {
				case 'StringItem':
					$itemCollection->add((new StringItem())->populateBySimpleXmlElement($item));
					break;
				case 'SwitchItem':
					$itemCollection->add((new SwitchItem())->populateBySimpleXmlElement($item));
					break;
				case 'GroupItem':
					$itemCollection->add((new Item())->populateBySimpleXmlElement($item));
					break;
				case 'NumberItem':
					$itemCollection->add((new Item())->populateBySimpleXmlElement($item));
					break;
				case 'DateTimeItem':
					$itemCollection->add((new Item())->populateBySimpleXmlElement($item));
					break;
				case 'DimmerItem':
					$itemCollection->add((new Item())->populateBySimpleXmlElement($item));
					break;

				default:
					throw new \Exception(sprintf('unknown itemtype %s', $item->type));
			}
		}
		return $itemCollection;
	}
}