<?php


namespace Openhab\SiteMap;


class SiteMap
{
	protected $name = null;
	protected $label = null;
	protected $link = null;

	/**
	 * @param \SimpleXMLElement $item
	 */
	public function populateBySimpleXmlElement(\SimpleXMLElement $item) {

		$this->setName((string)$item->sitemap->name);
		$this->setLabel((string)$item->sitemap->label);
		$this->setLink((string)$item->sitemap->link);
		return $this;
	}



	/**
	 * @return null|string
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
	 * @return null|string
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * @param string $label
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * @return null|string
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