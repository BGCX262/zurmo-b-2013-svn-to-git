<?php
namespace Inbox\Model;

use Zend\Db\TableGateway\TableGateway;

class InboxTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getProduct($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveInbox(Inbox $inbox)
    {
        $data = array(
            'artist' => $inbox->artist,
            'title'  => $inbox->title,
        );

        $id = (int)$inbox->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getInbox($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteInbox($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}
?>