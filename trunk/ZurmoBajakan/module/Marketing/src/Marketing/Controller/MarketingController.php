<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Marketing for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */


namespace Marketing\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Marketing\Form\CreateListForm;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class MarketingController extends AbstractActionController
{
	
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
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /marketing/marketing/foo
        return array();
    }
    
    public function createlistAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/CreateList');
    	return $view;
    }
    
    public function savelistAction()
    {
    	$form = new CreateListForm();
    	$viewModel = new ViewModel(array('form' => $form));
    	return $viewModel;
    }
    
    public function confirmAction()
    {
    	$viewModel = new ViewModel();
    	return $viewModel;
    }
    
    public function createtemplateAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/CreateTemplate');
    	return $view;
    }
    
    public function createcampaignAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/CreateCampaign');
    	return $view;
    }
    
    public function listAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/List');
    	return $view;
    }
    
    public function listdetailAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/ListDetail');
    	return $view;
    }
    
    public function listeditAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/ListEdit');
    	return $view;
    }
    
    public function listmassdeleteAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/ListMassDelete');
    	return $view;
    }
    
    public function listmasssubcribeAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/ListMassSubcribe');
    	return $view;
    }
    
    public function listmassunsubcribeAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/ListMassUnsubcribe');
    	return $view;
    }
    
    public function templateAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/Template');
    	return $view;
    }
    
    public function templatedetailAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/TemplateDetail');
    	return $view;
    }
    
    public function templateeditAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/TemplateEdit');
    	return $view;
    }
    
    public function campaignAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/Campaign');
    	return $view;
    }
    
    public function campaigndetailAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/CampaignDetail');
    	return $view;
    }
    
    public function campaigneditAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('marketing/marketing/CampaignEdit');
    	return $view;
    }

    public function processAction()
    {
    	if (!$this->request->isPost()) {
    		return $this->redirect()->toRoute(NULL ,
    				array( 'controller' => 'marketing',
    						'action' => 'savelist'
    				));
    	}
    	$post = $this->request->getPost();
    	$form = new CreateListForm();
    	$form->setData($post);
    	if (!$form->isValid()) {
    		$model = new ViewModel(array(
    				'error' => true,
    				'form' => $form,
    		));
    
    		$model->setTemplate('marketing/marketing/CreateList');
    		return $model;
    	}
    	$this->createUser($form->getData());
    	return $this->redirect()->toRoute(NULL , array(
    			'controller' => 'register',
    			'action' => 'confirm'
    	));
    }
    
protected function createList(array $data)
{
	$sm = $this->getServiceLocator();
	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
	$resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
	$resultSetPrototype->setArrayObjectPrototype(new
			\Users\Model\User);
	$tableGateway = new \Zend\Db\TableGateway\TableGateway('user',
			$dbAdapter, null, $resultSetPrototype);
	$marketinglist = new Marketinglist();
	$marketinglist->exchangeArray($data);
	$marketinglistTable = new marketinglistTable($tableGateway);
	$marketinglistTable->saveList($marketinglist);
	return true;
}
    
}
