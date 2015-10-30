<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
        $this->_helper->layout()->setLayout('rdinehomelayout');     
	$clientService = new Application_Service_Client(); 
        $userCount = 100000+$clientService->getNumberOfUsers();
        $this->view->userCount = $userCount;      
    }
	 public function aboutAction()
    {
        // action body
        $this->_helper->layout()->setLayout('layout');        
    }
	 public function careersAction()
    {
        // action body
        $this->_helper->layout()->setLayout('layout');        
    }
	 public function newsAction()
    {
        // action body
        $this->_helper->layout()->setLayout('layout');        
    }
	 public function contactAction()
    {
        // action body
        $this->_helper->layout()->setLayout('layout');
        $admServ = new Application_Service_Administrator();
        if($this->getRequest()->isPost()){
            $result = $admServ->AddContact($this->getRequest()->getPost());
            if($result['status']){
                $params = $result['status'];
                $this->view->successmsg = true;
                $this->view->contactform = $admServ->getContactUsForm();
            }else{
                $this->view->contactform = $result['form'];
            }
        }else{
            $this->view->contactform = $admServ->getContactUsForm(); 
        }   
    }
	 public function faqsAction()
    {
        // action body
		 $this->_helper->layout()->setLayout('layout');        
	}
      
	 public function privacyAction()
    {
        // action body
		 $this->_helper->layout()->setLayout('layout');        
	}
      
	 public function termsofserviceAction()
    {
        // action body
        $this->_helper->layout()->setLayout('layout');        
    }


}

