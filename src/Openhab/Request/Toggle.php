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
	 * @param $value Response Value
	 * @return bool
	 */
	public static function isResponseIntegerValue($value)
	{
		if ($value == 'ON') {
			return false;
		}
		if ($value == 'OFF') {
			return false;
		}

		return true;
	}

	/**
	 * @param $routeToItem
	 * @throws \Exception
	 */
	public function toggle($routeToItem)
	{
		$response = $this->executor->executeGet($routeToItem . '/state');

		if (true === self::isResponseIntegerValue($response)) {
			$value = intval($response);
			if ($value > 0) {
				$executeResponse = $this->executor->executePost($routeToItem, 'OFF');

			} else {
				$executeResponse = $this->executor->executePost($routeToItem, '90');
			}
		} else {
			$value = 'ON';
			if ($response === 'ON') {
				$value = 'OFF';
			}
			$executeResponse = $this->executor->executePost($routeToItem, $value);

		}
	}
}