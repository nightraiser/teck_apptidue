<?php
/**
*     Name              : LocationboundriesMapper.php
*     Author                  : sai
*     Creation Date     : 9/4/2015
*     Path              : application/models/LocationboundriesMapper.php
*     Description       : This is the mapper class to fetch location.
*                                   
*/
class Application_Model_LocationboundariesMapper
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
					$this->setDbTable('Application_Model_DbTable_Locationboundaries');
				}
				return $this->_dbTable;
		}
		catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
	}

	public function addLocation($data)
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
	
	public function getBorder($place_id)
	{
		try
		{
			$select = $this->getDbTable()->select()
								->where('id = ?',$place_id);
							
					$records = $this->getDbTable()->fetchAll($select);
		
		
					$borderdata=Array();	
					$rawdata = $records[0]['lb_boundaries'];
					$split = "/\(.+?\)/";
		 			 preg_match_all('/[^(,\s]+|\([^)]+\)/', $rawdata, $output);
		 			 
					foreach($output[0] as $coords)
					{
						
						$str = str_replace(array( '(', ')' ), '', $coords);	
						$arr = explode(",",$str);
						
						$borderdata[] = array('lat'=>floatval($arr[0]),'lng'=>floatval($arr[1]));
					}
					
					return $borderdata;
		}
		catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
	}

	public function getMapCenter($place_id)
 	{
  			   try{
	  				$select = $this->getDbTable()->select()	      		
	      							->where('id = ?',$place_id);     
	   				$records = $this->getDbTable()->fetchAll($select);
	   				$mapcenter=Array(); 
	   				$rawdata = $records[0]['lb_center'];
	   				$split = "/\(.+?\)/";
	     			preg_match_all('/[^(,\s]+|\([^)]+\)/', $rawdata, $output);     
				    foreach($output[0] as $coords)
				    {    
				    $str = str_replace(array( '(', ')' ), '', $coords); 
				    $arr = explode(",",$str);    
				    $mapcenter[] = array('lat'=>floatval($arr[0]),'lng'=>floatval($arr[1]));
				    }  
				    return $mapcenter;
				   }
				   catch(Exception $e)
	        		{
	            	 throw new Exception($e->getMessage());   
	        		}
    }

    public function getCountryId($place_id)
    {
    		try{
    				$db = $this->getDbTable();
	  				$select = $db->select();
	  							
	  				$select->where('id = ?',$place_id);
	  				$select->orWhere('city_id = ?',$place_id);
	  									
	   				$records = $db->fetchAll($select);
	   				return $records[0]['country_id'];
				   }
				   catch(Exception $e)
	        		{
	            	 throw new Exception($e->getMessage());   
	        		}
    }


	public function getLocationsBdm()
	{
		try
		{
			$select = $this->getDbTable()->select()
										->from(array('location'=>'rd.location_boundaries'))
										->joinLeft(array('country'=>'rd.country_bd'),'location.country_id = country.id',array('country_name'=>'country.description'))
										->joinLeft(array('city'=>'rd.city_bd'),'location.city_id = city.id',array('city_name'=>'city.description'))
										->setIntegrityCheck(false)
										->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$locationdata = Array();	
			foreach($records as $record)
			{
				$borderdata=Array();
				$rawdata = $record['lb_boundaries'];
				$split = "/\(.+?\)/";
 				preg_match_all('/[^(,\s]+|\([^)]+\)/', $rawdata, $output);
				foreach($output[0] as $coords)
				{
					$str = str_replace(array( '(', ')' ), '', $coords);	
					$arr = explode(",",$str);
					$borderdata[] = array('lat'=>floatval($arr[0]),'lng'=>floatval($arr[1]));
				}
				$locationdata[$record['id']] = array('id'=>$record['id'],'country_id'=>$record['country_id'],'city_id'=>$record['city_id'],'lb_google_placeid'=>$record['lb_google_placeid'],'border'=>$borderdata,'lb_center'=>$this->getMapCenter($record['id']),'code'=>$record['code'],'description'=>$record['description'],'city_name'=>$record['city_name'],'country_name'=>$record['country_name'],'status'=>$record['status']);
			}
		
			return $locationdata;
		}
		catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
	}

	public function updateLocation($data)
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
	*Function for fetching all for form population
	**/
	public function getLocations($city_id)
	{
		try
            {
		      $select = $this->getDbTable()->select()
			         ->where('city_id=?',$city_id)
			         ->where('status = ?', true)
			         ->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$locaationdata=Array();	
			$locationdata[0]= array('value'=>'','key'=>'Select Location');		
			foreach($records as $record)
			{
				$locationdata[] = array('key'=>$record['description'],'value'=>$record['id']);	
			}	
			return $locationdata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}			   
	/**
	*Verify country type by code
	**/
	public function verifyCode($code,$id)
	{
		try{
			$select = $this->getDbTable()->select();
			$select->from('rd.location_boundaries',array('COUNT(id) as count'))
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

	public function fetchAll()
	{
		try{
			//$cache = new Rdine_Helper_CacheManager();
			$locationdata = array();
			//if(!$locationdata = $cache->Fetch('ddlocationdata'))
				{
					$where = array('status = ?'=> true);
					$records = $this->getDbTable()->fetchAll($where);								
					return $records;
				  //  $cache->Save($locationdata,'ddlocationdata');			
				}
				//else
				{
				//	$locationdata = $cache->Fetch('ddlocationdata');
				}			
			$cache = null;
			return $locationdata;
		   }
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function getLocationName($id)
	{
		try
		{
			$db = $this->getDbTable();
			$select = $db->select()
						->from(array('rd.location_boundaries'),array('description'))
						->where('id =?',$id);
			$data = $select->query()->fetchAll();
			return $data[0]['description'];
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function fetchRequiredData($cols,$values=null,$orderBy=null)
    {
        try
        {
            $db = $this->getDbTable();
                $select = $db->select();
                if(is_array($cols))
                {
                    $select = $select->from('rd.location_boundaries',$cols);
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

    public function fetchSugesstionData($cityId = null)
    {
        try
        {
            $db = $this->getDbTable();
            $select = $this->getDbTable()->select()
										->from(array('location'=>'rd.location_boundaries'),array('location_id'=>"location.id",'location_name'=>'location.description'))
										->joinLeft(array('country'=>'rd.country_bd'),'location.country_id = country.id',array('country_name'=>'country.description'))
										->joinLeft(array('city'=>'rd.city_bd'),'location.city_id = city.id',array('city_name'=>'city.description'))
										->where('location.status = ?',true)
										->setIntegrityCheck(false)
										->order('location.description ASC');
			if($cityId != null)
			{
				$select->where('city_id = ?',$cityId);
			}
             $data = $select->query()->fetchAll();
            return $data;
        }
         catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
    }


}