<?php

class User_Model_ClientDataMapper
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
			$this->setDbTable('User_Model_DbTable_Client');
		}
		return $this->_dbTable;
	}
		
	public function save(User_Model_Guest $user)
	{
		try{			
			$length = 8;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			$randomdata = "";
			$offset = strlen($characters) - 1;
			for ($p = 0; $p < $length; $p++) {
				$randomdata .= $characters[mt_rand(0, $offset)];
			}
			$passSha = sha1($user->getPassword().$randomdata);
			$update = date('Y-m-d H:i:s');
			$user= array(
			'usremail'           => $user->getEmail(),
			'usrpassword'        => $passSha,
			'usrusertype_id'	 => $user->getUsertypeid(),
			'usrrole_id'		 => $user->getRole(),
			'usrregistered_date' => $user->getRegistereddate(),
			'usruser_status_id'	 => $user->getUserStatusid(),
			'usrpassphrase' 	 => $randomdata,
			'usrcreateddatetime' => $update,
			'usripaddress'		 =>	$_SERVER["REMOTE_ADDR"]
			);	
			$user_id = $this->getDbTable()->insert($user);		
			return $user_id;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}		
	}		
	
	public function getLoginProfile($data)
	{	
		try{
		/* Get Usertype from Usertype BaseData */
			$user_id       = $data->usrid;
			$usertype_Id   = $data->usrusertype_id;
			$email         = $data->usremail;
			$signupdate    = null;
			$lastlogindate = null;
			/* Updating Users Last Login Date */
			if($user_id){
				$this->UpdateUserLoggedInDate($user_id);
			}
					
			if($data->usrregistered_date){
				$signupdate  = $data->usrregistered_date;	
			}
			
			if($data->usrlast_login_date){
				$lastlogindate = $data->usrlast_login_date;
			}
			$userType = $this->getUsertype($usertype_Id);
			switch($userType->code){
				case 'CUS':
						$cusMapper = new User_Model_GuestDataMapper();
						$table  = $cusMapper->getDbTable();
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
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
		
	}	
	
	public function getUsertype($usertype_id)
	{
		try{
			$usertype = array();
			$usertypeMapper = new Application_Model_UsertypeDataMapper();
			$usertype = $usertypeMapper->getUsertypeBD();
			foreach($usertype as $type){
				if($usertype_id == $type->id){
					return $type;
				}
			}
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
		
	}	  	
	public function getEmailStatus(User_Model_Signin $email)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$result = $db->fetchOne("select count(usremail) from rd.user where usremail= :title",
							array('title' => $email->getEmailAddress()));
			if($result == 1)
			{
				$status = true; 
			}else{
				$status = false;
			}
			return $status;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UpdateUserLoggedInDate($userid)
	{
		try{
			$date  = date('Y-m-d H:i:s');
			$set   = array('usrlast_login_date'=>$date);
			$where = array('usrid = ?'=>$userid);		
			$rows_affected = $this->getDbTable()->update($set,$where);
			
			if($rows_affected){
				return true;
			}else{
				return false;
			}
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function getUserStatusByEmail($email)
	{
		try{
			$table  =$this->getDbTable();
			$select = $table->select();
			$select->from($table,array('usruser_status_id'))
				   ->where('usremail = ?',$email);
		    $row = $table->fetchRow($select);
		   
		    if($row){
		    	$result = array('userstatusid' => $row->usruser_status_id);
		    }else{
		    	$result = array('userstatusid' => "");
		    }
			return $result;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function manageRestaurantOwners(User_Model_RestOwnSearch $obj,$offset)
	{
		try{
			$limit = 20;
			$table  =$this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
				
			$stateTableMapper = new Application_Model_StatebdMapper();
			$stateTable       = $stateTableMapper->getDbTable();
			$stateTableSelect = $stateTable->select();
			$stateTableSelect->from($stateTable,array('id','code','description'))
			->where('status = ?',true);
	
			$cityTableMapper = new Application_Model_CitybdMapper();
			$cityTable       = $cityTableMapper->getDbTable();
			$cityTableSelect = $cityTable->select();
			$cityTableSelect->from($cityTable,array('id','code','description'))
			->where('status = ?',true);
	
			$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
				
			$select->from(array('usr'=>'rd.user'),array('usrid','usremail','usrregistered_date','usruser_status_id','usrusertype_id','usripaddress'))
			->joinLeft(array('res'=>'rd.restaurant_details'),'usr.usrid = res.resfk_user',array(''))
			->distinct()
			->join(array('own'=>'rd.restaurant_owner'),'own.rsofk_user = usr.usrid',array('rsofirst_name','rsolast_name','rsorestaurant_name','rsophone','rsostateid','rsocityid','rsodescription','rsoregionid','rsocantfind','rsoyourstate','rsoyourregion','rsoyourcity','rso_companyid'))
			->join(array('usrsts'=>'rd.userstatus_bd'),'usrsts.id = usr.usruser_status_id',array('code as statuscode','description as statusdesc'))
			//->joinLeft(array('state'=>$stateTableSelect),'state.id = own.rsostateid',array('description as state'))
			//->joinLeft(array('cty'=>$cityTableSelect),'cty.id = own.rsocityid',array('description as city'))
			->where('usr.usrusertype_id = ?',3);
				
			if($obj->getCompany()){
				$select->where('own.rso_companyid = ?',$obj->getCompany());
			}else if($userdata['Usertype'] == "ADU" && $userdata['companyid'] != 1){
				$select->where('own.rso_companyid = ?',$userdata['companyid']);
			}
			if($obj->getResName()){
				$select->where('res.resname Ilike ?','%'.trim($obj->getResName()).'%');
			}
			if($obj->getEmail()){
				$select->where('usr.usremail Ilike ?','%'.trim($obj->getEmail()).'%');
			}
			if($obj->getId()){
				$select->where('usr.usrid = ?',$obj->getId());
			}
			if($obj->getStatusId()){
				$select->where('usr.usruser_status_id = ?',$obj->getStatusId());
			}
			if($obj->getFirstname()){
				$select->where('own.rsofirst_name Ilike ?','%'.trim($obj->getFirstname()).'%');
			}
			if($obj->getLastname()){
				$select->where('own.rsolast_name Ilike ?','%'.trim($obj->getLastname()).'%');
			}
			if($obj->getStateid()){
				$select->where('own.rsostateid = ?',$obj->getStateid());
			}
			if($obj->getRegionid()){
				$select->where('own.rsoregionid = ?',$obj->getRegionid());
			}
			if($obj->getCityid()){
				$select->where('own.rsocityid = ?',$obj->getCityid());
			}
				
			$select->order('usr.usrregistered_date DESC');
	
			$result = $table->fetchAll($select);
			//print_r($result);die();
			$rowset = new Zend_Paginator(
					new Zend_Paginator_Adapter_DbTableSelect($select)
			);
				
			$rowset->setItemCountPerPage($limit);
			$rowset->setCurrentPageNumber($offset);
			return $rowset;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
		
	public function getUserStatusIdByCode($code)
	{
		try{
			$Mapper = new Application_Model_UserStatusDataMapper();
			$List = $Mapper->fetchAll();

			foreach($List as $status){
				if($code == $status->code){
					return $status;
				}
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}		
	} 
	
		
	public function UpdateRestaurantOwnerStatus($userid, $code)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$status = false;
			$UserStatus = $this->getUserStatusIdByCode($code);
			$set = array('usruser_status_id' => $UserStatus->id);
			$where = $db->quoteInto('usrid = ?',$userid);

			$rows_affected = $this->getDbTable()->update($set,$where);

			if($rows_affected > 0){
				$status = true;
			}
			return $status;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function EditRestaurantOwnerDetails(User_Model_Client $obj)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$status = false;
			$update = date('Y-m-d H:i:s');
			if($obj->getEmail()){
				$set = array('usremail' 	=> $obj->getEmail());
			}
			if($obj->getPassword()){
				$length = 8;
				$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
				$randomdata = "";
				for ($p = 0; $p < $length; $p++) {
					$randomdata .= $characters[mt_rand(0, strlen($characters))];
				}
				$passSha = sha1($obj->getPassword().$randomdata);
				$set = array('usrpassword' 	=> $passSha,'usrpassphrase' => $randomdata);
			}
	
			$set['usrupdateddatetime'] = $update;
			$where = $db->quoteInto('usrid = ?',$obj->getId());
	
			$rows_affected = $this->getDbTable()->update($set,$where);
	
			if($rows_affected > 0){
				$status = true;
			}
			return $status;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getNameandEmailByUserId($userid)
	{
		try{
			$table  =$this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			
			$select->from(array('usr'=>'rd.user'),array('usrid','usremail'))
				   ->join(array('own'=>'rd.restaurant_owner'),'own.rsofk_user = usr.usrid',array('rsofirst_name','rsolast_name'))
				   ->where('usr.usrid = ?',$userid);
			$result = $table->fetchRow($select);
		    return $result;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getUserPassPhrase($user)
	{
		try{
			$table = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			
			$select->from(array('usr'=>'rd.user'),array('usrid','usremail','usrpassphrase'))
				   ->where('usremail = ?',$user);
				   
			$row = $table->fetchRow($select);
			return $row;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function updateGuestEmailDetails($cusid,$email,$userid)
    {
        try
        {	
        	 date_default_timezone_set('Asia/Kolkata');
             $update = date('Y-m-d H:i:s');	
             $db= $this->getDbTable();
             $select= $db->select();
             $select->from(array('cus'=>'rd.customer'),array('cusfk_user'))
             			->setIntegrityCheck(false)
				   ->where('cusid = ?',$cusid);
             $usrid = $select->query()->fetchAll();
             $data = array('usremail'=>$email,'usrupdateddatetime'=> $update,'usrupdatedby'=>$userid);
             $where = array('usrid = ?'=>$usrid);		
			 $status = $this->getDbTable()->update($data,$where);
             return $status;

        }
               

        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

    public function updateGuestPassDetails($cusid,$password,$userid)
    {
        try
        {
             $db= $this->getDbTable();
             date_default_timezone_set('Asia/Kolkata');
             $update = date('Y-m-d H:i:s');
             $length = 8;
				$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
				$randomdata ="";
				for ($p = 0; $p < $length; $p++) {
					$randomdata .= $characters[mt_rand(0, strlen($characters))];
				}
				$passSha = sha1($password.$randomdata);
             $select= $db->select();
             $select->from(array('cus'=>'rd.customer'),array('cusfk_user'))
             			->setIntegrityCheck(false)
				   ->where('cusid = ?',$cusid);

             $usrid = $select->query()->fetchAll();
             $data = array('usrpassword'=>$passSha,'usrpassphrase' => $randomdata,'usrupdateddatetime'=> $update,'usrupdatedby'=>$userid);
             $where = array('usrid = ?'=>$usrid);		
			 $status = $this->getDbTable()->update($data,$where);
             return $status;
        }
               

        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

    public function getUserCount()
	{
		try
		{
			$db = $this->getDbTable();
			$number = count($db->fetchAll());
			return $number;
		}
		 catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
    
}