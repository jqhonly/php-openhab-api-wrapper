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
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed string
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getState()
	{
		return $this->state;
	}

	/**
	 * @param string $state
	 */
	public function setState($state)
	{
		$this->state = $state;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getLink()
	{
		return $this->link;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link)
	{
		$this->link = $link;
	}
}