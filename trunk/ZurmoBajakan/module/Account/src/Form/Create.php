<?php
namespace Account\Form;
use Zend\Form\Form;
class CreateAccount extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('Create');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/form-data');
		/* $this->add(array(
				'name' => 'name',
				'required' => true,
				'attributes' => array(
						'type' => 'text',
				),
				'options' => array(
						'label' => 'Name',
				),
		)); */
		
		$this->add(array(
				'name'     => 'name',
				'required' => true,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim')
				),
				'options' => array(
						'label' => 'Name',
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
		
		$this->add(array(
				'name'     => 'phone',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Phone',
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
			
		$this->add(array(
				'name'     => 'industry',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
				),
				'options' => array(
						'label' => 'Industry',
				),
		
		));
			
		$this->add(array(
				'name'     => 'fax',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Fax',
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
			
		$this->add(array(
				'name'     => 'employees',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
							
				),
				'options' => array(
						'label' => 'Employees',
				),
					
		));
			
		$this->add(array(
				'name'     => 'revenue',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Revenue',
				),
					
		));
			
		$this->add(array(
				'name'     => 'type',
				'required' => false,
				'filters'  => array(
						array('name' => 'Int'),
		
				),
				'options' => array(
						'label' => 'Type',
				),
		
		));
			
		$this->add(array(
				'name'     => 'website',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Website',
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
			
		$this->add(array(
				'name'     => 'bst1',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Billing Address Street 1',
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
			
		$this->add(array(
				'name'     => 'bst2',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Billing Address Street 2',
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
			
		$this->add(array(
				'name'     => 'city3',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Billing Address City',
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
			
		$this->add(array(
				'name'     => 'state',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'State',
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
			
		$this->add(array(
				'name'     => 'country',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Country',
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
			
		$this->add(array(
				'name'     => 'postal',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Postal Code',
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
			
		$this->add(array(
				'name'     => 'st1',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Shipping Address Street 1',
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
			
		$this->add(array(
				'name'     => 'st2',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Shipping Address Street 1',
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
			
		$this->add(array(
				'name'     => 'city2',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Shipping Address City',
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
			
		$this->add(array(
				'name'     => 'ss2',
				'required' => false,
				'filters'  => array(
						array('name' => 'StripTags'),
						array('name' => 'StringTrim'),
				),
				'options' => array(
						'label' => 'Shipping Address S',
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
			
		$this->add(array(
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
			
		$this->add(array(
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
			
		$this->add(array(
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

		/* $this->add(array(
				'name' => 'password',
				'required' => true,
				'attributes' => array(
						'type' => 'password',
				),
				'options' => array(
						'label' => 'Password',
				),
		));

		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type' => 'submit',
						'value' => 'Sign In'
				)
		)); */
	}}