<?php
class Examination_ExamController extends Zend_Controller_Action
{

	protected $_adminService = null;
	protected $_examService = null;
	/**
     * Initialize the restaurant service instance.
     */
	public function init()
	{
		if(!$this->_adminService){
			$this->_adminService = new Application_Service_Administrator();
		}
		if(!$this->_examService){
			$this->_examService = new Application_Service_Examination();
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
	 * Test action
	 */
	public function testAction()
	{
		try
		{
			$this->_helper->layout()->setLayout('testlayout');
			$this->_examService->fetchQuestionsForTest(1);
		}
		catch(Execption $e)
		{
			print_r($e->getMessage());
		}
	}
}
