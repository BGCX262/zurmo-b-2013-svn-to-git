<?php
namespace Leads\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
class personTable
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function saveUser(Leads $leads)
	{
		$data = array(
				'firstname' => $person->firstname,
				'lastname' => $person->lastname,
				'department' => $person->department,
				'jobtitle' => $person->jobtitle,
				'mobilephone' => $person->mobilephone,
				'officephone' => $person->officephone,
				'officefax' => $person->officefax,
				'state_contactstate_id' => $contact->contactstate_id,
				'companyname' => $contact->companyname,
				'website' => $contact->website,
				'description'=>$contact->description,
				'street1'=>$address->street11,
				'street2'=>$address->street21,
				'city'=>$address->city1,
				'state'=>$address->state1,
				'postalcode'=>$address->postalcode1,
				'country'=>$address->country1,
				'street1'=>$address->street12,
				'street2'=>$address->street22,
				'city'=>$address->city2,
				'state'=>$address->state2,
				'postalcode'=>$address->postalcode2,
				'country'=>$address->country2,
				'emailaddress'=>$email->emailaddress1,
				'emailaddress'=>$email->emailaddress2,
				'value'=>$customfield->valuetitle,
				'value'=>$customfield->valuesource,
				'value'=>$customfield->valueindustry,
		);
		$id = (int)$person->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getUser($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('User ID does not exist');
			}
		}
	}
	public function getUser($id)
	{
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
}