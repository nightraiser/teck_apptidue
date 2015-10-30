<?php

/**
*	Name			: StatusbdMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/StatusbdMapper.php
*	Description		: This is the mapper  for fetching status.
*					   	
*/
class Application_Model_StatusbdMapper
{

	protected $_dbTable;

	public function setDbTable($dbTable)
	{
		try{
			if (is_string($dbTable))
			 {
				$dbTable = new $dbTable();
			 }
			if (!$dbTable instanceof Zend_Db_Table_Abstract)
			 {
				throw new Exception('Invalid table data gateway provided');
			 }
			$this->_dbTable = $dbTable;
			return $this;
		  } 
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getDbTable()
	{
		try
		{
			if (null === $this->_dbTable) 
			{
				$this->setDbTable('Application_Model_DbTable_Statusbd');
			}
			return $this->_dbTable;
			
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function fetchAll()
	{
		try
		{
			$cache = new Rdine_Helper_CacheManager();
			$statusdata = Array();
			if(!$statusdata = $cache->Fetch('ddstatusdata'))
			{
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);				
				foreach($records as $record)
				{
					$statusdata[] = new Application_Model_Statusbd(						
					$record->toArray());	
				}
				$cache->Save($statusdata,'ddstatusdata');			
			}
			else
			{
				$statusdata = $cache->Fetch('ddstatusdata');
			}
		
		$cache = null;
		return $statusdata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}

