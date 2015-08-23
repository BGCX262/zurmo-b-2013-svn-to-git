<?php

class Update extends CreateForm
{
	protected $id;

	public function __construct($id = null)
	{
		if (is_numeric($id)) {
			$this->id = $id;
		}
		parent::__construct();
	}

	public function init()
	{
		parent::init();

		$opportunity = new OpportunityModule($this->id);
		$opportunity = $account->fetchAsArray();
		$this->setAction("/opportunity/edit/opportunity_id/$this->id");
		$this->populate($opportunity);
	}

}
?>