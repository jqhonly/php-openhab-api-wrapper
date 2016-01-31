<?php


namespace Openhab;


use Zend\Http\Client;

use Zend\Http\Request;
/**
 * Class Execute
 * @package Openhab
 *
 */
class Execute
{
	public static function executePost($uri, $value)
	{

		$client = new Client();
		$client->setUri($uri);
		$client->setMethod(Request::METHOD_POST);
		$client->setRawBody($value);
		$client->setHeaders(array('Content-Type: text/plain'));
		$response = $client->send();
		if ($response->getStatusCode() !== 200) {
			throw new \Exception(sprintf('Request Response: Status Code %d, Url: %s', $response->getStatusCode(), $uri));
		}
		return $response->getBody();
	}

	public static function executeGet($uri)
	{

		$client = new Client();
		$client->setUri($uri);
		$client->setMethod(Request::METHOD_GET);
		$response = $client->send();
		if ($response->getStatusCode() !== 200) {
			throw new \Exception(sprintf('Request Response: Status Code %d, Url: %s', $response->getStatusCode(), $uri));
		}
		return $response->getBody();
	}

}