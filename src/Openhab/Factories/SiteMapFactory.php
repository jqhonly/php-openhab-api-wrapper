<?php


namespace Openhab\Factories;


use Openhab\Execute;
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
		$e = (new Execute(''))->executeGet($this->siteMap->getLink());

		//@todo continue here
		$xml = simplexml_load_string($e);


		$this->siteMap = $xml;
/*
		foreach($xml->homepage->widget as $widget) {
			$breaKL = true;
		}
		$brea= true;
*/
	}

	public function getSiteMap()
	{
		return $this->siteMap;

	}


}