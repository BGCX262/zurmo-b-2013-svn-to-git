<?php
namespace Marketing\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
class marketinglistTable

{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function saveList(marketinglist $marketinglist)
	{
		$data = array(
				'name' => $marketinglist->name,
				'description' => $marketinglist->description,
				'fromname' => $marketinglist->fromname,
				'fromaddress' => $marketinglist->fromaddress,
				'anyonecansubscribe' => $marketinglist->anyonecansubscribe,
		);
		$id = (int)$marketinglist->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getMarketing($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('User ID does not exist');
			}
		}
	}
	public function getMarketing($id)
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