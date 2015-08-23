<?php

class Account_Edit extends CreateAccount
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

		$account = new AccountsModule($this->id);
		$account = $account->fetchAsArray();
		$this->setAction("/account/edit/account_id/$this->id");
		$this->populate($account);
	}

}
?>