<?php


namespace Openhab\Items;


class ItemCollection
{
	protected $items = array();

	public function findByFilter(FilterItem $filter)
	{

	}

	public function add(Item $item)
	{

		$this->items[] = $item;
	}

	/**
	 * @return array
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param array $items
	 */
	public function setItems($items)
	{
		$this->items = $items;
	}


}
