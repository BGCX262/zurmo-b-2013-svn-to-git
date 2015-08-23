<?php
namespace Leads\Model;
/*use Zend\Db\TableGateway\TableGateway,
Zend\Db\Adapter\Adapter,
Zend\Db\ResultSet\ResultSet;
*/
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;

class LeadsTable extends AbstractTableGateway {
protected $table = 'leads';

public function fetchAll()
{

$select = new Select();
$select->from('person')
->columns(array('f_name' => 'person.firstname', 'l_name' => 'person.lastname', 'comp_name' => 'contact.companyname', 'cont_name' => 'contactstate.name' ))
->join('contact', 'contactstate', 'person.id = contact.person_id', 'contact.state_contactstate_id = contactstate.id');

$statement = $dbAdapter->createStatement();
$select->prepareStatement($dbAdapter, $statement);
$driverResult = $statment->execute();

$resultset = new ResultSet();
$resultset->setDataSource($driverResult);

foreach ($resultset as $row) {
	// $row is an ArrayObject
}
}
}