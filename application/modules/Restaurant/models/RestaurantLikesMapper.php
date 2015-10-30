<?php
class Restaurant_Model_RestaurantLikesMapper
    {
    	protected $_restaurant_likes;

    	public function setDbTable($dbpath)
    	{
    		if(is_string($dbpath))
    		{
    			$dbpath = new $dbpath();
    			if($dbpath instanceof Zend_Db_Table_Abstract)
    			{
    				$this->_restaurant_likes= $dbpath;
    			}
    		}
    	}
    	
    	public function getDbTable()
    	{
            try
            {
                if($this->_restaurant_likes==null)
                {
                    $this->setDbTable("Restaurant_Model_DbTable_RestaurantLikes");
                }
                return $this->_restaurant_likes;

            }
    		catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}

    public function isLikeExists($resid,$userid,$likestatus)
     {
        try{
            $db = $this->getDbTable();
            $select = $db->select()
                        ->where('rluserid =?',$userid)
                        ->where('rlresid_fk_resid=?',$resid)
                        ->where('rlliked =?',$likestatus);
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

    public function isDisLikeExists($resid,$userid,$dislikestatus)
     {
        try
        {
            $db = $this->getDbTable();
            $select = $db->select()
                        ->where('rluserid =?',$userid)
                        ->where('rlresid_fk_resid=?',$resid)
                        ->where('rldisliked =?',$dislikestatus);
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

    public function insertLikeStatus($resid,$userid)
    {
        $db = $this->getDbTable();
        $data = array(
                'rlresid_fk_resid'=>$resid,
                'rluserid'=>$userid,
                'rlliked'=>"true",
                'rldisliked'=>"false"
                );
        return $db->insert($data);
    }

    public function insertDisLikeStatus($resid,$userid)
    {
     try{
            $db = $this->getDbTable();
            $data = array(
                    'rlresid_fk_resid'=>$resid,
                    'rluserid'=>$userid,
                    'rlliked'=>"false",
                    'rldisliked'=>"true"
                    );
            return $db->insert($data);
        }
      catch(Exception $e)
            {
                throw new Exception($e->getMessage());    
            }
        }


    public function updateLikeStatus($resid,$userid)
    {   
    try
        {
            $auth = 
             $result = array(
                'rlliked'=>"true",
                'rldisliked'=>"false"                
                );
        $where = array();
        $where[] = "rluserid = ".$userid;
        $where[] = "rlresid_fk_resid = ".$resid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

    }

    public function updateDisLikeStatus($resid,$userid)
    {   
    try
        {
            
             $result = array(
                'rlliked'=>"false",
                'rldisliked'=>"true"                
                );
        $where = array();
        $where[] = "rluserid = ".$userid;
        $where[] = "rlresid_fk_resid = ".$resid;
        $updatedata = $this->getDbTable()->update($result,$where);                 
        return $updatedata;
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    }    

    public function getCount($resid)
    {
        try {
            $db = $this->getDbTable();
            $select = $db->select()
                           ->where("rlliked = ?",'true') 
                        ->where("rlresid_fk_resid = ?",$resid);

            $lcount = $db->fetchAll($select);
            $likecount =  count($lcount);
            $select = $db->select()
                        ->where("rldisliked = ?",'true')
                        ->where("rlresid_fk_resid = ?",$resid);

            $dlcount = $db->fetchAll($select);
            $dislikecount = count($dlcount);
            $countarr = Array();
            $countarr['res_likes'] = $likecount;
            $countarr['res_dislikes'] = $dislikecount;
            
            return $countarr;
                     
        } catch (Exception $e) {
             throw new Exception($e->getMessage());
        }
    }  

    public function getLikedRestaurants($userid)
    {
        try
        {
            $db = $this->getDbTable();
            $select = $db->select()
                         ->where("rluserid=?",$userid)
                         ->where("rlliked=?",'true');
            $likedres = $db->fetchAll($select);
            
            return $likedres;                 

        }
        catch (Exception $e) {
             throw new Exception($e->getMessage());
        }

    }      


}
