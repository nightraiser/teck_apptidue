<?php
class Administrator_Model_ContactUsDataMapper
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
			$this->setDbTable('Administrator_Model_DbTable_ContactUs');
		}
		return $this->_dbTable;
	}
	
	public function CreateContact(Administrator_Model_ContactUs $contactObj)
	{
		try{
			$data = array('contactname' 		=> $contactObj->getcontactname(),
		                  'restaurant_name'	    => $contactObj->getRestname(),
			              'address'	    		=> $contactObj->getaddress(),
			  			  'city'				=> $contactObj->getcity(),
		  				  'state'				=> $contactObj->getstate(),
			  			  'country'				=> $contactObj->getcountry(),
//		  				  'zip'         		=> $contactObj->getzip(),
		  				  'phone'				=> $contactObj->getphone(),
		  	  			  'email'				=> $contactObj->getemail(),
			  			  'fax'					=> $contactObj->getfax(),
			  			  'website'				=> $contactObj->getwebsite(),
			  			  'moreinformation' 	=> $contactObj->getmoreinformation(),
		  				  'contactby'			=> $contactObj->getcontactby(),
			  			  'comments'			=> $contactObj->getcomments(),
		  				  'postedon'			=> $contactObj->getpostedon(),
						  'status'				=> true,
						  'contacttype'			=> $contactObj->getcontacttype(),
				//		  'help_description'	=> $contactObj->getHelpInfo(),
						  'inquiryfield_id'	    => $contactObj->getHelpInfo(),
						  'restaurantid'		=> $contactObj->getRestId(),
						  'countrycode'			=> $contactObj->getCountryCode(),
						  'company_id'			=> $contactObj->getCompanyId(),
						  'ipaddress'			=> $_SERVER["REMOTE_ADDR"],
						  'enquiry_status_id'	=> '1' );
						  
			$table = $this->getDbTable();
			$id    = $table->insert($data);
			return $id;
			
		}catch (Exception $ex){
			
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function getAllCotactUsdeatils($offset,Administrator_Model_ContactUs $contSummary)
	{
		try{
			$limit = 10;
			$table = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			
			$select->from(array('cont'=>'rd.contactus'),array('id','contactname','address','email','phone','postedon','moreinformation','status','contacttype','city','enquiry_status_id','company_id','ipaddress'))
				   ->joinLeft(array('esbd'=>'rd.enquiry_status_bd'),'esbd.id = cont.enquiry_status_id',array('description'));
				  
			if($contSummary->getId()){
				$select->where('cont.id = ?',$contSummary->getId());
			}
			if($contSummary->getcontactname()){
				$select->where('cont.contactname Ilike  ?','%'.trim($contSummary->getcontactname()).'%');
			}
			if($contSummary->getStartDate()){
				$select->where('cont.postedon >=  ?',$contSummary->getStartDate());
			}
		   	if($contSummary->getEndDate()){
				$select->where('cont.postedon <=  ?',$contSummary->getEndDate());
			}
			if($contSummary->getStatus()){
				$select->where('cont.enquiry_status_id =  ?',$contSummary->getStatus());
			}else{
				$select->where('cont.enquiry_status_id !=  ?',6);
			}
//			else if($contSummary->getStatus() != ""){
//				$select->where('cont.status =  ?',$contSummary->getStatus());
//			}
			if($contSummary->getCompanyId() != 1){
				$select->where('cont.company_id =  ?',$contSummary->getCompanyId());
			}
			
			$select->where('contacttype != ?','resContact');											
			$select->order('cont.id Desc');
			
			
			//$rowset = $table->fetchAll($select);
			 $resultSet = new Zend_Paginator(
			new Zend_Paginator_Adapter_DbTableSelect($select)
			);
			$resultSet->setItemCountPerPage($limit);
			$resultSet->setCurrentPageNumber($offset);
			return $resultSet; 
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function CloseContactUsDeatils($id)
	{
			$status = false;
			$table  = $this->getDbTable();
			$set 	= array('enquiry_status_id'	=>	6);
			try{
				$where 	= array('id = ?' => $id);
				$rows_affected = $table->update($set,$where);
				if($rows_affected){
					$status = true;
				}
				return $status;
			}catch (Exception $ex){
				throw new Exception($ex->getMessage()) ;
			}
	}
	
	public function ReterieveContactInfo($contactid)
	{
		try{
			$table = $this->getDbTable();
			$select = $table->select();
		
			$select->from($table,array('contactname','comments'))
			   	   ->where('id = ?',$contactid);

			$row = $table->fetchRow($select);
			return $row;
		}catch (Exception $ex){
				throw new Exception($ex->getMessage()) ;
		}
			   
	}
	
	public function GetContactUsDeatils($id)
	{
		try{
			$table = $this->getDbTable();
			$select = $table->select();
			$select->from($table,array('contactname','address','restaurant_name','city','state','country','zip','email','phone','fax','website','moreinformation','contactby','comments'));
			$select->where('id = ?',$id);

			$rowset = $table->fetchRow($select);
			if($rowset){
				$resultarr = array('Name' 			=> $rowset->contactname,
			  				  'Address'	    		=> $rowset->address.','.$rowset->city.','.$rowset->state.','.$rowset->country.','.$rowset->zip,
				  			  'Phone'				=> $rowset->phone,
			  	  			  'Email'				=> $rowset->email,
				  			  'Fax'					=> $rowset->fax,
				  			  'Website'				=> $rowset->website,
			  				  'Please contact by'	=> $rowset->contactby,
				  			  'Restaurant Name'		=> $rowset->restaurant_name,
				              'Your Comments'	=> $rowset->comments,
							);
			}	
			return $resultarr;
			
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetContactUsDeatilsForOwner($id,$restid)
	{
		try{
			$table = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			$select->from(array('cont'=>'rd.contactus'),array('contactname','address','help_description','restaurant_name','city','state','country','zip','email','phone','fax','website','moreinformation','contactby','comments','restaurantid','countrycode'))
					->join(array('res'=>'rd.restaurant'),'res.resid = '.$restid,array('resrestaurant_name'))
					->join(array('inq' => 'rd.inquiryfields_bd'),'inq.id = cont.inquiryfield_id',array('description'));
				  
			$select->where('cont.id = ?',$id);

			$rowset = $table->fetchRow($select);
			if($rowset){
				$resultarr = array('Name' 			=> $rowset->contactname,
			  				  'Address'	    		=> $rowset->address.','.$rowset->city.','.$rowset->state.','.$rowset->country.','.$rowset->zip,
				  			  'Phone'				=> $rowset->countrycode.$rowset->phone,
			  	  			  'Email'				=> $rowset->email,
				  			  'Fax'					=> $rowset->fax,
				  			  'Website'				=> $rowset->website,
			  				  'Please contact by'	=> $rowset->contactby,
				  			  'Restaurant Name'		=> $rowset->resrestaurant_name,
				              'Your Comments'		=> $rowset->comments,
							  'Inquiry Description' => $rowset->description,
							);
			}	
			return $resultarr;
			
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getContactUsDeatilsByRestId($offset,$restid)
	{
		try{
			$limit = 10;
			$table = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			
			$select->from(array('cont'=>'rd.contactus'),array('id','contactname','address','email','phone','postedon','moreinformation','status','contacttype','help_description','city','enquiry_status_id','countrycode'))
				   ->joinLeft(array('esbd'=>'rd.enquiry_status_bd'),'esbd.id = cont.enquiry_status_id',array('description'))
				   ->joinLeft(array('inq'=>'rd.inquiryfields_bd'),'inq.id = cont.inquiryfield_id',array('description as fieldesc'));
			$select->where('restaurantid = ?',$restid);	
			$select->where('contacttype = ?','resContact');							
			$select->order('cont.id Desc');  
			$resultSet = new Zend_Paginator(
			new Zend_Paginator_Adapter_DbTableSelect($select)
			);
			$resultSet->setItemCountPerPage($limit);
			$resultSet->setCurrentPageNumber($offset);
			return $resultSet; 
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}
