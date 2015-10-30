<?php
/**
*	Name			: TimezonebdMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/TimezonebdMapper.php
*	Description		: This is the mapper  for fetching time zones.
*					   	
*/
class Application_Model_TimezonebdMapper
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
		try{
				if (null === $this->_dbTable) 
				{
					$this->setDbTable('Application_Model_DbTable_Timezonebd');
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
			$timezonedata = Array();
			if(!$timezonedata = $cache->Fetch('ddtimezonedata'))
			{
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);				
				foreach($records as $record)
				{
					$timezonedata[] = new Application_Model_Timezomebd($record->toArray());	
				}
				$cache->Save($timezonedata,'ddtimezonedata');			
			}
			else
			{
				$timezonedata = $cache->Fetch('ddtimezonedata');
			}			
			$cache = null;
			return $timezonedata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getAll()
	{
		try
		{
			$select = $this->getDbTable()->select()
	    					->where('status = ?', true)
							->order('description ASC');
			$records = $this->getDbTable()->fetchAll($select);
			$timezonedata=Array();
			$timezonedata [0] =  array('key'=>'','value'=>'Select timezone');		
			foreach($records as $record)
			{
				$timezonedata[] = array('value'=>$record['description'],'key'=>$record['id']);	
			}
			return $timezonedata;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getTimezones($country_id)
	{
		try{
				$select = $this->getDbTable()->select();
				if($country_id>0)
				{
					$select->where('country_id=?',$country_id);
				}			
		    	$select->where('status = ?', true)
						->order('description ASC');
					$records = $this->getDbTable()->fetchAll($select);
					$timezonedata=Array();
					$timezonedata [0] =  array('value'=>'','key'=>'Select Timezone');		
					foreach($records as $record)
					{
						$timezonedata[] = array('key'=>$record['description'],'value'=>$record['id']);	
					}		
					return $timezonedata;
			}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}

	}

	public function updateTimezone($data,$code)
	{
		try
		{
			$sum = 0;
			foreach ($data as $value) 
			{
				$where['id = ?'] = $value;
				$update = array('country_id' => $code );
		 		$sum += $this->getDbTable()->update($update,$where);	
			}

			if($sum==sizeof($data))
			{
				return 't';
			}
			else
			{
				return 'f';
			}
			
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}

	public function fetchById($id)
	{
		$db = $this->getDbTable();
		$select = $db->select()
					->where('id =?',$id);
		$data = $db->fetchAll($select);
		return $data[0]['code'];
	}
}


