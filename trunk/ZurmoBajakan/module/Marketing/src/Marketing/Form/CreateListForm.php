<?php
namespace Marketing\Form;
use Zend\Form\Form;
class CreateListForm extends Form
{
public function __construct($name = null)
{
parent::__construct('CreateList');
$this->setAttribute('method', 'post');
$this->setAttribute('enctype','multipart/formdata');

$this->add(array(
		'name' => 'name',
		'required' => true,
		'attributes' => array(
				'type' => 'text',
		),
		'options' => array(
				'label' => 'Name',
		),
));

$this->add(array(
		'name' => 'description',
		'attributes' => array(
				'type' => 'textarea',
		),
		'options' => array(
				'label' => 'Description',
		),
));
		
$this->add(array(
		'name' => 'fromname',
		'attributes' => array(
				'type' => 'text',
		),
		'options' => array(
				'label' => 'From Name',
		),
));

$this->add(array(
		'name' => 'fromaddress',
		'attributes' => array(
				'type' => 'text',
		),
		'options' => array(
				'label' => 'From Address',
		),
));

$this->add(array(	
		'name' => 'anyonecansubscribe',
		'attributes' => array(
				'type' => 'hidden',
		),
		'options' => array(
				'label' => 'Anyone Can Subscribe',
		),	
));

$this->add(array(
		'name' => 'submit',
		'attributes' => array(
				'type' => 'submit',
				'value' => 'Save'
		)
));

}}