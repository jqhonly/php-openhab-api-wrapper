<?php


namespace Openhab\Factories;


use Openhab\SiteMap\SiteMap;

class SiteMapFactory
{
	/**
	 * @var SiteMap
	 */
	protected $siteMap;

	protected function xml2array($xmlObject, $out = array())
	{
		foreach ((array)$xmlObject as $index => $node)
			$out[$index] = (is_object($node)) ? $this->xml2array($node) : $node;

		return $out;
	}


	public function __construct($httpResponse)
	{
		$xml = simplexml_load_string($httpResponse)->children();

		$this->siteMap = new SiteMap();
		$this->siteMap->populateBySimpleXmlElement($xml);
	}

	public function getSiteMap()
	{
		return $this->siteMap;

	}


}