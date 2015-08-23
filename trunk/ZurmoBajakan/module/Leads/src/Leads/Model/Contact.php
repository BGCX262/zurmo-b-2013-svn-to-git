<?php 
class contact
{
	public $contactstate_id;
	public $companyname;
	public $website;
	public $description;
	
	
	

	public function exchangeArray($data)
	{
		$this->contactstate_id = (!empty($data['state_contactstate_id'])) ? $data['state_contactstate_id'] : null;
		$this->companyname= (!empty($data['companyname'])) ? $data['companyname'] : null;
		$this->website= (!empty($data['website'])) ? $data['website'] : null;
		$this->description= (!empty($data['description'])) ? $data['description'] : null;	
		
	}
}

?>