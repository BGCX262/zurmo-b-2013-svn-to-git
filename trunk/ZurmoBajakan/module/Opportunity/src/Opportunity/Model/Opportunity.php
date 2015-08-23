<?php
namespace Opportunity\Model;
class Opportunity
{
	public $id;
	public $closedate;
	public $description;
	public $name;
	public $probability;
	public $ownedsecurableitem_id;
	public $account_id;
	public $amount_currencyvalue_id;
	public $stage_customfield_id;
	public $source_customfield_id;
	
	public function exchangeArray($data)
	{
		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
		$this->closedate = (!empty($data['closedate'])) ? $data['closedate'] : null;
		$this->description  = (!empty($data['description'])) ? $data['description'] : null;
		$this->name  = (!empty($data['name'])) ? $data['name'] : null;
		$this->description  = (!empty($data['description'])) ? $data['description'] : null;
		$this->probability  = (!empty($data['probability'])) ? $data['probability'] : null;
		$this->ownedsecurableitem_id  = (!empty($data['ownedsecurableitem_id'])) ? $data['ownedsecurableitem_id'] : null;
		$this->account_id  = (!empty($data['account_id'])) ? $data['account_id'] : null;
		$this->amount_currencyvalue_id  = (!empty($data['amount_currencyvalue_id'])) ? $data['amount_currencyvalue_id'] : null;
		$this->stage_customfield_id  = (!empty($data['stage_customfield_id'])) ? $data['stage_customfield_id'] : null;
	}
}