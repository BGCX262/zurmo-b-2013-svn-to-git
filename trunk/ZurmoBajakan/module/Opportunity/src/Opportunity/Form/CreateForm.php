<?php
namespace Opportunity\Form;
use Zend\Form\Form;
class CreateForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('Create');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/form-data');
		$this->add(array(
            'name' => 'name',
            'attributes' => array(
            		'type'  => 'text',
            		'required' => 'required'
            ),
            'options' => array(
                'label' => 'Name',
            ),
        ));

        $this->add(array(
        		'name' => 'amount',
        		'attributes' => array(
        				'type'  => 'text',
        				'required' => 'required'
        		),
        		'options' => array(
        				'label' => 'Amount',     		
        		),
        ));
        $this->add(array(
        		'name' => 'account',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Account',
        		),
        ));
        $this->add(array(
        		'name' => 'closedate',
        		'attributes' => array(
        				'type'  => 'text',
        				'required' => 'required'
        		),
        		'options' => array(
        				'label' => 'Close Date',
        		),
        ));
        $this->add(array(
        		'name' => 'stage',
        		'attributes' => array(
        				'type'  => 'text',
        				'required' => 'required'
        		),
        		'options' => array(
        				'label' => 'Stage',
        		),
        ));
        $this->add(array(
        		'name' => 'probability',
        		'attributes' => array(
        				'type'  => 'text',
        				'required' => 'required'
        		),
        		'options' => array(
        				'label' => 'Probability',
        		),
        		
        ));
        $this->add(array(
        		'name' => 'source',
        		'attributes' => array(
        				'type'  => 'text',
        		),
        		'options' => array(
        				'label' => 'Source',
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