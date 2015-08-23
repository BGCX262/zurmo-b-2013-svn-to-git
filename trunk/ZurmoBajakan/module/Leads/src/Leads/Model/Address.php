<?php 
class address
{
	public $street11;
	public $street21;
	public $city1;
	public $state1;
	public $postalcode1;
	public $country1;
	public $street12;
	public $street22;
	public $city2;
	public $state2;
	public $postalcode2;
	public $country2;

	public function exchangeArray($data)
	{
		$this->street11 = (!empty($data['street1'])) ? $data['street1'] : null;
		$this->street21 = (!empty($data['street2'])) ? $data['street2'] : null;
		$this->city1 = (!empty($data['city'])) ? $data['city'] : null;
		$this->state1 = (!empty($data['state'])) ? $data['state'] : null;
		$this->postalcode1 = (!empty($data['postalcode'])) ? $data['postalcode'] : null;
		$this->country1 = (!empty($data['country'])) ? $data['country'] : null;
		$this->street12 = (!empty($data['street1'])) ? $data['street1'] : null;
		$this->street22 = (!empty($data['street2'])) ? $data['street2'] : null;
		$this->city2 = (!empty($data['city'])) ? $data['city'] : null;
		$this->state2 = (!empty($data['state'])) ? $data['state'] : null;
		$this->postalcode2 = (!empty($data['postalcode'])) ? $data['postalcode'] : null;
		$this->country2 = (!empty($data['country'])) ? $data['country'] : null;
	}
}

?>