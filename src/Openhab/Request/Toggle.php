<?php


namespace Openhab\Request;


class Toggle
{

	protected $executor;

	/**
	 * Toggle constructor.
	 * @param Execute $executor
	 */
	public function __construct(Execute $executor)
	{
		$this->executor = $executor;
	}

	/**
	 * @param $routeToItem
	 * @throws \Exception
	 */
	public function toggle($routeToItem)
	{
		$response = $this->executor->executeGet($routeToItem . '/state');

		$value = 'ON';
		if ($response === 'ON') {
			$value = 'OFF';
		}
		$this->executor->executePost($routeToItem, $value);
	}
}