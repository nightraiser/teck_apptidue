<?php
/**
*	Name			: UsertypeDataMapper.php
*	Author			: naresh 
*	Creation Date	: 9/30/2010
*	Path 			: application/models/UsertypeDataMapper.php
*	Description		: This is the DataMapper class for the user type basedata table.
*					   	
*/
class Application_Model_UsertypeDataMapper
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
			$this->setDbTable('Application_Model_DbTable_Usertype');
		}
		return $this->_dbTable;
	}
	
	
	public function getUsertypeBD()
	{
		try{
		//$cache = new Rdine_Helper_CacheManager();
		$usertype = array();
	//	if(!$usertype = $cache->Fetch('usertype_bd')){
			$where = array('status = ?'=> true);
			$records = $this->getDbTable()->fetchAll($where);
			foreach($records as $record){
				$usertype[] = new Application_Model_Usertype(						
					$record->toArray());	
			}
			//$cache->Save($usertype,'usertype_bd');			
	//	}else{
			//$usertype = $cache->Fetch('usertype_bd');
		//}
		
		$cache = null;
		return $usertype;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetUserTypeByCode(array $code)
	{
		try{
		$userTypeList = $this->getUsertypeBD();
		$arrayCount = count($code);
		$count = 0;
		$result = array();
		foreach($userTypeList as $key=>$value){
			if(in_array($value->getcode(),$code)){
				$result[$value->getcode()] = $value; 
				$count++;
				if($count == $arrayCount){
					break;
				}				
			}			
		}

		return $result;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

}

