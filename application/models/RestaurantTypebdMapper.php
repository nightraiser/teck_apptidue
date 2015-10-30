<?php
/**
*     Name              : RestaurantTypebdMapper.php
*     Author                  : eshwar
*     Creation Date     : 9/2/2015
*     Path              : application/models/RestaurantTypebdMapper.php
*     Description       : This is model class to fetch RestaurantType.
*                                   
*/
class Application_Model_RestaurantTypebdMapper
{
	protected $_dbTable;

	public function setDbTable($dbTable)
	{
		try
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
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	public function getDbTable()
	{
		try
		{
			if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_RestaurantTypebd');
			}
			return $this->_dbTable;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
	
	public function fetchAll()
	{
	
		try{
		//	$cache = new Rdine_Helper_CacheManager();
				$restaurantTypedata = array();
				//if(!$restaurantTypedata = $cache->Fetch('ddrestauranttypedata')){
					$where = array('status = ?'=> true);
					$records = $this->getDbTable()->fetchAll($where);
								
					foreach($records as $record){
						$restaurantTypedata[] = new Application_Model_RestaurantTypebd(						
							$record->toArray());	
					}
					//$cache->Save($restaurantTypedata,'ddrestauranttypedata');			
				//}else{
					//$restaurantTypedata = $cache->Fetch('ddrestauranttypedata');
				//}
				
				//$cache = null;
				return $restaurantTypedata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	public function getAllCusines()
	{
	
		try{
				$restaurantTypedata = array();
					$select = $this->getDbTable()->select()
												->order('description ASC');
					$records = $this->getDbTable()->fetchAll($select);			
					foreach($records as $record){
						$restaurantTypedata[] = new Application_Model_RestaurantTypebd(						
							$record->toArray());	
					}
					//$cache->Save($restaurantTypedata,'ddrestauranttypedata');			
				//}else{
					//$restaurantTypedata = $cache->Fetch('ddrestauranttypedata');
				//}
				
				//$cache = null;
				return $restaurantTypedata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	public function getCusines()
	{
		try	{
				$select = $this->getDbTable()->select()
	    					->where('status = ?', true)
							->order('description ASC');
				$records = $this->getDbTable()->fetchAll($select);
				$cuisinedata= array();
				$cuisinedata [0] =  array('value'=>'Select Cusine','key'=>'');		
				foreach($records as $record)
				{
					$cuisinedata[] = array('key'=>$record['id'],'value'=>$record['description']);	
				}
				return $cuisinedata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
	/**
	 *Verfiy Cusine type by dESC
	 */
	public function verifyDesc($desc,$id)
	{
		try{
			$select = $this->getDbTable()->select();
			$select->from('rd.neighborhood_bd',array('COUNT(id) as count'))
			->where('description ILIKE ?',$desc);
				
			if($id != 0){
				$select->where('city_id = ?',$id);
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
	/**
	*Verify cusine type by code
	**/
	public function verifyCode($code,$id)
	{
		try {
			$select = $this->getDbTable()->select();
			$select->from('rd.restaurant_type_bd',array('COUNT(id) as count'))
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
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
	
	public function getCusinesFilter()
	{
		try{
				$select = $this->getDbTable()->select()
	    					->where('status = ?', true)
							->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$cuisinedata= array();
			$cuisinedata [0] =  array('value'=>'Select Cusine','key'=>'');		
			foreach($records as $record)
			{
				$cuisinedata[] = array('key'=>$record['description'],'value'=>$record['description']);	
			}
			return $cuisinedata;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	public function addCusine($data)
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

	public function updateCusine($data)
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
}

