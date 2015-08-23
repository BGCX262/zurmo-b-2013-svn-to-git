<?php
class Account_Search
{
	public $db;

	function __construct() {

		$this->db = Zend_Registry::get('db');
	}

	public function getForm()
	{

		$db = $this->db;
		$form = new Zend_Form;
		$form->setAction('/Account');
		$form->setMethod('get');
		$form->setName('search');

		$accountName = $form->createElement('text', 'name');
		$accountName->setLabel('Name');

		$city = $form->createElement('text', 'city');
		$city->setLabel('City');

		$state = $form->createElement('text', 'state');
		$state->setLabel('State');

		$country = $form->createElement('text', 'country');
		$country->setLabel('Country');

		$assignedTo = new Zend_Dojo_Form_Element_FilteringSelect('assignedTo');
		$assignedTo->setLabel('Accounts assigned to')
		->setAutoComplete(true)
		->setStoreId('accountStore')
		->setStoreType('dojo.data.ItemFileReadStore')
		->setStoreParams(array('url'=>'/user/jsonstore'))
		->setAttrib("searchAttr", "email")
		->setRequired(false);

		$branchId = new Zend_Dojo_Form_Element_FilteringSelect('branchId');
		$branchId->setLabel('Accounts Of Branch')
		->setAutoComplete(true)
		->setStoreId('branchStore')
		->setStoreType('dojo.data.ItemFileReadStore')
		->setStoreParams(array('url'=>'/jsonstore/branch'))
		->setAttrib("searchAttr", "branch_name")
		->setRequired(false);

		$submit = $form->createElement('submit', 'submit')
		->setLabel('Search')
		->setAttrib("class", "submit_button");

		$form->addElements(array($name, $city, $assignedTo, $branchId, $submit));

		return $form;

	}

}
?>