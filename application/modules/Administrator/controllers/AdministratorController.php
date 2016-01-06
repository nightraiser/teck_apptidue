<?php
class Administrator_AdministratorController extends Zend_Controller_Action
{

	protected $_adminService = null;
	/**
     * Initialize the restaurant service instance.
     */
	public function init()
	{
		if(!$this->_adminService){
			$this->_adminService = new Application_Service_Administrator();
		}
	}

	/**
	 * Index Action
	 */
	public function indexAction()
	{
		// action body
	}
	/**
	 * Module Management
	 */
	public function modulemanagementAction()
	{
		try
		{
			$this->_helper->layout()->setLayout('adminlayout');
			$modData = $this->_adminService->getAllModules();
			$this->view->moduleData  = $modData;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	 * Module addition ajax
	 */
	public function addmoduleajaxAction()
	{
		try
		{
			$this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
            $request = $this->getRequest();
            if($request->isPost())
            {
            	$res = $this->_adminService->addModule($request);
            	echo $res;
            }
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Module edit ajax
	 */
	public function editmoduleajaxAction()
	{
		try
		{
			$this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
            $request = $this->getRequest();
            if($request->isPost())
            {
            	$res = $this->_adminService->editModule($request);
            	echo $res;
            }
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Module delete ajax
	 */
	public function deletemoduleajaxAction()
	{
		try
		{
			$this->_helper->layout->disableLayout();
            $this->_helper->viewRenderer->setNoRender();
            $request = $this->getRequest();
            if($request->isPost())
            {
            	$res = $this->_adminService->deleteModule($request);
            	echo $res;
            }
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Test Management
	 */
	public function testmanagementAction()
	{
		try
		{
			$this->_helper->layout()->setLayout('adminlayout');
			$modData = $this->_adminService->getAllModules();
			$this->view->moduleData  = $modData;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}
}
