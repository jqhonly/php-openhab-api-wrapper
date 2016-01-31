<?php


namespace Openhab\SiteMap\Items;


use Openhab\Item\Item;

class TextItem extends Widget
{

	protected $widgetId;
	protected $type;
	protected $label;
	protected $icon;
	protected $valueColor;
	/**
	 * @param \SimpleXMLElement $item
	 */
	public function populateBySimpleXmlElement(\SimpleXMLElement $item) {
		$this->setWidgetId((string)$item->widgetId);
		$this->setType((string)$item->type);
		$this->setLabel((string)$item->label);
		$this->setIcon((string)$item->icon);
		$this->setValueColor((string)$item->valuecolor);
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
	 * @return mixed
	 */
	public function getValueColor()
	{
		return $this->valueColor;
	}

	/**
	 * @param mixed $valueColor
	 */
	public function setValueColor($valueColor)
	{
		$this->valueColor = $valueColor;
	}

	public function getName(){
		return $this->label;
	}

	public function getState(){
		return 'not implemented';
	}





}