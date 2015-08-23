<?php 
class email
{
	public $emailaddress1;
	public $emailaddress2;
	

	public function exchangeArray($data)
	{
		$this->emailaddress1 = (!empty($data['emailaddress'])) ? $data['emailaddress'] : null;
		$this->emailaddress2 = (!empty($data['emailaddress'])) ? $data['emailaddress'] : null;
		
	}
}

?>