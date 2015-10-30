<?php
class Restaurant_Model_ItemReviewMapper
    {
    	protected $_item_reviewTable;

    	public function setDbTable($dbpath)
    	{
            try{
    		if(is_string($dbpath))
    		{
    			$dbpath = new $dbpath();
    			if($dbpath instanceof Zend_Db_Table_Abstract)
    			{
    				$this->_item_reviewTable= $dbpath;
    			}
    		}
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
                if($this->_item_reviewTable==null)
                {
                    $this->setDbTable("Restaurant_Model_DbTable_ItemReview");
                }
                return $this->_item_reviewTable;

            }
    		catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}

    	public function saveReviewData($reviewdata)
    	{
            try{
    		$db = $this->getDbTable();
    		$data = array(
                'iruserid_fk_userid'=>$reviewdata['userid'],
                'iritemid_fk_miid'=>$reviewdata['iritemid_fk_miid'],
    			'irresid_fk_resid'=>$reviewdata['irresid_fk_resid'],
                'ir_review_text'=>$reviewdata['ir_review_text'],
                'ir_review_rating'=>$reviewdata['ir_review_ratings'],
                'ircreateddate'=>$reviewdata['ircreateddate'],
                'ircreateddateandtime'=>$reviewdata['ircreateddateandtime'],
                'ircreatedby'=>$reviewdata['userid']            
    			);
    		 return $db->insert($data);
            }
             catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}

        public function fetchItemReview($itemid)
        {
            try {
                $db = $this->getDbTable();
                $select = $db->select()               
                                ->where('iritemid_fk_miid =?',$itemid)
                                ->order('ircreateddateandtime DESC');                    
                $itemreviewdata = $select->query()->fetchAll();
                $reviewdata = array();
                $cusmapper = new User_Model_CustomerMapper();
                
                foreach($itemreviewdata as $record)
                 {
                    $cusdata = $cusmapper->getcusdata($record['iruserid_fk_userid']);
                    $customer_name = "";
                   if(is_array($cusdata)){ 
                    if(array_key_exists(0, $cusdata))
                   {
                       $customer_name = $cusdata[0]['cusfirst_name'];
                   }
                   else
                   {
                        $customer_name = "User";
                   }
                    }
                    else
                    {
                        $customer_name = "User";   
                    }
                    $reviewdata[] = array("irid"=>$record['irid'],"ir_reviewdate"=>$record['ircreateddate'],"userid"=>$record['iruserid_fk_userid'],"review"=>$record['ir_review_text'],"rating"=>$record['ir_review_rating'],"cusname"=>$customer_name);   
                 }
                 return $reviewdata;
                } 

            catch (Exception $e) {
            throw new Exception($e->getMessage());    
            }
        }

        public function getReviewsCount($itemid)
        {
        try 
        {
            $db = $this->getDbTable();
            $select = $db->select()
                        ->where("iritemid_fk_miid = ?",$itemid);

            $count = $db->fetchAll($select);
            return count($count);
        } 
        catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
       }

       public function getitemReviewsByUserid($userid)
      { 
        try
        {

          $db = $this->getDbTable();
           $reviewdata = array();
          
              $select = $db->select()
                            ->where('ircreatedby = ?',$userid)
                            ->order('ircreateddateandtime DESC');
                            //->order('rrid DESC');
                $itemreviewdata = $select->query()->fetchAll();
                                          
               foreach($itemreviewdata as $record)
                 {
                 $reviewdata[] = array("irid"=>$record['irid'],"itemid"=>$record['iritemid_fk_miid'],"ir_reviewdate"=>$record['ircreateddate'],"userid"=>$record['iruserid_fk_userid'],"review"=>$record['ir_review_text'],"rating"=>$record['ir_review_rating'],"resid"=>$record['irresid_fk_resid']);           
                 }
                 //print_r($reviewdata); die();
                return $reviewdata;
          //$select = $db->select();
        }
        catch(Exception $e)
            {
                throw new Exception($e->getMessage());                
            }
        }


    }
