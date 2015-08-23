<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Login for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Login\Form\LoginForm;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as DbTableAuthAdapter;

class LoginController extends AbstractActionController
{
    public function indexAction()
    {
        $form = new LoginForm();
		$viewModel = new ViewModel(array('form' => 
		$form)); 
		return $viewModel; 
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /login/login/foo
        return array();
    }
    
	public function getAuthService()
	{
		if (! $this->authservice) {
		$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
		$dbTableAuthAdapter = new DbTableAuthAdapter($dbAdapter, 
		'_user','username','hash', 'MD5(?)');
		$authService = new AuthenticationService();
		$authService->setAdapter($dbTableAuthAdapter);
		$this->authservice = $authService;
		}
		return $this->authservice;
	}
    
    public function processAction(){
    	
		 $this->getAuthService()->getAdapter()
		->setIdentity($this->request->getPost('username'))
		->setCredential($this->request->getPost('password'));
		$result = $this->getAuthService()->authenticate();
		if ($result->isValid()) {
			$this->getAuthService()->getStorage()->write($this->request->getPost('username'));
			$this->getAuthService()->getStorage()->write($this->request->getPost('password'));
			
			$user_session = new \Zend\Session\Container('user');
			
			$request = $this->getRequest();
			$username = $request->getPost()->get('username');
			$password = $request->getPost()->get('password');
			
			$user_session->username = $username;
			$user_session->password = $password;
			
			if (isset($_session['last_activity']) && (time() - $_session['last_activity'] > 1800)) {
					// last request was more than 30 minutes ago
			session_unset();     // unset $_session variable for the run-time 
			session_destroy();   // destroy session data in storage
			}
			
			$_session['last_activity'] = time(); // update last activity time stamp
			
			
			return $this->redirect()->toRoute('application' , array( 
			'controller' => 'index', 
			'action' => 'index' 
		));}else{
			return $this->redirect()->toRoute(null , array(
					'controller' => 'login',
					'action' => 'index'));
		}
	}
	
	public function confirmAction()
	{
		$user_session = new \Zend\Session\Container('user');
		$user_name = $user_session->username;
		$viewModel = new ViewModel(array(
				'user_name' => $user_name
		));
		return $viewModel;
	}
	
	public function logoutAction(){
		$user_session = new \Zend\Session\Container('user');
		$user_session->username = NULL;
		$user_session->password = NULL;
		return $this->redirect()->toRoute(null , array(
				'controller' => 'login',
				'action' => 'index'));
	}
}
