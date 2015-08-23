<?php
namespace Create\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Users\Model\Leads;
use Users\Model\persontable;
use Leads\Form\CreateForm;
class RegisterController extends AbstractActionController
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
		$form = new RegisterForm();
		$form->setData($post);
		if (!$form->isValid()) {
			$model = new ViewModel(array(
					'error' => true,
					'form' => $form,
			));

			$model->setTemplate('leads/leads/index');
			return $model;
		}
		$this->createUser($form->getData());
		return $this->redirect()->toRoute(NULL , array(
				'controller' => 'Create',
				'action' => 'confirm'
		));
	}
protected function createUser(array $data)
{
$sm = $this->getServiceLocator();
$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
$resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
$resultSetPrototype->setArrayObjectPrototype(new \Leads\Model\Leads);
$tableGateway = new \Zend\Db\TableGateway\TableGateway('person', $dbAdapter, null, $resultSetPrototype);
$leads = new Leads();
$leads->exchangeArray($data);
$persontable = new persontable($tableGateway);
$persontable->saveUser($leads);
return true;
}
}