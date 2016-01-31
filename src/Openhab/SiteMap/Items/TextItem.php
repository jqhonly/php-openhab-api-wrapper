<?php


namespace Openhab\SiteMap\Items;


class TextItem extends Widget
{

	protected $widgetId;
	protected $type;
	protected $label;
	protected $icon;
	protected $valueColor;

	/**
	 * @param \SimpleXMLElement $item
	 * @return $this
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