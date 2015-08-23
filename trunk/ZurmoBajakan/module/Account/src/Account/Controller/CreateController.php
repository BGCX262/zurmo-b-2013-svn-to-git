<?php
namespace Account\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;
use Account\Form\CreateAccount;

class AccountController extends AbstractActionController
{
	/* public function someAction() {
	 $dbAdapter = $this->serviceLocator->get('Zend\Db\Adapter\Adapter');

	// Do something with the database adapter, e.g.:
	$dbAdapter->query('SELECT username FROM user WHERE id = ?', array(37));
	} */
	
	
	
	public function indexAction()
	{
		$user_session = new \Zend\Session\Container('user');
		 
		if($user_session->username==null){
			return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
		}else{
			$form = new CreateAccount();
		$viewModel = new ViewModel(array('form' =>
				$form));
		return $viewModel;
		}
		
		
	}
	public function fooAction()
	{
		return array();
	}

	public function viewAction()
	{
		$dbAdapter = $this->serviceLocator->get('Zend\Db\Adapter\Adapter');
		$dbAdapter->query('SELECT name FROM account', array(37));
	}
	
	



}
?>