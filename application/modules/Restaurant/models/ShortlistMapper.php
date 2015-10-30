<?php
class Restaurant_Model_ShortlistMapper
    {

 protected $_dbtable;       
public function setDbTable($dbpath)
    	{
    		if(is_string($dbpath))
    		{
    			$dbpath = new $dbpath();
    			if($dbpath instanceof Zend_Db_Table_Abstract)
    			{
    				$this->_dbtable= $dbpath;
    			}
    		}
    	}
    	
 public function getDbTable()
    	{
            try
            {
                if($this->_dbtable==null)
                {
                    $this->setDbTable("Restaurant_Model_DbTable_Shortlist");
                }
                return $this->_dbtable;

            }
    		catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}
public function insertshortlist($resid,$userid)
    {
        try
        {
            //$userid = 1;
            $result = array(
                    'sluserid'    =>  $userid,
                    'slresid'     =>  $resid,
                    'slstatus'    =>  "true"                        
                );
        $inserteddata = $this->getDbTable()->insert($result);                 
        return $inserteddata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    }
public function updateshortlist($resid,$userid,$status)
{   
    try
        {
             $result = array(
                    'slstatus' => "$status"                
                );
        $where = array();
        $where[] = "sluserid = ".$userid;
        $where[] = "slresid = ".$resid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

}    



    public function showshortlist($userid)
    {
        try
        {   
            $db = $this->getDbTable();
            $data = Array();
            $select = $db->select()
                    ->where('slstatus =?','true')
                    ->where('sluserid =?',$userid)
                    ->order(array('slid DESC'));
            $data = $db->fetchAll($select);
            return $data;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

    }

    public function isLikeExits($resid,$userid,$status)
     {
	try{ 
	        $db = $this->getDbTable();
	        $select = $db->select()
	                    ->where('sluserid =?',$userid)
	                    ->where('slresid =?',$resid)
	                    ->where('slstatus =?',$status);
	        $data = $db->fetchRow($select);
	        if($data==null)
	        {
	            return false;
	        }
	        else
	        {
	            return true;
	        }
	}catch(Exception $e)
    	{
        	throw new Exception($e->getMessage());
                
    	}

    }        
}
?>   
    