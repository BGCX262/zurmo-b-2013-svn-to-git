<?php
namespace Leads\Form;

use Zend\Form\Form;

class CreateForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Create Lead');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        
        $this->add(array(
        		'name' => 'valuetitle',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Name',
        		),
        ));
        
        $this->add(array(
            'name' => 'firstname',
            'attributes' => array(
                'type'  => 'text',                                 
            ),
            'options' => array(
                
            ),
        ));

        $this->add(array(
        		'name' => 'lastname',
        		'attributes' => array(
        				'type'  => 'text',
        				'required' => 'required'
        		),
        		'options' => array(
        				
        		
        		),
        ));
        
        $this->add(array(
        		'name' => 'contactstate_id',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Status ID',
        		),
        ));
        
        $this->add(array(
        		'name' => 'jobtitle',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Job Title',
        		),
        ));
        $this->add(array(
        		'name' => 'companyname',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Company Name',
        		),
        ));
        $this->add(array(
        		'name' => 'department',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Department',
        		),
        ));
        $this->add(array(
        		'name' => 'officephone',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Office Phone',
        		),
        		
        ));
        
        $this->add(array(
        		'name' => 'valuesource',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Source',
        		),
        ));
        
        $this->add(array(
        		'name' => 'mobilephone',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Mobile Phone',
        		),
        ));
        $this->add(array(
        		'name' => 'officefax',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Office Fax',
        		),
        ));
        $this->add(array(
        		'name' => 'emailaddress1',
        		'attributes' => array(
        				'type'  => 'email',
        		),
        		'options' => array(
        				'label' => 'Primary Email',
        		),
        ));
        $this->add(array(
        		'name' => 'emailaddress2',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Secondary Email',
        		),
        ));
        $this->add(array(
        		'name' => 'street11',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'PrimaryAddress',
        		),
        ));
        $this->add(array(
        		'name' => 'street21',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				
        		),
        ));
        $this->add(array(
        		'name' => 'city1',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				
        		),
        ));
        $this->add(array(
        		'name' => 'state1',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				
        		),
        ));
        $this->add(array(
        		'name' => 'postalcode1',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				
        		),
        ));
        $this->add(array(
        		'name' => 'country1',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				
        		),
        ));
        $this->add(array(
        		'name' => 'street12',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'PrimaryAddress',
        		),
        ));
        $this->add(array(
        		'name' => 'street22',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        
        		),
        ));
        $this->add(array(
        		'name' => 'city2',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        
        		),
        ));
        $this->add(array(
        		'name' => 'state2',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        
        		),
        ));
        $this->add(array(
        		'name' => 'postalcode2',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        
        		),
        ));
        $this->add(array(
        		'name' => 'country2',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        
        		),
        ));
        
        $this->add(array(
        		'name' => 'valueindustry',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Industry',
        		),
        ));
        
        $this->add(array(
        		'name' => 'website',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Webiste',
        		),
        ));
        $this->add(array(
        		'name' => 'description',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Description',
        		),
        ));
        $this->add(array(
        		'name' => 'save',
        		'attributes' => array(
        				'type'  => 'submit',
        				'value' => 'Save'
        		),
        ));
        
    }}