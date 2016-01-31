<?php


namespace Openhab\SiteMap\Items;


class Widget
{

	protected $widgetId;
	protected $type;
	protected $label;
	protected $icon;

	protected $children = array();


	/**
	 * @param \SimpleXMLElement $item
	 * @return $this
	 */
	public function populateBySimpleXmlElement(\SimpleXMLElement $item)
	{
		$this->setWidgetId((string)$item->widgetId);
		$this->setType((string)$item->type);
		$this->setLabel((string)$item->label);
		$this->setIcon((string)$item->icon);
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getWidgetId()
	{
		return $this->widgetId;
	}

	/**
	 * @param mixed $widgetId
	 */
	public function setWidgetId($widgetId)
	{
		$this->widgetId = $widgetId;
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
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * @param mixed $label
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * @return mixed
	 */
	public function getIcon()
	{
		return $this->icon;
	}

	/**
	 * @param mixed $icon
	 */
	public function setIcon($icon)
	{
		$this->icon = $icon;
	}

	/**
	 * @return array
	 */
	public function getChildren()
	{
		return $this->children;
	}

	/**
	 * @param array $children
	 */
	public function setChildren($children)
	{
		$this->children = $children;
	}

	/**
	 * @param $object
	 */
	public function addChildren($object)
	{
		$this->children[] = $object;
	}

}