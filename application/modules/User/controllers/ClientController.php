<?php
/**
*	Name			: UserController.php
*	Author			: Kartheek
*	Creation Date	: 09/30/2010
*	Path 			: application/modules/Reservation/controllers/UserController.php
*	Description		: This is controller class for the UserManagementSystem module.
*					   	
*/
class User_ClientController extends Zend_Controller_Action
{

	protected $_userService = null;
	protected $_resservice = null;


	/**
     * Initialize the User service instance.
     */
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
	/**
	 * action for customer registration
	 */
	public function guestsignupAction()
	{
		try{
// 			$this->_helper->layout()->setLayout('dinedesk');
			if($this->getRequest()->isPost()){
				if($this->_userService->RegisterCustomer($this->getRequest()->getPost())){
					$loginRes = $this->_userService->Login($this->getRequest()->getPost());
					$pres = $loginRes ['loginprofile'];
					if($loginRes['Status']){
						$this->_helper->redirector('dashboard','Client','User');	
					}
				}
			}
			
			$CountryCodeMapper = new Application_Model_CountrybdMapper();
	    	$CountryCode = $CountryCodeMapper->fetchAll();
	    	$CodeList = array();
	    	$CodeList[] = array('key'=>'','value'=>'Select Country Flag');
	    	foreach($CountryCode as $listcode){
	    		$CodeList[] = array('key'=>$listcode->getCountry_dial_code(),'value'=>$listcode->getCountry_flag());
	    	}
		    	
	    	$this->view->codelist = $CodeList;
	    	
			$this->view->form = $this->_userService->getCustomerForm();
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function guestwidgetsignupAction()
	{
		try
		{
			  $this->_helper->viewRenderer->setNoRender();
	          $this->_helper->layout->disableLayout();
			if($this->getRequest()->isPost()){
				if($this->_userService->widgetUserRegistration($this->getRequest()->getPost())){
					$loginRes = $this->_userService->AjaxLogin($this->getRequest()->getPost());
					
					$pres = $loginRes['loginprofile'];
					if($loginRes['Status']){
						echo true;	
					}
				}
			}
		}
		catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function signinupapprovalAction()
	{
		try{
// 			$this->_helper->layout()->setLayout('dinedesk');
			$request = $this->getRequest();
			
			if($request->usertype){
				$this->view->usertype = $request->usertype;	
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function managerregistrationAction()
	{
		try{
			$this->_helper->layout()->setLayout('layout');
			if($this->getRequest()->isPost()){
				$result = $this->_userService->RegisterRestaurantOwner($this->getRequest()->getPost());
				if($result['status']){
					return $this->_helper->redirector('signinpapproval','Client','User',array('usertype' => 'OWN'));
				}else if($result['form']){
					$this->view->form = $result['form'];
				}
			}
			$this->view->form = $this->_userService->getRestaurantOwnerForm();
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function signinpapprovalAction()
	{
		try{
	/**
	 * function for check whether email already exists
	 */
			$this->_helper->layout()->setLayout('layout');
			$request = $this->getRequest();
				
			if($request->usertype){
				$this->view->usertype = $request->usertype;
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function searchforemailexistAction()
	{
		try{
			if($this->getRequest()->isPost()){
				$emailObj = new User_Model_Signin();
				if($_REQUEST['email']){
					$emailObj->setEmailAddress(strtolower(trim($_REQUEST['email'])));
				}
				$result = $this->_userService->CheckEmailAvaliable($emailObj);
				$this->_helper->layout->disableLayout();
				$this->_helper->viewRenderer->setNoRender();
				if($result){
					echo "t";
				}else{
					echo "f";
				}
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function manageguestsAction()
	{
		try 
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
        	$request = $this->getRequest();
	        $guestData = $this->_userService->manageGuests($request);
	        $this->view->guestData = $guestData;
              }else{
              	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
             }
        }
      catch (Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
	}

	 public function updateguestajaxAction()
    {
    	 try
    	 {
    	 	$this->_helper->viewRenderer->setNoRender();
	        $this->_helper->getHelper('layout')->disableLayout(); 
	        $request = $this->getRequest();
        	if($request->isPost())
	        {
	        	$statusUpdate = $this->_userService->updateGuestStatus($request);
	        	echo $statusUpdate;
	        }
    	 }
    	 catch(Exception $e)
    	 {
    	 	throw new Exception($e->getMessage());
    	 }
    	
    }

    public function dashboardAction()
    {
    	 try
    	 {
    	 	$auth = Zend_Auth::getInstance();
    		if($auth->hasIdentity()){
    			$_resservice  = new Application_Service_Restaurant();
    			$storage = new Zend_Auth_Storage_Session();
                $userArr = $storage->read();
                $userid = $userArr['User_Id'];
                $cusmapper = new User_Model_CustomerMapper($userid);
                $cusname = $cusmapper->getcusdata($userid);
                $this->view->cusname = $cusname; 
                $this->view->userid = $userid;
                $this->view->isLoggedin = true;
    			$shortlisted = $_resservice->showshortlist($userid,$this->view->baseUrl());
    			$this->view->shortlist = $shortlisted;
    			$likedres = $_resservice->showlikedreslist($userid,$this->view->baseUrl());
    			$this->view->likedreslist = $likedres;
    			$resreviews = Array();
    			$resreviews = $_resservice->resReviewsByUserid($userid,$this->view->baseUrl());
    			$this->view->resreviews = $resreviews;
    			
    			$itemreviews = $_resservice->itemReviewsByUserid($userid,$this->view->baseUrl());
    			//print_r($itemreviews);die();
    			$this->view->itemreviews = $itemreviews;
    			$cusname = $_resservice->usernameByUserid($userid);
    			$this->view->cusname = $cusname;
    		}
    		else{

    		}	
    	 }
    	 catch(Exception $e)
    	 {
    	 	throw new Exception($e->getMessage());
    	 }
    	
    }

    public function signinfromwidgetAction()
	{
		try{
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$request = $this->getRequest();
			
			
			$storage = new Zend_Auth_Storage_Session();
			$data = $storage->read();
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity() && isset($data['User_Id'])){
				if(isset($request->code)){
					echo "<script type=\"text/javascript\">";
    				echo "window.opener.location.href = '".$loginProfile['widgetlink']."';window.close(); </script>";
				}else{
					echo 'auth';
				}
			}else if(isset($request->error_reason) && isset($request->error)){
				$auth->clearIdentity();
				echo "<script type=\"text/javascript\">";
    			echo "window.close(); </script>";
			}else{
				$storage = new Zend_Auth_Storage_Session('fblogin');
				$data = $storage->read();
				$auth = Zend_Auth::getInstance();
				/* facebook*/
				include('facebook/src/facebook.php');	
				$app_id = "1701350336753170";
			   	$app_secret = "a9feac008bab4610efcb5082158f4858";
			   	$my_url = "http://www.rdine.com/User/Client/signinfromwidget";
			 	
			   	$loginProfile = $data;
			   	if(isset($request->widgetlink)){
			   		$loginProfile['widgetlink'] = $request->widgetlink;
			   	}
			   	$facebook = new Facebook(array(
				    'appId'  => '1701350336753170',
				    'secret' => 'a9feac008bab4610efcb5082158f4858',
				));
				$code = $request->code;
				
			   	if(empty($code)) {
			    	$loginProfile['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
			     	$dialog_url = "https://www.facebook.com/dialog/oauth?display=popup&domain=www.rdine.com&locale=en_US&client_id=" 
							       . $app_id . "&redirect_uri=" . urlencode($my_url) . "&scope=email&state="
							       . $loginProfile['state'];
			
			     	
			//     	echo '<a href="'.$dialog_url.'" onclick="window.open (this.href, "child", "height=400,width=300"); return false">Click to log out</a>';
					$storage->write($loginProfile); 
					echo $dialog_url; 
			   	}
			   	if($loginProfile['state'] && ($loginProfile['state'] === $request->state)) {
			    	$token_url = "https://graph.facebook.com/oauth/access_token?"
						       . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
						       . "&client_secret=" . $app_secret . "&code=" . $code."&scope=email";
			
					try{
				     	$response = file_get_contents($token_url);
				     	$params = null;
				     	parse_str($response, $params);
				
				     	$loginProfile['access_token'] = $params['access_token'];
				
				     	$graph_url = "https://graph.facebook.com/me?access_token=" 
				       				. $params['access_token'];
				
					    $user = json_decode(file_get_contents($graph_url));
					    $emailObj = new User_Model_Signin();
						$emailObj->setEmailAddress(strtolower(trim($user->email)));
						$result = $this->_userService->manageLoginProfileWidget($user,$loginProfile);
						if($result['Status']){
							$auth->clearIdentity();
							$auth = Zend_Auth::getInstance();
							$storage = new Zend_Auth_Storage_Session();
							$storage->write($result['loginprofile']);
							echo "<script type=\"text/javascript\">";
	    					echo "window.opener.location.href = '".$loginProfile['widgetlink']."';window.close(); </script>";
						}else{
							$auth->clearIdentity();
							echo "<script type=\"text/javascript\">";
	    					echo "window.close(); </script>";
						}
					}catch(Exception $e){
						unset($loginProfile['access_token']);
						$storage->write($loginProfile);
					}
			   	}
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

}
