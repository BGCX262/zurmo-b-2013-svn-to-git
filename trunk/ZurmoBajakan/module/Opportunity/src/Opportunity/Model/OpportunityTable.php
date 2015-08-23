<?php
namespace Opportunity\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Opportunity;
class OpportunityTable
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll()
	{
		$statement = $dbAdapter->createStatement();
		$select->prepareStatement($dbAdapter, $statement);
		$driverResult = $statment->execute();

		$resultset = new ResultSet();
		$resultset->setDataSource($driverResult);

		foreach ($resultset as $row) {
		// $row is an ArrayObject
}
	}
	public function saveOpportunity(Opportunity $opportunity)
	{
		$data = array(
				'closedate' => $opportunity->closedate,
				'description' => $opportunity->description,
				'name' => $opportunity->name,
				'description' => $opportunity->description,
				'probability' => $opportunity->probability,
				'ownedsecurableitem_id' => $opportunity->ownedsecurableitem_id,
				'account_id' => $opportunity->account_id,
				'amount_currencyvalue_id' => $opportunity->amount_currencyvalue_id,
				'stage_customfield_id' => $opportunity->stage_customfield_id,
		);
		$id = (int)$opportunity->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getOpportunity($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('Opportunity ID does not exist');
			}
		}
	}
	public function getOpportunity($id)
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