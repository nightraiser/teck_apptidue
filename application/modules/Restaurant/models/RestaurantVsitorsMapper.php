<?php
 /**
            *   Name            : RestaurantVisitorsMapper.php
            *   Author          : Sai
            *   Creation Date   : 08-09-2015
            *   Path            : application/modules/Restaurant/models/RestaurantVisitorsMapper
            *   Description     : This mapper includes visitors functions for restaurant table
            *                       
            */
class Restaurant_Model_RestaurantVsitorsMapper
    
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
			$this->setDbTable('Restaurant_Model_DbTable_RestaurantVisitors');
		}
		return $this->_dbTable;
	}
	
	public function save($socialmedia)
	{
		try{
			
			}									       
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function updateRow($conditionArray)
	{
		$where = array();
		try 
		{
			$isLoggedIn = $conditionArray['isLoggedIn'];
			if($isLoggedIn)
			{
				$where['rvl_user_fk_id'] = $conditionArray['userid'];
				$where['rvl_fk_resid'] = $conditionArray['resid'];
				$where['rvl_visit_type'] = $conditionArray['type'];
			}
			else
			{
				$where['rvl_fk_resid'] = $conditionArray['resid'];
				$where['rvl_user_ip'] = $conditionArray['ip'];
				$where['rvl_user_browser_agent'] = $conditionArray['user_agent'];
				$where['rvl_visit_type'] = $conditionArray['type'];
			}
			$db = $this->getDbTable();
			$select = $db->select();
			if(is_array($where))
			{
				foreach ($where as $key => $value) 
				{
                    if(strlen($value)>0)
                    {
                        $select->where("$key = ?",$value);
                    }  
				}

				$row = $db->fetchRow($select);
				if(sizeof($row)==0)
				{
					$rowNum = $db->insert($where);
					return true;
				}
				else
				{
					return false;
				}
			}
		} 
		catch (Exception $e) 
		{
			throw new Exception($e->getMessage()) ;	
		}
	}



}

