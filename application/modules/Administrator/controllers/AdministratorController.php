<?php
/**
*	Name			: Administrator.php
*	Author			: Snehal
*	Creation Date	: 09/30/2010
*	Path 			: application/modules/Administrator/controllers/AdministratorController.php
*	Description		: This is controller class for the Manage Administrator module.
*					   	
*/
class Administrator_AdministratorController extends Zend_Controller_Action
{

	protected $_adminService = null;
	protected $_firmService = null;
	/**
     * Initialize the restaurant service instance.
     */
	public function init()
	{
		if(!$this->_adminService){
			$this->_adminService = new Application_Service_Administrator();
		}
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
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	        	$this->_helper->layout()->setLayout('adminlayout');
	            $form = $this->_firmService->getRestaurantForm();
	             $request = $this->getRequest();
	            if($request->isPost())
	            {
	               echo $this->_firmService->uploadFirmDetails($form,$request,$this->view->baseUrl());
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->layout->disableLayout();
	             }
	              $this->view->detailsForm = $form;
             }else{
             	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            }
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
      	 $this->_helper->layout()->setLayout('adminlayout');
	      if($auth->hasIdentity())
		       {
		             $form = $this->_firmService->getRestaurantForm();
			        $request = $this->getRequest();
			        $form = $this->_firmService->setRestaurantFormValues($form,$request->resid);
			        $rwtData = $this->_firmService->getRestaurantTimings($request->resid);
			        $gallery = $this->_firmService->getGalleryByRestaurantId($request->resid,$this->view->baseUrl(),false);
			        $this->view->resid = $request->resid;
		            $this->view->reslocation_id = $form->getValue('reslocation_id');
		            $this->view->res_city_id = $form->getValue('rescity_id');
		            $this->view->detailsForm=$form;
		            $this->view->rwtData = $rwtData;
		            $this->view->gallery = $gallery;
	        }
        else
       {
          $this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
       }
           
       } 
       catch (Exception $e) 
       {
            throw new Exception($e->getMessage());   
       }
    }

	public function editfirmproprietorAction()
	{
		try{
			$this->_helper->layout()->setLayout('adminlayout');
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity()){
				$data = array();
				$page = $this->_request->getParam('page');
				if (empty($page)){
					$page = 1;
				}
				$form = $this->_adminService->getEditPasswordForm();
				$serform = $this->_adminService->getRestOwnerSearchForm();
				$request = $this->getRequest();
				if($this->getRequest()->isPost()){
					$data = $this->getRequest()->getPost();
					$serform->populate($data);
					$this->view->serform = $serform;
				}
				$result = $this->_adminService->manageRestaurantOwners($data,$page);
				$this->view->result = $result;
				$this->view->form = $form;
				$regionBd	= array();
				$cityBd 	= array();
				
				$this->view->serform = $serform;
				if(isset($request->msg)){
					$msg = $request->msg;
					$this->view->msg = $msg;
				}
				if($request->firstname){
					$this->view->firstname = $request->firstname;
				}
				if($request->lastname){
					$this->view->lastname = $request->lastname;
				}
				if($request->userId){
					$this->view->userId = $request->userId;
				}
				if($request->email){
					$this->view->email = $request->email;
				}
				if($request->status){
					$this->view->status = $request->status;
				}
				if($request->state){
					$this->view->state = $request->state;
				}
				if($request->city){
					$this->view->city = $request->city;
				}	
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function retrievefirmproprietorinfoAction()
	{
		try{
			$request = $this->getRequest();
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$result = $this->_adminService->getrestaurantownerdetails($request);
			$jsonObj = json_encode($result);
			echo $jsonObj;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function updatefirminfoAction()
	{
		try{
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity()){
				$this->_helper->layout->disableLayout();
				$this->_helper->viewRenderer->setNoRender();
				$request = $this->getRequest();
				$resultset = $this->_adminService->EditRestaurantOwnerDetails($request);
				$jsonObj = json_encode($resultset);
				echo $jsonObj;
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function updateguestinfoAction()
	{
		try{
			$auth = Zend_Auth::getInstance();
			$storage = new Zend_Auth_Storage_Session();
            $userArr = $storage->read();
            $userid = $userArr['User_Id'];
			if($auth->hasIdentity()){
				$this->_helper->layout->disableLayout();
				$this->_helper->viewRenderer->setNoRender();
				$request = $this->getRequest();
				$resultset = $this->_adminService->EditGuestDetails($request,$userid);
				$jsonObj = json_encode($resultset);
				echo $jsonObj;
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function editproprietorstatusAction()
	{
		try{
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$auth = Zend_Auth::getInstance();

			if($auth->hasIdentity()){
				$request = $this->getRequest();
				$msg = $this->_adminService->UpdateRestaurantOwnerStatus($request);
				$jsonObj = json_encode($msg);
				echo $jsonObj;		
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'login',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Action to validate edit password from   
	 */
	public function postajaxforpasswordcheckAction()
	{
		try{
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity()){
				$this->_helper->layout->disableLayout();
				$this->_helper->viewRenderer->setNoRender();
				$form = $this->_adminService->getEditPasswordForm();
		        $form->isValid($this->_getAllParams());
		        $json = $form->getMessages();
		        if(empty($json)){
		        	echo json_encode('t');
		        }else{
		        	header('Content-type: application/json');
		        	echo json_encode($json);
		        }
	        }else{
	        	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
	        }
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function locationchangeajaxAction()
    {
        try 
        {
        	$auth = Zend_Auth::getInstance();
	        if($auth->hasIdentity()){   
		         $this->_helper->viewRenderer->setNoRender();
		         $this->_helper->layout->disableLayout();
		         echo $this->_adminService->locationChangeAjax($this->getRequest());
	         }else{
	         	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
	         }
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
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $this->_helper->viewRenderer->setNoRender();
	             $this->_helper->getHelper('layout')->disableLayout();
	             $request = $this->getRequest();
	             $jsonData = $this->_adminService->getListJson($request,$this->view->baseUrl(),$request->isMap); 
	              echo json_encode($jsonData);
              }else{
              	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
              }
        }
         catch (Exception $e) 
        {
            throw new  Exception($e->getMessage());    
        }

    } 

    public function cusinebdmAction()
    {
        try
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $request = $this->getRequest();
	            if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updateCusineBdm($request);
	                 echo $result;
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
	            $cusineData = $this->_adminService->getCusineBdm();
	            $this->view->cusineData =  $cusineData;
            }else{
            	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            }
        }
        catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
    }

    public function tagsbdmAction()
    {
        try
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $request = $this->getRequest();
	            if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updateTagsBdm($request);
	                 echo $result; 
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
	            $tagsData = $this->_adminService->getTagsBdm();
	            $this->view->tagsData =  $tagsData;
            }else{
            	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            }
        }
        catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
    }

    public function citybdmAction()
    {
        try
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $request = $this->getRequest();
	            if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updateCityBdm($request);
	                echo json_encode($result);
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
	            $cityData = $this->_adminService->getCityBdm();
	            $this->view->cityData =  $cityData;
            }else{
            	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            }
        }
        catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
    }

    public function countrybdmAction()
    {
        try
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $request = $this->getRequest();
	            if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updateCountryBdm($request);
	                echo json_encode($result);
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
	            $countryData = $this->_adminService->getCountryBdm();
	            $this->view->countryData =  $countryData;
            }else{
            	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
            }
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
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
	            $request = $this->getRequest();
	            if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updateDiningBdm($request);
	                echo ($result);
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
		    $diningData = $this->_adminService->getDiningBdm();
		    $this->view->diningData =  $diningData;
	    }else{
	    	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
	    }
	    }
	    catch(Exception $e)
	       {
	       throw new Exception($e->getMessage()); 
	       }
	}

    public function pricebdmAction()
    {
       try
       {
       		$auth = Zend_Auth::getInstance();
       		if($auth->hasIdentity()){
	        	$request = $this->getRequest();
	        	if($request->isPost())
	            {
	                $this->_helper->viewRenderer->setNoRender();
	                $this->_helper->getHelper('layout')->disableLayout(); 
	                $result = $this->_adminService->updatePriceBdm($request);
	                echo ($result);
	            }else{
	            	$this->_helper->layout()->setLayout('adminlayout');
	            }
	        	$priceData = $this->_adminService->getPriceBdm();
	        	$this->view->priceData =  $priceData;
        	}else{
        		$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
        	}
       }catch(Exception $e)
       {
           throw new Exception($e->getMessage()); 
       } 
    }
    
    	public function createsubscribedfirmAction()
	{
		try{
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity()){
				$storage = new Zend_Auth_Storage_Session();
				$data = $storage->read();
				$this->_helper->layout()->setLayout('adminlayout');			
				$request = $this->getRequest();	
				/* Populating Restaurant owners */
		    	$resownerMapper  = new User_Model_ManagerDataMapper();
		    	$resOwners = $resownerMapper->fetchAll();
		    	$this->view->resowners = $resOwners;
		    	
		    	$userservice = new Application_Service_Client();
		    	$form = $userservice->getRestaurantOwnerForm();
		    	$this->view->form = $form;
		    	
//				$CountryCodeMapper = new Application_Model_CountryCodeDataMapper();
//		    	$CountryCode = $CountryCodeMapper->fetchAll();
//		    	$CodeList = array();
//		    	$CodeList[] = array('key'=>'','value'=>'Select Country Flag');
//		    	foreach($CountryCode as $listcode){
//		    		$CodeList[] = array('key'=>$listcode->getCountry_dial_code(),'value'=>$listcode->getCountry_flag());
//		    	}			    	
//		    	$this->view->codelist = $CodeList;
		    	
				if(isset($request->userid)){
					$data['restownerId'] = $request->userid;
					$rsoMapper = new User_Model_ManagerDataMapper();
					$table 	   = $rsoMapper->getDbTable();
					$select    = $table->select();
					$select->setIntegrityCheck(false);
					$select->from($table,array('rsofk_salution','rsofirst_name','rsolast_name','rsophone','rsostateid','rsocityid','rsoregionid','rso_companyid','presid','defaultview'))
							->join(array('rd.restaurant_details'),'resfk_user = rsofk_user',array('resid'))
							->where('rsofk_user = ?',$request->userid)   
							->where('resstatus = ?',1);
					$row       = $table->fetchRow($select);
					if($row->resid != null){
						if($row->presid != null){
							$data['RestId'] = $row->presid;
						}else{
							$data['RestId'] = $row->resid;
						}
						$restNameByOwnObj = new FirmManagement_Model_FirmNamesByOwnerId();
						$restNameByOwnObj->setRestOwnerId($request->userid);
						$restMapper = new FirmManagement_Model_FirmDataMapper();
						$restList   = $restMapper->getRestaurantNamesByOwnerId($restNameByOwnObj);
						$data['restList'] = $restList;
					}else{
						$data['RestId'] = "";
						$data['restList'] = "";
					}
					$storage->write($data);	
					if($data['companyid'] != 6){				
						return $this->_helper->redirector('addfirm','Firm','FirmManagement');
					}else{
						return $this->_helper->redirector('addroundmenufirm','Firm','FirmManagement');
					}
				}else{
					if($this->getRequest()->isPost()){
						
						$result = $userservice->RegisterRestaurantOwner($this->getRequest()->getPost());
						if($result['status']){						
							$data['restownerId'] = $result['userid'];
							$storage->write($data);
							if($data['companyid'] != 6){				
								return $this->_helper->redirector('addfirm','Firm','FirmManagement');
							}else{
								return $this->_helper->redirector('addroundmenufirm','Firm','FirmManagement');
							}
						}else if($result['form']){
							$this->view->form = $result['form'];
							$this->view->errors  = $form;
						}
					}
				}								
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'login',true));
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	

	public function updatesrcoffirmAction()
	{
		try{
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$request = $this->getRequest();
			$resultset = $this->_adminService->EditSourceofRestaurant($request);
			$msg = $this->_adminService->UpdateRestaurantOwnerStatus($request);
			$jsonObj = json_encode($msg);
			echo $jsonObj;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
    public function locationbdmAction()
    {
       try
        {
        	$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
            $request = $this->getRequest();
            $this->_helper->layout()->setLayout('adminlayout');
            if($request->isPost())
            {
                $this->_helper->viewRenderer->setNoRender();
                $this->_helper->getHelper('layout')->disableLayout(); 
                $result = $this->_adminService->locationsBdm($request);
                echo json_encode($result);
            }
             }else{
              	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
             }
        }
         catch(Exception $e)
        {
             throw new Exception($e->getMessage());   
        }
    }

    public function managerestaurantAction()
    {
    	try 
        {
        	$auth = Zend_Auth::getInstance();
        	$this->_helper->layout()->setLayout('adminlayout');
        	if($auth->hasIdentity()){
        	$request = $this->getRequest();
	        $restaurantData = $this->_adminService->manageRestaurant($request);
	        $filterForm = $this->_adminService->getManageRestaurantFilterForm();
	        $this->view->restaurantData = $restaurantData;
	      	$this->view->filterForm = $filterForm;

              }else{
              	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
             }
        }
      catch (Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
    }

    public function showresbookingAction()
    {
    	try{
    		
    		$auth = Zend_Auth::getInstance();
        	if($auth->hasIdentity()){
        		$this->_helper->layout()->setLayout('adminlayout');
	    		$request = $this->getRequest();    		
	    		$resBooking = $this->_adminService->getResBookings($request);
	    		$filterForm = $this->_adminService->ResBookingFilterForm();
	    		if($request->isPost())
				{
	    		$data = $request->getPost();
						//print_r($data);die();
						$filterForm->populate($data);   
				}		
	    		$this->view->filterForm = $filterForm;
	    		$this->view->resbooking = $resBooking;
    		}else{
              	$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'default',true));
         	}

    	}
    	catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}
    }

    public function changestatusAction()
    {
    	try {
			$request = $this->getRequest();    		    		    		
    		$this->_helper->viewRenderer->setNoRender();
    		$this->_helper->getHelper('layout')->disableLayout();    		
    		$resbooking = $this->_adminService->changeBookingStatus($request);
    		echo $resbooking;

    	} catch (Exception $e) {
    		throw new Exception($e->getMessage()) ;
    		
    	}
    }


    public function updaterestaurantajaxAction()
    {
    	 try
    	 {
    	 	$this->_helper->viewRenderer->setNoRender();
	        $this->_helper->getHelper('layout')->disableLayout(); 
	        $request = $this->getRequest();
        	if($request->isPost())
	        {
	        	$statusUpdate = $this->_adminService->updateRestaurantStatus($request);
	        	echo $statusUpdate;
	        }
    	 }
    	 catch(Exception $e)
    	 {
    	 	throw new Exception($e->getMessage());
    	 }
    	
    }

    public function gallerymanagementAction()
    {
    	try
    	{
    		$this->_helper->viewRenderer->setNoRender();
	        $this->_helper->getHelper('layout')->disableLayout(); 
	        $request = $this->getRequest();
	        if($request->isPost())
	        {
	        	$imageButton = $this->_firmService->getRestaurantForm();
	        	$update = $this->_firmService->galleryManagement($request,$this->view->baseUrl());
	        	echo $update;
	        }
    	}
    	catch(Exception $e)
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
    	
    		$this->_helper->layout()->setLayout('adminlayout');
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

    public function editreachusAction()
	{
		try{
			$auth = Zend_Auth::getInstance();
			$this->_helper->layout()->setLayout('adminlayout');
			$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			$this->view->companyid = $userdata['companyid'];
			
			if($auth->hasIdentity()){
		        $data = array();
				$page = $this->_request->getParam('page');
				if (empty($page)){
					$page = 1;
				}
				$contform = $this->_adminService->getManageContactUsForm();
				if($this->getRequest()->isPost()){
					$data = $this->getRequest()->getPost();
					$contform->populate($data);
					$this->view->form = $contform;
				}
				$resultSet = $this->_adminService->GetAllContactUsDeatils($data,$page,$userdata);
				//$resultSet = $this->_adminService->GetContactUsDeatils($data);
				if($resultSet['status']){
					$this->view->resultSet = $resultSet['personalForm'];
					$this->view->form = $contform;
					
				}else{
					$this->view->form = $resultSet['personalForm'];
				}
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'login',true));
			}
		}
        catch (Exception $ex){
    		throw new Exception($ex->getMessage()) ;
    	}	

	}

	public function deactreachusAction()
	{
		try{
			$this->_helper->layout()->setLayout('adminlayout');
			$auth = Zend_Auth::getInstance();
			if($auth->hasIdentity()){
				$request = $this->getRequest();
				$status = $this->_adminService->CloseContactUsDeatils($request);
				if($status){
					return $this->_helper->redirector('editreachus');
				}
			}else{
				$this->_redirect($this->view->url(array('module'=>'User','controller'=>'Login', 'action'=>'signin'),'login',true));
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function updatebookingoperationsAction()
	{
		try{
			$this->_helper->layout->disableLayout();
			$this->_helper->viewRenderer->setNoRender();
			$request = $this->getRequest();
			$resultset = $this->_adminService->saveBookingOperations($request);
			if($resultset){
				echo json_encode($resultset);
			}else{
				echo json_encode('f');
			}
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
    
}
