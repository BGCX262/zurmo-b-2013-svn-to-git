<?php 
namespace Marketing\Model; 

class marketinglist
{
	public $id;
	public $name;
	public $description;
	public $fromname;
	public $fromaddress;
	public $anyonecansubscribe;
	
	function exchangeArray($data)
	{	
		$this->name = (isset($data['name'])) ?
		$data['name'] : null;
		$this->description = (isset($data['description'])) ?
		$data['description'] : null;
		$this->fromname = (isset($data['fromname'])) ?
		$data['fromname'] : null;
		$this->fromaddress = (isset($data['fromaddress'])) ?
		$data['fromaddress'] : null;
		$this->anyonecansubscribe = (isset($data['anyonecansubscribe'])) ?
		$data['anyonecansubscribe'] : null;

	}
	
	
	
}