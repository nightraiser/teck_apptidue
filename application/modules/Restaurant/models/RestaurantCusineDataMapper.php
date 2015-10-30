<?php
 /**
            *   Name            : RestaurantCusineDataMapper.php
            *   Author          : Sai
            *   Creation Date   : 08-09-2015
            *   Path            : application/modules/Restaurant/models/RestaurantVisitorsMapper
            *   Description     : This mapper includes visitors functions for restaurant table
            *                       
            */
class Restaurant_Model_RestaurantCusineDataMapper
    
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
					$this->setDbTable('Restaurant_Model_DbTable_RestaurantCusineData');
				}
				return $this->_dbTable;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
	
	public function save($row)
	{
		try{
				$db = $this->getDbTable();
				$db->insert($row);
			}									       
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getCusineNamesByResid($resid)
	{
		try
		{
			$db= $this->getDbTable();
			$select = $db->select()
						->from(array('rcd'=>'rd.restaurant_cusine_data'),array(''))
						 ->joinLeft(array('cbd'=>'rd.restaurant_type_bd'),'rcd.restaurant_type_fk_id=cbd.id',array('cusine'=>'cbd.description'))
						 ->where('rcd.restaurant_fk_resid =?',$resid)
						 ->setIntegrityCheck(false);
			$data = $select->query()->fetchAll();
			$output = array();
			foreach ($data as $value) {
				$output[] = $value['cusine'];
			}
			return $output;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
		
	}
	public function updateCusineData($resid,$arr)
	{
		$db = $this->getDbTable();
		$db->delete("restaurant_fk_resid=".$resid);
		foreach ($arr as $value) {
			$data['restaurant_fk_resid'] = $resid;
			$data['restaurant_type_fk_id'] = $value;
			$this->save($data);
		}
	}

	 public function getCusine($resid)
	{
		try
		{
			$db= $this->getDbTable();
			$select = $db->select()
						->from(array('rcd'=>'rd.restaurant_cusine_data'),array('restaurant_type_fk_id'))
						 ->where('rcd.restaurant_fk_resid =?',$resid);
			$data = $select->query()->fetchAll();
			$output = array();
			foreach ($data as $value) {
				$output[] = $value['restaurant_type_fk_id'];
			}
			return $output;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}
	
}

