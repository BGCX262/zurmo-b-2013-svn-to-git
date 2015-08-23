<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Product for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
    	
    	$user_session = new \Zend\Session\Container('user');
    	 
    	if($user_session->username==null){
    		return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
    	}else{
    		return array();
    	$uri = $this->getRequest()->getUri();
    	$scheme = $uri->getScheme();
    	$host = $uri->getHost();
    	$base = sprintf('%s://%s', $scheme, $host);
    	}
    	
    	//$this->getServiceLocator()->('db');
    	
    }

    public function connectDb()
    {
    	$conn = mysql_connect('localhost','root','') or die ('Error connection to mySql');
    	mysql_select_db('zurmo');
    	$viewsql=mysql_query("select * from product");
    	while($row=mysql_fetch_array($viewsql));
    }
    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /product/product/foo
        return array();
    }
	
	 public function createAction()
    {
		
    }
	
	 public function createcatalogAction(){
	 }
	 public function categoryAction(){
	 }
	 public function createcategoryAction(){
	 }
}
