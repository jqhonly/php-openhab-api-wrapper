<?php


namespace Openhab\Items;


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

	public function getItems()
	{

		$return = array();
		foreach ($this->items as $item) {
			switch ($item->type) {
				case 'StringItem':
					$return [] = new StringItem($item);
					break;
				case 'SwitchItem':
					$return[] = new SwitchItem($item);
					break;
				case 'GroupItem':
					$return [] = new Item($item);
					break;
				case 'NumberItem':
					$return [] = new Item($item);
					break;
				case 'DateTimeItem':
					$return [] = new Item($item);
					break;
				case 'DimmerItem':
					$return [] = new Item($item);
					break;

				default:
					throw new \Exception(sprintf('unknown itemtype %s', $item->type));
			}
		}
		return $return;
	}
}