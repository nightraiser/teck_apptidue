<?php
/**
*	Name			: ServiceProviderbdMapper.php
*	Author			: eshwar
*	Creation Date	: 11/27/2015
*	Path 			: application/models/ServiceProviderbdMapper.php
*	Description		: This is the mapper  for fetching service provider.
*					   	
*/
class Application_Model_ServiceProviderbdMapper
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
				$this->setDbTable('Application_Model_DbTable_ServiceProviderbd');
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
		$select->from('rd.service_provider_bd',array('COUNT(id) as count'))
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
	
	public function addProviders($data)
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

	public function updateProvider($data)
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

	public function getAllProviders()
	{
		try{
				$serviceProvidersdata = Array();
					$select = $this->getDbTable()->select()
												->order('description ASC');
					$records = $this->getDbTable()->fetchAll($select);			
					foreach($records as $record){
						$serviceProvidersdata[] = new Application_Model_Providersbd($record->toArray());	
					}
				return $serviceProvidersdata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
}
