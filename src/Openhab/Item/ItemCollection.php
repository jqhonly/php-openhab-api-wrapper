<?php


namespace Openhab\Item;


class ItemCollection
{
	protected $items = array();

	public function findByFilter(FilterItem $filter)
	{
		$resultSet = array();
		foreach ($this->getItems() as $item) {
			/**@var Item $item * */
			if ($filter->getName() !== null) {
				if ($item->getName() === $filter->getName()) {
					$resultSet[] = $item;
				}
			}
			if ($filter->getType() !== null) {
				if ($item->getType() === $filter->getType()) {
					$resultSet[] = $item;
				}
			}
			if ($filter->getState() !== null) {
				if ($item->getState() === $filter->getState()) {
					$resultSet[] = $item;
				}
			}
			if ($filter->getLink() !== null) {
				if ($item->getLink() === $filter->getLink()) {
					$resultSet[] = $item;
				}
			}
		}
		return $resultSet;
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
