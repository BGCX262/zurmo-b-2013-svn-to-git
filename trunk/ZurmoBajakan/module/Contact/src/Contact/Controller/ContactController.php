<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Contact for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Contact\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    public function indexAction()
    {
    	$user_session = new \Zend\Session\Container('user');
    	 
    	if($user_session->username==null){
    		return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
    	}else{
    		$view = new ViewModel();
    		$view->setTemplate('contact/contact/index');
    		return $view;
    	}
    		
    	
        
        //return array();
        //$uri = $this->getRequest()->getUri();
        //$scheme = $uri->getScheme();
        //$host = $uri->getHost();
        //$base = sprintf('%s://%s', $scheme, $host);
        //$this->getServiceLocator()->('db');
    }
    
    

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /contact/contact/foo
        return array();
    }
    
    public function createAction()
    {
    	return array();
    }
 
    public function deleteAction()
    {
    	return array();
    }
    
    public function exportAction()
    {
    	return array();
    }
    
    public function updateAction()
    {
    	return array();
    }
    
    public function subscribeAction()
    {
    	return array();
    }
}
