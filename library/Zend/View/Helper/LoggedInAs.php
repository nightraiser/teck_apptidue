<?php
class Zend_View_Helper_LoggedInAs extends Zend_View_Helper_Abstract
{
	public function loggedInAs ()
	{
		$auth = Zend_Auth::getInstance();
		$request = Zend_Controller_Front::getInstance()->getRequest();
		$controller = $request->getControllerName();
		$action 	= $request->getActionName();
		$module 	= $request->getModuleName();
		
		if ($auth->hasIdentity()) {
			$storage = new Zend_Auth_Storage_Session();
			$data = $storage->read();
			$logoutUrl = $this->view->url(array('module'=>'User','controller'=>'Login',
                'action'=>'signout'), 'default', true);
				
			$userType   = $data['Usertype'];
			$con = null;
			$mod = null;			
			$act = null;

			switch($userType){
				case 'CUS':
					$mod     = 'User';
					$con     = 'Client';
					$act     = 'guestacctandbookinghistory';
					$router	 = 'default';
					break;
				case 'RSO':
					$mod     = 'Reservation';
					$con 	 = 'Reservation';
					$router	 = 'default';
					$act	 = 'firmregistration';
					break;
				case 'ADM':
					$mod     = 'Administrator';
					$con	 = 'Administrator';
					$act   	 = 'administratordashboard';
					$router	 = 'default';
					break;
				default:
					$mod     = 'default';
					$con	 = 'index';
					$act   	 = 'index';
					$router	 = 'index';
					break;
					 
			}
			if($mod && $con && $act){
				$dashBoardUrl = $this->view->url(array('module'=>$mod,'controller'=>$con,'action'=>$act),$router,true);				 
			}
			if(!$userType){
				$loginUrl = $this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'login',true);
				return '<li><a href="'.$loginUrl.'">Log In</a></li>';
			}else if($module == 'User' && $controller == 'Client' && $action == 'guestacctandbookinghistory'){
				return '<li><a href="'.$logoutUrl.'">Logout</a></li>';
			}elseif($module == 'Reservation' && $controller == 'Reservation' && $action == 'floorplan'){
				return '<li><a href="'.$logoutUrl.'">Logout</a></li>';
			}else if($module == 'User' && $controller == 'Client' && $action == 'firmpatrondetails'){
					return '<li><a href="'.$logoutUrl.'">Logout</a></li>';									
			}else if($controller == 'Administrator' && $action == 'adminconsole'){
				return '<li><a href="'.$logoutUrl.'">Logout</a></li>';
			}else{
				return '<li><a href="'.$logoutUrl.'">Logout</a></li>';	
			}
			
		}
		if($controller == 'Login' && $action == 'signin') {
			return '';
		}
		 
		$loginUrl = $this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true);
		$registerUrl = $this->view->url(array('module'=>'User','controller'=>'Client', 'action'=>'managerregistration'),'default',true);
		return '<li><a href="'.$loginUrl.'">Log In</a></li><li><a href="'.$registerUrl.'">Register</a></li>';
	}
	
	

}