<?php


namespace Openhab\Items;


class Item
{


	protected $type;
	protected $state;
	protected $name;
	protected $link;


	public function __construct(\SimpleXMLElement $item ){

		$this->setLink((string)$item->link);
		$this->setType((string)$item->type);
		$this->setName((string)$item->name);
		$this->setState((string)$item->state);

	}
	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @param mixed $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * @param mixed $link
	 */
	public function setLink($link)
	{
		$this->link = $link;
	}
}