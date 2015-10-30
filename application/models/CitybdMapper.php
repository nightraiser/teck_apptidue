<?php
/**
*     Name              : CitybdMapper.php
*     Author                  : eshwar
*     Creation Date     : 9/2/2015
*     Path              : application/models/CitybdMapper.php
*     Description       : This is the mapper class to fetch cities.
*                                   
*/
class Application_Model_CitybdMapper
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
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}

	public function getDbTable()
	{
		try{
      		if (null === $this->_dbTable)
                  {
      			$this->setDbTable('Application_Model_DbTable_Citybd');
      		}
      		return $this->_dbTable;
		   }
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
		return $this->_dbTable;
	}
	
	public function fetchAll()
	{
		try{
      		//$cache = new Rdine_Helper_CacheManager();
      		$citydata = array();
      		//if(!$citydata = $cache->Fetch('ddcitydata'))
                        {
            			$where = array('status = ?'=> true);
            			$records = $this->getDbTable()->fetchAll($where);						
            			foreach($records as $record)
                              {
            				$citydata[] = new Application_Model_Citybd($record->toArray());	
            			}
            			//$cache->Save($citydata,'ddcitydata');			
      		      }
              //    else
                        {
            	//		$citydata = $cache->Fetch('ddcitydata');
            		}		
      		$cache = null;
      		return $citydata;
		  }
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
		
		$cache = null;
		return $citydata;
	}
	/**
	*Function for fetching all for form population
	**/
	public function getCities($country_id)
	{
		try
            {
		      $select = $this->getDbTable()->select()
			         ->where('country_id=?',$country_id)
			         ->where('status = ?', true)
			         ->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$citydata=Array();	
			$citydata[0]= array('value'=>'','key'=>'Select City');		
			foreach($records as $record)
			{
				$citydata[] = array('key'=>$record['description'],'value'=>$record['id']);	
			}	
			return $citydata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	*Function for fetching all cities called in city bdm
	**/
	public function getAllCities()
	{
	
		try{
				$citydata = array();
				$db = $this->getDbTable();
				$select = $db->select()
							->from(array('city'=>'rd.city_bd'))
							->joinLeft(array('country'=>'rd.country_bd'),'city.country_id = country.id',array('country_name'=>'country.description'))
							->setIntegrityCheck(false)
							->order('description ASC');
				$records = $this->getDbTable()->fetchAll($select);			
				foreach($records as $record){
					$citydata[] = new Application_Model_Citybd(						
						$record->toArray());	
				}
				return $citydata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}

	}
	/*
	Function to get all cities along with ids;
	*/
	public function fetchRequiredData($cols,$values=null,$orderBy=null)
    {
        try
        {
            $db = $this->getDbTable();
                $select = $db->select();
                if(is_array($cols))
                {
                    $select = $select->from('rd.city_bd',$cols);
                }   
                if(is_array($values))
                {
                    if(sizeof($values)>0)
                    {
                        foreach ($values as $key => $value) {
                            $select = $select->where("$key = ?",$value);
                        }
                    }
                }
                if(is_array($orderBy))
                {
                    $select->order($orderBy);
                }
                $data = $select->query()->fetchAll();
                return $data;
        }
         catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
    }

	public function addCity($data)
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
	public function updateCity($data)
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

		/**
	*Verify city type by code
	**/
	public function verifyCode($code,$id)
	{
		try
		{
			$select = $this->getDbTable()->select();
				$select->from('rd.city_bd',array('COUNT(id) as count'))
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

	public function getCityIdByCode($cityname)
	{
		try
		{
			$db = $this->getDbTable();
			$select = $db->select()
						->where('code ilike ?',$cityname);
			$data =  $db->fetchRow($select);
			return $data['id'];
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}
}