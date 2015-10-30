<?php

class User_Model_ManagerDataMapper
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
		$this->setDbTable('User_Model_DbTable_Manager');
		}
		return $this->_dbTable;
	}

	public function save(User_Model_Manager $restaurantowner,$source = 'DD')
	{
			$db = Zend_Db_Table::getDefaultAdapter();
			$userMapper = new User_Model_ClientDataMapper();
			
			try{
				$db->beginTransaction();
				
				$userId = $userMapper->save($restaurantowner);
				
				$restaurantowner->setUserid($userId);
			
				$data = array(
					'rsofirst_name'    		=> 	$restaurantowner->getFirstName(),
					'rsolast_name'			=>  $restaurantowner->getLastName(),
					'rsofk_user' 			=>	$restaurantowner->getUserid(),
					'rsorestaurant_name'	=> 	$restaurantowner->getRestaurantname(),
					'rsodescription'		=>	$restaurantowner->getDescription(),
					'rsowebsite'			=>	$restaurantowner->getWebsite(),
					'rsocantfind'			=> 	$restaurantowner->getCantFind(),
					'rsocity'				=>  $restaurantowner->getcity(),
					'rsozipcode'            =>  $restaurantowner->getzipCode(),
				);
				if($restaurantowner->getPhonenumber()){
					$data['rsophone'] = $restaurantowner->getPhonenumber();  	
				}
				if($restaurantowner->getCountryCode()){
					$data['rsocountrycode'] = $restaurantowner->getCountryCode();  	
				}
				if($restaurantowner->getDateofbirth()){
					$data['rsodob'] = $restaurantowner->getDateofbirth();  	
				}
				if($restaurantowner->getCantFind() == 1)
				{
						$data['rsostateid']			=	$restaurantowner->getStateid();
						$data['rsoregionid']		=	$restaurantowner->getRegionid();
						$data['rsoyourcity']		=	$restaurantowner->getCantFindCity();			
				
				}else if($restaurantowner->getCantFind() == 2){
					
						$data['rsostateid']			=	$restaurantowner->getStateid();
						$data['rsoyourregion']		=	$restaurantowner->getCantFindRegion();
						$data['rsoyourcity']		=	$restaurantowner->getCantFindCity();
										
				}else if($restaurantowner->getCantFind() == 3){
					
						$data['rsoyourstate']		=	$restaurantowner->getCantFindState();
						$data['rsoyourregion']		=	$restaurantowner->getCantFindRegion();
						$data['rsoyourcity']		=	$restaurantowner->getCantFindCity();
										
				}else if($restaurantowner->getCantFind() == 0 || $restaurantowner->getCantFind() == ''){
						$data['rsostateid']			=	$restaurantowner->getStateid();
						$data['rsocityid']			=	$restaurantowner->getCityid();
						$data['rsoregionid']		=	$restaurantowner->getRegionid();
				}
		
				if($restaurantowner->getSourceid()){
					$data['rsosourceid'] = $restaurantowner->getSourceid();
					if($restaurantowner->getSourcedescription()){
					$data['rsosourcedescription'] = $restaurantowner->getSourcedescription();
					}
				}
				if($restaurantowner->getCompanyid()){
					$data['rso_companyid'] = $restaurantowner->getCompanyid();
				}
				$res_own_id = $this->getDbTable()->insert($data);
				$db->commit();
				if($source == 'DD'){
					return $userId;	
				}else{
					$query = $this->getDbTable()->select();
					$query->setIntegrityCheck(false);
					$query->from(array('usr' => 'rd.user'),array('usrid','usremail','usrpassword','usrusertype_id','usrrole_id','usrregistered_date','usrlastlogged_in_ip','usrlast_login_date','usruser_status_id','usrcreatedby','usrcreateddatetime','usrupdatedby','usrupdateddatetime','usrpassphrase','usripaddress'))
							->where('usrid = ?',$userId);
					return $this->getDbTable()->fetchRow($query);
				}
			}catch(Exception $ex){
				
				$db->rollBack();	
				throw new Exception($ex->getMessage()) ;
			}
	}


	public function fetchAll()
	{
		try{
			$ownerNames = array();	
			$table     = $this->getDbTable();
			$select    = $table->select();
			
			$storage = new Zend_Auth_Storage_Session();
			$data = $storage->read();
			$companyid = $data['companyid'];
				
			$select->where('rso_companyid = ?', $companyid);
			$owners = $this->getDbTable()->fetchAll($select);
						
			$ownerNames[] = array('key'=>'','value'=>'Select Owner');				
			foreach($owners as $own){
				$ownerNames[] = array('key'=>$own->rsofk_user,'value'=>$own->rsofirst_name.' '.$own->rsolast_name);
			}
			return $ownerNames;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getrestaurantownerdetailsbyUserid($userid)
	{
		try{
				$table  = $this->getDbTable();
				$select = $table->select();
				$select->setIntegrityCheck(false);
				$select->from(array('rso' => 'rd.restaurant_owner'), array('rsofk_user','rsorestaurant_name as restaurant_name','rsofirst_name as first_name','rsolast_name as last_name','rsophone as phone','rsodescription as owndescription','rsosourceid as sourceid','rsosourcedescription as sourcedescription','rsowebsite as website','rsostateid as stateid','rsocityid as cityid','rsoregionid as regionid','rsocantfind','rsoyourstate','rsoyourregion','rsoyourcity'))
						->joinLeft(array('srbd'=>'rd.source_of_restaurant_bd'),'srbd.id=rso.rsosourceid',array('srbd.description as description'))
						->joinLeft(array('usr'=>'rd.user'),'usr.usrid=rso.rsofk_user',array('usremail as email','usrpassword as password'))
						->joinLeft(array('st'=>'rd.country_bd'),'st.id=rso.rsostateid',array('st.description as statename'))
						->joinLeft(array('cty'=>'rd.city_bd'),'cty.id=rso.rsocityid',array('cty.description as cityname'))
						->joinLeft(array('rgn'=>'rd.state_bd'),'rgn.id=rso.rsoregionid',array('rgn.description as regionname'))
						->where('rso.rsofk_user = ?',$userid);
				
				$records = $table->fetchAll($select);
				$resowner	=	array();
				$RestPrf	=	array();
				
				foreach($records as $value)
				{
					$id = $value->sourceid;
					$description=$value->sourcedescription;
					$emailaddress=$value->email;
					$password=$value->password;
					$result=array('First Name'=>$value->first_name,'Last Name'=>$value->last_name,'Restaurant Name / Group Name'=>$value->restaurant_name,'Email Address'=>$value->email,'Phone'=>$value->phone,'State'=>$value->statename,'Region'=>$value->regionname,'City'=>$value->cityname,'Description'=>$value->owndescription,'Website'=>$value->website,'id'=>$id,'description'=>$description,'NewState'=>$value->rsoyourstate,'NewRegion'=>$value->rsoyourregion,'NewCity'=>$value->rsoyourcity,'cantfind'=>$value->rsocantfind,'stateid'=>$value->stateid,'regionid'=>$value->regionid,'cityid'=>$value->cityid);
					if($value->website==null){
					$result['Website']='';
					}
					
				}
			
						
				$sourceofrestaurantMapper  = new Application_Model_SourceofRestaurantDataMapper();
			    $sources = $sourceofrestaurantMapper->fetchAll();
			    $sourceList[] = array('key'=>'','value'=>'Select Source');   	   
			    foreach($sources as $source){
			    $sourceList[] = array('key'=>$source->getId(),'value'=>$source->getDescription());
				}
				
				if($id==null)
				$RestPrf=array('resowner'=>$result,'sourcelist'=>$sourceList);
				else
				$RestPrf=array('resowner'=>$result,'sourcelist'=>$sourceList,'id'=>$id,'description'=>$description,);
								
			return $RestPrf;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function EditSourceofRestaurant(User_Model_Manager $obj)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$status = false;
			if($obj->getSourceid())
			{
				$set = array('rsosourceid' 	=> $obj->getSourceid(),
						'rsosourcedescription' 	=> $obj->getSourcedescription()
				);
				$where = $db->quoteInto('rsofk_user = ?',$obj->getId());
				$rows_affected = $this->getDbTable()->update($set,$where);
			}
			else{
				$set = array('rsosourceid' 	=> null,
						'rsosourcedescription' 	=> null
				);
				$where = $db->quoteInto('rsofk_user = ?',$obj->getId());
				$rows_affected = $this->getDbTable()->update($set,$where);
			}
	
			if($rows_affected > 0){
				$status = true;
			}
			return $status;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
}

