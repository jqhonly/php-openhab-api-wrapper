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


	public function executePost($route, $value)
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,            $route );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($ch, CURLOPT_POST,           1 );
		curl_setopt($ch, CURLOPT_POSTFIELDS,     $value );
		curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain'));
		return curl_exec ($ch);
	}

	public function executeGet($route)
	{
		return file_get_contents($this->getUrl() . $route);
	}

}