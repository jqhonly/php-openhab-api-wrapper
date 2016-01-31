<?php


namespace Openhab\Request;


class UriBuilder
{

	public function __construct()
	{
		if (false === defined('BASE_URL')) {
			throw new \Exception(
				'BASE URL is not defined - copy config.php.dist to config.php and modify'
			);
		}
	}

	public function getUriForRoute($route)
	{

		return BASE_URL . $route;
	}

}