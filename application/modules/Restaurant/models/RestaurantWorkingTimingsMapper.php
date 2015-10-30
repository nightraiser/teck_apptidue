    <?php
     /**
            *   Name            : RestaurantWorkingTimings.php
            *   Author          : Sai
            *   Creation Date   : 08-09-2015
            *   Path            : application/modules/Restaurant/models/RestaurantWorkingTimingsMapper
            *   Description     : This mapper includes timming functions for restaurant table
            *                       
            */
    class Restaurant_Model_RestaurantWorkingTimingsMapper
    {
        /**
                 * Instance variable of restaurant dbtable
                 * @var object
                 */
    	protected $_dbtable;
    	/**
                 * Initializes the dbtable
                 */
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
                    $this->setDbTable("Restaurant_Model_DbTable_RestaurantWorkingTimings");
                }
                return $this->_dbtable;

            }
    		catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
    	}

        public function addRestaurantTimings($data,$rid)
        {
          try
            {
                $db = $this->getDbTable();
                $sum = 0;
                foreach ($data as $value) {
                        $value['rwt_fk_restaurant'] = $rid;
                         $sum+= $db->insert($value);
                }
                return $sum;

            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }   
        }

        public function addNewRestaurantTimings($data)
        {
          try
            {
                $db = $this->getDbTable();
                $sum = 0;
                foreach ($data as $value) {
                 
                         $sum+= $db->insert($value);
                }
                return $sum;

            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }   
        }

        public function getByRestaurantId($rid)
        {
            try
            {
                $db = $this->getDbTable();
                $select = $db->select()
                            ->from(array('rwt'=>'rd.restaurant_working_timings'),
                                array('rwt_id','rwt_week_day','rwt_sch_type','rwt_start_time','rwt_end_time'))
                            ->where('rwt_fk_restaurant = ?',$rid)
                            ->order(array('rwt_id ASC'));
                $stmt = $select->query();
                $data = $stmt->fetchAll();
                return $data;
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
        }
        /* Function to check wether the meal exist for a given RID ,weekday,mealtype */
        public function isMealExits($rid,$weekday,$type)
        {
            try
            {
                $db = $this->getDbTable();
                $select = $db->select()
                            ->from(array('rwt'=>'rd.restaurant_working_timings'),
                                array('rwt_week_day','rwt_sch_type','rwt_start_time','rwt_end_time'))
                            ->where('rwt_fk_restaurant = ?',$rid)
                            ->where('rwt_week_day = ?',$weekday)
                         ->where('rwt_sch_type = ?',$type);
                $stmt = $select->query();
                $data = $stmt->fetchAll();
                if(count($data)>0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
        }
                /* Function to check wether the restaurant is open for a given RID ,weekday,timw */
        public function isOpen($rid,$weekday,$givenTime)
        {
            try
            {
                $db = $this->getDbTable();
                $select = $db->select()
                            ->from(array('rwt'=>'rd.restaurant_working_timings'),
                                array('rwt_week_day','rwt_sch_type','rwt_start_time','rwt_end_time'))
                            ->where('rwt_fk_restaurant = ?',$rid)
                            ->where('rwt_week_day = ?',$weekday);
                if($givenTime!==null)
                {
                    $select->where('rwt_start_time < ?',$givenTime)
                            ->where('rwt_end_time > ?',$givenTime);
                }
                $stmt = $select->query();
                $data = $stmt->fetchAll();
                if(count($data)>0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch(Exception $e)
            {
                throw new Exception($e->getMessage());
                
            }
        }

        public function updateRWT($resid,$arr)
        {
                $db = $this->getDbTable();
                $count = 0;
                $i=0;
                foreach ($arr as $value) {
                    if($i>0)
                    {
                        if(is_array($value))
                        {
                             $count+= $db->update($value,"rwt_id=".$value['rwt_id']);
                        }
                    }
                    else
                    {
                        if(is_array($value))
                        {
                            $count+= $this->addNewRestaurantTimings($value);
                        }
                    }
                $i++;
                }
                return $count;
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

        public function removeRWT($id)
        {
         
             try{
                    $db = $this->getDbTable();
                   return  $db->delete("rwt_id=".$id);
                }                                          
            catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }   
        }

}
