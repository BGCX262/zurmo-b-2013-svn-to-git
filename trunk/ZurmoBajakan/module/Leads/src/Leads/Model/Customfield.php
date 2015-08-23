<?php 
class customfield
{
	public $valuetitle;
	public $valuesource;
	public $valueindustry;
	
	
	

	public function exchangeArray($data)
	{
		$this->valuetitle = (!empty($data['value'])) ? $data['value'] : null;
		$this->valuesource= (!empty($data['value'])) ? $data['value'] : null;
		$this->valueindustry= (!empty($data['value'])) ? $data['value'] : null;
		
	}
}

?>