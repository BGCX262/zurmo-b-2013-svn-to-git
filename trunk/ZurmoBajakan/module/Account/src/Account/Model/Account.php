<?php 
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

	const STATUS_DELETE = 'DELETE';
	const STATUS_CREATE = 'CREATE';
	const STATUS_EDIT = 'EDIT';

	public $db;
	protected $_dbTableClass = 'Core_Model_DbTable_Account';
	protected $_account_id;
	protected $_defaultObservers = array(
			'Core_Model_Account_Notify_Email'
	);
	// <-- Add this variable

	public function __construct($id = null){
		$this->db = Zend_Registry::get('db');
		if (is_numeric($id)) {
			$this->id = $id;
		}
		parent::__construct($id);
	}

	public function setId($id = null)
	{
		if (is_numeric($id)) {
			$this->id = $id;
		}
		return $this;
	}

	/**
	 * @param int $accountId
	 * @return fluent interface
	 */
	public function setAccountId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getAccountId()
	{
		return $this->id;
	}

	public function create($data = array())
	{
		$data = $this->filterInput($data);
		$data['created'] =  time();
		$data['created_by'] = $this->getCurrentUser()->getUserId();
		if (!is_numeric($data['id'])) {
			$data['id'] = null;
		}
		$this->db->insert('account', $data);
		$this->id = $this->db->lastInsertId();
		$this->setStatus(self::STATUS_CREATE);


		return $this->id;
	}

	public function fetch()
	{
		$select = $this->db->select();
		$select->from(array('a'=>'account'), array('*'))
		->joinLeft(array('u'=>'user'),
				'u.user_id = a.assigned_to',
				array('u.email'=>'email as assignedToEmail'))
				->joinLeft(array('b'=>'branch'),
						'a.branch_id = b.branch_id',
						array('b.branch_name'=>'branch_name as branch_name'))
						->where('a.account_id = ?', $this->id);
				$result = $this->db->fetchRow($select);
				return $result;
	}

	/**
	 * Similar to above fetch() method
	 * @return array from the Zend_Db_Select object
	 */
	public function fetchAsArray()
	{
		$this->db->setFetchMode(Zend_Db::FETCH_ASSOC);
		$select = $this->db->select();
		$select->from(array('a'=>'account'), array('*'))
		->where('a.account_id = ?', $this->id);

		$result = $this->db->fetchRow($select);
		$this->db->setFetchMode(Zend_Db::FETCH_OBJ);
		return $result;
	}

	/**
	 * Generate the Zend_Db_Select object to use
	 */
	public function getfetchAllSelectObject()
	{
		$select = $this->db->select();
		$select->from(array('a'=>'account'), array('*'))
		->joinLeft(array('u'=>'user'),
				'a.assigned_to = u.user_id', array('u.email'=>'email as assignedToEmail'))
				->joinLeft(array('b'=>'branch'),
						'a.branch_id = b.branch_id', array('b.branch_name'))
						;

				return $select;
	}

	public function edit($data = array())
	{
		$data = $this->filterInput($data);
		if (!is_numeric($data['id'])) {
			$data['id'] = null;
		}

		$id = $this->id;
		/*
		 * Force the accountId to be integer
		*/
		$id = $this->db->quote($this->id, 'INTEGER');

		$this->prepareEphemeral();
		$data['updated'] = time();
		$result = $this->db->update('account', $data, "id = $id");
		$this->setStatus(self::STATUS_EDIT);

		$log = $this->getLoggerService();
		$info = 'Account edited with account id = '. $this->id;
		$log->info($info);

		return $result;
	}


	/**
	 * Deletes a row in the account table
	 */
	public function delete()
	{
		$this->prepareEphemeral();
		$where = $this->db->quote($this->id, 'INTEGER');
		$result = $this->db->delete('account', "id = $where");
		$this->setStatus(self::STATUS_DELETE);

		$log = $this->getLoggerService();
		$info = 'Account deleted with account id = '. $this->id;
		$log->info($info);

		return $result;
	}
}
?>
	/*
	 public function connectDB(){
	$conn = mysql_connect('localhost','root','') or die ('Error connection to mySql');
	mysql_select_db('zurmo');
	$viewsql=mysql_query("select * from account");
	$viewsql2=mysql_query("select * from address");
	while($row=mysql_fetch_array($viewsql));
	}

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

	// Add content to these methods:
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
	throw new \Exception("Not used");
	}

	public function getInputFilter()
	{
	if (!$this->inputFilter) {
	$inputFilter = new InputFilter();

	$inputFilter->add(array(
			'name'     => 'name',
			'required' => true,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim')
			),
			'validators'=>array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							))
			)
	));

	$inputFilter->add(array(
			'name'     => 'phone',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 24,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'industry',
			'required' => false,
			'filters'  => array(
					array('name' => 'Int'),
			),

	));
		
	$inputFilter->add(array(
			'name'     => 'fax',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 24,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'employees',
			'required' => false,
			'filters'  => array(
					array('name' => 'Int'),
						
			),
				
	));
		
	$inputFilter->add(array(
			'name'     => 'revenue',
			'required' => false,
			'filters'  => array(
					array('name' => 'Int'),
					array('name' => 'StringTrim'),
			),
				
	));
		
	$inputFilter->add(array(
			'name'     => 'type',
			'required' => false,
			'filters'  => array(
					array('name' => 'Int'),

			),

	));
		
	$inputFilter->add(array(
			'name'     => 'website',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'bst1',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'bst2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'city3',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'state',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'country',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'postal',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'st1',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'st2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'city2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'ss2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'country2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'postal2',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
	$inputFilter->add(array(
			'name'     => 'dsc',
			'required' => false,
			'filters'  => array(
					array('name' => 'StripTags'),
					array('name' => 'StringTrim'),
			),
			'validators' => array(
					array(
							'name'    => 'StringLength',
							'options' => array(
									'encoding' => 'UTF-8',
									'min'      => 1,
									'max'      => 100,
							),
					),
			),
	));
		
		

	$this->inputFilter = $inputFilter;
	}

	return $this->inputFilter;
	}
	*\
	}






