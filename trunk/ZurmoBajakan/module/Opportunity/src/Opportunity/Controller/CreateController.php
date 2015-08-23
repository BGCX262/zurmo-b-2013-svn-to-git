<?php
namespace Create\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Opportunity\Model\Opportunity;
use Opportunity\Model\OpportunityTable;
use Opportunity\Form\CreateForm;

class CreateController extends AbstractActionController
{
	public function indexAction()
	{
		
		$user_session = new \Zend\Session\Container('user');
		 
		if($user_session->username==null){
			return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
		}else{
			$form = new CreateForm();
		$viewModel = new ViewModel(array('form' =>
				$form));
		return $viewModel;
		}
		
	}
	public function confirmAction()
	{
		$viewModel = new ViewModel();
		return $viewModel;
	}

	public function processAction()
	{
		if (!$this->request->isPost()) {
			return $this->redirect()->toRoute(NULL ,
					array( 'controller' => 'Create',
							'action' => 'index'
					));
		}
		$post = $this->request->getPost();
		$form = new CreateForm();
		$form->setData($post);
		if (!$form->isValid()) {
			$model = new ViewModel(array(
					'error' => true,
					'form' => $form,
			));

			$model->setTemplate('opportunity/opportunity/index');
			return $model;
		}
		$this->createUser($form->getData());
		return $this->redirect()->toRoute(NULL , array(
				'controller' => 'Create',
				'action' => 'confirm'
		));
	}
	protected function createOpportunity(array $data)
	{
		$sm = $this->getServiceLocator();
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    	$resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
    	$resultSetPrototype->setArrayObjectPrototype(new
    			\Opportunity\Model\Opportunity);
    	    	$tableGateway = new \Zend\Db\TableGateway\TableGateway('user',
    			$dbAdapter, null, $resultSetPrototype);
    	$opportunity = new Opportunity();
    	$opportunity->exchangeArray($data);
    	$opportunityTable = new OpportunityTable($tableGateway);
    	$opportunityTable->saveOpportunity($opportunity);
    	return true;
	}
}