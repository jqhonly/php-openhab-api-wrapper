<?php


namespace Openhab;


use League\CLImate\CLImate;

class Textoutput
{

	protected $cliMate;
	protected $items;

	public function __construct($items, CLImate $cLImate)
	{
		$this->items = $items;
		$this->cliMate = $cLImate;

	}

	public function echoSiteMap()
	{

		$data = array();
		foreach ($this->items as $item) {
			if ($item->getLabel() !== '') {
				$this->cliMate->out($item->getLabel());
			}
			foreach ($item->getChildren() as $child) {
				foreach ($child->getChildren() as $childChild) {

					$data[] = ['Type' => $childChild->getType(),
						'Name' => $childChild->getName(),
						'State' => $childChild->getState()
					];
				}
			}
		}
		$this->cliMate->table($data);
	}
}