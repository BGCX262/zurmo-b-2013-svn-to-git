<?php
// filename : module/Users/src/Users/Form/RegisterForm.php
namespace Login\Form;
use Zend\Form\Form;
class LoginForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('Login');
		$this->setAttribute('method', 'post');
		$this->setAttribute('enctype','multipart/form-data');
		$this->add(array(
				'name' => 'username',
				'attributes' => array(
					'type' => 'text',
				),
				'options' => array(
					'label' => 'Username',
				),
		));

		$this->add(array(
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
        ));
}}