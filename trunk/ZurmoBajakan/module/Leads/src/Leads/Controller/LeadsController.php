<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Leads for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Leads\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LeadsController extends AbstractActionController
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
        // are working when you browse to /leads/leads/foo
        return array();
    }
    
    public function cobaxAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/coba');
    	return $view;
    }
    
    
    
    public function getLeadsTable()
    {
    	if (!$this->leadsTable) {
    		$sm = $this->getServiceLocator();
    		$this->leadsTable = $sm->get('Leads\Model\LeadsTable');
    	}
    	return $this->leadsTable;
    }
    
    public function createAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/createleads');
    	return $view;
    }
    
    public function updateAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/updateleads');
    	return $view;
    }
    
    public function viewdetailAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/viewdetailleads');
    	return $view;
    }

    
    public function cloningAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/cloneleads');
    	return $view;
    }
    
    public function editAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/editleads');
    	return $view;
    }
    
    public function deleteAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/confirmdeleteleads');
    	return $view;
    }
    
    public function convertAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/leadconversion');
    	return $view;
    }
    public function createcobaAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('leads/leads/createcoba');
    	return $view;
    }
}
