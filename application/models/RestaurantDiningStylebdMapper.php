<?php
/**
*	Name			: RestaurantDiningStylebdMapper.php
*	Author			: eshwar
*	Creation Date	: 9/3/2015
*	Path 			: application/models/RestaurantDiningStylebdMapper.php
*	Description		: This is the mapper  for fetching restaurant dining style.
*					   	
*/
class Application_Model_RestaurantDiningStylebdMapper
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
				$this->setDbTable('Application_Model_DbTable_RestaurantStylebd');
			 }
			 return $this->_dbTable;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}	 
	}

	public function verifyCode($code,$id)
	{
	try{	
			$select = $this->getDbTable()->select();
			$select->from('rd.restaurant_dining_style_bd',array('COUNT(id) as count'))
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

	public function getAllDining()
	{
	
		try{
				$restaurantDiningdata = array();
					$select = $this->getDbTable()->select()
												->order('description ASC');
					$records = $this->getDbTable()->fetchAll($select);			
					foreach($records as $record){
						$restaurantDiningdata[] = new Application_Model_RestaurantDiningStylebd($record->toArray());	
					}
				return $restaurantDiningdata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}

	}

	public function addDining($data)
	{
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

	public function updateDine($data)
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

	public function getDinningStyle()
	{	
       try
       {

			$db = $this->getDbTable();
			$select = $db->select()
						->where('status = ?',true);
			$data = $db->fetchAll($select);
			$cusinesNames = Array();
	                $cusinesNames[0] =  array('value'=>'Select Dining','key'=>'');
			foreach ($data as $row ) {
			$cusinesNames [] = array('key'=>$row['description'],'value'=>$row['description']);
		}
			 return $cusinesNames;
       }
       catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}

	}
}
