<?php
class Restaurant_Model_ResReviewMapper
    {
    	protected $_res_reviewTable;

    	public function setDbTable($dbpath)
    	{
    		if(is_string($dbpath))
    		{
    			$dbpath = new $dbpath();
    			if($dbpath instanceof Zend_Db_Table_Abstract)
    			{
    				$this->_res_reviewTable= $dbpath;
    			}
    		}
    	}
    	
    	public function getDbTable()
    	{
            try
            {
                if($this->_res_reviewTable==null)
                {
                    $this->setDbTable("Restaurant_Model_DbTable_RestaurantReview");
                }
                return $this->_res_reviewTable;

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
      			 'rr_fk_resid'=>$reviewdata['rr_fk_resid'],
      			'rr_review_text'=>$reviewdata['review_text'],
      			'rr_review_ratings' => $reviewdata['rr_review_ratings'],
      			'rrcreateddate' => $reviewdata['rrcreateddate'],
            'rrcreatedby' => $reviewdata['rrcreatedby'],
            'rrcreateddateandtime' => $reviewdata['rrcreateddateandtime']
                  			);
      		 return $db->insert($data);
          } 
         catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }

    	}

    	public function getResReviews($resid)
    	{	
    		try
    		{
          $reviewdata = array();
	    		$db = $this->getDbTable();
	    		 $resreviewdata = array();
	    		
              $select = $db->select()
                            ->where('rr_fk_resid = ?',$resid)
                            ->order('rrid DESC');
                       
                $resreviewdata = $select->query()->fetchAll();

                                          
                foreach($resreviewdata as $record)
                 {
                    $reviewdata[] = new Restaurant_Model_ResReview($record);   
                 }
                
                return $reviewdata;
	    	
	    	}
	    	catch(Exception $e)
            {
                throw new Exception($e->getMessage());                
            }
       	}

        public function getResReviewsByUserid($userid)
      { 
        try
        {

          $db = $this->getDbTable();
           $reviewdata = array();
          
              $select = $db->select()
                            ->where('rrcreatedby = ?',$userid)
                            ->order('rrcreateddateandtime DESC');
                            //->order('rrid DESC');
                $resreviewdata = $select->query()->fetchAll();
                foreach($resreviewdata as $record)
                 {
                    $reviewdata[] = new Restaurant_Model_ResReview($record);   
                 }
                return $reviewdata;
	    	}
	    	catch(Exception $e)
            {
                throw new Exception($e->getMessage());                
            }
       	}

       	public function getReviewsCount($resid)
       	{
       	try 
       	{
       		$db = $this->getDbTable();
       		$select = $db->select()
       					->where("rr_fk_resid = ?",$resid);

       		$count = $db->fetchAll($select);
       		return count($count);
       	} 
       	catch (Exception $e) {
       		throw new Exception($e->getMessage()); 
       	}
       }

       public function getAvgRating($resid)
       {
        try{
          $db = $this->getDbTable();
          $select = $db->select();
              $select->from ($db,array("rr_fk_resid","rr_review_ratings" => "avg(rr_review_ratings)"))
                ->group(array("rr_fk_resid"))
                ->where("rr_fk_resid = ?",$resid);
          $avgrate =  $db->fetchAll($select);
           $avg =  $avgrate[0]['rr_review_ratings'];     
           $avg_rounded =  number_format((float)$avg, 1, '.', '');
           return (float)$avg_rounded;
       }
      
      catch(Exception $ex){
      Rdine_Logger_FileLogger::info($ex->getMessage());
      throw new Exception($ex->getMessage()) ;
        }
      }

        public function getRatingbyuserid($userid,$resid)
       {
        try{
          $rating = array();
                  $db = $this->getDbTable();          
              $select = $db->select()
                            ->from ($db,"rr_review_ratings")
                            ->where("rr_fk_resid = ?",$resid)
                            ->where("rrcreatedby = ?",$userid)
                            ->order('rrid DESC');
                $rating = $select->query()->fetchAll();
                if(array_key_exists(0, $rating))
                {
                   return $rating[0]['rr_review_ratings'];
                }
                else
                {
                  return $rating;
                }
        }
        catch(Exception $ex){
        Rdine_Logger_FileLogger::info($ex->getMessage());
        throw new Exception($ex->getMessage()) ;
        }
       }
    }