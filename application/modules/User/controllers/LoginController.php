<?php

class User_LoginController extends Zend_Controller_Action
{

	protected $_userService = null;
	public function init()
	{
		if(!$this->_userService){
			$this->_userService	= new Application_Service_Client();
		}
	}

	public function indexAction()
	{
		// action body
	}

	public function signinAction()
	{
		try{
			$this->_helper->layout()->setLayout('layout');
			$form = $this->_userService->getLoginForm();
			$auth = Zend_Auth::getInstance();
			if($this->getRequest()->isPost()){
				$loginRes = $this->_userService->Login($this->getRequest()->getPost());
				$pres = $loginRes ['loginprofile'];	
				$presid = $pres ['RestId'];		
				if($loginRes['Status']){
					switch($loginRes['Usertype']){
						case 'RSO' :                        	
                            if($presid != ''){
						 		$this->_helper->redirector('firmedit','Restaurant','Restaurant',array('resid'=>$presid));
							}else{
								$this->_helper->redirector('firmregistration','Restaurant','Restaurant');							
							}
						break;		
						case 'CUS' : $this->_helper->redirector('dashboard','Client','User');
						break;
						case 'ADM' : $this->_helper->redirector('managerestaurant','Administrator','Administrator');
						break;
					}
	
				}else {
					if(!$auth->hasIdentity()){
						if(isset($loginRes['isFormValid'])){
							$formdata = $this->getRequest()->getPost();
							$InvalidAttempts = $formdata['InvalidAttempts']+1;
							
							$LoginAttemptMapper = new User_Model_LoginAttemptsDataMapper();
							if($formdata['emailAddress'] != null){
								$attempts = 0;
								$attempts = $LoginAttemptMapper->ManageInavlidLoginAttempts($formdata['emailAddress']);
								if(isset($formdata['captcha'])){
									if($InvalidAttempts > 3 ){
										$this->view->attempts = $InvalidAttempts;
									}else{
										$this->view->attempts = $attempts;
									}
									if(isset($loginRes['Form'])){
										$this->view->loginForm = $loginRes['Form'];
									}else{
										$this->view->loginForm = $form;
										$this->view->errorMessage = "Invalid username or password. Please try again.";
									}
								}else{
									if(($InvalidAttempts > 3) || ($attempts >= 3 && $InvalidAttempts > 3)){
										$this->view->attempts = $attempts;
									}
									$this->view->loginForm = $form;
									$this->view->errorMessage = "Invalid username or password. Please try again.";
								}
							}else{
								if($InvalidAttempts > 3){
									$this->view->attempts = $InvalidAttempts;
								}
								$this->view->loginForm = $form;
								$this->view->errorMessage = "Invalid username or password. Please try again.";
							}
							$this->view->inavalidattemptscount = $InvalidAttempts;
						}else if(isset($loginRes['UserNotApproved'])){
							$this->view->loginForm = $form;
							$this->view->errorMessage = "Your registration is pending for approval. Please try after some time.";
						}else if(isset($loginRes['UserInActive'])){
							$this->view->loginForm = $form;
							$this->view->errorMessage = "Your registration is In-Active. Please contact Admin.";
						}else if(isset($loginRes['CompanyInActive'])){
							$this->view->loginForm = $form;
							$this->view->errorMessage = "Please contact Admin.";
						}else{
							$this->view->loginForm = $loginRes['Form'];
						}
					}else{
						$storage = new Zend_Auth_Storage_Session();
						$data = $storage->read();
						$this->view->emailstat = true;
						if($data['Email']){
							$form->emailAddress->setValue($data['Email']);
							$form->emailAddress->setAttrib('readonly','readonly');
						}
						$this->view->loginForm = $form;
						$this->view->errorMessage = "Invalid Password. Please try again.";
					}
				}
			}else{
				if(!$auth->hasIdentity()){
					$userip = $_SERVER["REMOTE_ADDR"];
//					if(filter_var($userip, FILTER_VALIDATE_IP)){
//						$response=@file_get_contents('http://www.netip.de/search?query='.$userip);
//						if (!empty($response)){
//							$patterns=array();
//				            $patterns["country"] = '#Country: (.*?)&nbsp;#i';
////				            $patterns["state"] = '#State/Region: (.*?)<br#i';
////				            $patterns["town"] = '#City: (.*?)<br#i';
//				            //Array where results will be stored
//			                $ipInfo=array();
//			                //check response from ipserver for above patterns
//			                foreach ($patterns as $key => $pattern){
//			                	$ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
//			                }
//			                
//			                if($ipInfo['country'] == 'AE - United Arab Emirates'){
//			                	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'roundmenusignin'),'roundmenulogin',true));
//			                }else{
//								$this->view->loginForm = $form;
//							}
//						}else{
							$this->view->loginForm = $form;
//						}
//					}
				}else{
					$storage = new Zend_Auth_Storage_Session();
					$data = $storage->read();
					$this->view->emailstat = true;
					if($data['Email']){
						$form->emailAddress->setValue($data['Email']);
						$form->emailAddress->setAttrib('readonly','readonly');
					}
					$this->view->loginForm = $form;
				}
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function signoutAction()
	{
		try{
			$storage = new Zend_Auth_Storage_Session();
			$userData = $storage->read();
			
			if($this->_userService->Logout()){
				return $this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function signinajaxAction()
	{
		try
		{
			$auth = Zend_Auth::getInstance();
			if($this->getRequest()->isPost()){
				$this->_helper->viewRenderer->setNoRender();
         		$this->_helper->layout->disableLayout();
				$loginRes = $this->_userService->Login($this->getRequest()->getPost());
				$pres = $loginRes ['loginprofile'];		
				if($loginRes['Status']){
					echo true;
				
				}
				else
				{
					echo false;
				}
			}
		}
		catch(Exception $ex)
		{ throw new Exception($ex->getMessage()) ;
		}
	}

	public function signingmailAction()
	{
		try
		{
			$this->_helper->viewRenderer->setNoRender();
         	$this->_helper->layout->disableLayout();
			$request = $this->getRequest();
			if($request->isPost())
			{
					$userResponse = $this->_userService->manageProfile($request);
					 $storage = new Zend_Auth_Storage_Session();
					$storage->write($userResponse);
					echo true;
			}
		}
		catch(Exception $ex)
		{
		 throw new Exception($ex->getMessage()) ;
		}
	}
	
}