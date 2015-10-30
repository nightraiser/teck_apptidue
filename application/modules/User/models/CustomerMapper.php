<?php

class User_Model_CustomerMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
	{
		try{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	
	
	public function getDbTable()
	{
		try{
		if (null === $this->_dbTable) {
			$this->setDbTable('User_Model_DbTable_Customer');
		}
		return $this->_dbTable;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getcusdata($id)
	{ 
		try{
		$db = $this->getDbTable();
	    		 $resreviewdata = array();
             $select = $db->select()
              				->from(array('c' => 'rd.customer'),
               			     array('c.cusfirst_name'))
                            ->where('cusfk_user = ?',$id);
              $cusdata = $select->query()->fetchAll();
              return $cusdata;
          }
          catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
}