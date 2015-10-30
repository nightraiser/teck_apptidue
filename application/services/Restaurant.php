<?php
/**
*	Name			: Restaurant.php
*	Author			: Snehal
*	Creation Date	: 9/30/2010
*	Path 			: application/services/Restaurant.php
*	Description		: This is the service class for the Restaurant module.
*					   	
*/
class Application_Service_Restaurant
{
	/**
	 * Instance variable of the form
	 * @var array
	 */
	protected $_form = array();
	
	 public function getMenuCatedorysAndMenuItems($request)
	{
		try{
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
    		$result = $categoryMapper->GetMenuCategoryAndItems($request->restaurantid);
    		return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	 public function AddMenuCatedoryAndItems($request)
	{
		try{
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
			$result = $categoryMapper->AddCategoryAndItems($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function getMenuCatedorysAndMenuItemsByMenuId($request)
	{
		try{
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
			$result = $categoryMapper->GetMenuCategoryAndItemsByMenuId($request->menuid);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	 public function addMenuHeader($request)
	{
		try{
			$menuMapper = new Restaurant_Model_MenuFirmDataMapper();
			$result = $menuMapper->addMenuHeader($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function setMobileMenuViewType($request)
	{
		try{
			$restid = $request->restaurantid;
			$viewtype = $request->viewtype;
			$menuMapper = new Restaurant_Model_MenuFirmDataMapper();
			$result = $menuMapper->setMobileMenuViewType($restid, $viewtype);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
		 public function getMenuHeader($request)
	{
		try{
			$menuMapper = new Restaurant_Model_MenuFirmDataMapper();
			$result = $menuMapper->getMenuHeader($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
		 public function changeMenuStatus($request)
	{
		try{
			$menuid = $request->menuid;
			if($request->status == 'ACT'){
				$status = 1;
			}else if($request->status == 'INA'){
				$status = 0;
			}
			$menuMapper = new Restaurant_Model_MenuFirmDataMapper();
			$result = $menuMapper->changeMenuStatus($menuid, $status);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function EditMenuCatedoryAndItems($request)
	{
		try{
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
			$result = $categoryMapper->EditCategoryAndItems($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function getMenuItemsByCategoryId($request)
	{
		try{
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$result = $itemMaper->getMenuItemsByCategoryId($request->categoryid);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function changeMenuCategoryStatus($request)
	{
		try{
			$categoryId = $request->categoryid;
			if($request->status == 'ACT'){
				$status = 1;
			}else if($request->status == 'INA'){
				$status = 0;
			}
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
			$result = $categoryMapper->changeMenuCategoryStatus($categoryId, $status);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	 public function updateCategory($request)
	{
		try{
			$categoryId = $request->categoryid;
			$categorydesc = '';
			$category = '';
			if($request->category){
				$category = $request->category;
			}
			if($request->categorydesc){
				$categorydesc = $request->categorydesc;
			}
			$categoryMapper = new Restaurant_Model_MenuCategoryDataMapper();
			$result = $categoryMapper->updateCategory($categoryId, $category,$categorydesc);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
     public function updateItem($request)
	{
		try{
				
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$result = $itemMaper->updateItem($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function addItemByCategoryid($request)
	{
		try{
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$result = $itemMaper->addItemByCategoryid($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
		 public function updateItemSequence($request)
	{
		try{
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$result = $itemMaper->updateItemSequence($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	* Handles cases for changes for state,country,timezones etc
	**/
		 public function locationChangeAjax($request)
	{
		try
		{
			$action = $request->getPost("action");
	        $value = $request->getPost("id");
	        switch ($action) {
	          case 'rescountry_id':
	            $citymapper = new Application_Model_CitybdMapper();
	            $cities = $citymapper->getCities($value);
	           return  json_encode($cities);
	            break;
	          case 'rescity_id':
	            $locationmapper = new Application_Model_LocationboundariesMapper();
	            $locations = $locationmapper->getLocations($value);
	            return  json_encode($locations);
	            break;
	          case 'CountryTimezone':
	          	$timezonemapper = new Application_Model_TimezonebdMapper();
	          	$timezones = $timezonemapper->getTimezones($value);
	          	return json_encode($timezones);
	          	# code...
	          	break;
	          case 'country_data':
	          $country_bdMapper = new Application_Model_CountrybdMapper();
	          $country_data =  $country_bdMapper->getCountries();
	          return json_encode($country_data);
	          break;
	          default:
	            # code...
	            break;
	        }
    	}
    	catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	* Returns form for restaurant
	**/
	public function getRestaurantForm()
	{
	try
	{
	    $form = new Restaurant_Form_Restaurantdetails();
        $timezone_bdMapper = new Application_Model_TimezonebdMapper();
        $country_bdMapper = new Application_Model_CountrybdMapper();
        $restaurant_type_bdMapper = new Application_Model_RestaurantTypebdMapper();
        $form->restimezone->addMultiOptions($timezone_bdMapper->getAll());
        $form->rescountry_id->addMultiOptions($country_bdMapper->getCountries());
        $restaurant_dining_style_bdMapper = new Application_Model_RestaurantDiningStylebdMapper();
        $diningStyleList = $restaurant_dining_style_bdMapper->getDinningStyle();
        $cuisineList = $restaurant_type_bdMapper->getCusines();
        $form->restype_id->addMultiOptions($cuisineList);
        $form->resdining_style->addMultiOptions($diningStyleList);
        $form->reslocation_id->addMultiOptions(array(array('key'=>0,'value'=>"Select")));
        $form->rescity_id->addMultiOptions(array(array('key'=>0,'value'=>"Select")));
        return $form;
    }
       catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	*Poupulates form values
	*/
		 public function setRestaurantFormValues($form,$resid)
	{
		try
		{
		 $mapper = new Restaurant_Model_RestaurantMapper();
       	 $obj = $mapper->getRestautarntDetails($resid);
       	 $cusineMapper = new Restaurant_Model_RestaurantCusineDataMapper();
       	 $obj[0]['restype_id'] = $cusineMapper->getCusine($obj[0]['resid']);
         foreach ($obj[0] as $key => $value){  
			if(isset($form->$key)){
	            $form->$key->setValue($value);
	        }
               
      	}
      	return $form;
      }
      catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	*Firm edit ajax
	**/
		 public function editAjax($request)
	{
		try 
		{
			$resmapper =  new Restaurant_Model_RestaurantMapper();
			$cusineMapper = new Restaurant_Model_RestaurantCusineDataMapper();
			$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
			 $postData = $request->getPost();
	         $data = $postData['data'];
	         $resid = $postData['resid'];
	        if($request->getPost('type')=="time")
	         {
	        	return $rwtMapper->updateRWT($resid,$data);
	         }
	         else
	         {
	         	if($request->getPost('type')=="timeRemove")
	         	{
	         		return $rwtMapper->removeRWT($data);
	         	}

	         	else {
	         	 	$arr = array();
	         	 				foreach ($data as $key => $value)
	         	 		              {
	         	 		              	if($value['name']!=="restype_id[]")
	         	 		              	{
	         	 		              		$arr[$value['name']] = $value['value'];
	         	 		              	}
	         	 		              	else
	         	 		              	{
	         	 		              		$cusineMapper->updateCusineData($resid,$value['value']);
	         	 		              	}
	         	 		             }
	         	 		        return $resmapper->updateRestaurantDetails($arr,$resid);
	         	 }
	         }
   		 }
   		 catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function uploadFirmDetails($form,$request,$baseurl)
	{
		try{
			$postData = $request->getPost();
            $restaurantModel =  new  Restaurant_Model_Restaurant();
            $restaurantModel->setOptions($postData);
			$restaurantMapper = new Restaurant_Model_RestaurantMapper();
			$locationMapper = new Application_Model_LocationboundariesMapper();
     		$location_name = $locationMapper->getLocationName($restaurantModel->getReslocation_id());
            $resid= $restaurantMapper->saveRestaurantData($restaurantModel,$location_name);
            if(is_numeric($resid)){
                 	 	$image_path = null;
	                   	$logopath = null;
	                   	$uploadpath = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/$resid/";
	                    if(!file_exists($uploadpath)){
	                        $dir = mkdir($uploadpath, 0777, true);
	                       }
                    	$uploadpath .= "resimages/";
		                if(!file_exists($uploadpath)){
		                         $dir = mkdir($uploadpath,0777,true);
		                  }
		                $imageName = null;
		                $imagepath = array();
		                $imageAdapter = $form->res_image_button->getTransferAdapter();
	                   if (file_exists($uploadpath)){
		                    if($imageAdapter && $resid) {
		                        $i = -1;
		                        foreach ($imageAdapter->getFileInfo() as $info){
		                             if($i != -1){
		                                    if($info['name']!=null){
		                                        $namearr = explode(".", $info['name']);
		                                        $ext = $namearr[sizeof($namearr)-1];
		                                        $fileName = 'image'.$i.'.'.$ext;
		                                        foreach ($info as $filenames){
		                                        	 $imageAdapter->setFilters(array(new Zend_Filter_File_Rename(array('target'=>$uploadpath.$fileName, $filenames, 'overwrite'=>true))));
		                                        }
		                                        if($imageAdapter->receive($info['name'])){
		                                           $image_path = $uploadpath.$fileName;
		                                           $imagepath[] = $image_path;
		                                        }
                                   				$i++;
                                			}
                                			else
		                                       {
			                                        $i++;
			                                        $imagepath[] = "";
		                                       }
                       					 }
			                              else
			                              {
			                             	  $i++;
			                              }
                   					 }
                				}	
            			}
                	}
                return $resid;
            }
            catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
     }
/*
* Accepts request,baseurl,ismap parameters 
* When called for normal restaurant list ismap should be false
* which will not render the map boundaries and center location details
*/
     
	 public function getListJson($request,$baseurl)
     {
     	try {
	     		$searchLocation = $request->searchLocation;
	     		$searchCriteria = $request->searchCriteria;
	     		$searchOrder = $request->searchOrder;
	     		$searchCityId = $request->searchCityId;
	     		$restaurantMapper = new Restaurant_Model_RestaurantMapper();
	     		$rawData = array();
	     		$searchCriteria = str_replace("_","/",$searchCriteria);
	     		//$searchLocation = array("searchType"=>"near-me","latlng"=>array('lat'=>17.391069299999998,'lng'=>78.49675189999999));
	     		if(is_array($searchLocation))
	     		{
	     			if(array_key_exists("searchType", $searchLocation))
	     			{
	     				if($searchLocation['searchType']=="near-me")
	     				{

	     					$rawData = $this->getNearByRestaurants($restaurantMapper->getListJson(null,$searchCriteria,null,null,$searchCityId),$searchLocation['latlng']);
	     				}
	     			}
	     		}
	     		else
	     		{
	     			$rawData = $restaurantMapper->getListJson($searchLocation,$searchCriteria,null,$searchOrder,$searchCityId);
	     		}
	     		$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
	     		$weekday = date('l');
	     		$resCusineDataMapper = new Restaurant_Model_RestaurantCusineDataMapper(); 
	     		$jsonData['data'] = array();
		     	foreach ($rawData as $value) 
		     	{
		     		$arrData =array();
		     		$arrData['id'] = $value['resid'];
		     		$arrData['category'] = 'restaurant';
		     		$arrData['title'] = $value['resname'];
		     		$arrData['location'] = $value['resaddress'];
		     		$latlong = explode(",", str_replace(array( '(', ')' ), '', $value['reslocation']));
		     		$arrData['latitude'] = $latlong[0];
		     		$arrData['longitude'] = $latlong[1];
		     		$arrData['url'] = "/".strtolower($value['city_name'])."/$value[resvanity_url]";
		     		$arrData['diningStyle'] = $value['resdining_style'];
		     		$arrData['type_icon'] = "/images/icons/cusine/restaurant.png";
		     		$arrData['rating'] = $value['resrating'];
		     		$arrData['google_place_id'] = $value['resgoogle_place_id'];
		     		$arrData['country_name'] = $value['country_name'];
		     		$arrData['city_name'] = $value['city_name'];
		     		$arrData['location_name'] = $value['location_name'];
		     		$arrData['time_zone']=$value['time_zone'];
		     		$arrData["views"]=$value['resview'];
		     		$arrData["visits"]=$value['resvisit'];
		     		$arrData['restaurant_id'] = $value['reslisted_restaurant_id'];
		     		$otherRestaurantData =  $restaurantMapper->getOtherLocationRestaurants($value['restaurant_owner_fk_id'],$value['reslocation_id']);
		     		foreach ($otherRestaurantData as $reskey => $restaurant) 
		     		{
						$gallery = $this->getGalleryByRestaurantId($restaurant['restaurant_id'],$baseurl);
		     			$otherRestaurantData[$reskey]['display_pic'] = $gallery[0];	
		     			
		     		}
		     		$arrData['other_restaurants'] = $otherRestaurantData;
		     		$arrData['vanityUrl'] = $value['resvanity_url'];
		      		$dir = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/".$value['resid']."/resimages/";
		      		$abspath = $baseurl."/uploads/Restaurant_images/".$value['resid']."/resimages/";
		     		if(file_exists($dir))
		     		{
		     			$images = scandir($dir);
		     			if(sizeof($images)>2)
		     			{
		     				$i=0;
		     				foreach ($images as $image) 
		     				{	
		     					if($i>=2)
		     					{
		     					$arrData['gallery'][] = $abspath.$image;
		     					}
		     					$i=$i+1;
		     				}
		     			}
		     			else
		     			{
		     				$arrData['gallery']=array("/images/items/1.jpg");
		     			}
		     		}
		     		else
		     		{
		     			$arrData['gallery'] = array("/images/items/1.jpg");	
		     		}
		     		$arrData['color'] = "";
		     		$arrData['item_specific'] = array(
		     			"wifi" => $value['reswifi'],
		     			"alcohol" => $value['resalcohol'],
		     			"specialities" => $value['res_specialities'],
		     			"private_party" =>$value['resparty_allowed'],
		     			"menu"=>$value['resmenu'],
		     			"parking" => $value['resparking'],
		     			"ac" => $value['resair_conditioned'],
		     			"mealprice_min"=>intval($value['resavg_mealprice_min']),
		     			"mealprice_max"=>intval($value['resavg_mealprice_max']),
		     			"smoking" =>$value['res_smoking'],
		     			"home_delivery"=>$value['resdelivery'],
		     			"cusine" => $resCusineDataMapper->getCusineNamesByResid($value['resid']),
		     			"diningStyle" => $value['resdining_style'],
		     			"nonveg" => $value['resnon_veg'],
		     			"reservations"=>$value['resreservation_system'],
		     			"likes"=>$value['res_likes'],
		     			"dislikes"=>$value['res_dislikes'],
		     			"reviews"=>$value['res_reviews'],
		     			"payment_methods" => array(
		     				"cash"=>$value['res_cash'],
							"gift_vouchers"=>$value['res_gift_vouchers'],
							"credit_card"=>$value['res_credit_card'],
							"visa_card"=>$value['res_visa_card'],
							"master_card"=>$value['res_master_card'],
						),
						"pricefor2"=>$value['resprice'],
						"seating_type" => array(
							"outdoor_seating"=>$value['resoutdoor_seating'],
							"ac" => $value['resair_conditioned'],
							"dine_in"=>$value['resdine_in'],
							"delivery"=>$value['resdelivery'],
							"alcohol" => $value['resalcohol'],

							),
						
						"entertainment" => array(
							"sports_telecast"=>$value['res_sports_telecast'],
							"live_music"=>$value['reslive_music'],
							"television" =>$value['restelevision'],
							"wifi" => $value['reswifi'],
						),
						"special"=>array(
							"romantic_setup"=>$value['resromantic_setup'],
							"special_ocassion_dining"=>$value['res_special_ocassion_dining']
							),
						"dining_type"=>array(
							"lunch"=>$rwtMapper->isMealExits($value['resid'],$weekday,"Lunch"),
							"breakfast"=>$rwtMapper->isMealExits($value['resid'],$weekday,"Breakfast"),
							"dinner"=>$rwtMapper->isMealExits($value['resid'],$weekday,"Dinner"),
							"brunch"=>$rwtMapper->isMealExits($value['resid'],$weekday,"Brunch")
							),
						"buffet"=>array(
							"break"=>$value['resbreakfast_buffet'],
							"lunch_buffet"=>$value['reslunch_buffet'],
							"dinner_buffet"=>$value['resdinner_buffet']
							),
						"convinience" => array(
							"wheelchair"=>$value['reswheel_chair'],
							"kids_section"=>$value['reskids_section']
							),
						"parking"=>array("parking"=>$value['resparking'],"parking_valet"=>$value['resparking_valet'],'parking_public'=>$value['resparking_public'],'parking_prepaid'=>$value['resparking_prepaid'])

		     			);
		     		$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
		     		$rwtdata = $rwtMapper->getByRestaurantId($value['resid']);
		     		$today =  date("l");
		     		date_default_timezone_set("Asia/Kolkata");
		     		$rwtisOpen = $rwtMapper->isOpen($value['resid'],$today,date("H:i:s"));
		     		$arrData['item_specific']['isOpen']= $rwtisOpen;
		     		$arrData['timings'] = Array();
		     		foreach ($rwtdata as $value) 
		     		{
		     			if(!isset($arrData['timings'][$value['rwt_week_day']]))
		     			{
		     				$arrData['timings'][$value['rwt_week_day']]= Array();
		     			}
		     			$start = $value['rwt_start_time'];
		     			$start = date('h:i A',strtotime(substr($start,0,strlen($start)-3)));
		     			$end = $value['rwt_end_time'];
		     			$end = date('h:i A',strtotime(substr($end,0,strlen($end)-3)));
		     			array_push($arrData['timings'][$value['rwt_week_day']],array('rwt_sch_type'=>$value['rwt_sch_type'],'rwt_start_time'=>$start,'rwt_end_time'=>$end));
		     			
		     		}
		     		$jsonData ['data'][] = $arrData;
		     	}
		     	
		     	if($request->isMap=="true")
		     	{
		     		$locationMapper = new Application_Model_LocationboundariesMapper();
					$jsonData['borderDetails'] = $locationMapper->getBorder($request->searchLocation);
					$jsonData['mapcenter'] = $locationMapper->getMapCenter($request->searchLocation);	
		     	}
		     	
		     	return $jsonData;
     	}
     	catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
     }
		
	/**
	*Returns filter values in json format
	**/
	public function getFiltersJson($request)
	{
			try
			{
				  $cusineMapper = new Application_Model_RestaurantTypebdMapper();
           		 $cusineData = $cusineMapper->getCusinesFilter();
				$jsonData = Array();
				 $restaurant_dining_style_bdMapper = new Application_Model_RestaurantDiningStylebdMapper();
        		$diningStyleList = $restaurant_dining_style_bdMapper->getDinningStyle();
        		$pricebdMapper = new Application_Model_PriceMapper();
        		$placeId = $request->getPost('placeId');
        		$locationbdMapper = new Application_Model_LocationboundariesMapper();
        		$country_id = $locationbdMapper->getCountryId($placeId);
        		$pricebdData = $pricebdMapper->getPriceFilter($country_id);
				$jsonData['data'] =  Array();
				$jsonData['data']['diningStyle'] = $diningStyleList;
				$jsonData['data']['cusine'] = $cusineData;
				$jsonData['data']['costfor2'] = $pricebdData;
				return json_encode($jsonData);
			}
			catch(Exception $ex)
			{
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;
			}
	}

	public function resDetails($resid,$baseurl)
	{
		try{
			$detailsMapper = new Restaurant_Model_RestaurantMapper();
			$restaurantdata = $detailsMapper->getRestaurant($resid);
			$cusineMapper = new Restaurant_Model_RestaurantCusineDataMapper();
			$cusineArray = $cusineMapper->getCusineNamesByResid($resid);
			$tagDetails = array();
			foreach ($restaurantdata as  $rest) {
		     			$tagConditions = array("city_name"=>$rest->getRescity_name(),"location_name"=>$rest->getReslocation_name(),"cusines"=>$cusineArray);
		   				$tagDetails =  $this->generateTags($tagConditions);
		   				$rest->setRescusine_data($cusineArray);
		     		}
			$menudetailsMapper = new Restaurant_Model_MenuItemsDataMapper();
			$menudata = $menudetailsMapper->getRestaurantMenuItems($resid);
			$popularMenudata= $menudetailsMapper->getRestaurantMenuItemsPopular($resid);
			$resreviewMapper = new  Restaurant_Model_ResReviewMapper();
			$resreviewdata = $resreviewMapper->getResReviews($resid);
			if(is_array($resreviewdata))
			{
				foreach ($resreviewdata as $key => $value) {
					$resreviewdata[$key]->setGallery($this->getGalleryByReviewId($resid,$resreviewdata[$key]->getRrid(),$baseurl));					
				}
			}
			$output =Array();
			if(is_array($menudata))
			{ $data=array();
				$itemReviewMapper = new Restaurant_Model_ItemReviewMapper();
				$getItemReviews = Array();
			foreach ($menudata as $value) {
                 if(!isset($data[$value['menu_name']]))
                 {
                  $data[$value['menu_name']]=Array();
                 }
                 if(!isset($data[$value['menu_name']][$value['category_name']]))
                 {
                  $data[$value['menu_name']][$value['category_name']]=Array();
                 }
                 $itemreviewData = $itemReviewMapper->fetchItemReview($value['miid']);
                 foreach ($itemreviewData as $key => $itemreview) 
                 {
                 	$itemreviewData[$key]['gallery'] = $this->getGalleryByItemReviewId($resid,$itemreview['irid'],$baseurl);
                 }
                  $temp = array('item_id'=>$value['miid'],'item_categoryid'=>$value['mi_fk_mcid'],'item_name'=>$value['mi_name'],'item_description'=>$value['mi_description'],'item_price'=>$value['mi_price'],'item_review'=> $itemreviewData,'item_status'=>$value['mi_status'],'item_reviews'=>$value['mi_reviews'],'item_likes'=>$value['mi_likes'],'item_dislikes'=>$value['mi_dislikes']);
    			 array_push($data[$value['menu_name']][$value['category_name']], $temp) ;
                 } 
                                //echo json_encode($data);die();
              $output['menu_data'] =  $data;

          }

          if(is_array($popularMenudata))
			{ $data=array();
				$itemReviewMapper = new Restaurant_Model_ItemReviewMapper();
				$getItemReviews = Array();
				//print_r($popularMenudata);die();
			foreach ($popularMenudata as $value) {
                 if(!isset($data[$value['miid']]))
                 {
                  $data[$value['miid']]=Array();
                 }
                 $itemreviewData = $itemReviewMapper->fetchItemReview($value['miid']);
                 foreach ($itemreviewData as $key => $itemreview) 
                 {
                 	$itemreviewData[$key]['gallery'] = $this->getGalleryByItemReviewId($resid,$itemreview['irid'],$baseurl);
                 }
                  $temp = array('item_id'=>$value['miid'],'item_name'=>$value['mi_name'],'item_description'=>$value['mi_description'],'item_price'=>$value['mi_price'],'item_review'=> $itemreviewData,'item_status'=>$value['mi_status'],'item_reviews'=>$value['mi_reviews'],'item_likes'=>$value['mi_likes'],'item_dislikes'=>$value['mi_dislikes']);
    			 array_push($data[$value['miid']], $temp) ;
                 } 
              $output['popularmenu_data'] =  $data;
          }
			$output['restaurant_data'] =$restaurantdata;
			$customerMapper = new User_Model_CustomerMapper();
			$cusnames = Array();
			if(is_array($resreviewdata))
			{
			foreach ($resreviewdata as $reviewdata )
			 {
			 	$cname = $customerMapper->getcusdata($reviewdata->getRrcreatedby());
				if(array_key_exists(0, $cname))
				{
				$reviewdata->setUsername($cname[0]['cusfirst_name']);
				}
				else
				{
					$reviewdata->setUsername("User");	
				}
			}
			}
			$output['resreview_data'] = $resreviewdata;
			$output['working_timings'] = array();
			$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
			$weekday = date('l');		
			$output["dining_type"]=array(
							"lunch"=>$rwtMapper->isMealExits($resid,$weekday,"Lunch"),
							"breakfast"=>$rwtMapper->isMealExits($resid,$weekday,"Breakfast"),
							"dinner"=>$rwtMapper->isMealExits($resid,$weekday,"Dinner"),
							"brunch"=>$rwtMapper->isMealExits($resid,$weekday,"Brunch")
							);
			$rwtdata = $rwtMapper->getByRestaurantId($resid);
			foreach ($rwtdata as $value) 
		     		{
		     			if(!isset($output['working_timings'][$value['rwt_week_day']]))
		     			{
		     				$output['working_timings'][$value['rwt_week_day']]= Array();
		     			}
		     			$start = $value['rwt_start_time'];
		     			$start = date('h:i A',strtotime(substr($start,0,strlen($start)-3)));
		     			$end = $value['rwt_end_time'];
		     			$end = date('h:i A',strtotime(substr($end,0,strlen($end)-3)));
		     			array_push($output['working_timings'][$value['rwt_week_day']],array('rwt_id'=>$value['rwt_id'],'rwt_sch_type'=>$value['rwt_sch_type'],'rwt_start_time'=>$start,'rwt_end_time'=>$end));
		     		}
		     		
		    
		   $this->visitorManagement($resid,"visit");
		   $output['tagDetails'] = $tagDetails;
			return $output;
			}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
			}	
	}

	public function itemReviewsByUserid($userid,$baseurl)
	{	try 
		{
			$itemReviewMapper = new Restaurant_Model_ItemReviewMapper();
			$itemreviewdata = $itemReviewMapper->getitemReviewsByUserid($userid);
				$menuItemMapper =new Restaurant_Model_MenuItemsDataMapper();
				//print_r($itemreviewdata);die();
			if(is_array($itemreviewdata))
			{
				foreach ($itemreviewdata as $key => $value) {
					$itemreviewdata[$key]['gallery'] = $this->getGalleryByItemReviewId($itemreviewdata[$key]['resid'],$itemreviewdata[$key]['irid'],$baseurl);					
					$menuItemName = $menuItemMapper->getMenunameById($itemreviewdata[$key]['itemid']);
					$itemreviewdata[$key]['itemname'] = $menuItemName[0]['mi_name']; 

				}
			}
			//print_r($itemreviewdata);die();
			return $itemreviewdata;
		} 
		catch (Exception $ex) {
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;	
		}
		
	}

	public function resReviewsByUserid($userid,$baseurl)
	{	try 
		{
			$resReviewMapper = new Restaurant_Model_ResReviewMapper();
			$reviewdata = $resReviewMapper->getResReviewsByUserid($userid);

			$resMapper = new Restaurant_Model_RestaurantMapper();
			$resReviewModel = new Restaurant_Model_ResReview();

			if(is_array($reviewdata))
			{
				foreach ($reviewdata as $key => $value) {
					$reviewdata[$key]->setGallery($this->getGalleryByReviewId($reviewdata[$key]->getRr_fk_resid(),$reviewdata[$key]->getRrid(),$baseurl));
					$gallery = $this->getGalleryByRestaurantId($reviewdata[$key]->getRr_fk_resid(),$baseurl);
					$reviewdata[$key]->setResGallery($gallery[0]);
					$resname = $resMapper->getResnameByResid($reviewdata[$key]->getRr_fk_resid());
					$reviewdata[$key]->setResname($resname);					
				}
			}
			//print_r($reviewdata);die();
			return $reviewdata;
		} 
		catch (Exception $ex) {
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;	
		}
		
	}
	public function usernameByUserid($userid)
	{
		//echo $userid;
		$cusMapper = new User_Model_CustomerMapper();
		$cusname = $cusMapper->getcusdata($userid);
		//print_r($cusname);die();
		return $cusname[0]['cusfirst_name'];
	}
	

	
	public function EditSourceofRestaurant($request)
	{
		try{
			$obj = new User_Model_Manager();
			$source2 	= $request->source_list;
			$obj->setSourceid($source2);
			$userid 	= $request->uid;
			$obj->setId($userid);
			$sourcedesc 	= $request->sourcedescription;
			$obj->setSourcedescription($sourcedesc);
	
			$rsetownerMapper = new User_Model_ManagerDataMapper();
			$status = $rsetownerMapper->EditSourceofRestaurant($obj);
				
			return $status;
				
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function changeMenuItemStatus($request)
	{
		try{
			$itemid = $request->itemid;
			if($request->status == 'INA'){
				$status = 0;
			}
			$mapper  = new Restaurant_Model_MenuItemsDataMapper();
			$result = $mapper->changeMenuItemStatus($itemid, $status);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	

	
/*
	*Adds restaurant times
	**/
	public function addRestaurantTimes($request)
	{
		try
		{
			$timeData = $request->getPost('timeArray');
			$rid = $request->getPost('rid');
			$data = Array();
			$resmapper = new Restaurant_Model_RestaurantMapper();
			//$resdetails = $resmapper->getRestautarntDetails($rid);
			$timezoneMapper = new Application_Model_TimezonebdMapper();
	        //$current_timezone = $timezoneMapper->fetchById($resdetails['restimezone']);  
	        //date_default_timezone_set($current_timezone);
			
			$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
			return $rwtMapper->addRestaurantTimings($timeData,$rid);
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function visitorManagement($resid,$type)
	{

		try
		{
			$auth = Zend_Auth::getInstance(); 
			$detailsMapper = new Restaurant_Model_RestaurantMapper();
            $conditionArray = array(
                'resid' => $resid,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'ip'=>$_SERVER['REMOTE_ADDR'],
                'type'=>$type,
                'isLoggedIn' =>$auth->hasIdentity(),
                );
            if($auth->hasIdentity())
            {
				    $storage = new Zend_Auth_Storage_Session();
                    $userArr = $storage->read();
                    $userid = $userArr['User_Id'];
                $conditionArray['userid'] = $userid;
            }   
			$visitorMapper= new Restaurant_Model_RestaurantVsitorsMapper();
			$update = $visitorMapper->updateRow($conditionArray);
			 if($update)
			{
				$detailsMapper->updateVisitor($type,$resid);	
			}
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
		public function uploadReviewDetails($form,$request,$baseurl)
	{
		try{
			$postData = $request->getPost();
			$data = $postData['review_text'];
			$resid = $postData['rr_fk_resid'];
            $reviewModel =  new  Restaurant_Model_ItemReview();
            $reviewModel->setOptions($postData);
			$resreviewMapper = new Restaurant_Model_ResReviewMapper();
            $rrid= $resreviewMapper->saveReviewData($postData);
            $reviewcount = $resreviewMapper->getReviewsCount($resid);
            if(is_numeric($rrid)){
            		$avgrate = $resreviewMapper->getAvgRating($resid);
            			$resMapper = new Restaurant_Model_RestaurantMapper();
            		$updateResrate = $resMapper->updateRating($resid,$avgrate);
                 	 	$image_path = null;
	                   	$logopath = null;
	                   	$uploadpath = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/$resid/";
	                   	if(!file_exists($uploadpath)){
	                        $dir = mkdir($uploadpath, 0777, true);
	                       }
	                    $uploadpath .= "resreviewimages/$rrid/";
		                if(!file_exists($uploadpath)){
		                         $dir = mkdir($uploadpath,0777,true);
		                  }   
	                    $imageName = null;
		                $imagepath = array(); 
		                $imageAdapter = $form->res_image_button->getTransferAdapter();
		                if (file_exists($uploadpath)){
		                    if($imageAdapter && $resid) {
		                        $i = -1;
		                        foreach ($imageAdapter->getFileInfo() as $info){
		                             if($i != -1){ 
		                             	if($info['name']!=null){
		                                        $namearr = explode(".", $info['name']);
		                                        $ext = $namearr[sizeof($namearr)-1];
		                                        $fileName = 'image'.$i.'.'.$ext;
		                                        foreach ($info as $filenames){
		                                        	 $imageAdapter->setFilters(array(new Zend_Filter_File_Rename(array('target'=>$uploadpath.$fileName, $filenames, 'overwrite'=>true))));
		                                        } 
		                                        if($imageAdapter->receive($info['name'])){
		                                           $image_path = $uploadpath.$fileName;
		                                           $imagepath[] = $image_path;
		                                        }
                                   				$i++;
                                			}
                                			else
		                                       {
			                                        $i++;
			                                        $imagepath[] = "";
		                                       }
                       					 }
			                              else
			                              {
			                             	  $i++;
			                              }
                   					 }
                				}	
            			}
                	}
             $resmapper = new Restaurant_Model_RestaurantMapper();
             echo $resmapper->updateReviewCount($resid,$reviewcount);
             //die();	
            return $rrid; 	
      		}	
      		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
            
	}

	
	public function uploadItemReviewDetails($request,$baseurl)
	{
		try{
			$postData = $request->getPost();
			$data = $postData['ir_review_text'];
			$resid = $postData['irresid_fk_resid'];
			$itemid = $postData['iritemid_fk_miid'];
			$itemreviewMapper = new Restaurant_Model_ItemReviewMapper();
            $irid= $itemreviewMapper->saveReviewData($postData);
            $totalReviews;	
            if(is_numeric($irid)){
                 	 	$image_path = null;
	                   	$logopath = null;
	                   	$uploadpath = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/$resid/";
	                   	if(!file_exists($uploadpath)){
	                        $dir = mkdir($uploadpath, 0777, true);
	                       }
	                    $uploadpath .= "itemreviewimages/$irid/";
		                if(!file_exists($uploadpath)){
		                         $dir = mkdir($uploadpath,0777,true);
		                  }   
	                   foreach ($_FILES as $key => $value) 
	                   {
	                   	$namearr = explode(".", $value['name']);
	                   	 $ext = $namearr[sizeof($namearr)-1];
	                   	$target_file = $uploadpath."/image".$key.".".$ext;
	                   	move_uploaded_file($value["tmp_name"], $target_file);
	                   }
	            $reviewcount = new Restaurant_Model_ItemReviewMapper();
	            $totalReviews = $reviewcount->getReviewsCount($itemid);
	            $menuMapper = new Restaurant_Model_MenuItemsDataMapper();
	            $updateReviewsCount = $menuMapper->updateReviews($itemid,$totalReviews); 
                	}
            return $totalReviews;
      		}	
      		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
            
	}
	


	public function getReviewForm()
	{ 
		try{
			$form = new Restaurant_Form_Reviewdetails();
			return $form;

		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}


	}

	public function itemreviewfetch($request)
	{
		try{
			$itemid = $request->getPost('itemid');
			$resid = $request->getPost('resid');
			 $itemReviewMapper = new Restaurant_Model_ItemReviewMapper();
			 $itemreviewdata = $itemReviewMapper->fetchItemReview($itemid,$resid);
			 
			 $cusmapper = new User_Model_CustomerMapper();
			 foreach ($itemreviewdata as $itemdata ) {
			 	$itemreviewdata[0]['cusname']=$cusmapper->getcusdata($itemdata['userid']);

			 }
			return $itemreviewdata;
			
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	} 

	
	public function getItemReviewForm()
	{
		try{
			$itemform = new Restaurant_Form_Itemreviewdetails();
			return $itemform;

		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function insertLikes($request,$userid)
	{
		try{
		        $resid = $request->getPost('resid');
		        $userid = $request->getPost('userid');
				$reslikemapper = new Restaurant_Model_RestaurantLikesMapper();
				$isLiked =  $reslikemapper->isLikeExists($resid,$userid,"true");
		      	$output=null;
		      	if($isLiked)
		      	{
		      		return 0;
		      	}
		      	else
		      	{
		      		$isLiked =  $reslikemapper->isLikeExists($resid,$userid,"false");
		      		if($isLiked)
		      		{
		      			$output = $reslikemapper->updateLikeStatus($resid,$userid);
		      		}
		      		else
		      		{
		      			$output = $reslikemapper->insertLikeStatus($resid,$userid);
		      		}
		      	}	      	
	   	   return 1;		
			}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function insertItemLikes($request,$userid)
	{
		try{
		        $itemid = $request->getPost('itemid');
		        
				$itemLikeMapper = new Restaurant_Model_ItemLikesMapper();
				$isLiked =  $itemLikeMapper->isLikeExists($itemid,$userid,"true");
		      	$output=null;
		      	if($isLiked)
		      	{
		      		return 1;
		      	}
		      	else
		      	{
		      		$isLiked =  $itemLikeMapper->isLikeExists($itemid,$userid,"false");
		      		if($isLiked)
		      		{
		      			$output = $itemLikeMapper->updateLikeStatus($itemid,$userid);
		      
		      		}
		      		else
		      		{
		      			$output = $itemLikeMapper->insertLikeStatus($itemid,$userid);
		     
		      		}
		      	}	      	
	   	   return 1;		
			}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	}

	public function insertDislikes($request,$userid)
	{
		try{
		        $resid = $request->getPost('resid');
		        $userid = $request->getPost('userid');
				$reslikemapper = new Restaurant_Model_RestaurantLikesMapper();
				$isDisLiked =  $reslikemapper->isDisLikeExists($resid,$userid,"true");
		      	$output=null;
		      	if($isDisLiked)
		      	{
		      		return 0;
		      	}
		      	else
		      	{
		      		$isDisLiked =  $reslikemapper->isDisLikeExists($resid,$userid,"false");
		      		if($isDisLiked)
		      		{
		      		$output = $reslikemapper->updateDisLikeStatus($resid,$userid);	
		      		}
		      		else
		      		{
		      			$output = $reslikemapper->insertDisLikeStatus($resid,$userid);
		      		}
		      	}	      	
	   	   return 1;		
			}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	}

	public function insertItemDisLikes($request,$userid)
	{
		try{
		        $itemid = $request->getPost('itemid');
				$itemLikeMapper = new Restaurant_Model_ItemLikesMapper();
				$isLiked =  $itemLikeMapper->isDisLikeExists($itemid,$userid,"true");
		      	$output=null;
		      	if($isLiked)
		      	{
		      		return 1;
		      	}
		      	else
		      	{
		      		$isLiked =  $itemLikeMapper->isDisLikeExists($itemid,$userid,"false");
		      		if($isLiked)
		      		{
		      			$output = $itemLikeMapper->updateDisLikeStatus($itemid,$userid);
		      		}
		      		else
		      		{
		      			$output = $itemLikeMapper->insertDisLikeStatus($itemid,$userid);
		      		}
		      	}	      	
	   	   return 1;		
			}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	}




	public function countLikes($request,$userid)
	{
		try 
		{
			$resid = $request->getPost('resid');
			$reslikemapper = new Restaurant_Model_RestaurantLikesMapper();
			$likesDislikesCount = $reslikemapper->getCount($resid);
			if(isset($likesDislikesCount))
			{
				$resmapper = new Restaurant_Model_RestaurantMapper();
				$updatedlikes = $resmapper->updateLikes($likesDislikesCount,$resid);
				return $likesDislikesCount;
			}
			else
			{
				return 0;
			}
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	}

	public function countItemLikes($request,$userid)
	{
		try
		{
			$itemid = $request->getPost('itemid');
			$itemlikemapper = new Restaurant_Model_ItemLikesMapper();
			$likesDislikesCount = $itemlikemapper->getCount($itemid);
			if(isset($likesDislikesCount))
			{
				$menuitemmapper = new Restaurant_Model_MenuItemsDataMapper();
				$updatedlikes = $menuitemmapper->updateLikes($likesDislikesCount,$itemid);
				return $likesDislikesCount;

			}
			else
			{
				return 0;
			}
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}

	}


	public function insertshortlist($request,$userid)
	{
		try{
		
			$action = $request->getPost('perform');
	        $resid = $request->getPost('resid');
	      	$shortlistmapper = new Restaurant_Model_ShortlistMapper();
	      	$isLiked =  $shortlistmapper->isLikeExits($resid,$userid,"true");
	      	$output=null;
	      	if($isLiked)
	      	{
	      		$num= $shortlistmapper->updateshortlist($resid,$userid,"false");
	      		if($num>0)
	      		{
	      			$output = false;
	      		}
	      		else
	      		{
	      			$output = true;
	      		}
	      	}
	      	else
	      	{
	      		$isLiked =  $shortlistmapper->isLikeExits($resid,$userid,"false");
	      		if($isLiked)
	      		{
	      			$num=$shortlistmapper->updateshortlist($resid,$userid,"true");	
		      		if($num>0)
		      		{
		      			$output = true;
		      		}
		      		else
		      		{
		      			$output = false;
		      		}
	      		}
	      		else
	      		{
	      			$num = $shortlistmapper->insertshortlist($resid,$userid);
	      			if($num>0)
		      		{
		      			$output = true;
		      		}
		      		else
		      		{
		      			$output = false;
		      		}
	      		}
	      	}
	      	 return $output;
	      	}	
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function showshortlist($userid,$baseurl)
	{
		try{
			$shortlistmapper = new Restaurant_Model_ShortlistMapper();
			$shortlisdata =  $shortlistmapper->showshortlist($userid);
			$output = array();
			$resMapper = new Restaurant_Model_RestaurantMapper();
			$resCusineDataMapper = new Restaurant_Model_RestaurantCusineDataMapper();
			foreach ($shortlisdata as $value) {
				$arr = $resMapper->getListJson(NULL,NULL,$value['slresid'],null,null);
				$temp = array();
				if(array_key_exists(0, $arr)){
					$mainData = $arr[0];					
					$temp['data'] = array();
					$temp['data']['title'] = $mainData['resname'];
					$temp['data']['id'] = $mainData['resid'];
					$temp['data']['gallery'] = $this->getGalleryByRestaurantId($mainData['resid'],$baseurl);
					$temp['data']['item_specific'] = array();
					$temp['data']['location'] = $mainData['resaddress'];
					$temp['data']['item_specific']['diningStyle'] = $mainData['resdining_style'];
					$temp['data']['rating'] = $mainData['resrating'];
					$temp['data']['item_specific']['cusine'] = $resCusineDataMapper->getCusineNamesByResid($mainData['resid']);
					$temp['data']['item_specific']['likes'] = $mainData['res_likes'];
					$temp['data']['item_specific']['dislikes'] = $mainData['res_dislikes'];
					$temp['data']['likes'] = $mainData['res_likes'];
					$temp['data']['dislikes'] = $mainData['res_dislikes'];
					$temp['data']['location_name'] = str_replace(" ","_",strtolower($mainData['location_name']));
					$temp['data']['city_name'] = str_replace(" ","_",strtolower($mainData['city_name']));
					$temp['data']['vanityUrl']=$mainData['resvanity_url'];
					$temp['data']['restaurant_id']=$mainData['reslisted_restaurant_id'];
				}

				$output[] = $temp;
			}
			return $output;
		}		
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}

	public function showlikedreslist($userid,$baseurl)
	{
		try{
			$likesmapper = new Restaurant_Model_RestaurantLikesMapper();
			$likeddata =  $likesmapper->getLikedRestaurants($userid);
			$output = array();
			$resMapper = new Restaurant_Model_RestaurantMapper();
			$resCusineDataMapper = new Restaurant_Model_RestaurantCusineDataMapper();
			foreach ($likeddata as $value) {
			$arr = $resMapper->getListJson(NULL,NULL,$value['rlresid_fk_resid'],null);
			$mainData = $arr[0];
			$temp = array();
			$temp['data'] = array();
			$temp['data']['title'] = $mainData['resname'];
			$temp['data']['id'] = $mainData['resid'];
			$temp['data']['gallery'] = $this->getGalleryByRestaurantId($mainData['resid'],$baseurl);
			$temp['data']['item_specific'] = array();
			$temp['data']['location'] = $mainData['resaddress'];
			$temp['data']['item_specific']['diningStyle'] = $mainData['resdining_style'];
			$temp['data']['rating'] = $mainData['resrating'];
			$temp['data']['item_specific']['cusine'] = $resCusineDataMapper->getCusineNamesByResid($mainData['resid']);
			$temp['data']['dislikes'] = $mainData['res_dislikes'];
			$temp['data']['likes'] = $mainData['res_likes'];
			$temp['data']['city_name'] = $mainData['city_name'];
			$temp['data']['vanityUrl']=$mainData['resvanity_url'];
			$output[] = $temp;
			}
			return $output;
		}		
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}

	
	public function getRestaurantTimings($resid)
	{
		try
		{
					$rwtMapper = new Restaurant_Model_RestaurantWorkingTimingsMapper();
		     		$rwtdata = $rwtMapper->getByRestaurantId($resid);
		     		$rwtdata = $rwtdata;
		     		$arrData['timings'] = Array();
		     		foreach ($rwtdata as $value) 
		     		{
		     			if(!isset($arrData['timings'][$value['rwt_week_day']]))
		     			{
		     				$arrData['timings'][$value['rwt_week_day']]= Array();
		     			}
		     			$start =  date('h:i A',strtotime($value['rwt_start_time']));
		     			$end = date('h:i A',strtotime($value['rwt_end_time']));
		     			array_push($arrData['timings'][$value['rwt_week_day']],array('rwt_id'=>$value['rwt_id'],'rwt_sch_type'=>$value['rwt_sch_type'],'rwt_start_time'=>$start,'rwt_end_time'=>$end));
		     			
		     		}
		     		return $arrData;
		    }
		    catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
		
	}

	public function getGalleryByRestaurantId($resid,$baseurl,$default=true)
	{
		try
		{
			$dir = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/".$resid."/resimages/";
		      	$abspath = $baseurl."/uploads/Restaurant_images/".$resid."/resimages/";
		      	$arrData = array();
		     		if(file_exists($dir))
		     		{
		     			$images = scandir($dir);
		     			if(sizeof($images)>2)
		     			{
		     				$i=0;
		     				foreach ($images as $image) 
		     				{	
		     					if($i>=2)
		     					{
		     					$arrData[] = $abspath.$image;
		     					}
		     					$i=$i+1;
		     				}
		     			}
		     			else
		     			{
		     				if($default==true)
		     				{
		     					return array('/images/items/1.jpg');
		     				}
		     			}
		     		}
		     		else
		     			{
		     				if($default==true)
		     				{
		     					return array('/images/items/1.jpg');
		     				}
		     			}
		     	 return $arrData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getGalleryByItemId($item,$baseurl)
	{
		try
		{
			$dir = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/".$resid."/resimages/";
		      	$abspath = $baseurl."/uploads/Restaurant_images/".$resid."/resimages/";
		      	$arrData = array();
		     		if(file_exists($dir))
		     		{
		     			$images = scandir($dir);
		     			if(sizeof($images)>2)
		     			{
		     				$i=0;
		     				foreach ($images as $image) 
		     				{	
		     					if($i>=2)
		     					{
		     					$arrData[] = $abspath.$image;
		     					}
		     					$i=$i+1;
		     				}
		     			}
		     		}
		     	 return $arrData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	

	public function galleryManagement($request,$baseurl)
	{
		try
		{
			$perform = $request->getPost('perform');
			$resid = $request->getPost('resid');
			switch ($perform) {
				case 'remove':
					$target = $request->getPost('target');
					$target = $_SERVER['DOCUMENT_ROOT'].$target;
					
					if(unlink($target))
					{
						return 't';
					}
					else
					{
						return 'f';
					}
					break;
				
				default :
					  $imageAdapter = $_FILES;
					  $uploadpath = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/$resid/resimages/";
					  $returnArray = array();
					   $abspath = $baseurl."/uploads/Restaurant_images/".$resid."/resimages/";
	                   if (file_exists($uploadpath)){
	                   			$currentFiles = scandir($uploadpath);
	                   			$index = 0;
	                   			foreach ($currentFiles as $key => $value) {
	                   				if($key>1)
	                   				{
	                   					$arr = explode(".",$value);
	                   					$name = $arr[0];
	                   					$num = str_replace("image","",$name);
	                   					if(intval($num)>$index)
	                   					{
	                   						$index = $num;
	                   					}
	                   				}
	                   			}
	                   		
	                   			$i = -1;
	                   			foreach ($_FILES as $key => $value) 
			                    {
			                    	
			                    	if($i!=-1)
			                    	{
			                    		 $namearr = explode(".", $value['name']);
					                      $ext = $namearr[sizeof($namearr)-1];
					                     $target_file = $uploadpath."/image".$index.".".$ext;
					                     move_uploaded_file($value["tmp_name"], $target_file);
					                     $returnArray [] = $abspath."/image".$index.".".$ext;
			                    	}

			    					$index++;
			                		$i++;
			                    }

		                    }
		                    else
		                    {
		                  		 $dir = mkdir($uploadpath, 0777, true);
		                  		 $i = -1;
	                   			foreach ($_FILES as $key => $value) 
			                    {
			                    	
			                    	if($i!=-1)
			                    	{
			                    		 $namearr = explode(".", $value['name']);
					                      $ext = $namearr[sizeof($namearr)-1];
					                     $target_file = $uploadpath."/image".$i.".".$ext;
					                     move_uploaded_file($value["tmp_name"], $target_file);
					                     $returnArray [] = $abspath."/image".$i.".".$ext;
			                    	}
			                		$i++;
			                    }

		                    }
					 				
					 				return json_encode($returnArray);
					break;
			}
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getSimilarRestaurants($resid,$conditionArray=null,$baseurl)
	{
		try
		{
			$restaurantMapper = new Restaurant_Model_RestaurantMapper();
			$data = $restaurantMapper->getSimilarRestaurants($resid,$conditionArray);
			if(is_array($data))
			{
				foreach ($data as $key => $value) {
				$gallery = $this->getGalleryByRestaurantId($data[$key]['resid'],$baseurl);
					$data[$key]['image_path'] = $gallery[0];
				}
			}
			return $data;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getGalleryByReviewId($resid,$reviewid,$baseurl)
	{
		try
		{
		
			$dir = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/".$resid."/resreviewimages/$reviewid/";
		      	$abspath = $baseurl."/uploads/Restaurant_images/".$resid."/resreviewimages/$reviewid/";
		    
		      	$arrData = array();
		     		if(file_exists($dir))
		     		{
		     			$images = scandir($dir);
		     			if(sizeof($images)>2)
		     			{
		     				$i=0;
		     				foreach ($images as $image) 
		     				{	
		     					if($i>=2)
		     					{
		     					$arrData[] = $abspath.$image;
		     					}
		     					$i=$i+1;
		     				}
		     			}
		     		}
		     		
		     	 return $arrData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getGalleryByItemReviewId($resid,$reviewid,$baseurl)
	{	
		try
		{
		
			$dir = $_SERVER['DOCUMENT_ROOT'].$baseurl."/uploads/Restaurant_images/".$resid."/itemreviewimages/$reviewid/";
		      	$abspath = $baseurl."/uploads/Restaurant_images/".$resid."/itemreviewimages/$reviewid/";
		    
		      	$arrData = array();
		     		if(file_exists($dir))
		     		{
		     			$images = scandir($dir);
		     			if(sizeof($images)>2)
		     			{
		     				$i=0;
		     				foreach ($images as $image) 
		     				{	
		     					if($i>=2)
		     					{
		     					$arrData[] = $abspath.$image;
		     					}
		     					$i=$i+1;
		     				}
		     			}
		     		}
		     		
		     	 return $arrData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}


	public function getYourrating($userid,$resid)
	{
		try{
		$myrating = new Restaurant_Model_ResReviewMapper();
		$myrate = $myrating->getRatingbyuserid($userid,$resid);
		return $myrate;
		}
	catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getSearchLocations()
	{
		try
		{
			$locationmapper = new Application_Model_LocationboundariesMapper();
			$data = $locationmapper->fetchAll();
			$output = array();
			foreach ($data as  $location) {
				$output[] = array("name"=>$location['description'],"value"=>$location['lb_google_placeid']);
			}
			return $output;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function generateTags(array $tagKeys)
	{	
		try
		{
			$location = $tagKeys['location_name'];
			$locationInUrl = str_replace(" ", "_",$tagKeys['location_name']);
			$city = $tagKeys['city_name'];
			$cusine = $tagKeys['cusines'];
			$tags = array();
			$tags[] = array("phrase" =>"Restaurants in $city","vanityUrl"=>strtolower("/$city"));
			$tags[] = array("phrase" =>"Best Restaurants in $city","vanityUrl"=>strtolower("/$city/best-restaurant"));
			$tags[] = array("phrase" =>"Restaurants in $location","vanityUrl"=>strtolower("/$city/$locationInUrl-restaurant"));
			$tags[] = array("phrase" =>"Best Restaurants in $location","vanityUrl"=>strtolower("/$city/best-$locationInUrl-restaurant"));
			//$tags[] = array("phrase"=>"Restaurants near me","vanityUrl"=>strtolower("/near-me/"));
			//$tags[] = array("phrase"=>"Best Restaurants near me","vanityUrl"=>strtolower("/near-me/best-restaurant"));
			foreach ($cusine as $value) {
				$inUrl = str_replace("/", "_", $value);
				$tags[] = array("phrase"=>"$value Restaurants in $city","vanityUrl"=>strtolower("/$city/restaurant/$inUrl"));
				$tags[] = array("phrase"=>"$value Restaurants in $location","vanityUrl"=>strtolower("/$city/$locationInUrl-restaurant/$inUrl"));
				//$tags[] =array("phrase"=>"$value Restaurants near me","vanityUrl"=>strtolower("/near-me/restaurant/$value"));
			}
			return $tags;
 		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function saveApiReservation($request)
	{
		try{
			$mapper = new Restaurant_Model_ReservationDataMapper();	
			$result = $mapper->saveBookingDetails($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getNearByRestaurants($data,$position)
	{
		try
		{
			$lat = $position['lat'];
			$lng = $position['lng'];
			$rawData = array();
			foreach ($data as $value) 
			{
				$latlong = explode(",", str_replace(array( '(', ')' ), '', $value['reslocation']));
				$currentLat =$latlong[0];
				$currentLon = $latlong[1];
				$distance = 3959 * acos( cos( deg2rad($lat) ) * cos( deg2rad( $currentLat ) ) * cos( deg2rad( $currentLon ) - deg2rad($lng) ) + sin( deg2rad($lat) ) * sin( deg2rad( $currentLat ) ) );
				$distance = 1609.34*$distance;
				if($distance<200)//Distance is less than 2 miles
				{
					$rawData[] = $value;
				} 
			}
			return $rawData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getRouteDetails()
	{
		try
		{
				$arrData = array();
				$cityMapper = new Application_Model_CitybdMapper();
				$arrData['cities'] = array();
				$cdata = $cityMapper->fetchRequiredData(array('id','description'));
				foreach ($cdata as  $value) {
					$arrData['cities'][str_replace(" ","_",strtolower($value['description']))] = $value['id'];
 				}
				
				$locationmapper = new Application_Model_LocationboundariesMapper();
				$arrData['locations'] = array();
				$ldata = $locationmapper->fetchRequiredData(array('id','description'));
				foreach ($ldata as  $value) {
					$arrData['locations'][str_replace(" ","_",strtolower($value['description']))] = $value['id'];
 				}

				$resMapper = new Restaurant_Model_RestaurantMapper();
				$resdata = $resMapper->fetchRequiredData(array('resid','resvanity_url'));
				$arrData['restaurants'] = array();
				foreach ($resdata as  $value) {
					$arrData['restaurants'][$value['resvanity_url']] = $value['resid'];
				}
			
 				return $arrData;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function searchSugesstions()
	{
		try
		{
			$data = array();
			$data['locations'] = array();
			$locationMapper = new Application_Model_LocationboundariesMapper();
			$locations = $locationMapper->fetchSugesstionData();
			foreach ($locations as  $value) {
				$data['locations'][] = array('name'=>$value['location_name'].",".$value['city_name'].",".$value['country_name'],'value'=>$value['location_id']);
			}

			return $data;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

}
