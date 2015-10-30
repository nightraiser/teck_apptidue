<?php
/**
*	Name			: NeighborhoodbdMaper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/NeighborhoodbdMaper.php
*	Description		: This is the mapper  for fetching Neighborhood.
*					   	
*/
class Application_Model_NeighborhoodbdMapper
{
	protected $_dbTable;

	public function setDbTable($dbTable)
	{
		try
			{
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
				$this->setDbTable('Application_Model_DbTable_Neighborhoodbd');
			 }
			return $this->_dbTable;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function fetchAll()
	{
		try{
			$cache = new Rdine_Helper_CacheManager();
				$neighborhooddata = array();
				if(!$neighborhooddata = $cache->Fetch('ddneighborhooddata')){
					$where = array('status = ?'=> true);
					$records = $this->getDbTable()->fetchAll($where);
								
					foreach($records as $record){
						$neighborhooddata[] = new Application_Model_Neighborhoodbd(						
							$record->toArray());	
					}
					$cache->Save($neighborhooddata,'ddneighborhooddata');			
				}else{
					$neighborhooddata = $cache->Fetch('ddneighborhooddata');
				}
				
				$cache = null;
				return $neighborhooddata;
			}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

}

