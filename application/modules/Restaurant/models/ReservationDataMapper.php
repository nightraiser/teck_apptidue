<?php
/**
*	Name			: ReservationDataMapper.php
*	Author			: snehal
*	Creation Date	: 9/30/2010
*	Path 			: application/modules/Reservation/models/ReservationDataMapper.php
*	Description		: This is the datamapper class for the booking table.
*					   	
*/
class Restaurant_Model_ReservationDataMapper
{
	/**
	 * Instance variable of the booking table
	 * @var object
	 */
	protected $_dbTable;

	/**
     * @param instance of DbTable booking $dbTable
     * @return self
     */
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

	/**
     * @return instance of DbTable booking
     */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Restaurant_Model_DbTable_Reservation');
		}
		return $this->_dbTable;
	}

	/**
	 * retreives the booking history of the customer for  mobile and desktop versions
	 */
/*	public function getCustBookingHistory(Restaurant_Model_CustBookHist $bookhist,$offset)
	{
		try{
			$limit = 4;
			$table  = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);

			$select->from(array('book'=>'mt.booking'),array('bokid','bokfirst_name','boklast_name','bokbooking_date','bokbooking_timings','bokbooking_phrase','bokparty_size','bokbooking_status_id','bokbooked_status','bokbooking_made_on','bokbooking_made_time'));
			$select->join(array('rest'=>'mt.restaurant'),'rest.resid = book.bokfk_restaurant',array('resrestaurant_name'));
			$select->join(array('bokbd'=>'mt.booking_status_bd'),'bokbd.id = book.bokbooking_status_id',array('code as bokstatuscode','description as bookingStatus'));
			$select->join(array('boktyp'=>'mt.booking_type_bd'),'book.bokbooking_type_id = boktyp.id',array('code as boktypecode','description as boktypedesc'));

			if($bookhist->getBookingId()){
				$select->where('book.bokid = ?',$bookhist->getBookingId());
			}
			if($bookhist->getStartDate() && $bookhist->getEndDate()){
				$select->where('book.bokbooking_date >= ?',$bookhist->getStartDate());
				$select->where('book.bokbooking_date <= ?',$bookhist->getEndDate());
			}else if($bookhist->getStartDate()){
				$select->where('book.bokbooking_date = ?',$bookhist->getStartDate());
			}else{
				$select->where('book.bokbooking_date >= ?',date('Y-m-d'));
			}
			if($bookhist->getRestName()){
				$select->where('rest.resrestaurant_name ilike ?','%'.trim($bookhist->getRestName()).'%');
			}
			
			$user = $bookhist->getUserId();
			$emai = $bookhist->getEmail();
			$select->where("book.bokuserid = $user or book.bokemail = '$emai'");
			$select->where('book.bokuserid = ?',$bookhist->getUserId());
			
			if($bookhist->getPatronName()){
				$s = "book.bokfirst_name||' '||book.boklast_name";
				$select->where($s.' ILIKE(?)','%'.$bookhist->getPatronName().'%');
			}
			
			if($bookhist->getSorting()){
				$explode = explode(',',$bookhist->getSorting());
				if(isset($explode[1])){
					$sorton = array($explode[0],$explode[1]);
				}else if($explode[0]){
					$sorton = array($explode[0]);
				}else{
					$sorton = array('book.bokbooking_date DESC','book.bokid DESC');
				}
			}else{
				 $sorton = array('book.bokbooking_date DESC','book.bokid DESC');
			}
			$select->order($sorton);
			
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
	
*/

	/**
	 * @param instance of booking details
	 * function to save the datails of the reservation 
	 */
	public function saveBookingDetails($bookdetails)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();

			
			$guestid = '';
			$db->beginTransaction();
		//	$restservice = new Application_Service_Firm();
		//	if($formdata){
		//		$guestid = $restservice->AddCustomerContact($formdata,'');
		//	}
			$table = $this->getDbTable();
			$data = array(
			  'bokfk_restaurant' 	   		=> $bookdetails->restaurantid, 
			  'bokemail'		 	   		=> $bookdetails->email,
			  'bokfirst_name' 		   		=> $bookdetails->fname,
			  'boklast_name' 		   		=> $bookdetails->lname,
			  'bokparty_size' 		   		=> $bookdetails->partysize,
			  'bokphone' 			   		=> $bookdetails->phone,
			 // 'bokrestaurant_note'         	=> $bookdetails->splrequest,
		      'bokbooking_date'		   		=> $bookdetails->date
			);
			if($bookdetails->bokid){	
				$data['bokbooking_phrase'] = $bookdetails->bokid;
			}
			if($bookdetails->time){
				$data['bokbooking_timings'] = $bookdetails->time;
			}
			
				$result = $this->getDbTable()->insert($data);
				//$bookdetails->setbokid($result); 
				
			
			$db->commit();
			return $result;


		}catch (Exception $ex){
			$db->rollBack();
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function fetchBookingDetails($conditonArray)
	{
		try {
			$db = $this->getDbTable();
			$data = array();
			$select = $db->select();
			$select->setIntegrityCheck(false);
				$select->from(array('book'=>'rd.booking'),array('book.bokid','book.bokfirst_name','book.boklast_name','book.bokfk_restaurant','book.bokemail','book.bokphone','book.bokbooked_status','book.bokbooking_phrase','book.bokresv_confirm_status'))
				->joinLeft(array('resdata'=>'rd.restaurant_details'),'resdata.resid=book.bokfk_restaurant',array('resdata.resname as resname'))
				->joinleft(array('bio'=>'rd.booking_operations'),'bio.biobokid = book.bokid',array('operations'))
				 ->order('bokid DESC');	
                 if(sizeof($conditonArray)>0)
                            {
                                foreach ($conditonArray as $key => $value) 
                                {
                                    if(strlen($value)>0)
                                    {
                                        if($key=="bokid")
                                        {
                                            $select->where("$key = ?",$value);
                                        }
                                        if($key=="bokemail")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        if($key=="bokfirst_name")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        if($key=="boklast_name")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        if($key=="bokphone")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        if($key=="bokresv_confirm_status")
                                        {
                                            $select->where("$key = ?",$value);
                                        }
                                        if($key=="resname")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        if($key=="bokbooking_phrase")
                                        {
                                        	if($value=="dinedesk")
                                        	{
                                            $select->where("$key ILIKE ?",'_____');
                                        	}
                                        	else
                                        	{
                                        	$select->where("$key IS NULL");	
                                        	}
                                        }
                                    }

                                }
                            }
                            
                            $bookingData = $select->query()->fetchAll();            	
                          
                			
                 foreach ($bookingData as $value)
                                     {
                                       $data[$value['bokid']] = array(
                                       					'bokid'		=> $value['bokid'],
                                       					'name'		=> $value['bokfirst_name'].' '.$value['boklast_name'],
                                       					'email'		=> $value['bokemail'],
                                       					'phone'		=> $value['bokphone'],
                                       					'bokfk_restaurant'=> $value['bokfk_restaurant'],
                                       					'booking_phrase'=>$value['bokbooking_phrase'],
                                       					'bokresv_confirm_status'=>$value['bokresv_confirm_status'],
                                       					'resname'=>$value['resname'],
                                       					'operations'=>$value['operations']
                                       	);
                                     } 

			return $data;	
		} catch (Exception $ex) {
		throw new Exception($ex->getMessage());	
		}
	}
	public function getBookingStatus($bookid,$status)
	{
		try {
			$db = $this->getDbTable();
			$currstatus = $status;
			$changestatus;
			if($currstatus)
			{
				$changestatus = 'false';
			}
			else{
				$changestatus = 'true';
			}
			 $result = array(
                'bokresv_confirm_status'=>$changestatus                
                );
        $where = array();
        $where[] = "bokid = ".$bookid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;

		} catch (Exception $ex) {
			throw new Exception($ex->getMessage());	
		}
	}
}