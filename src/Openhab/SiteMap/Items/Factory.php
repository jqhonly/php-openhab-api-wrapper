<?php


namespace Openhab\SiteMap\Items;


use Openhab\Item\SwitchItem as OpenhabSwitchItem;
use Openhab\Item\DimmerItem as OpenhabDimmerItem;

class Factory
{

	public static function createBySimpleXmlElement(\SimpleXMLElement $element)
	{

		if ((string)$element->type === 'Frame') {

			$object = new Widget();
			$object->setLabel((string)$element->label);
			$object->setType((string)$element->type);
			$object->setIcon((string)$element->icon);
			$object->setWidgetId((string)$element->widgetId);
			if (is_object($element->item)) {
				$object->addChildren(self::createBySimpleXmlElement($element->widget));
			} else {
				throw new \Exception('Element item is not an object');
			}
			return $object;
		} elseif ((string)$element->type === 'Group') {
			$object = new Group();
			$object->populateBySimpleXmlElement($element);
			//@todo implement children stuff!
			return $object;
		} elseif ((string)$element->type === 'Text') {
			$object = new TextItem();
			$object->populateBySimpleXmlElement($element);
			//@todo implement children stuff!
			return $object;
		} elseif ((string)$element->type === 'Switch') {
			$object = new SwitchItem();
			$object->populateBySimpleXmlElement($element);
			if (is_object($element->item)) {

				$object->addChildren(self::createBySimpleXmlElement($element->item));
				return $object;
			}
			$break = true;
		} elseif ((string)$element->type === 'SwitchItem') {
			$object = new OpenhabSwitchItem();
			$object->populateBySimpleXmlElement($element);
			return $object;

		} elseif ((string)$element->type === 'DimmerItem') {
			$object = new OpenhabDimmerItem();
			$object->populateBySimpleXmlElement($element);
			return $object;
		}


		throw new \Exception(sprintf('Unkown element %s', (string)$element->type));
	}


}