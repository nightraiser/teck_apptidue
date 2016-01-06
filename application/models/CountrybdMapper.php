<?php
/**
*	Name			: CountrybdMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/CountrybdMapper.php
*	Description		: This is the mapper class for fetching countries.
*					   	
*/
class Application_Model_CountrybdMapper
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
				$this->setDbTable('Application_Model_DbTable_Countrybd');
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
			//$cache = new Rdine_Helper_CacheManager();
			$countrydata = array();
			//if(!$countrydata = $cache->Fetch('ddcountrydata'))
				{
					$where = array('status = ?'=> true);
					$records = $this->getDbTable()->fetchAll($where);								
					foreach($records as $record)
						{
						   $countrydata[] = new Application_Model_Countrybd($record->toArray());	
						}
				  //  $cache->Save($countrydata,'ddcountrydata');			
				}
				//else
				{
				//	$countrydata = $cache->Fetch('ddcountrydata');
				}			
			$cache = null;
			return $countrydata;
		   }
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getCountries()
	{	
        try{
				$countries = $this->getDbTable();
				$select = $countries->select()
									->where('status = ?',true)
									->order('description ASC');
				$data = $countries->fetchAll($select);
				$countryNames = Array();
		        $countryNames[0] =  array('value'=>'Select country','key'=>'');
				foreach ($data as $row )
				 {
				   $countryNames [] = array('key'=>$row['id'],'value'=>$row['description']);
				 }   
				 return $countryNames;
            }
            catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	*Function for fetching all cities called in country bdm
	**/
	public function getAllCountries()
	{
	
		try{
				$countrydata = array();
				$db = $this->getDbTable();
				$select = $db->select()
							->from(array('country'=>'rd.country_bd'))
							->where('status = ?',true)
							->order('description ASC');
				$records = $this->getDbTable()->fetchAll($select);			
				foreach($records as $record){
					$countrydata[] = new Application_Model_Countrybd(						
						$record->toArray());	
				}
				return $countrydata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}

	}

	public function addCountry($data)
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
	public function updateCountry($data)
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
	*Verify country type by code
	**/
	public function verifyCode($code,$id)
	{
		try{
		$select = $this->getDbTable()->select();
		$select->from('rd.country_bd',array('COUNT(id) as count'))
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
}

