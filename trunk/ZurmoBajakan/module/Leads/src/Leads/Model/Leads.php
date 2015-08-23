<?php
namespace Leads\Model;

class person
{
	public $id;
	public $firstname;
	public $lastname;
	public $department;
	public $jobtitle;
	public $mobilephone;
	public $officephone;
	public $officefax;
	
	

	public function exchangeArray($data)
	{
		$this->firstname = (!empty($data['firstname'])) ? $data['firstname'] : null;
		$this->lastname= (!empty($data['lastname'])) ? $data['lastname'] : null;
		$this->department= (!empty($data['department'])) ? $data['department'] : null;
		$this->jobtitle= (!empty($data['jobtitle'])) ? $data['jobtitle'] : null;	
		$this->mobilephone= (!empty($data['mobilephone'])) ? $data['mobilephone'] : null;
		$this->officephone= (!empty($data['officephone'])) ? $data['officephone'] : null;
		$this->officefax= (!empty($data['officefax'])) ? $data['officefax'] : null;
	}
}