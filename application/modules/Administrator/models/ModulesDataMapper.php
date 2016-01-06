<?php
class Administrator_Model_ModulesDataMapper
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
			$this->setDbTable('Administrator_Model_DbTable_Modules');
		}
		return $this->_dbTable;
	}
	
	/**
	 * Add a new Module
	 */

	public function addModule(array $data)
	{
		try
		{
			$db = $this->getDbTable();
			foreach ($data as $key => $d) {
				$data[$key] = htmlspecialchars($data[$key]);
			}
			$data['mod_status'] = true;
			$res = $db->insert($data);
			return $res;
		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage());
			
		}
	}

	 /**
     * Fetches all required data
     */
    public function fetchModulesData(array $cols=null, array $conditions=null,array $order=null)
    {
        try
        {
            $db = $this->getDbTable();
            $select = $db->select();
           	if($cols!=null)
           	{
           		 if(count($cols)>0)
	            {
	                $select = $select->from('modules',$cols);
	            }
	            else
	            {
	            	$select = $select->from('modules');
	            }   
           	}
           	else
            {
            	$select = $select->from('modules');
            }
            if($conditions!=null)
            {
                if(sizeof($conditions)>0)
                {
                    foreach ($conditions as $key => $value) {
                        $select = $select->where("$key",$value);
                    }
                }
            }
            if($order!=null)
            {

                if(sizeof($order)>0)
                {
                    foreach ($order as $key => $or) {
                        $select = $select->order($or);
                    }
                }
            }

            $data = $select->query()->fetchAll();
            return $data;

        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());   
        }
    }

    /**
     * Updates module details
     */

    public function updateModule($data,$where)
    {
    	try
    	{
    		$db = $this->getDbTable();
    		$res = $db->update($data,$where);
    		return $res;
    	}
    	catch(Exception $e)
        {
            throw new Exception($e->getMessage());   
        }
    }

    /**
     * Delete module details
     */

    public function deleteModule($where)
    {
    	try
    	{
    		$db = $this->getDbTable();
    		$res = $db->delete($where);
    		return $res;
    	}
    	catch(Exception $e)
        {
            throw new Exception($e->getMessage());   
        }
    }
}
