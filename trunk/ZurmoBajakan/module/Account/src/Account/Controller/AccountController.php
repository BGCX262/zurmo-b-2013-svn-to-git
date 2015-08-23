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
	
	public function init()
	{
		$this->db = Zend_Registry::get('db');
		$this->_model = new AccountsModule;
		$ajaxContext = $this->_helper->getHelper('AjaxContext');
		$ajaxContext->addActionContext('viewdetails', 'json')
		->initContext();
	}
	
	public function indexAction()
	{
	$user_session = new \Zend\Session\Container('user');
    	
    	if($user_session->username==null){
    		return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
    	}else{
    		return new ViewModel();
    	}
	}
	public function fooAction()
	{
		return array();
	}
	
	function listAction()
	{
		$dbAdapter = $this->serviceLocator->get('Zend\Db\Adapter\Adapter');
		$dbAdapter->query('SELECT * FROM account', array(37));
		$this->view->title = "List Account";
		$account = new Account();
		$this->view->listAccount = $account->fetchAll();
		$this->render();
	}
	
		
	public function viewdetailsAction()
	{
		$id = $this->_request->getParam('id');
		$account = $this->_model->setId($id);
		$this->view->account = $account->fetch();
	
	}
	
	/**
	 * Create account
	 */
	public function createAction()
	{
		$db = $this->db;
		$account = new AccountsModule();
	
		$form = new CreateAccount();
		$form->setAction($this->_helper->url('create', 'account', 'default'));
	
		if ($this->_request->isPost()) {
	
			if ($form->isValid($_POST)) {
				$accountId = $account->create($form->getValues());
				$this->_helper->FlashMessenger('Account was created successfully');
				$url = $this->view->url(array(
						'module'        =>  'default',
						'controller'    =>  'account',
						'action'        =>  'viewdetails',
						'id'    =>  $id,
				), null, true);
				$this->_redirect($url);
				$this->view->message = "Account was created successfully";
			} else {
				$form->populate($_POST);
				$this->view->form = $form;
			}
	
		} else {
			$this->view->form = $form;
		}
	
	}
	
	
	/**
	 * Edit an account
	 */
	public function editAction()
	{
		$db = $this->db;
	
		$id = $this->_getParam('id');
		$account = new AccountsModule($id);
	
		$form = new Account_Edit($id);
	
		if ($this->_request->isPost()){
			if ($form->isValid($_POST)){
				$account->edit($form->getValues());
				$this->_helper->FlashMessenger('Account edited successfully');
				$this->_redirect($this->view->url(array(
						'module'        =>  'default',
						'controller'    =>  'account',
						'action'        =>  'viewdetails',
						'id'    =>  $id,
				)));
			} else {
				$form->populate($_POST);
	
				$this->view->form = $form;
			}
	
		} else {
			$this->view->form = $form;
		}
	
	
	}
	
	/*
	 * Delete an account
	*/
	public function deleteAction()
	{
		$this->_helper->layout->disableLayout(true);
		$this->_helper->viewRenderer->setNoRender(true);
		$deleted = $this->_model
		->setAccountId($this->_getParam('id'))
		->delete();
	
		if ($deleted) {
			$message = 'The account was successfully deleted';
		} else {
			$message = 'The account could not be deleted';
		}
		$this->_helper->flashMessenger($message);
		$this->_helper->redirector('index', 'account', 'default');
	
	}
	
	/*
	 * Assign lead to a branch while creating and editing a lead
	* @output Zend_Dojo_Data for the autocomplete field
	*/
	public function assigntobranchAction()
	{
	
		$data = $this->_model->getAssignedToBranchDojoData();
		$this->_helper->autoCompleteDojo($data);
	}
	
	/*
	 * CODE REVIEW: MARKED FOR DELETION
	*/
	public function jsonstoreAction()
	{
		$this->_helper->layout->disableLayout();
	
		$items = (array) $this->_model->fetchAll();
		$data = new Zend_Dojo_Data('id', $items);
		$this->_helper->AutoCompleteDojo($data);
	
	}
	
	
}
