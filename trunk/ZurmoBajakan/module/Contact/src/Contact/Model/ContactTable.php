<?php
namespace Contact\Model;

use Zend\Db\TableGateway\TableGateway;

class ContacttTable
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

    public function getContact($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveContact(Contact $contact)
    {
        $data = array(
            'artist' => $contact->artist,
            'title'  => $contact->title,
        );

        $id = (int)$contact->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getContact($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteContact($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}
class Contact {
}
?>