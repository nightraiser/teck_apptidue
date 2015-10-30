<?php

class User_Model_GuestDataMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}
	
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('User_Model_DbTable_Customer');
		}
		return $this->_dbTable;
	}
	
	public function save(User_Model_Guest $customer)
	{
		
			$db = Zend_Db_Table::getDefaultAdapter();
			$userMapper = new User_Model_ClientDataMapper();
			
			try{
				$db->beginTransaction();
				
				$userId = $userMapper->save($customer);
				
				$customer->setUserid($userId);
				
				$data = array(
		  		'cusfk_user' 		=> $customer->getUserid(),
				'cussalution'   	=> $customer->getSalution(),
		  		'cusfirst_name' 	=> $customer->getFirstname(),
		  		'cuslast_name'  	=> $customer->getLastname(),
//		  		'cusgender'			=> $customer->getGender(),
		  		'cusaddress'		=> $customer->getAddress(),
//				'cusregion_id'		=> $customer->getRegionid(),
//		  		'cuscity_id'		=> $customer->getCityid(),
//				'cusneighborhood_id'=> $customer->getNeighborhoodid(),
//		  		'cusstate_id'   	=> $customer->getStateid(),
		  		'cuszipcode'		=> $customer->getZipcode(),
//		  		'custimezone'   	=> $customer->getTimezone(),
		  		'cusphone'      	=> $customer->getPhonenumber(),
				'cuscountrycode'	=> $customer->getcountryCode(), 		
		 		 );
		 		 
		 		$customer_id = $this->getDbTable()->insert($data);	
		 				
				$db->commit();
				
				return $customer_id;
				
			}catch(Exception $ex){
				
				$db->rollBack();
				throw new Exception($ex->getMessage()) ;	
			}		
	}

	public function manageGuests($conditionArray = null)
	{
		try
                {
                
                    $cache = new Rdine_Helper_CacheManager();
                    $resdata = array();
                    if(!$resdata = $cache->Fetch('ddrestaurantdata'))
                     {
                            $db = $this->getDbTable();
                            $select = $db->select()
                                        ->from(array('cus'=>'rd.customer'),array('cusid','cusfirst_name','cuslast_name','cusmobile','cus_status'))
                                       ->joinLeft(array('usr'=>'rd.user'),"usr.usrid = cus.cusfk_user", array("useremail"=>"usr.usremail"))
                                        ->order("cus.cusfirst_name")
                                        ->setIntegrityCheck(false);

                            if(sizeof($conditionArray)>0)
                            {
                                foreach ($conditionArray as $key => $value) 
                                {
                                    if(strlen($value)>0)
                                    {
                                        if($key=="resname")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        else
                                        {
                                            $select->where("$key = ?",$value);
                                        }
                                    }

                                }
                            }
                            $records = $db->fetchAll($select);                           
                           	$cache->Save($resdata,'ddrestaurantdata'); 
                             return ($records); 
                     }
                }
                catch (Exception $ex){
                        throw new Exception($ex->getMessage()) ;
                    }
	}

	public function updateGuestDetails($data,$cusid)
    {
        try
        {
             $db= $this->getDbTable();
             return $db->update($data,"cusid=".$cusid);
        }
               

        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }
     public function manageLoginProfileWidget($userDet)
	{	
		$db = Zend_Db_Table::getDefaultAdapter();
			
		try{
			$db->beginTransaction();
			$table  =$this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			$select->from(array('usr'=>'rd.user'),array('usrid','usremail','usrregistered_date','usruser_status_id','usrusertype_id','usrlast_login_date'))
					->where('usremail = ?',$userDet['email']);
			$usrRes = $table->fetchRow($select);
			$userTable = new User_Model_ClientDataMapper();
			if(!$usrRes){
				$email = $userDet['email'];
				$length = 8;
				$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
				$password = "";
				for ($p = 0; $p < $length; $p++) {
					$password .= $characters[mt_rand(0, strlen($characters))];
				}
				$randomdata = "";
				for ($p = 0; $p < $length; $p++) {
					$randomdata .= $characters[mt_rand(0, strlen($characters))];
				}
				$passSha = sha1($password.$randomdata);
				$update = date('Y-m-d H:i:s');
				$user= array(
						'usremail'           => $userDet['email'],
						'usrpassword'        => $passSha,
						'usrusertype_id'	 => 2,
						'usrrole_id'		 => 4,
						'usrregistered_date' => date('Y-m-d'),
						'usruser_status_id'	 => 1,
						'usrpassphrase' 	 => $randomdata,
						'usrcreateddatetime' => $update
				);	
				$user_id = $userTable->getDbTable()->insert($user);
				
				//$cusMapper = new User_Model_GuestDataMapper();
				$customerTable = $this->getDbTable();
				
				$data = array(
		  		'cusfk_user' 		=> $user_id,
		  		'cusfirst_name' 	=> $userDet['first_name'],
		  		'cuslast_name'  	=> $userDet['last_name'],		
		 		 );
		 		 
		 		$customer_id = $customerTable->insert($data);	
		 				
				$db->commit();
				
				/*$mailmapper = new Application_Service_Communication();
				$mailObj = new Communication_Model_Mail();
				$mailObj->setMsgCode('Customer_Confirmation');
				$name = $userDet->name;
				$data = array('UserName' => $name,
							  'pass' => $password,
							  'SenTo'    => $email);
				$mailObj->setData($data);
				$mailStatus = $mailmapper->SendMail($mailObj);
				*/
				$usertype_Id   = 2;
								
			}else{
				$user_id       = $usrRes->usrid;
				$usertype_Id   = $usrRes->usrusertype_id;
				$email         = $usrRes->usremail;
			}
			/* Get Usertype from Usertype BaseData */
			
			$signupdate    = null;
			$lastlogindate = null;
			/* Updating Users Last Login Date */
			if($user_id){
				$userTable->UpdateUserLoggedInDate($user_id);
			}
					
			if($usrRes->usrregistered_date){
				$signupdate  = $usrRes->usrregistered_date;	
			}else{
				$signupdate  = date('Y-m-d');
			}
			
			if($usrRes->usrlast_login_date){
				$lastlogindate = $usrRes->usrlast_login_date;
			}else{
				$lastlogindate = '';
			}
			$userType = $userTable->getUsertype($usertype_Id);
			switch($userType->code){
				case 'CUS':
						//$cusMapper = new User_Model_GuestDataMapper();
						$table  = $this->getDbTable();
						$select = $table->select();
						$select->from($table,array('cussalution','cusfirst_name','cuslast_name','custimezone','cusphone','cusmobile','cuscity_id','cusstate_id','cusregion_id'))
							   ->where('cusfk_user = ?',$user_id);
					    $row = $table->fetchRow($select);
						$result = array('Email'      	=> $email,
										'Salution'   	=> $row->cussalution,
										'Firstname'  	=> $row->cusfirst_name,
										'LastName'   	=> $row->cuslast_name,
										'User_Id'    	=> $user_id,
										'Usertype'   	=> $userType->code,
										'Timezone'   	=> $row->custimezone,
										'State_Id'		=> $row->cusstate_id,
										'City_Id'    	=> $row->cuscity_id,
										'Region_Id'		=> $row->cusregion_id,
										'Phone'      	=> $row->cusphone,
										'cusmobile'  	=> $row->cusmobile,
										'companyid'		=> '',
										'SignUpdate'    => $signupdate,
									    'LastLoginDate' => $lastlogindate);
								    
						return $result;
						
					break;
					
				case 'RSO':
	
						$rsoMapper = new User_Model_ManagerDataMapper();
						$table 	   = $rsoMapper->getDbTable();
						$select    = $table->select();
						$select->from($table,array('rsofk_salution','rsofirst_name','rsolast_name','rsophone','rsostateid','rsocityid','rsoregionid','rso_companyid','presid','defaultview'))
							   ->where('rsofk_user = ?',$user_id) ;   
						$row       = $table->fetchRow($select);
						
						if ($row->presid == null){
							$resMapper = new Restaurant_Model_RestaurantMapper();
							$table 	   = $resMapper->getDbTable();
							$selectres    = $table->select();
							$selectres->from(array('rest'=>'rd.restaurant_details'),array('resid','resname','rescapacity','resreservation_system','res_status'))
							->where('resfk_user = ?',$user_id) ;
							$newrow = $table->fetchRow($selectres);
							$presid = $newrow->resid;
							$mapper = new User_Model_ManagerDataMapper;
						} else {
							$presid = $row->presid;
                            $resMapper = new Restaurant_Model_RestaurantMapper();
							$table 	   = $resMapper->getDbTable();
							$selectres    = $table->select();
							$selectres->from(array('rest'=>'rd.restaurant_details'),array('resid','resname','rescapacity','resreservation_system','res_status'))
							->where('resid = ?',$presid) ;
							$newrow = $table->fetchRow($selectres);
						}
						$restNameByOwnObj = new Restaurant_Model_RestNamesByOwnerId();
						$restNameByOwnObj->setRestOwnerId($user_id);
						$restMapper = new Restaurant_Model_RestaurantMapper();
						$restList   = $restMapper->getRestaurantNamesByOwnerId($restNameByOwnObj);
						
						/* Reterieve Restaurant Owner Permission's */
						
// 						$permTypMapp = new Application_Model_PermissionsTypeDataMapper();
// 						$Permissions = $permTypMapp->getRestUserMenuBD();
						
						$result = array('Email'      	=> $email,
										'User_Id'   	=> $user_id,
										'Usertype'  	=> $userType->code,
										'Salution'  	=> $row->rsofk_salution,
										'Firstname' 	=> $row->rsofirst_name,
										'LastName'  	=> $row->rsolast_name,
										'State_Id'		=> $row->rsostateid,
										'City_Id'    	=> $row->rsocityid,
										'Region_Id'		=> $row->rsoregionid,									
										'SignUpdate'    => $signupdate,
									    'LastLoginDate' => $lastlogindate,
										'Phone'      	=> $row->rsophone,
// 										'Permissions'   => $Permissions,
										'companyid'		=> $row->rso_companyid,
										'RestId' 		=> $presid,
										'DefaultView'	=> $row->defaultview,
										'restList'		=> $restList,);														
											
						 return $result;						
					
					break;	
									
				case 'ADM' :
					
// 						$adminPermMapper = new Application_Model_AdminPermissionsTypeDataMapper();
// 						$permRowSet = $adminPermMapper->getAdminMenuBD();
						$result = array('User_Id'  		=> $user_id,
										'Usertype' 		=> $userType->code,
// 										'Permissions'   => $permRowSet,
										'companyid'		=> 1,
										'restownerId'	=> "",
										'RestId'  => ""
									);
						return $result; 
						
					break;
					
			} 
		}
		 catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }			 /* Reterieve Perimission's by..*/
    public function widgetsave(User_Model_Guest $customer)
	{
			$db = Zend_Db_Table::getDefaultAdapter();
			$userMapper = new User_Model_ClientDataMapper();
			
			try{
				$db->beginTransaction();
				$userId = $userMapper->save($customer);
				$customer->setUserid($userId);
				
				$data = array(
		  		'cusfk_user' 		=> $customer->getUserid(),
		  		'cusfirst_name' 	=> $customer->getFirstname(),
		  		'cuslast_name'  	=> $customer->getLastname(),  		
		 		 );
		 		 
		 		$customer_id = $this->getDbTable()->insert($data);	
		 				
				$db->commit();
				return $customer_id;
				
			}catch(Exception $ex){
				
				$db->rollBack();
				throw new Exception($ex->getMessage()) ;	
			}		
	}

}

