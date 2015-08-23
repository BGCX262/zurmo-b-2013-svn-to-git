<?php
namespace Account\Model;
class Account
{
	public $name;
	public $phone;
	public $industry;
	public $fax;
	public $employees;
	public $revenue;
	public $type;
	public $web;
	public $bst1;
	public $bst2;
	public $city3;
	public $state;
	public $country;
	public $postal;
	public $st1;
	public $st2;
	public $city2;
	public $ss2;
	public $country2;
	public $postal2;
	public $dsc;

	public function exchangeArray($data)
	{
		$this->name     = (isset($data['Account_name']))     ? $data['Account_name']     : null;
		$this->phone = (isset($data['Account_officePhone'])) ? $data['Account_officePhone'] : null;
		$this->industry  = (isset($data['Account_industry_value']))  ? $data['Account_industry_value']  : null;
		$this->fax  = (isset($data['Account_officeFax']))  ? $data['Account_officeFax']  : null;
		$this->employees  = (isset($data['employees']))  ? $data['Account_employees']  : null;
		$this->revenue  = (isset($data['Account_annualRevenue']))  ? $data['Account_annualRevenue']  : null;
		$this->type  = (isset($data['Account_type_value']))  ? $data['Account_type_value']  : null;
		$this->web  = (isset($data['Account_website']))  ? $data['Account_website']  : null;
		$this->bst1  = (isset($data['Account_billingAddress_street1']))  ? $data['Account_billingAddress_street1']  : null;
		$this->bst2  = (isset($data['Account_billingAddress_street2']))  ? $data['Account_billingAddress_street2']  : null;
		$this->city3  = (isset($data['Account_billingAddress_city']))  ? $data['Account_billingAddress_city']  : null;
		$this->state  = (isset($data['Account_billingAddress_state']))  ? $data['Account_billingAddress_state']  : null;
		$this->country  = (isset($data['Account_billingAddress_country']))  ? $data['Account_billingAddress_country']  : null;
		$this->postal  = (isset($data['Account_billingAddress_postalCode']))  ? $data['Account_billingAddress_postalCode']  : null;
		$this->st1  = (isset($data['Account_shippingAddress_street1']))  ? $data['Account_shippingAddress_street1']  : null;
		$this->st2  = (isset($data['Account_shippingAddress_street2']))  ? $data['Account_shippingAddress_street2']  : null;
		$this->city2  = (isset($data['Account_shippingAddress_city']))  ? $data['Account_shippingAddress_city']  : null;
		$this->ss2  = (isset($data['Account_shippingAddress_state']))  ? $data['Account_shippingAddress_state']  : null;
		$this->country2  = (isset($data['Account_shippingAddress_country']))  ? $data['Account_shippingAddress_country']  : null;
		$this->postal2  = (isset($data['Account_shippingAddress_postalCode']))  ? $data['Account_shippingAddress_postalCode']  : null;
		$this->dsc  = (isset($data['Account_description']))  ? $data['Account_description']  : null;
	
	}
	
	
	
	



}

?>
