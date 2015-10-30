<?php
/**
*	Name			: StatebdMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/StatebdMapper.php
*	Description		: This is the mapper  for fetching states.
*					   	
*/
class Application_Model_StatebdMapper
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
				$this->setDbTable('Application_Model_DbTable_Statebd');
			 }
			return $this->_dbTable;
		}
	catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function fetchAll()
	{
		try
		{
			$cache = new Rdine_Helper_CacheManager();
			$statedata = array();
			if(!$statedata = $cache->Fetch('ddstatedata'))
			{
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);				
				foreach($records as $record)
				{
					$statedata[] = new Application_Model_Statebd($record->toArray());	
				}
				$cache->Save($statedata,'ddstatedata');			
			}else
			{
				$statedata = $cache->Fetch('ddstatedata');
			}
			$cache = null;
			return $statedata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getStates($country_id)
	{
		try
		{
			$select = $this->getDbTable()->select()
							->where('country_id=?',$country_id)
	    					->where('status = ?', true)
							->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$statedata=Array();
			$statedata [0] =  array('value'=>'','key'=>'Select State');		
			foreach($records as $record)
			{
				$statedata[] = array('key'=>$record['description'],'value'=>$record['id']);	
			}
			return $statedata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}

