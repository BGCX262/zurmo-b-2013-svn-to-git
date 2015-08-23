<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Opportunity for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Opportunity\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OpportunityController extends AbstractActionController
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
    public function getOpportunityTable()
    {
     	if (!$this->opportunityTable) {
    		$sm = $this->getServiceLocator();
            $this->opportunityTable = $sm->get('Opportunity\Model\OpportunityTable');
            }
        return $this->opportunityTable;
    }
    public function createAction()
    {
       	$view = new ViewModel();
        $view->setTemplate('opportunity/opportunity/create');
       	return $view;
            }
	public function updateAction()
    {
     	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/update');
    	return $view;
            }
	public function viewdetailAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/viewdetail');
    	return $view;
    }

    
    public function cloneopportunityAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/cloneopportunity');
    	return $view;
    }
    
    public function deleteAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/confirmdelete');
    	return $view;
    }
    
    public function convertAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/conversion');
    	return $view;
    }
    public function editopportunityAction()
    {
    	$view = new ViewModel();
    	$view->setTemplate('opportunity/opportunity/editopportunity');
    	return $view;
    }
    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /opportunity/opportunity/foo
        return array();
    }
    
}
