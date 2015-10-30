<?php
class Restaurant_Model_ItemLikesMapper
    {
    	protected $_item_likes;

    	public function setDbTable($dbpath)
    	{
    		if(is_string($dbpath))
    		{
    			$dbpath = new $dbpath();
    			if($dbpath instanceof Zend_Db_Table_Abstract)
    			{
    				$this->_item_likes= $dbpath;
    			}
    		}
    	}
    	
    	public function getDbTable()
    	{
            try
            {
                if($this->_item_likes==null)
                {
                    $this->setDbTable("Restaurant_Model_DbTable_ItemLikes");
                }
                return $this->_item_likes;

            }
    		catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}

    public function isLikeExists($itemid,$userid,$likestatus)
     {
        try{
            $db = $this->getDbTable();
            $select = $db->select()
                        ->where('iluserid =?',$userid)
                        ->where('ilitemid_fk_miid=?',$itemid)
                        ->where('illikes =?',$likestatus);
                        //->where('rldisliked =?',$dislikestatus);
            $data = $db->fetchRow($select);

            if($data==null)
            {
                return false;
            }
            else
            {
                return true;
            }
          }  
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

    }        

    public function isDisLikeExists($itemid,$userid,$dislikestatus)
     {
        try{
            $db = $this->getDbTable();
            $select = $db->select()
                        ->where('iluserid =?',$userid)
                        ->where('ilitemid_fk_miid=?',$itemid)
                        ->where('ildislikes =?',$dislikestatus);
                        //->where('rldisliked =?',$dislikestatus);
            $data = $db->fetchRow($select);
            //print_r($data);die();

            if($data==null)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    }   

    public function insertLikeStatus($itemid,$userid)
    {
         try{
            $db = $this->getDbTable();
            $data = array(
                    'ilitemid_fk_miid'=>$itemid,
                    'iluserid'=>$userid,
                    'illikes'=>"true",
                    'ildislikes'=>"false"
                    );
            return $db->insert($data);
            }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }    

    }

    public function insertDisLikeStatus($itemid,$userid)
    {
        try{
            $db = $this->getDbTable();
            $data = array(
                    'ilitemid_fk_miid'=>$itemid,
                    'iluserid'=>$userid,
                    'illikes'=>"false",
                    'ildislikes'=>"true"
                    );
            return $db->insert($data);
        }   
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    }

    public function updateLikeStatus($itemid,$userid)
    {   
    try
        {
             $result = array(
                'illikes'=>"true",
                'ildislikes'=>"false"                
                );
        $where = array();
        $where[] = "iluserid = ".$userid;
        $where[] = "ilitemid_fk_miid = ".$itemid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

    }

    public function updateDisLikeStatus($itemid,$userid)
    {   
    try
        {
             $result = array(
                'illikes'=>"false",
                'ildislikes'=>"true"                
                );
        $where = array();
        $where[] = "iluserid = ".$userid;
        $where[] = "ilitemid_fk_miid = ".$itemid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    }    

    public function getCount($itemid)
    {
        try {
            $db = $this->getDbTable();
            $select = $db->select()
                           ->where("illikes = ?",'true') 
                        ->where("ilitemid_fk_miid = ?",$itemid);

            $lcount = $db->fetchAll($select);
            $likecount =  count($lcount);
            $select = $db->select()
                        ->where("ildislikes = ?",'true')
                        ->where("ilitemid_fk_miid = ?",$itemid);

            $dlcount = $db->fetchAll($select);
            $dislikecount = count($dlcount);
            $countarr = Array();
            $countarr['mi_likes'] = $likecount;
            $countarr['mi_dislikes'] = $dislikecount;
            //return count($count);
            return $countarr;            
        } catch (Exception $e) {
             throw new Exception($e->getMessage());
        }
    }        


}