    <?php
     /**
            *   Name            : Restaurant.php
            *   Author          : Sai
            *   Creation Date   : 02=09-2015
            *   Path            : application/modules/Restaurant/models/RestaurantMapper
            *   Description     : This mapper includes functions for restaurant table
            *                       
            */
    class Restaurant_Model_RestaurantMapper
    {
        /**
                 * Instance variable of restaurant dbtable
                 * @var object
                 */
    	protected $_dbTable;
    	/**
                 * Initializes the dbtable
                 */
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
                $this->setDbTable('Restaurant_Model_DbTable_RestaurantDetails');
            }
            return $this->_dbTable;
    	}

        public function fetchAll()
            {
                try
                {
                  //  $cache = new Rdine_Helper_CacheManager();
                    $resdata = array();
                   // if(!$resdata = $cache->Fetch('ddrestaurantdata'))
                     {
                            $where = array('status = ?'=> true);
                            $records = $this->getDbTable()->fetchAll();                           
                            foreach($records as $record)
                             {
                                $resdata[] = new Restaurant_Model_Restaurant($record->toArray());   
                             }
                            //$cache->Save($resdata,'ddrestaurantdata');         
                     }
                   // else
                     {
                       // $resdata = $cache->Fetch('ddrestaurantdata');
                     }          
                    $cache = null;
                    return $resdata;
                }
            catch (Exception $ex){
                    throw new Exception($ex->getMessage()) ;
                }
            }
    	public function saveRestaurantData(Restaurant_Model_Restaurant $restaurantModel,$location_name)
    	{
            try
            {
                    $db = $this->getDbTable();
                    $resdata = array();
                           $resdata['resid']= $restaurantModel->getResid();
                            $resdata['resname']= $restaurantModel->getResname();
                            $resdata['rescapacity']= $restaurantModel->getRescapacity();
                            $resdata['resemail']= $restaurantModel->getResemail();
                            $resdata['resyear_founded']= $restaurantModel->getResyear_founded();
                            $resdata['resprice']= $restaurantModel->getResprice();
                            $resdata['resaddress']= $restaurantModel->getResaddress();
                            $resdata['rescity_id']= $restaurantModel->getRescity_id();
                            $resdata['reslocation_id']= $restaurantModel->getReslocation_id();
                            $resdata['reszipcode']= $restaurantModel->getReszipcode();
                            $resdata['resphone']= $restaurantModel->getResphone();
                            $resdata['resfax']= $restaurantModel->getResfax();
                            $resdata['restimezone']= $restaurantModel->getRestimezone();
                            $resdata['reswebsite']= $restaurantModel->getReswebsite();
                            $resdata['resdescription']= $restaurantModel->getResdescription();
                            $resdata['resdining_style']= $restaurantModel->getResdining_style();
                            $resdata['resparking']= $restaurantModel->getResparking();
                            $resdata['resprivate_party']= $restaurantModel->getResprivate_party();
                            $resdata['resprivate_party_contact']= $restaurantModel->getResprivate_party_contact();
                            $resdata['resentertainment']= $restaurantModel->getResentertainment();
                            $resdata['resreservation_system']= $restaurantModel->getResreservation_system();
                            $resdata['resreservation_provider']= $restaurantModel->getResreservation_provider();
                            $resdata['res_status']= $restaurantModel->getRes_status();
                            $resdata['resrestaurant_status']= $restaurantModel->getResrestaurant_status();
                            $resdata['resapprovalstatus']= $restaurantModel->getResapprovalstatus();
                            $resdata['resgooglemapstatus']= $restaurantModel->getResgooglemapstatus();
                            $resdata['reslocation']= $restaurantModel->getReslocation();
                            $resdata['restimings']= $restaurantModel->getRestimings();
                            $resdata['rescreateddatetime']= $restaurantModel->getRescreateddatetime();
                            $resdata['rescreatedby']= $restaurantModel->getRescreatedby();
                            $resdata['resupdatedby']= $restaurantModel->getResupdatedby();
                            $resdata['resupdateddatetime']= $restaurantModel->getResupdateddatetime();
                            $resdata['resexecutive_chef']= $restaurantModel->getResexecutive_chef();
                            $resdata['resaccept_walkin']= $restaurantModel->getResaccept_walkin();
                            $resdata['resmenu']= $restaurantModel->getResmenu();
                            $resdata['rescategory_id']= $restaurantModel->getRescategory_id();
                            $resdata['reslisted_restaurant_id']= $restaurantModel->getReslisted_restaurant_id();
                            $resdata['resorigin_id']= $restaurantModel->getResorigin_id();
                            $resdata['respaymentstatus']= $restaurantModel->getRespaymentstatus();
                            $resdata['resspecial_request']= $restaurantModel->getResspecial_request();
                            $resdata['reslandmark']= $restaurantModel->getReslandmark();
                            $resdata['resavg_mealprice_max']= $restaurantModel->getResavg_mealprice_max();
                            $resdata['resavg_mealprice_min']= $restaurantModel->getResavg_mealprice_min();
                            $resdata['resdelivery']= $restaurantModel->getResdelivery();
                            $resdata['resair_conditioned']= $restaurantModel->getResair_conditioned();
                            $resdata['reslunch_buffet']= $restaurantModel->getReslunch_buffet();
                            $resdata['resdinner_buffet']= $restaurantModel->getResdinner_buffet();
                            $resdata['reswifi']= $restaurantModel->getReswifi();
                            $resdata['resalcohol']= $restaurantModel->getResalcohol();
                            $resdata['res_smoking']= $restaurantModel->getRes_smoking();
                            $resdata['resparty_allowed']= $restaurantModel->getResparty_allowed();
                            $resdata['rescatering']= $restaurantModel->getRescatering();
                            $resdata['reskids_section']= $restaurantModel->getReskids_section();
                            $resdata['resgoogle_place_id']= $restaurantModel->getResgoogle_place_id();
                            $resdata['res_social_media_fb_url']= $restaurantModel->getRes_social_media_fb_url();
                            $resdata['res_likes']= $restaurantModel->getRes_likes();
                            $resdata['res_specialities']= $restaurantModel->getRes_specialities();
                            $resdata['res_dislikes']= $restaurantModel->getRes_dislikes();
                            $resdata['res_reviews']= $restaurantModel->getRes_reviews();
                            $resdata['res_social_media_twitter_url']= $restaurantModel->getRes_social_media_twitter_url();
                            $resdata['resimage_data']= $restaurantModel->getResimage_data();
                            $resdata['rescountry_id']= $restaurantModel->getRescountry_id();
                            $resdata['res_cash'] = $restaurantModel->getRes_cash();
                            $resdata['res_credit_card'] = $restaurantModel->getRes_credit_card();
                            $resdata['res_gift_vouchers'] = $restaurantModel->getRes_gift_vouchers();
                            $resdata['res_visa_card'] = $restaurantModel->getRes_visa_card();
                            $resdata['res_master_card'] = $restaurantModel->getRes_master_card();
                            $resdata['resoutdoor_seating'] = $restaurantModel->getResoutdoor_seating();
                            $resdata['resdine_in'] = $restaurantModel->getResdine_in();
                            $resdata['reswheel_chair'] = $restaurantModel->getReswheel_chair();
                            $resdata['restelevision'] = $restaurantModel->getRestelevision();
                            $resdata['res_sports_telecast'] = $restaurantModel->getRes_sports_telecast();
                            $resdata['reslive_music'] = $restaurantModel->getReslive_music();
                            $resdata['resromantic_setup'] = $restaurantModel->getResromantic_setup();
                            $resdata['res_special_ocassion_dining'] = $restaurantModel->getRes_special_ocassion_dining();    
                            $resdata['resparking_valet'] = $restaurantModel->getResparking_valet();
                            $resdata['resparking_public'] = $restaurantModel->getResparking_public();
                            $resdata['resparking_prepaid'] = $restaurantModel->getResparking_prepaid();
                            $resdata['resbreakfast_buffet'] = $restaurantModel->getResbreakfast_buffet();
                            $resdata['res_social_media_instagram_url'] = $restaurantModel->getRes_social_media_instagram_url();
                            $resdata['restags'] = $restaurantModel->getRestags();
                            $resdata['resnon_veg'] = $restaurantModel->getResnon_veg();
                            $resdata['res_status'] = 1;
                            $resdata['resvanity_url'] = $this->getVantiyUrl($restaurantModel->getResname()." ".$location_name);
                            $timezoneMapper = new Application_Model_TimezonebdMapper();
                            $current_timezone = $timezoneMapper->fetchById($restaurantModel->getRestimezone());   
                            date_default_timezone_set($current_timezone);
                            $resdata['rescreateddatetime'] = date("Y-m-d H:i:s"); 
                            $resid =  $db->insert($resdata);
                            if(is_int($resid))
                            {
                                $restypeArray = $restaurantModel->getRestype_id();
                                $dataArray = array();
                                $cusineDataMapper = new Restaurant_Model_RestaurantCusineDataMapper();
                                if(is_array($restypeArray))
                                {
                                     foreach ($restypeArray as $key => $value) 
                                    {
                                        $cusineDataMapper->save(array('restaurant_fk_resid'=>$resid,'restaurant_type_fk_id'=>$value));
                                    }
                                }
                            }
                            return $resid;
                        }
                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }

            public function getRestautarntDetails($rid)
            {
                try
                        { 
                            $db= $this->getDbTable();
                                            $select = $db->select()
                                                        ->where("resid =?",$rid);
                            $stmt = $select->query();
                             $result = $stmt->fetchAll();
                             return $result;
                         }
                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }

            public function updateRestaurantDetails($data,$resid)
            {
                try
                {
                     $db= $this->getDbTable();
                     return $db->update($data,"resid=".$resid);
                }
                       

                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }

            public function updateLikes($likescount,$resid)
            {
                try
                {
                     $db= $this->getDbTable();
                     return $db->update($likescount,"resid=".$resid);
                }
                       

                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }
            /**
            *Includes function which returns data for map view and list view
            **/
            public function getListJson($searchLocation=null,$searchCriteria=null,$resid=null,$searchOrder=null,$searchCityId=null)
            {
                try{
                        $db = $this->getDbTable();
                        $select = $db->select()
                                        ->from(array('rd'=>'rd.restaurant_details'),array('rd.resid','rd.resname','rd.res_specialities','rd.resgoogle_place_id','rd.resprice','rd.resaddress','rd.reslocation','rd.resdining_style','rd.resmenu','rd.resparking','rd.resparty_allowed','rd.reswifi','rd.resalcohol','rd.resair_conditioned','rd.resavg_mealprice_min','rd.resavg_mealprice_max','rd.res_smoking','rd.resnon_veg','rd.res_cash','rd.res_gift_vouchers','rd.res_credit_card','rd.res_visa_card','rd.res_master_card','rd.resparking_prepaid','rd.resparking_public','rd.resparking_valet','rd.reskids_section','rd.res_sports_telecast','rd.resoutdoor_seating','rd.restelevision','rd.reslive_music','rd.reswheel_chair','rd.resromantic_setup','rd.resdine_in','rd.reslunch_buffet','rd.resdinner_buffet','rd.res_special_ocassion_dining','resdelivery','rd.resbreakfast','rd.reslunch','rd.resdinner','rd.resreservation_system','rd.res_likes','rd.res_dislikes','rd.res_reviews','rd.resview','rd.resvisit','reslocation_id','rd.restaurant_owner_fk_id','resrating','resvanity_url','reslisted_restaurant_id','resbreakfast_buffet'))
                                        ->join(array('cbd'=>'rd.country_bd'),'rd.rescountry_id = cbd.id', array('country_name'=>'cbd.description'))
                                        ->join(array('citybd'=>'rd.city_bd'),'rd.rescity_id = citybd.id', array('city_name'=>'citybd.description'))
                                        ->join(array('locationbd'=>'rd.location_boundaries'),'rd.reslocation_id = locationbd.id', array('location_name'=>'locationbd.description'))
                                        ->join(array('tbd'=>'rd.timezone_bd'),'rd.restimezone=tbd.id', array('time_zone'=>'tbd.description'))
                                        ->joinLeft(array('rtbd'=>'rd.restaurant_type_bd'),'rd.restype_id=rtbd.id',array('cusine'=>'rtbd.description'))
                                        ->setIntegrityCheck(false);
                          if($searchLocation)
                        {
                            if(!is_array($searchLocation))
                            {
                                if(is_numeric($searchLocation))
                                {
                                    $select->where('rd.reslocation_id = ?',$searchLocation); 
                                     $select->where('rd.rescity_id = ?',$searchCityId);  
                                }
                                else
                                {
                                    $select->where('rd.rescity_id = ?',$searchLocation);   
                                }
                            }
                            else
                            {
                                foreach ($searchLocation as $key => $value) {
                                    $select->where("$key = ?",$value);
                                }
                            }
                           
                        }
                        if($resid)
                        {
                            $select->where('rd.resid = ?',$resid);
                        }
                        if($searchCriteria)
                        {
                                      $select->where('(rd.resname ilike ?',"%".$searchCriteria."%")->ORwhere('rtbd.description ilike ?',"%".$searchCriteria."%")->ORwhere('rd.resdining_style ilike ?',$searchCriteria);

                                      $miselect = $db->select()
                                                    ->from(array('mr'=>'rd.menu_restaurant'),array('mr.mr_fk_resid'))
                                                    ->joinLeft(array('mc'=>'rd.menu_category'),'mr.mrid=mc.mc_fk_mrid',array(""))
                                                    ->joinLeft(array('mi'=>'rd.menu_items'),'mc.mcid=mi_fk_mcid',array(""))
                                                    ->where('mi.mi_name ilike ?',"%".$searchCriteria."%")
                                                    ->setIntegrityCheck(false);
                                        $mrids = $miselect->query()->fetchAll();
                                        $mwhere = array();

                                    if(sizeof($mrids)>0)
                                    {
                                       foreach ($mrids as $value)
                                       {
                                            $mwhere[] = $value['mr_fk_resid'];
                                        }

                                        $select->Orwhere('rd.resid  IN (?) ',$mwhere);

                                    }
                                    $cselect = $db->select()
                                                     ->from(array('rcd'=>'rd.restaurant_cusine_data'),array('rcd.restaurant_fk_resid'))
                                                    ->joinLeft(array('rtbd'=>'rd.restaurant_type_bd'),'rcd.restaurant_type_fk_id=rtbd.id',array(""))
                                                    ->where('rtbd.description ilike ?',"%".$searchCriteria."%")
                                                    ->setIntegrityCheck(false);
                                        $crids = $cselect->query()->fetchAll();
                                        $cwhere = array();

                                    if(sizeof($crids)>0)
                                    {
                                       foreach ($crids as $value)
                                       {
                                            $cwhere[] = $value['restaurant_fk_resid'];
                                        }

                                        $select->Orwhere('rd.resid  IN (?) ',$cwhere);

                                    }

                                     $active = 1;
                                $select->where('res_status = ?)',$active);
                        }    
                         $active = 1;
                        $select->where('res_status = ?',$active);
                      if($searchOrder)
                      {
                             switch($searchOrder)
                            {
                                case "best":
                                    $select->order(array("resrating DESC"));
                                    break;
                                case "LuxuryDinner":
                                            $select->where('rd.resdining_style ilike ?',"Luxury Dinner");
                                             $select->order("rd.resname");
                                        break;
                                 case "Buffet":
                                    $select->where('(rd.reslunch_buffet = ?',true)->Orwhere('rd.resdinner_buffet = ?',true)->Orwhere('rd.resbreakfast_buffet = ?)',true);
                                     $select->order("rd.resname");
                                break;
                                default:
                                    $select->order("rd.resname");
                                break;
                            }
                    }else{
                        $select->order("rd.resname");
                    }
                    //print_r($select->query());die();
                      $listjson = $select->query()->fetchAll();
                         return $listjson;
                      }
                 catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }

            public function getRestaurant($rid)
            {       
                  try {  
                    $db= $this->getDbTable();
                                    $data=Array();
                                    
                                    $select = $db->select()
                                            ->from(array('rd'=>'rd.restaurant_details'))
                                            ->join(array('citybd'=>'rd.city_bd'),'rd.rescity_id = citybd.id', array('rescity_name'=>'citybd.description'))
                                            ->join(array('locationbd'=>'rd.location_boundaries'),'rd.reslocation_id = locationbd.id', array('reslocation_name'=>'locationbd.description'))
                                            ->joinLeft(array('rbd'=>'rd.restaurant_type_bd'),'rbd.id= rd.restype_id',array('restypedescription'=>'rbd.description'))
                                            ->setIntegrityCheck(false)
                                            //->where("resvanity_url =?",$rid)
                                            ->ORwhere("resid =?",$rid);
                                    $stmt = $select->query();                 
                                    $results = $stmt->fetchAll();
                                    foreach ($results as $value)
                                     {
                                       $obj = new Restaurant_Model_Restaurant();
                                       $data [] =  $obj->setOptions($value);
                                       
                                     }      
                                     return $data;
                    }
                     catch(Exception $e)
                    {
                        throw new Exception($e->getMessage());
                        
                    }
            }
            
            public function getRestaurantNamesByOwnerId(Restaurant_Model_RestNamesByOwnerId $restaurantnames)
            {
            	try{
            		$table = $this->getDbTable();
            		$select = $table->select();
            
            		$select->from($table,array('resid','resname',''));
            		if($restaurantnames->getRestOwnerId()){
            			$select->where('resfk_user = ?',$restaurantnames->getRestOwnerId());
            		}else if($restaurantnames->getRestId()){
            			$select->where('resid = ?',$restaurantnames->getRestId());
            		}
            			
            		$select->where('res_status = ?',1);
            
            		$resultset =  $table->fetchAll($select);
            		$restNames = array();
            		$restNames[] = array('key'=>'','value'=>'Select Restaurant');
            		foreach($resultset as $result){
            			$restNames[] = array('key'=>$result->resid,'value'=>$result->resname);
            		}
            
            		return $restNames;
            	}catch (Exception $ex){
            		throw new Exception($ex->getMessage()) ;
            	}
            }
            public function manageRestaurant($conditonArray)
            {
                try
                {
                
                  //  $cache = new Rdine_Helper_CacheManager();
                    $resdata = array();
                   // if(!$resdata = $cache->Fetch('ddrestaurantdata'))
                     {
                            $db = $this->getDbTable();
                            $select = $db->select()
                                        ->from(array('rd'=>'rd.restaurant_details'),array('resid','resname','resemail','res_status','resview','resvisit','res_likes','res_dislikes'))
                                        ->joinLeft(array('lbd'=>'rd.location_boundaries'),'rd.reslocation_id = lbd.id', array('location_name'=>'lbd.description'))
                                        ->joinLeft(array('cbd'=>'rd.country_bd'),'rd.rescountry_id = cbd.id', array('country_name'=>'cbd.description'))
                                        ->joinLeft(array('citybd'=>'rd.city_bd'),'rd.rescity_id = citybd.id', array('city_name'=>'citybd.description'))
                                        ->order("rd.resid DESC")
                                        ->setIntegrityCheck(false);

                            if(sizeof($conditonArray)>0)
                            {
                                foreach ($conditonArray as $key => $value) 
                                {
                                    if(strlen($value)>0)
                                    {
                                        if($key=="resname")
                                        {
                                            $select->where("$key ILIKE ?","%".$value."%");
                                        }
                                        else
                                        {
                                            $select->where("$key = ?",$value);
                                        }
                                    }

                                }
                            }
                            $records = $db->fetchAll($select);                           
                            //$cache->Save($resdata,'ddrestaurantdata'); 
                             return $records;        
                     }
                }
                catch (Exception $ex){
                        throw new Exception($ex->getMessage()) ;
                    }
            }
	    public function updateReviewCount($resid,$count)
            {
                try
                {
                    $db = $this->getDbTable();
                    $arr = array('res_reviews'=>$count);
                    $where = array('resid = ?'=>$resid);
                   return  $db->update($arr,$where);
                }
                 catch (Exception $ex){
                    throw new Exception($ex->getMessage()) ;
                }
            }

         public function updateLikesCount($resid,$count)
            {
                try
                {
                    $db = $this->getDbTable();
                    $arr = array('res_reviews'=>$count);
                    $where = array('resid = ?'=>$resid);
                   return  $db->update($arr,$where);
                }
                 catch (Exception $ex){
                    throw new Exception($ex->getMessage()) ;
                }
            }   
            
        public function updateVisitor($type,$resid)
        {
            try
            {
                 $db = $this->getDbTable();
                 $select = $db->select()
                                ->from(array('rd.restaurant_details'),
                                    array('res'.$type))
                                ->where('resid =?',$resid);
                $value = $db->fetchRow($select);
                $value = $value['res'.$type];
                $data  = array('res'.$type => $value+1);
                $db->update($data,'resid='.$resid);
            }
             catch (Exception $ex){
                    throw new Exception($ex->getMessage()) ;
                }
        }

        public function getOtherLocationRestaurants($owner_id,$location_id)
        {
             try
            {
                 $db = $this->getDbTable();
                 $select = $db->select()
                            ->from(array('rd'=>'rd.restaurant_details'),array('resid','resname','resprice','reslocation_id','resvanity_url'))
                            ->joinLeft(array('lbd'=>'rd.location_boundaries'),'rd.reslocation_id = lbd.id', array('location_name'=>'lbd.description'))
                                ->where('rd.restaurant_owner_fk_id =?',$owner_id)
                                ->where('rd.reslocation_id <> ?',$location_id)
                                ->where('rd.res_status = ?',1)
                                ->setIntegrityCheck(false);
                $data = $select->query()->fetchAll();
                $restaurantlist = Array();
                if(is_array($data))
                {
                    foreach ($data as $key => $value) 
                    {

                        if($value['reslocation_id']!=$location_id)
                        {
                            $restaurantlist [] = array('restaurant_name'=>$value['resname'],'restaurant_id'=>$value['resid'],'location'=>$value['location_name'],'pricefor2'=>$value['resprice'],'vanityUrl'=>$value['resvanity_url']);    
                        }
                        
                    }
                }
                return $restaurantlist;
            }
             catch (Exception $ex){
                    throw new Exception($ex->getMessage()) ;
                }
        }

          public function getSimilarRestaurants($resid,$conditonArray)
        {
                try
                {
                    $db = $this->getDbTable();
                    $select = $db->select()
                                ->from(array("rd"=>"rd.restaurant_details"),array('resid','resname','resvanity_url','resaddress','resrating','res_likes','res_dislikes','res_reviews','reslisted_restaurant_id'))
                                 ->join(array('citybd'=>'rd.city_bd'),'rd.rescity_id = citybd.id', array('city_name'=>'citybd.description'))
                                 ->setIntegrityCheck(false);
                     $select->where('resid <> ?',$resid);
                    if(is_array($conditonArray))
                    {
                        foreach ($conditonArray as $key => $value) 
                        {
                            $select->where("$key = ?",$value);
                        }
                    }
                    $select->order(array('resrating'));
                    $select->limit(3,0);
                    $data = $select->query()->fetchAll();
                    return $data;
                }
                catch (Exception $ex)
                {
                    throw new Exception($ex->getMessage()) ;
                    }
        }
	
	 public function updateRating($resid,$avgrate)
    {
        try{
                $db = $this->getDbTable();
                $result = array(
                'resrating' => "$avgrate"                
                );
                $where = array();
                $where[] = "resid = ".$resid;
                $updatedata = $this->getDbTable()->update($result,$where);                 
                return $updatedata;
        }
        catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
    }

    public function getVantiyUrl($resname)
    {
        try 
        {
            $resname = ucwords($resname);
            $resname = str_replace("'","",$resname);
            $vanityUrl = preg_replace("/\s+/","-",$resname);
            $db = $this->getDbTable();
             $countSelect = $db->select()
                    ->from(array('rd'=>'rd.restaurant_details'),array('num'=>'COUNT(*)'))
                    ->where('resvanity_url ilike ?',$vanityUrl."%")
                    ->setIntegrityCheck(false);
                $arr = $db->fetchRow($countSelect);
                $count = $arr['num'];
                if($count == 0)
                {
                    return $vanityUrl;
                }
                else
                {
                    return $vanityUrl."-".($count+1);
                }
             
        } 
        catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
    }

    public function fetchRequiredData($cols,$values=null,$orderBy=null)
    {
        try
    {
        $db = $this->getDbTable();
        $select = $db->select();
        if(is_array($cols))
        {
            $select = $select->from('rd.restaurant_details',$cols);
        }   
        if(is_array($values))
        {
            if(sizeof($values)>0)
            {
                foreach ($values as $key => $value) {
                    $select = $select->where("$key = ?",$value);
                }
            }
        }
        if(is_array($orderBy))
        {
            $select->order($orderBy);
        }
        $data = $db->fetchAll($select);
        return $data;
    }catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
	    }

    public function searchReservationSlots(Restaurant_Model_GetRestaurantTimings $timings)
    {
        try{

            $table = $this->getDbTable();
            $todayDateSplit = explode("-",$timings->getDate());
            $s = mktime(0,0,0,$todayDateSplit[0],$todayDateSplit[1],$todayDateSplit[2]);
            $seDate = date('Y-m-d',$s);
            $dateSplit = explode("-",$timings->getDate());
            $weekday = date("l", mktime(0,0,0,$dateSplit[0],$dateSplit[1],$dateSplit[2]));

            $select = $table->select();
            $select->setIntegrityCheck(false);
            $select->from(array('res'=>$table),array('resid'))
                    ->join(array('rwt'=>'rd.restaurant_working_timings'),'res.resid = rwt.rwt_fk_restaurant',array('rwt_week_day','rwt_sch_type','rwt_start_time','rwt_end_time'))
                    ->where('rwt.rwt_end_time >= ?','02:00:00')
                   ->where('rwt.rwt_start_time <= ?','02:00:00')
                   ->where('rwt.rwt_week_day = ?','Monday')
                    ->where('res.resid = ?',50);
                  //  ->where('rwt.status = ?',true)
                  //  ->where('res.res_status = ?',1);

            
            $resultset = $select->query()->fetchAll();
            $result = '';
            echo 's';
            foreach ($resultset as $row) {
                $result = array(
                                'resid'         =>  $row->resid,
                                'rwt_id'        =>  $row->rwt_id
                            );
            }
            return $result;
        }catch (Exception $ex){
            throw new Exception($ex->getMessage()) ;
        }
    }

    public function getResnameByResid($resid)
    {
        try{
            $db = $this->getDbTable();
            $select = $db->select()
                         ->from('rd.restaurant_details',array('resname'))
                         ->where('resid =?',$resid);
            $data = $select->query()->fetchAll();
            //print_r($data);die();
            foreach ($data as $key => $value) {
                return $value['resname']; 
            }
                        

            }
         catch (Exception $ex){
                throw new Exception($ex->getMessage()) ;
            }
    }
 }
