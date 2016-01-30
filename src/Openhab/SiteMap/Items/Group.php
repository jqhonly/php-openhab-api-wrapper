<?php


namespace Openhab\SiteMap\Items;


class Group extends Widget
{
	protected $linkedPage;



	/**
	 * @return mixed
	 */
	public function getLinkedPage()
	{
		return $this->linkedPage;
	}

	/**
	 * @param mixed $linkedPage
	 */
	public function setLinkedPage($linkedPage)
	{
		$this->linkedPage = $linkedPage;
	}



}