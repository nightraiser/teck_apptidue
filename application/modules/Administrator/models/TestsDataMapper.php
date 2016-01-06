<?php
class Administrator_Model_TestsDataMapper
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
			$this->setDbTable('Administrator_Model_DbTable_Tests');
		}
		return $this->_dbTable;
	}
	
	/**
	 * Add a new Module
	 */

	public function addTest(array $data)
	{
		try
		{
			$db = $this->getDbTable();
			foreach ($data as $key => $d) {
				$data[$key] = htmlspecialchars($data[$key]);
			}
			$data['test_status'] = true;
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
    public function fetchTestsData(array $cols=null, array $conditions=null,array $order=null)
    {
        try
        {
            $db = $this->getDbTable();
            $select = $db->select();
           	if($cols!=null)
           	{
           		 if(count($cols)>0)
	            {
	                $select = $select->from('tests',$cols);
	            }
	            else
	            {
	            	$select = $select->from('tests');
	            }   
           	}
           	else
            {
            	$select = $select->from('tests');
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

    public function updateTest($data,$where)
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

    public function deleteTest($where)
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
