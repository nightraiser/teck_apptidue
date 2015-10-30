<?php
/**
*	Name			: PriceMapper.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/PriceMapper.php
*	Description		: This is the mapper  for fetching price range.
*					   	
*/
class Application_Model_PriceMapper
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
				$this->setDbTable('Application_Model_DbTable_Pricebd');
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
			$pricedata = array();
			if(!$pricedata = $cache->Fetch('ddpricedata'))
			 {
					$where = array('status = ?'=> true);
					$records = $this->getDbTable()->fetchAll($where);							
					foreach($records as $record)
					 {
						$pricedata[] = new Application_Model_Pricebd($record->toArray());	
					 }
					$cache->Save($pricedata,'ddpricedata');			
			 }
			else
			 {
				$pricedata = $cache->Fetch('ddpricedata');
			 }			
			$cache = null;
			return $pricedata;
	    }
	catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function verifyCode($code,$countryfkid,$id)
	{
		try
		{
			$select = $this->getDbTable()->select();
			$select->from('rd.price_bd',array('COUNT(id) as count'))
			->where('code ILIKE ?',$code)
			->where('country_fk_id =?',$countryfkid);
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

	public function getAllPrice()
	{
		try{
				$restaurantPricedata = Array();
					$select = $this->getDbTable()->select()
												->from(array('p' => 'rd.price_bd'),array('p.id','p.code','p.description','p.country_fk_id','p.status'))
												->join(array('cbd'=>'rd.country_bd'),'p.country_fk_id = cbd.id',array('countryid'=>'cbd.id','countryname'=>'cbd.description'))
												 ->group(array('p.id','p.country_fk_id','p.description','p.code','p.status','cbd.id','cbd.description'))
												->order('cbd.description Asc')
												->setIntegrityCheck(false);
					$records = $this->getDbTable()->fetchAll($select);	
					foreach($records as $record){
						$restaurantPricedata[] = new Application_Model_Pricebd($record->toArray());	
					}
				return $restaurantPricedata;
			}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	public function addPrice($data)
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
	
	public function updatePrice($data)
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

	public function getPriceFilter($placeId)
	{
		try{
				$select = $this->getDbTable()->select()
	    					->where('status = ?', true)
							->order('id ASC')
							->where('country_fk_id =?',$placeId)
							->where('status = ?',true);
			$records = $this->getDbTable()->fetchAll($select);
			$cuisinedata= array();
			$cuisinedata [0] =  array('value'=>'Price Range','key'=>'');		
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
}

