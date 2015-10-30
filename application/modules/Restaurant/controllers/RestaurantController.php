<?php
/**
*	Name			: Restaurant.php
*	Author			: Snehal
*	Creation Date	: 09/30/2010
*	Path 			: application/modules/Restaurant/controllers/RestaurantController.php
*	Description		: This is controller class for the Manage Restaurant module.
*					   	
*/
class Restaurant_RestaurantController extends Zend_Controller_Action
{
    /**
	 * Instance variable of restaurant service
	 * @var object
	 */
	protected $_firmService = null;
	/**
     * Initialize the restaurant service instance.
     */
	public function init()
	{
		if(!$this->_firmService){
			$this->_firmService	= new Application_Service_Restaurant();
		}
	}

	/**
	 * Index Action
	 */
	public function indexAction()
	{
		// action body
	}
    /**
     * Firm registration Action
     */
	public function firmregistrationAction()
	{
       try 
        {
        	//$auth = Zend_Auth::getInstance();
        	//if($auth->hasIdentity()){
	        	$this->_helper->layout()->setLayout('restaurantlayout');
	            $form = $this->_firmService->getRestaurantForm();
	             $request = $this->getRequest();
	            if($request->isPost())
	            {
	               echo $this->_firmService->uploadFirmDetails($form,$request,$this->view->baseUrl());
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->layout->disableLayout();
	             }
	              $this->view->detailsForm = $form;
             // }else{
             // 	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            //  }
        }
      catch (Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
    }
    /**
     *  Menu category Action
     */    
	public function menucategoryanditemsAction()
    {
    	try{
    		$auth = Zend_Auth::getInstance();
    		if($auth->hasIdentity()){
    	
    		$this->_helper->layout()->setLayout('restaurantlayout');
    		$request = $this->getRequest();
    		$result = $this->_firmService->getMenuCatedorysAndMenuItems($request);
    		$this->view->result = $result;
    		$this->view->restaurantid = $request->restaurantid;
    		if($request->menuid){
    			$this->view->menuid = $request->menuid;
    		}else{
    			if(count($result) > 0){
    				$this->view->menuid = $result[0]['menuid'];
    			}
    		}
    		}else{
    			$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
    		}
    	}
        catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
    }
    /**
     *  Add menu header Action
     */
    public function addmenuheaderAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    		$request = $this->getRequest();
    		$result = $this->_firmService->addMenuHeader($request);
    		if($result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}
        catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    /**
     *  Set mobile view layout
     */
    public function setmobilemenuviewtypeAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    		$request = $this->getRequest();
    		$result = $this->_firmService->setMobileMenuViewType($request);
    		if($result){
    			echo json_encode('t');
    		}else{
    			echo json_encode('f');
    		}
    	}
        catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    /**
     *  Get menu header action
     */
    public function getmenuheaderAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    		$request = $this->getRequest();
    		$result = $this->_firmService->getMenuHeader($request);
    		if(count($result > 0)){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}
        catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    /**
     *  Change menu status action
     */
    public function changemenustatusAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->changeMenuStatus($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function addmenucategoryandmenuitemsAction()
    {
    	try{
    		$auth = Zend_Auth::getInstance();
    		if($auth->hasIdentity()){
    			$this->_helper->layout->disableLayout();
    			$this->_helper->viewRenderer->setNoRender();
    			$request = $this->getRequest();
    			$result = $this->_firmService->AddMenuCatedoryAndItems($request);
    			if($result)
    			{
    				echo $result;
    			}else{
    				echo 'f';
    			}
    		}else{
    			$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function getmenucategorysandmenuitemsAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->getMenuCatedorysAndMenuItems($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function getmenucategorysandmenuitemsbymenuidAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->getMenuCatedorysAndMenuItemsByMenuId($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function editmenucategoryandmenuitemsAction()
    {
    	try{
//     		$auth = Zend_Auth::getInstance();
//     		if($auth->hasIdentity()){
    			$this->_helper->layout->disableLayout();
    			$this->_helper->viewRenderer->setNoRender();
    			$request = $this->getRequest();
    			$result = $this->_firmService->EditMenuCatedoryAndItems($request);
    			if($result)
    			{
    				echo 't';
    			}else{
    				echo 'f';
    			}
//     		}else{
//     			$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
//     		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function getmenuitemsbycategoryidAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->getMenuItemsByCategoryId($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function changemenucategorystatusAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->changeMenuCategoryStatus($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function updatecategoryAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->updateCategory($request);
    		if(	$result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }

    public function updateitemAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();	
    		$request = $this->getRequest();
    		$result = $this->_firmService->updateItem($request);
    		if($result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }

    public function additembycategoryidAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->addItemByCategoryid($request);
    		if($result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }
    
    public function updateitemsequenceAction()
    {
    	try{
    		$this->_helper->layout->disableLayout();
    		$this->_helper->viewRenderer->setNoRender();
    			
    		$request = $this->getRequest();
    		$result = $this->_firmService->updateItemSequence($request);
    		if($result){
    			echo json_encode($result);
    		}else{
    			echo json_encode('f');
    		}
    	}catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }

	public function locationchangeajaxAction()
    {
        try 
        {
            
         $this->_helper->viewRenderer->setNoRender();
         $this->_helper->layout->disableLayout();
         echo $this->_firmService->locationChangeAjax($this->getRequest());
        } 
        catch (Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
    }

    public function firmeditAction()
    {
       try 
       {
        $auth = Zend_Auth::getInstance();
        $this->_helper->layout()->setLayout('restaurantlayout');
       if($auth->hasIdentity())
	        {
	        $form = $this->_firmService->getRestaurantForm();
	        $request = $this->getRequest();
	        $form = $this->_firmService->setRestaurantFormValues($form,$request->resid);
	            $this->view->reslocation_id = $form->getValue('reslocation_id');
	            $this->view->res_city_id = $form->getValue('rescity_id');
	            $this->view->detailsForm=$form;
        }else
       {
          $this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
       }
           
       } 
       catch (Exception $e) 
       {
            throw new Exception($e->getMessage());   
       }
    }

    public function editajaxAction()
    {
        try 
        {
             $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();     
             $request = $this->getRequest();
             echo  $this->_firmService->editAjax($request);
        }
         catch (Exception $e) 
         {
               throw new Exception($e->getMessage());   
        }       
    }

    public function listjsonAction()
    {
        try 
        {
            $this->_helper->viewRenderer->setNoRender();
             $this->_helper->getHelper('layout')->disableLayout();
             $request = $this->getRequest();
             $jsonData = $this->_firmService->getListJson($request,$this->view->baseUrl(),$request->isMap); 
              echo json_encode($jsonData);

        }
         catch (Exception $e) 
        {
            throw new  Exception($e->getMessage());    
        }

    } 

    public function restaurantsearchAction()
    {
    	try{
            $auth = Zend_Auth::getInstance();
             if($auth->hasIdentity())
             {
                $userid = $auth->getIdentity();
                $this->view->userid=$userid['User_Id'];
                $this->view->isLoggedIn = true;

             }
    	//	$this->_helper->layout()->setLayout('layout');
    		$request = $this->getRequest();
    		$searchLocation = $request->searchLocation;
    		$searchCriteria = $request->searchCriteria;
    		$this->view->searchLocation = $request->searchLocation;
			$this->view->searchCriteria = $request->searchCriteria;
            $this->view->searchOrder = $request->searchOrder;
            $this->view->searchLocationName = $request->searchLocationName; 
            $this->view->searchCity = $request->searchCity;
            if(isset($request->searchCityId))
            {
                $this->view->searchCityId = $request->searchCityId;
            }
    	}
        catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
    } 

    public function restaurantlistAction()
    {
    	try{
             $auth = Zend_Auth::getInstance();
             if($auth->hasIdentity())
             {
                $userid = $auth->getIdentity();
                $this->view->userid=$userid['User_Id'];
                $this->view->isLoggedIn = true;

             }
             else
             {
                 $this->view->isLoggedIn = false;
             }
            $request = $this->getRequest();
//            $cityid = $this->_firmService->getRouteDetails("city",$uriArr[$index]);

            $this->view->searchLocation = $request->searchLocation;
            $this->view->searchCriteria = $request->searchCriteria;
            $this->view->searchOrder = $request->searchOrder; 
            $this->view->searchLocationName = $request->searchLocationName; 
            $this->view->searchCity = $request->searchCity;	
            if(isset($request->searchCityId))
            {
                $this->view->searchCityId = $request->searchCityId;
            }
    	}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
    }

     public function resdetailsAction()
    {   

         try{ 
                $resid=$this->_getParam('resid');
                $request = $this->getRequest();
                $form =  $this->_firmService->getReviewForm();
                $itemform = $this->_firmService->getItemReviewForm();
                $auth = Zend_Auth::getInstance();            
                if($request->isPost())
                {                   
                      
                     $this->_helper->viewRenderer->setNoRender();
                     $this->_helper->layout->disableLayout();
                     echo $this->_firmService->uploadReviewDetails($form,$request,$this->view->baseUrl());  
                }       
                else
                {
                     if($auth->hasIdentity())
                     {
                        $userid = $auth->getIdentity();
                        $this->view->userid=$userid['User_Id'];
                        $this->view->isLoggedIn = true;
                        $id = $userid['User_Id'];
                        $yourrating = $this->_firmService->getYourrating($id,$resid);
                        $this->view->yourrating = $yourrating;
                        
                     }
                     else
                     {
                         $this->view->isLoggedIn = false;
                         $this->view->userid=0;
                     }
                    $this->view->resid = $resid;                 
                    $output=$this->_firmService->resDetails($resid,$this->view->baseUrl());
                    $resdata=$output['restaurant_data'];
                    $menudata=$output['menu_data'];
                    $timedata = $output['working_timings'];
                    $resreviewdata = $output['resreview_data'];
                    $this->view->form = $form;
                    $this->view->itemform = $itemform;
                    $this->view->dining_type = $output['dining_type'];
                    $resdata=$output['restaurant_data'][0];
                    $menudata=$output['menu_data'];
                    $popularmenudata = $output['popularmenu_data'];
                    
                    $timedata = $output['working_timings'];
                    $this->view->dining_type = $output['dining_type'];            
                    $this->view->resdata =$resdata;                
                    $this->view->menudata =$menudata;
                    $this->view->popularmenudata =$popularmenudata; 

                    $this->view->restaurantGallery = $this->_firmService->getGalleryByRestaurantId($resid,$this->view->baseUrl());
                    $this->view->resreviewdata = $resreviewdata; 
                    $this->view->timedata = $timedata;
                    $this->view->tagDetails = $output['tagDetails'];
                    //$this->view->userrating = $yourrating;
                    $this->view->similarRestaurants = $this->_firmService->getSimilarRestaurants($resid,$resdata->getResdining_style(),$this->view->baseUrl());
                }
            }
        catch (Exception $ex)
        {
            throw new Exception($ex->getMessage()) ;
        }
    }

    public function itemreviewinsert()
    {
        if($request->isPost())
         { 
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        echo $this->_firmService->uploadItemReviewDetails($form,$request,$this->view->baseUrl());   
         }   
    }

    public function itemformAction()
    {
	try
	{
	
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        $request = $this->getRequest();
        echo $this->_firmService->uploadItemReviewDetails($request,$this->view->baseUrl());
	}
	  catch (Exception $ex)
        {
            throw new Exception($ex->getMessage()) ;
        }
     }

    public function reslikesAction()
    {
        try
        {   $status  = 0;
            $request = $this->getRequest();
            $perform = $request->getPost('perform');
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();
            $likescount = array();
             $auth = Zend_Auth::getInstance();
            if($auth->hasIdentity())
            {
                 $userArr = $auth->getIdentity();
                $userid = $userArr['User_Id'];
            }
            else
            {
                $userid = 0;
            }
            if($perform == "like")
            {
                $status =  $this->_firmService->insertLikes($request,$userid);
                 if($status == 1 || $status == 0)
                 {
                    $likescount =  $this->_firmService->countLikes($request,$userid);
                 }
                 
            }
            elseif($perform == "dashboardlike")
            {   
                $status =  $this->_firmService->insertLikes($request,$userid);
                
                 if($status == 0)
                 {
                    $count = Array();
                    $likescount  = Array();
                    $count['res_likes'] = -1;
                    $likescount = $count;
                 }
                 else
                 {
                    $likescount =  $this->_firmService->countLikes($request,$userid);
                 }
            }
            elseif($perform == "dashboarddislike")
            {   
                $status =  $this->_firmService->insertDisLikes($request,$userid);
                 if($status == 0)
                 {
                    $count = Array();
                    $likescount  = Array();
                    $count['res_dislikes'] = -1;
                    $likescount = $count;
                 }
                 else
                 {
                    $likescount =  $this->_firmService->countLikes($request,$userid);
                 }
            }

            else
            {
                $status =  $this->_firmService->insertDisLikes($request,$userid);
                if($status == 1 || $status == 0)
                 {
                    $likescount =  $this->_firmService->countLikes($request,$userid);   
                 }
            }
            echo json_encode($likescount); 
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

    public function itemlikesAction()
    {
        try
        {   $status  = 0;
            $request = $this->getRequest();
            $perform = $request->getPost('perform');
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();
            $likescount = array();
            $auth = Zend_Auth::getInstance();
            $userid = 1;
            if($auth->hasIdentity())
            {
                 $userArr = $auth->getIdentity();
                $userid = $userArr['User_Id'];
            }
        
            if($perform == "like")
            {
                $status =  $this->_firmService->insertItemLikes($request,$userid);
                 if($status == 1)
                 {
                    $likescount =  $this->_firmService->countItemLikes($request,$userid);
                 }
            }
            else
            {
                $status =  $this->_firmService->insertItemDisLikes($request,$userid);
                if($status == 1)
                 {
                    $likescount =  $this->_firmService->countItemLikes($request,$userid);   
                 }
            }
            echo json_encode($likescount); 
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

     public function itemreviewfetchAction()
     {
         try
        {
            $request = $this->getRequest();
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout();
            echo $this->_firmService->itemreviewfetch($request);

        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }

     }
    
    public function getfiltersjsonAction()
    {
        try
        {
            $request = $this->getRequest();
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout(); 
            echo $this->_firmService->getFiltersJson($request);

        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

	 public function restaurantworkingtimeAction()
    {
        try
        {
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout(); 
            $request = $this->getRequest();
            $result = $this->_firmService->addRestaurantTimes($request);
            echo $result;

        }
        catch(Exception $e)
        {
            throw new Exception($e->getMessage());
            
        }
    }

	
	public function changemenuitemstatusAction()
	{
		try{
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$request = $this->getRequest();	
			$settings = $this->_firmService->changeMenuItemStatus($request);
			if($settings){
				echo json_encode('t');
			}else{
				echo json_encode('f');
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
    public function locationbdmAction()
    {
        try
        {
            $request = $this->getRequest();
            if($request->isPost())
            {
                $this->_helper->viewRenderer->setNoRender();
                $this->_helper->getHelper('layout')->disableLayout(); 
                $result = $this->_firmService->updateCountryBdm($request);
                echo json_encode($result);
            }
          //  $locationData = $this->_firmService->getLocationBdm();
          //  $this->view->locationData =  $locationData;
        }
         catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
    }
    
    public function diningbdmAction()
    {
        try
        {
            $request = $this->getRequest();
            if($request->isPost())
            {
                $this->_helper->viewRenderer->setNoRender();
                $this->_helper->getHelper('layout')->disableLayout(); 
                $result = $this->_firmService->updateDiningBdm($request);
                echo ($result);
            }
	    $diningData = $this->_firmService->getDiningBdm();
	    $this->view->diningData =  $diningData;
	    }
	    catch(Exception $e)
	       {
	       throw new Exception($e->getMessage()); 
	       }
	}
public function shortlistinsertAction()
    {
        try
        {
             $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout(); 
            $auth = Zend_Auth::getInstance();
          
                 $request = $this->getRequest();    
                 if($request->isPost())
                {
                    $storage = new Zend_Auth_Storage_Session();
                    $userArr = $storage->read();
                    $userid = $userArr['User_Id'];               
                    $result = $this->_firmService->insertshortlist($request,$userid);
                    echo $result;
                }
            
        }
        catch(Exception $e)
           {
           throw new Exception($e->getMessage()); 
           }
    }

    public function shortlistfetchAction()
    {
        try
        {
            $request = $this->getRequest();
            if($request->isPost())
            {
             $auth = Zend_Auth::getInstance();
             $userArr = $auth->getIdentity();
            $userid = $userArr['User_Id'];
                $result = Array();
                $this->_helper->viewRenderer->setNoRender();
                $this->_helper->getHelper('layout')->disableLayout(); 
                $result = $this->_firmService->showshortlist($userid,$this->view->baseUrl());
                echo json_encode($result);
            }
        }
            catch(Exception $e)
            {
               throw new Exception($e->getMessage()); 
            }
        
   
    }

   
    public function updateviewajaxAction()
    {
        try 
        {
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout(); 
            $request = $this->getRequest();
            if($request->isPost())
            {
                $resid = $request->getPost("restaurant_id");
                $this->_firmService->visitorManagement($resid,"view");
            }
        } 
        catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }

    public function getsearchlocationsAction()
    {
        try
        {
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->getHelper('layout')->disableLayout(); 
            $request = $this->getRequest();
            if($request->isPost())
            {
                $result = $this->_firmService->getSearchLocations();
                echo json_encode($result);
            }
        }
         catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }

    public function webreservationsearchAction()
    {
        try{
            
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->layout->disableLayout();
            $request = $this->getRequest();
            switch ($request->reservAction) {
                case 'search':
                    $result = $this->_firmService->searchReservationSlots($request);
                    echo json_encode($result);
                    break;
                
                default:
                    # code...
                    break;
            }
        }catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }

    public function saveapireservationAction()
    {
        try{
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->layout->disableLayout();
            $request = $this->getRequest();
            $result = $this->_firmService->saveApiReservation($request);
            echo $result;
        }catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }

    public function searchsugesstionsAction()
    {
        try{
            $this->_helper->viewRenderer->setNoRender();
            $this->_helper->layout->disableLayout();
            $result = $this->_firmService->searchSugesstions();
            echo json_encode($result);
        }catch (Exception $e) {
            throw new Exception($e->getMessage()); 
        }
    }
}
