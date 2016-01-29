<?php


namespace Openhab;


class Execute
{

	protected $url;

	public function __construct($url)
	{
		$this->setUrl($url);

	}

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 */
	public function setUrl($url)
	{
		$this->url = $url;
	}


	public function executePost()
	{

	}

	public function executeGet($route)
	{
		return file_get_contents($this->getUrl() . $route);
	}

}