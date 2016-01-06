<?php
/**
*	Name			: CountryTimezonebdMapper.php
*	Author			: eshwar
*	Creation Date	: 17/12/2015
*	Path 			: application/models/CountryTimezonebdMapper.php
*	Description		: This is the mapper class for fetching countries and its timezones.
*					   	
*/
class Application_Model_CountryTimezonebdMapper
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
				$this->setDbTable('Application_Model_DbTable_CountryTimezonebd');
			 }
			 return $this->_dbTable;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function addTmezneIds($tmzneIds,$countryId)
	{
		try{
				foreach ($tmzneIds as $key ) 
					{
						$tmp = array('ct_timezone_id'=>(int)$key,'ct_country_id'=>(int)$countryId,'ct_status'=>'true');
						$resp =  $this->getDbTable()->insert($tmp);
					}
			return $resp;
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage());
		}
	}

	

	public function deleteTmezneIds($deleteTmezneIds,$cntyId)
	{
		try{
			if($deleteTmezneIds!=null)
			{
				$where['ct_timezone_id IN(?)'] = $deleteTmezneIds;
				$where['ct_country_id = ?'] = $cntyId;
				$updateData = array('ct_status' =>"false");
			}
			else
			{
				$updateData = array('ct_status' =>"false");
				$where['ct_country_id = ?'] = $cntyId;
			}
			
		 	return $this->getDbTable()->update($updateData,$where);
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
		}
	}
	public function getTmeznsByCntryId($cntyId)
	{
		try {
			$db = $this->getDbTable();
			$select = $db->select()
						->from(array('ct'=>'rd.countrytimezone_bd'),array('timezoneid'=>'ct_timezone_id'))
						->joinLeft(array('tmezne'=>'rd.timezone_bd'),'tmezne.id=ct.ct_timezone_id',array('code'))
						->where('ct_status =?',"true")
						->where('ct_country_id = ?',$cntyId)
						->setIntegrityCheck(false);
			$result = $select->query()->fetchAll();
			return $result;
			
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}
}

