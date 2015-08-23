<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Project for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Project\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProjectController extends AbstractActionController
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
    public function projAction()
    {
    	$user_session = new \Zend\Session\Container('user');
    	 
    	if($user_session->username==null){
    		return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
    	}else{
    		$view = new ViewModel();
    	$view->setTemplate('project/project/proj');
    	return $view;
    	}
    	
    }
    public function createAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('project/project/create');
    	return $view;
    }
    public function exchangeArray($data)
    {
    	$this->name = (isset($data['name'])) ?
    	$data['name'] : null;
    	$this->description = (isset($data['description'])) ?
    	$data['description'] : null;
    	$this->status = (isset($data['status'])) ?
    	$data['status'] : null;
    	$this->ownedsecurableitem_id = (isset($data['ownedsecurableitem_id'])) ?
    	$data['ownedsecurableitem_id'] : null;
    	
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /project/project/foo
        return array();
    }
}
