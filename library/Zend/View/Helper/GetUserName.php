<?php
class Zend_View_Helper_GetUserName extends Zend_View_Helper_Abstract
{
	public function getUserName()
	{
		$auth = Zend_Auth::getInstance();
		if ($auth->hasIdentity()) {
			$storage = new Zend_Auth_Storage_Session();
			$data = $storage->read();
			$username = null;
			if(isset($data['Usertype']) && $data['Usertype'] != 'ADM' && $data['Usertype'] != 'ADU' && $data['Usertype'] !='RSU'){
				if(isset($data['Salution']) && isset($data['Firstname']) || isset($data['LastName'])){
					$username = $data['Salution'].' '.$data['Firstname'].' '.$data['LastName'];
				}
				else{
					$username = $data['Firstname'];
				}

			}else if(isset($data['Usertype']) && $data['Usertype'] == 'RSU'){
				if(isset($data['Firstname']) || isset($data['LastName'])){
					$username = $data['Firstname'].' '.$data['LastName'];
				}
			}else if(isset($data['Usertype']) && $data['Usertype'] == 'ADM'){
				return $username = 'Administrator';
			}else if(isset($data['Usertype']) && $data['Usertype'] == 'ADU'){
				if(isset($data['Firstname']) || isset($data['LastName'])){
					$username = $data['Firstname'].' '.$data['LastName'];
				}
			}elseif(isset($data['Usertype']) && $data['Usertype'] == 'CUS'){
				if(isset($data['Salution']) && isset($data['Firstname']) || isset($data['LastName'])){
					$username = $data['Salution'].' '.$data['Firstname'].' '.$data['LastName'];
				}
			}
			return $username;
		}

	}
}