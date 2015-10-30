<?php
/**
*	Name			: UserStatusDataMapper.php
*	Author			: naresh 
*	Creation Date	: 9/30/2010
*	Path 			: application/models/UserStatusDataMapper.php
*	Description		: This is the DataMapper class for the user status basedata table.
*					   	
*/
class Application_Model_UserStatusDataMapper
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
			$this->setDbTable('Application_Model_DbTable_UserStatus');
		}
		return $this->_dbTable;
	}
	
	public function fetchAll()
	{
		try{
			$cache = new Rdine_Helper_CacheManager();
			$userstatus = array();
			if(!$userstatus = $cache->Fetch('userstatus')){
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);
							
				foreach($records as $record){
					$userstatus[] = new Application_Model_UserStatus(						
						$record->toArray());	
				}
				$cache->Save($userstatus,'userstatus');			
			}else{
				$userstatus = $cache->Fetch('userstatus');
			}
			
			$cache = null;
			return $userstatus;
		    }
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

}