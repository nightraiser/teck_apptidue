<?php
/**
*	Name			: RestauratTagsMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/RestauratTagsMapper.php
*	Description		: This is the mapper  for fetching restaurant features.
*					   	
*/
class Application_Model_RestaurantTagsbdMapper
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
				$this->setDbTable('Application_Model_DbTable_RestaurantTagsbd');
			 }
			 return $this->_dbTable;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}	 
	}
	/*
	public function fetchAll()
	{
		try
		{
			$cache = new Rdine_Helper_CacheManager();
			$restaurantTagsdata = array();
			if(!$restaurantTagsdata = $cache->Fetch('ddrestauranttagsdata'))
			{
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);			
				foreach($records as $record)
				{
					$restaurantTagsdata[] = new Application_Model_RestaurantTagsbd($record->toArray());	
				}
				$cache->Save($restaurantTagsdata,'ddrestauranttagsdata');			
			}
			else
			{
				$restaurantTagsdata = $cache->Fetch('ddrestauranttagsdata');
			}			
			$cache = null;
			return $restaurantTagsdata;
		}

	}*/
	public function verifyCode($code,$id)
	{
	try{		
		$select = $this->getDbTable()->select();
		$select->from('rd.restaurant_tags_bd',array('COUNT(id) as count'))
		->where('code ILIKE ?',$code);
		if($id != 0){
			$select->where('id <> ?',$id);
		}
		$rowset = $this->getDbTable()->fetchAll($select);
		$count = 0;

		foreach($rowset as $row){
			$count = $row->count;
		}
		if($count == 0){
			return true;
		}else{
			return false;
		}
	}
	catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function addTags($data)
	{
		//return $data;
		try
		{
			$data['status'] = true;
		 	return $this->getDbTable()->insert($data);	
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
		
	}

	public function updateTag($data)
	{
		try
		{
			$where['id = ?'] = $data['id'];
		 	return $this->getDbTable()->update($data,$where);	
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
		
	}

	public function getAllTags()
	{
		try{
				$restaurantTagsdata = Array();
					$select = $this->getDbTable()->select()
												->order('description ASC');
					$records = $this->getDbTable()->fetchAll($select);			
					foreach($records as $record){
						$restaurantTagsdata[] = new Application_Model_RestaurantTagsbd($record->toArray());	
					}
				return $restaurantTagsdata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
}