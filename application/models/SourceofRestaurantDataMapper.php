<?php
/**
*	Name			: SourceofRestaurantDataMapper.php
*	Author			: sairam 
*	Creation Date	: 16/01/2012
*	Path 			: application/models/SourceofRestaurantDataMapper.php
*	Description		: This is the DataMapper class for the Source of Restaurant basedata table.
*					   	
*/
class Application_Model_SourceofRestaurantDataMapper
{
	protected $_dbTable;
	
	public function setDbTable($dbTable)
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
	
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_SourceofRestaurant');
		}
		return $this->_dbTable;
	}
	
	public function fetchAll()
	{
		try
		{
			$cache = new Rdine_Helper_CacheManager();
			$sources = array();
			if(!$sources = $cache->Fetch('sources')){
				$where = array('status = ?'=> true);
				$records = $this->getDbTable()->fetchAll($where);
							
				foreach($records as $record){
					$sources[] = new Application_Model_SourceofRestaurant(						
						$record->toArray());	
				}
				$cache->Save($sources,'sources');			
			}else{
				$sources = $cache->Fetch('sources');
			}
			
			$cache = null;
			return $sources;
		}
	catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	/**
	 * Get city by id 
	 */
	public function getSource($userid)
	{
	try{
			$table  = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);

			$select->from(array('srbd'=>'rd.source_of_restaurant_bd','ron'=>'rd.restaurant_owner'),array('srbd.description as code','ron.rsosourcedescription as description','id as sourceid'))
			->join(array('ron'=>'rd.restaurant_owner'),'srbd.id = ron.rsosourceid')
			->where('ron.rsofk_user = ?',$userid)
			->order(array('srbd.description'));

			$records = $table->fetchAll($select);
			$id = '';
			
				
				foreach($records as $value){
				$id = $value->sourceid;
				$description=$value->description;
				}			
					$sourceofrestaurantMapper  = new Application_Model_SourceofRestaurantDataMapper();
			        $sources = $sourceofrestaurantMapper->fetchAll();
			        $sourceList[] = array('key'=>'','value'=>'Select Source');   	   
			        foreach($sources as $source){
			    	$sourceList[] = array('key'=>$source->getId(),'value'=>$source->getDescription());
			    //}
			}
			if($id==null)
			$result=array('sourcelist'=>$sourceList);
			else
			$result=array('sourcelist'=>$sourceList,'id'=>$id,'description'=>$description);
			
			return $result;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}