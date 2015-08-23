<?php
namespace project\Model;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
class projectTable
{
	protected $tableGateway;
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function saveproject(project $project)
	{
		$data = array(
				'name' => $project->name,
				'description'  => $project->description,
				'status'  => $project->status,
				'ownedsecurableitem_id'  => $project->ownedsecurableitem_id,
		);
		$id = (int)$project->id;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getproject($id)) {
				$this->tableGateway->update($data, array('id' => $id));
			} else {
				throw new \Exception('project ID does not exist');
			}
		}
	}
	public function getproject($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
}