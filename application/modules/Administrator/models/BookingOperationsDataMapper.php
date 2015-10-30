<?php

class Administrator_Model_BookingOperationsDataMapper
{
	/**
	 * Instance variable of bookingcount table
	 * @var object
	 */
	protected $_dbTable;
	
	/**
     * @param instance of DbTable bookingcount $dbTable
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
     * @return instance of DbTable bookingcount
     */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Administrator_Model_DbTable_BookingOperations');
		}
		return $this->_dbTable;
	}
	
	public function saveBookingOperations($request)
	{	
		try{
			$bokid = $request->bookid;
			$resid = $request->resid;
			$operation = $request->operation;
			$timezone = "";
			
			//$mapper = new FirmManagement_Model_FirmDataMapper();
			//$timezone = $mapper->GetRestaurantTimeZone($resid);
			//date_default_timezone_set($timezone);
			$date = date('Y-m-d');
			$time = date("H:i:s",time());
			$table = $this->getDbTable();
			$select = $table->select();
			$select->from(array('rd.booking_operations'),array('count(bioid) as count'))
				   ->where('biobokid = ?',$bokid);
		   $result = $table->fetchRow($select);
		   if($result->count){
				$set = array('operations'	=> $operation,
							 'bioupdated_datetime' =>$date .' '. $time);				
		   		$where = array('biobokid = ?' 	=> $bokid);
		   		$row = $table->update($set,$where);
		   }else{
		   		$data = array('bioresid' =>	$resid,
		   					  'biobokid' => $bokid,
		   					  'biocreated_datetime' => $date .' '. $time,
		   				   	  'operations' => 	$operation
		   		);		   		
		   		$row = $table->insert($data);
		   }
		   return $row;
		   
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}	
	}  
}