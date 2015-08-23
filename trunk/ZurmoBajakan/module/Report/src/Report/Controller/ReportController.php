<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Report for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Report\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ReportController extends AbstractActionController
{
    public function indexAction()
    {
    	$user_session = new \Zend\Session\Container('user');
    	 
    	if($user_session->username==null){
    		return $this->redirect()->toURL('http://localhost/zurmobajakan/public/login/login/index');
    	}else{
    		return array();
		$this->actionList();
    	}
    	
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /report/report/foo
        return array();
    }
	//function action
	public function actionList()
        {
            $pageSize                       = new resolveActiveForCurrentUserByType(
                                              'listPageSize', get_class($this->getModule()));
            $savedReport                    = new SavedReport(false);
            $searchForm                     = new ReportsSearchForm($savedReport);
            $listAttributesSelector         = new ListAttributesSelector('ReportsListView', get_class($this->getModule()));
            $searchForm->setListAttributesSelector($listAttributesSelector);
            $dataProvider                   = $this->resolveSearchDataProvider(
                $searchForm,
                $pageSize,
                null,
                'ReportsSearchView'
            );
            $title           = Zurmo::t('ReportsModule', 'Reports');
            $breadCrumbLinks = array(
                 $title,
            );
            if (isset($_GET['ajax']) && $_GET['ajax'] == 'list-view')
            {
                $mixedView = $this->makeListView(
                    $searchForm,
                    $dataProvider
                );
                $view = new ReportsPageView($mixedView);
            }
            else
            {
                $mixedView = $this->makeActionBarSearchAndListView($searchForm, $dataProvider,
                             'SecuredActionBarForReportsSearchAndListView');
                $view = new ReportsPageView(ZurmoDefaultViewUtil::
                                            makeViewWithBreadcrumbsForCurrentUser(
                                            $this, $mixedView, $breadCrumbLinks, 'ReportBreadCrumbView'));
            }
            echo $view->render();
        }
		
		//declaring
	  public function resolveActiveForCurrentUserByType()
		{
        return array();
		} 
		
		public function SavedReport()
		{
        return array();
		}
		
		public function ReportsSearchForm()
		{
        return array();
		}
		
		public function ListAttributesSelector()
		{
        return array();
		}
		
		public function setListAttributesSelector()
		{
        return array();
		}
		
		public function resolveSearchDataProvider()
		{
		return array();
		}
		
		public function makeListView()
		{
		return array();
		}
		
		public function ReportsPageView()
		{
		return array();
		}
		
		public function makeActionBarSearchAndListView()
		{
		return array();
		}
		
		public function makeViewWithBreadcrumbsForCurrentUser()
		{
		return array();
		}

		//connect db
		 public function connectDb()
		{
        $conn = mysql_connect('localhost','root','') or die ('Error connection to mySql');
        mysql_select_db('zurmo');
        $viewsql=mysql_query("select * from contact");
        while($row == mysql_fetch_array($viewsql));
		}
}
