<?php

namespace Openhab\SiteMap\Items;

use Openhab\Item\DateTimeItem;
use Openhab\Item\Item;
use Openhab\Item\NumberItem;
use Openhab\Item\StringItem;
use Openhab\Item\SwitchItem as OpenhabSwitchItem;
use Openhab\Item\DimmerItem as OpenhabDimmerItem;

class Factory
{

	public static function createBySimpleXmlElement(\SimpleXMLElement $element)
	{
		$object = null;

		if ((string)$element->type === 'Frame') {
			$object = new Widget();
		} elseif ((string)$element->type === 'Group') {
			$object = new Group();
		} elseif ((string)$element->type === 'Text') {
			$object = new TextItem();
		} elseif ((string)$element->type === 'Switch') {
			$object = new SwitchItem();
		} elseif ((string)$element->type === 'SwitchItem') {
			$object = new OpenhabSwitchItem();
		} elseif ((string)$element->type === 'DimmerItem') {
			$object = new OpenhabDimmerItem();
		} elseif ((string)$element->type === 'GroupItem') {
			$object = new Item();
		} elseif ((string)$element->type === 'DateTimeItem') {
			$object = new DateTimeItem();
		} elseif ((string)$element->type === 'NumberItem') {
			$object = new NumberItem();
		} elseif ((string)$element->type === 'StringItem') {
			$object = new StringItem();
		} else {
			throw new \Exception(sprintf('Unkown element %s', (string)$element->type));
		}

		$object->populateBySimpleXmlElement($element);
		if (true === property_exists($element, 'item')) {
			$object->addChildren(self::createBySimpleXmlElement($element->item));
		}
		if (true === property_exists($element, 'widget')) {
			$object->addChildren(self::createBySimpleXmlElement($element->widget));
		}

		if (is_object($element->linkedPage->widget)) {
			foreach ($element->linkedPage->widget as $widget) {
				$object->addChildren(self::createBySimpleXmlElement($widget));
			}
		}
		return $object;
	}
}