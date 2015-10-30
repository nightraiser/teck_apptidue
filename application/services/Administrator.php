<?php
/**
*	Name			: Administrator.php
*	Author			: Snehal
*	Creation Date	: 9/30/2010
*	Path 			: application/services/Administrator.php
*	Description		: This is the service class for the Administrator module.
*					   	
*/
class Application_Service_Administrator
{
	protected $_form = array();
   // Manage Contact us
    public function setManageContactUsForm(Zend_Form $form)
	{
		$this->_form['ManageCont'] = $form;
	}

	public function getManageContactUsForm()
	{
		if(empty($this->_form['ManageCont'])) {
			$this->setManageContactUsForm(new Administrator_Form_ManageCont());
		}
		return $this->_form['ManageCont'];
	}
	// Close of Manage contact us

	public function setContactUsForm(Zend_Form $form)
	{
		$this->_form['ContactUs'] = $form;
	}

	public function getContactUsForm()
	{
		if(empty($this->_form['ContactUs'])) {
			$this->setContactUsForm(new Administrator_Form_ContactUs());
		}
		return $this->_form['ContactUs'];
	}

	public function setManageRestForm(Zend_Form $form)
	{
		$this->_form['ManageRest'] = $form;
	}

	public function getManageRestForm()
	{
		if(empty($this->_form['ManageRest'])) {
			$this->setManageRestForm(new Administrator_Form_ManageRest());
		}
		return $this->_form['ManageRest'];
	}

	public function setEditSpecialCategoryForm(Zend_Form $form)
	{
		$this->_form['EditSpecialCategory'] = $form;
	}

	public function getEditSpecialCategoryForm()
	{
		if(empty($this->_form['EditSpecialCategory'])) {
			$this->setEditSpecialCategoryForm(new Administrator_Form_EditSpecialCategory());
		}
		return $this->_form['EditSpecialCategory'];
	}
	public function setEditSpecialNumberForm(Zend_Form $form)
	{
		$this->_form['EditSpecialNumber'] = $form;
	}

	public function getEditSpecialNumberForm()
	{
		if(empty($this->_form['EditSpecialNumber'])) {
			$this->setEditSpecialNumberForm(new Administrator_Form_EditSpecialNumber());
		}
		return $this->_form['EditSpecialNumber'];
	}
	public function setEditDiscountModeForm(Zend_Form $form)
	{
		$this->_form['EditDiscountMode'] = $form;
	}

	public function getEditDiscountModeForm()
	{
		if(empty($this->_form['EditDiscountMode'])) {
			$this->setEditDiscountModeForm(new Administrator_Form_EditDiscountMode());
		}
		return $this->_form['EditDiscountMode'];
	}
	public function setSpecialTypeForm(Zend_Form $form)
	{
		$this->_form['SpecialType'] = $form;
	}

	public function getSpecialTypeForm()
	{
		if(empty($this->_form['SpecialType'])) {
			$this->setSpecialTypeForm(new Administrator_Form_SpecialType());
		}
		return $this->_form['SpecialType'];
	} 
	public function setAddSpecialTypeForm(Zend_Form $form)
	{
		$this->_form['AddSpecialType'] = $form;
	}

	public function getAddSpecialTypeForm()
	{
		if(empty($this->_form['AddSpecialType'])) {
			$this->setAddSpecialTypeForm(new Administrator_Form_AddSpecialType());
		}
		return $this->_form['AddSpecialType'];
	}  
	public function setAddSpecialCategoryForm(Zend_Form $form)
	{
		$this->_form['AddSpecialCategory'] = $form;
	}

	public function getAddSpecialCategoryForm()
	{
		if(empty($this->_form['AddSpecialCategory'])) {
			$this->setAddSpecialCategoryForm(new Administrator_Form_AddSpecialCategory());
		}
		return $this->_form['AddSpecialCategory'];
	} 
	public function setAddDiscountModeForm(Zend_Form $form)
	{
		$this->_form['AddDiscountMode'] = $form;
	}

	public function getAddDiscountModeForm()
	{
		if(empty($this->_form['AddDiscountMode'])) {
			$this->setAddDiscountModeForm(new Administrator_Form_AddDiscountMode());
		}
		return $this->_form['AddDiscountMode'];
	} 
	public function setAddSpecialNumberForm(Zend_Form $form)
	{
		$this->_form['AddSpecialNumber'] = $form;
	}

	public function getAddSpecialNumberForm()
	{
		if(empty($this->_form['AddSpecialNumber'])) {
			$this->setAddSpecialNumberForm(new Administrator_Form_AddSpecialNumber());
		}
		return $this->_form['AddSpecialNumber'];
	}                                                            
	

	public function setAddResTypeForm(Zend_Form $form)
	{
		$this->_form['AddResType'] = $form;
	}

	public function getAddResTypeForm()
	{
		if(empty($this->_form['AddResType'])) {
			$this->setAddResTypeForm(new Administrator_Form_AddResType());
		}
		return $this->_form['AddResType'];
	}

	public function setAddPriceForm(Zend_Form $form)
	{
		$this->_form['AddPrice'] = $form;
	}

	public function getAddPriceForm()
	{
		if(empty($this->_form['AddPrice'])) {
			$this->setAddPriceForm(new Administrator_Form_AddPrice());
		}
		return $this->_form['AddPrice'];
	}

	public function setEditPriceForm(Zend_Form $form)
	{
		$this->_form['EditPrice'] = $form;
	}

	public function getEditPriceForm()
	{
		if(empty($this->_form['EditPrice'])) {
			$this->setEditPriceForm(new Administrator_Form_EditPrice());
		}
		return $this->_form['EditPrice'];
	}
	public function setAddNeighborForm(Zend_Form $form)
	{
		$this->_form['AddNeighbor'] = $form;
	}

	public function getAddNeighborForm()
	{
		if(empty($this->_form['AddNeighbor'])) {
			$this->setAddNeighborForm(new Administrator_Form_AddNeighbor());
		}
		return $this->_form['AddNeighbor'];
	}

	public function setEditNeighborForm(Zend_Form $form)
	{
		$this->_form['EditNeighbor'] = $form;
	}

	public function getEditNeighborForm()
	{
		if(empty($this->_form['EditNeighbor'])) {
			$this->setEditNeighborForm(new Administrator_Form_EditNeighbor());
		}
		return $this->_form['EditNeighbor'];
	}

	public function setListedRestForm(Zend_Form $form)
	{
		$this->_form['ListedRest'] = $form;
	}

	public function getListedRestForm()
	{
		if(empty($this->_form['ListedRest'])) {
			$this->setListedRestForm(new Administrator_Form_ViewListedRest());
		}
		return $this->_form['ListedRest'];
	}

	public function setEditStateForm(Zend_Form $form)
	{
		$this->_form['EditState'] = $form;
	}

	public function getEditStateForm()
	{
		if(empty($this->_form['EditState'])) {
			$this->setEditStateForm(new Administrator_Form_EditState());
		}
		return $this->_form['EditState'];
	}

	public function setAddStateForm(Zend_Form $form)
	{
		$this->_form['AddState'] = $form;
	}

	public function getAddStateForm()
	{
		if(empty($this->_form['AddState'])) {
			$this->setAddStateForm(new Administrator_Form_AddState());
		}
		return $this->_form['AddState'];
	}
	
	public function setEditRegionForm(Zend_Form $form)
	{
		$this->_form['EditRegion'] = $form;
	}

	public function getEditRegionForm()
	{
		if(empty($this->_form['EditRegion'])) {
			$this->setEditRegionForm(new Administrator_Form_EditRegion());
		}
		return $this->_form['EditRegion'];
	}

	public function setAddRegionForm(Zend_Form $form)
	{
		$this->_form['AddRegion'] = $form;
	}

	public function getAddRegionForm()
	{
		if(empty($this->_form['AddRegion'])) {
			$this->setAddRegionForm(new Administrator_Form_AddRegion());
		}
		return $this->_form['AddRegion'];
	}

	public function setAddCityForm(Zend_Form $form)
	{
		$this->_form['AddCity'] = $form;
	}

	public function getAddCityForm()
	{
		if(empty($this->_form['AddCity'])) {
			$this->setAddCityForm(new Administrator_Form_AddCity());
		}
		return $this->_form['AddCity'];
	}

	public function setEditCityForm(Zend_Form $form)
	{
		$this->_form['EditCity'] = $form;
	}

	public function getEditCityForm()
	{
		if(empty($this->_form['EditCity'])) {
			$this->setEditCityForm(new Administrator_Form_EditCity());
		}
		return $this->_form['EditCity'];
	}
	
	public function setAddSponsorForm(Zend_Form $form)
	{
		$this->_form['AddSponsor'] = $form;
	}

	public function getAddSponsorForm()
	{
		if(empty($this->_form['AddSponsor'])) {
			$this->setAddSponsorForm(new Administrator_Form_AddSponsor());
		}
		return $this->_form['AddSponsor'];
	}
	
	public function setEditSponsorForm(Zend_Form $form)
	{
		$this->_form['EditSponsor'] = $form;
	}

	public function getEditSponsorForm()
	{
		if(empty($this->_form['EditSponsor'])) {
			$this->setEditSponsorForm(new Administrator_Form_EditSponsor());
		}
		return $this->_form['EditSponsor'];
	}
	
	public function setAddPricePlanForm(Zend_Form $form)
	{
		$this->_form['AddPricePlan'] = $form;
	}

	public function getAddPricePlanForm()
	{
		if(empty($this->_form['AddPricePlan'])) {
			$this->setAddPricePlanForm(new Administrator_Form_AddPricePlan());
		}
		return $this->_form['AddPricePlan'];
	}
	
	public function setAddCampaignForm(Zend_Form $form)
	{
		$this->_form['AddCampaign'] = $form;
	}

	public function getAddCampaignForm()
	{
		if(empty($this->_form['AddCampaign'])) {
			$this->setAddCampaignForm(new Administrator_Form_AddCampaign());
		}
		return $this->_form['AddCampaign'];
	}
	
	public function setEditCampaignForm(Zend_Form $form)
	{
		$this->_form['EditCampaign'] = $form;
	}

	public function getEditCampaignForm()
	{
		if(empty($this->_form['EditCampaign'])) {
			$this->setEditCampaignForm(new Administrator_Form_EditCampaign());
		}
		return $this->_form['EditCampaign'];
	}
	
	public function setAddSubscriptionPlanForm(Zend_Form $form)
	{
		$this->_form['AddSubscriptionPlan'] = $form;
	}

	public function getAddSubscriptionPlanForm()
	{
		if(empty($this->_form['AddSubscriptionPlan'])) {
			$this->setAddSubscriptionPlanForm(new Administrator_Form_AddPaymentPlan());
		}
		return $this->_form['AddSubscriptionPlan'];
	}
	
	public function setEditSubscriptionPlanForm(Zend_Form $form)
	{
		$this->_form['EditSubscriptionPlan'] = $form;
	}

	public function getEditSubscriptionPlanForm()
	{
		if(empty($this->_form['EditSubscriptionPlan'])) {
			$this->setEditSubscriptionPlanForm(new Administrator_Form_EditPaymentPlan());
		}
		return $this->_form['EditSubscriptionPlan'];
	}
	
	public function setEditPasswordForm(Zend_Form $form)
	{
		$this->_form['EditPassword'] = $form;
	}
	
	public function getEditPasswordForm()
	{
		if(empty($this->_form['EditPassword'])) {
			$this->setEditPasswordForm(new Administrator_Form_EditPassword());
		}
		return $this->_form['EditPassword'];
	}
	
	public function setRestOwnerSearchForm(Zend_Form $form)
	{
		$this->_form['RestOwnerSearch'] = $form;
	}
	
	public function getRestOwnerSearchForm()
	{
		if(empty($this->_form['RestOwnerSearch'])) {
			$this->setRestOwnerSearchForm(new Administrator_Form_RestaurantOwnerSearch());
		}
		return $this->_form['RestOwnerSearch'];
	}
	public function setViewAllUserSearchForm(Zend_Form $form)
	{
		$this->_form['ViewAllUserSearch'] = $form;
	}
	
	public function getViewAllUserSearchForm()
	{
		if(empty($this->_form['ViewAllUserSearch'])) {
			$this->setViewAllUserSearchForm(new Administrator_Form_ViewAllUserSearch());
		}
		return $this->_form['ViewAllUserSearch'];
	}
	
	public function setCustomerSearchForm(Zend_Form $form)
	{
		$this->_form['CustomerSearch'] = $form;
	}
	
	public function getCustomerSearchForm()
	{
		if(empty($this->_form['CustomerSearch'])) {
			$this->setCustomerSearchForm(new Administrator_Form_CustomerSearch());
		}
		return $this->_form['CustomerSearch'];
	}
	
	public function setEditCampImageForm(Zend_Form $form)
	{
		$this->_form['EditCampImage'] = $form;
	}
	
	public function getEditCampImageForm()
	{
		if(empty($this->_form['EditCampImage'])) {
			$this->setEditCampImageForm(new Administrator_Form_EditCampImage());
		}
		return $this->_form['EditCampImage'];
	}
	
	public function setEditCampPlanDetailsForm(Zend_Form $form)
	{
		$this->_form['EditCampPlanDetails'] = $form;
	}
	
	public function getEditCampPlanDetailsForm()
	{
		if(empty($this->_form['EditCampPlanDetails'])) {
			$this->setEditCampPlanDetailsForm(new Administrator_Form_EditCampPlanDetails());
		}
		return $this->_form['EditCampPlanDetails'];
	}
	
	public function setEditCampPlanLocationForm(Zend_Form $form)
	{
		$this->_form['EditCampPlanLocation'] = $form;
	}
	
	public function getEditCampPlanLocationForm()
	{
		if(empty($this->_form['EditCampPlanLocation'])) {
			$this->setEditCampPlanLocationForm(new Administrator_Form_EditCampPlanLocation());
		}
		return $this->_form['EditCampPlanLocation'];
	}
	
	public function setEditResTypeForm(Zend_Form $form)
	{
		$this->_form['EditResType'] = $form;
	}

	public function getEditResTypeForm()
	{
		if(empty($this->_form['EditResType'])) {
			$this->setEditResTypeForm(new Administrator_Form_EditResType());
		}
		return $this->_form['EditResType'];
	}
		
	public function setEditUlistCategoryForm(Zend_Form $form)
	{
		$this->_form['EditUlistCategory'] = $form;
	}

	public function getEditUlistCategoryForm()
	{
		if(empty($this->_form['EditUlistCategory'])) {
			$this->setEditUlistCategoryForm(new Administrator_Form_EditUlistCategory());
		}
		return $this->_form['EditUlistCategory'];
	}

	public function setAddUlistCategoryForm(Zend_Form $form)
	{
		$this->_form['AddUlistCategory'] = $form;
	}

	public function getAddUlistCategoryForm()
	{
		if(empty($this->_form['AddUlistCategory'])) {
			$this->setAddUlistCategoryForm(new Administrator_Form_AddUlistCategory());
		}
		return $this->_form['AddUlistCategory'];
	}
	
	public function setRestaurantSearchForm(Zend_Form $form)
	{
		$this->_form['RestaurantSearch'] = $form;
	}
	
	public function getRestaurantSearchForm()
	{
		if(empty($this->_form['RestaurantSearch'])) {
			$this->setRestaurantSearchForm(new Administrator_Form_RestaurantSearch());
		}
		return $this->_form['RestaurantSearch'];
	}
	
	public function setRestaurantPaymentForm(Zend_Form $form)
	{
		$this->_form['RestaurantPayment'] = $form;
	}
	
	public function getRestaurantPaymentForm()
	{
		if(empty($this->_form['RestaurantPayment'])) {
			$this->setRestaurantPaymentForm(new Administrator_Form_AddManualPaymentDetails());
		}
		return $this->_form['RestaurantPayment'];
	}
	
	public function setAddCompanyForm(Zend_Form $form)
	{
		$this->_form['AddCompany'] = $form;
	}
	
	public function getAddCompanyForm()
	{
		if(empty($this->_form['AddCompany'])) {
			$this->setAddCompanyForm(new Administrator_Form_AddCompany());
		}
		return $this->_form['AddCompany'];
	}
	
	public function setAddAdminRoleForm(Zend_Form $form)
	{
		$this->_form['AddAdminRole'] = $form;
	}
	
	public function getAddAdminRoleForm()
	{
		if(empty($this->_form['AddAdminRole'])) {
			$this->setAddAdminRoleForm(new Administrator_Form_AddAdminRole());
		}
		return $this->_form['AddAdminRole'];
	}
	
	public function setEditAdminRoleForm(Zend_Form $form)
	{
		$this->_form['EditAdminRole'] = $form;
	}
	
	public function getEditAdminRoleForm()
	{
		if(empty($this->_form['EditAdminRole'])) {
			$this->setEditAdminRoleForm(new Administrator_Form_EditAdminRole());
		}
		return $this->_form['EditAdminRole'];
	}
	
	public function setAddRestaurantOwnerForm(Zend_Form $form)
	{
		$this->_form['AddRestaurantOwner'] = $form;
	}
	
	public function getAddRestaurantOwnerForm()
	{
		if(empty($this->_form['AddRestaurantOwner'])) {
			$this->setAddRestaurantOwnerForm(new Administrator_Form_AddRestaurantOwner());
		}
		return $this->_form['AddRestaurantOwner'];
	}
	
	public function setAddSubscribedRestaurantForm(Zend_Form $form)
	{
		$this->_form['AddSubscribedRestaurant'] = $form;
	}
	
	public function getAddSubscribedRestaurantForm()
	{
		if(empty($this->_form['AddSubscribedRestaurant'])) {
			$this->setAddSubscribedRestaurantForm(new Administrator_Form_AddSubscribedRestaurant());
		}
		return $this->_form['AddSubscribedRestaurant'];
	}
	
	public function setCompanyInatReservationsForm(Zend_Form $form)
	{
		$this->_form['CompanyInatReservation'] = $form;
	}
	
	public function getCompanyInatReservationsForm()
	{
		if(empty($this->_form['CompanyInatReservation'])) {
			$this->setCompanyInatReservationsForm(new Administrator_Form_CompanyRestInatReservationsSearch());
		}
		return $this->_form['CompanyInatReservation'];
	}
		
	public function setEmailMarketSearchForm(Zend_Form $form)
	{
		$this->_form['EmailMarketSearch'] = $form;
	}
	
	public function getEmailMarketSearchForm()
	{
		if(empty($this->_form['EmailMarketSearch'])) {
			$this->setEmailMarketSearchForm(new Administrator_Form_EmailMarketSearch());
		}
		return $this->_form['EmailMarketSearch'];
	}
	
	public function GetRestaurantSummary(array $data,$page, $loginProf)
	{
		try{
			$companyid =  $loginProf['companyid'];
			$restService = new Application_Service_Firm();
			$resultSet = $restService->GetRestaurantSummary($data,$page, $companyid);
			$restService = null;
			return $resultSet;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetRestaurantDetails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$restDetails = $restService->GetRestaurantDetails($request);
			$restService = null;
	
			return $restDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetRestaurantNewLocationDetails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$restDetails = $restService->GetRestaurantWithNewLocationDetails($request);
			$restService = null;
	
			return $restDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetRestaurantArrDetails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			//$listedDetails = array();['resdetails']
			$restDetailsArr = $restService->GetRestaurantDetailsArr($request);
			$restDetails = $restDetailsArr['restdetails'];
			$listedDetails = array(
				
								'Restaurant Name'			=> 	$restDetails['restName'],			
								'Capacity'					=> 	$restDetails['rescapacity'],			
								'Dining Style'				=>	$restDetails['restDiningStyle'],		
								'Maximum party size'		=> 	$restDetails['maxpax'],				
								'Price Range'				=> 	$restDetails['resprice'],				
								'Address'					=> 	$restDetails['resAddress'],			
								'State'						=>	$restDetails['resState'],				
							  	'Postal Code'				=>	$restDetails['postalCode'],			
								'Phone'						=> 	$restDetails['resPhone'],				
								'Fax'						=> 	$restDetails['resFax'],				
								'TimeZone'					=> 	$restDetails['restimezone'],			
							 	'Email'						=> 	$restDetails['emailAddress'],			
								'Website'					=>	$restDetails['resWebsite'],			
								'Manager'					=> 	$restDetails['resManager'],			
								'Description'				=> 	$restDetails['resDescription'],		
						  		'Parking'					=>	$restDetails['restParking'],			
								'Parking Details'			=> 	$restDetails['restParkDetails'],		
								'Private Party Facilities'  =>	$restDetails['restPrivParty'],			
							  	'Private Party contact'		=>	$restDetails['restPrivPartyContact'],	
								'Entertainment'				=> 	$restDetails['restEntertainment'],		
								'Images'					=>	$restDetails['resImage']."#".$restDetails['resLogo'],
								'Title'						=>	$restDetails['restName']." - ".$restDetails['resAddress']
				
			);
			//$listedDetails['images'] = $restDetails['reslogo']." - ".$restDetails['resimage'];
			$restService = null;
	
			return $listedDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetRestaurantConflictDetails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$restDetails = $restService->GetRestaurantConflictDetails($request);
			$restService = null;
	
			return $restDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function UpdateRestStatus($request,$data)
	{
		try{
			$restService = new Application_Service_Firm();
			$status      = $restService->EditRestaurantStatus($request,$data);
			if($request->reststatus == 'ACT' && $status == true){
				$msg = 'Restaurant Activated Successfully.';
			}else if($request->reststatus == 'INA' && $status == true){
				$msg = 'Restaurant DeActivated Successfully.';
			}
			$restService = null;
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function UpdateListedRestStatus($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$status      = $restService->EditListedRestaurantStatus($request);
			if($request->reststatus == 'ACT' && $status == true){
				$msg = 'Restaurant Activated Successfully.';
			}else if($request->reststatus == 'INA' && $status == true){
				$msg = 'Restaurant DeActivated Successfully.';
			}
			$restService = null;
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function UpdateRestAppStatus($request,$data)
	{
		try{
			$restService = new Application_Service_Firm();
			$status      = $restService->EditRestApprovalStatus($request,$data);
			$restAppStatus = $request->restappstatus;
			if($status){
				if($restAppStatus == 'APP'){
					$msg = 'Restaurant Approved Successfully';
	
	
				}else if($restAppStatus == 'DNI'){
					$msg = 'Restaurant Denied Successfully';
				}
			}
			$restService = null;
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditResTypes($request)
	{
		try{
			$mapper = new Application_Model_RestaurantTypeDataMapper();
			$restTypeObj = new Application_Model_RestaurantType();
			$restTypeObj->setId($request->editrestypeid);
			$restTypeObj->setCode($request->editcode);
			$restTypeObj->setDescription($request->editdesc);
			$resTypes = $mapper->EditRestauranttype($restTypeObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function DeleteResTypes($id)
	{
		try{
			$mapper = new Application_Model_RestaurantTypeDataMapper();
			$resTypes = $mapper->DeleteResTypes($id);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function AddResTypes($request)
	{
		try{
			$mapper = new Application_Model_RestaurantTypeDataMapper();
			$restTypeObj = new Application_Model_RestaurantType();
			$restTypeObj->setCode($request->code);
			$restTypeObj->setDescription($request->desc);
			$resTypes = $mapper->AddResTypes($restTypeObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetRestTypes($page)
	{
		try{
			$mapper = new Application_Model_RestaurantTypeDataMapper();
			$resTypes = $mapper->getRestaurantTypes($page);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetSpecialRestTypes($page)
	{
		try{
			$mapper = new Application_Model_SpecialTypeDataMapper();
			$resTypes = $mapper->getSpclRestaurantTypes($page);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetSpecialCategory($page)
	{
		try{
			$mapper = new Application_Model_SpecialCategoryDataMapper();
			$SpclCategory = $mapper->getSpecialCategoryType($page);
			return $SpclCategory;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetSpecialNumber($page)
	{
		try{
			$mapper = new Application_Model_SpecialCountTypeDataMapper();
			$countTypes = $mapper->getSpecialNumberType($page);
			return $countTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetDiscountMode($page)
	{
		try{
			$mapper = new Application_Model_DiscountModeDataMapper();
			$discModes = $mapper->getDiscountMode($page);
			return $discModes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	Public function ViewListedRestaurants(array $data)
	{
		try{
			$restService = new Application_Service_Firm();
			$resultSet = $restService->GetListedRest($data);
			$restService = null;
			return $resultSet;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditNeighborhood($request)
	{
		try{
			$mapper = new Application_Model_NeighborhoodDataMapper();
			$NeighObj = new Application_Model_Neighborhood();
			$NeighObj->setId($request->editneighid);
			$NeighObj->setCityId($request->cityid);
			$NeighObj->setDescription($request->editdescrip);
			$resTypes = $mapper->EditNeighbourHood($NeighObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function DeleteNeighborhood($id)
	{
		try{
			$mapper = new Application_Model_NeighborhoodDataMapper();
			$resTypes = $mapper->DeleteResTypes($id);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function AddNeighborhood($request)
	{
		try{
			$mapper = new Application_Model_NeighborhoodDataMapper();
			$NeighObj = new Application_Model_Neighborhood();
			$NeighObj->setDescription($request->descrip);
			$NeighObj->setCityId($request->cityid);
			$NeighObj->setStatus(1);
			$neighbors = $mapper->AddNeighbourHood($NeighObj);
			return $neighbors;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetpriceTypes($page)
	{
		try{
			$mapper = new Application_Model_PriceDataMapper();
			$priceTypes = $mapper->getPriceTypes($page);
			return $priceTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function AddPrice($request)
	{
		try{
			$mapper = new Application_Model_PriceDataMapper();
			$priceObj = new Application_Model_Price();
			$priceObj->setCode($request->code);
			$priceObj->setDescription($request->desc);
			$price = $mapper->addPrice($priceObj);
			return $price;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditPrice($request)
	{
		try{
			$mapper = new Application_Model_PriceDataMapper();
			$priceObj = new Application_Model_Price();
			$priceObj->setId($request->editpriceid);
			$priceObj->setCode($request->editcode);
			$priceObj->setDescription($request->editdesc);
			$resTypes = $mapper->EditPrice($priceObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function viewRestaurantDetails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$result = $restService->viewRestaurantDetails($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetNeighborhoodByCityId($cityid)
	{
		try{
			$restService = new Application_Service_Firm();
			$neighlist = $restService->GetNeighListByCityid($cityid);
			return $neighlist;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function editRestaurantDeatails($request)
	{
		try{
			$restService = new Application_Service_Firm();
			$resultform = $restService->editListedRestDetails($request);
			return $resultform;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditRestaurantDetails(array $data,$request)
	{
		try{
			$restService = new Application_Service_Firm();
			$result = $restService->EditListRestDetails($data,$request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetStates($page)
	{
		try{
			$mapper = new Application_Model_StateDataMapper();
			$states = $mapper->getStates($page);
			return $states;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function AddState(array $data)
	{
		try{
			$form = $this->getAddStateForm();
			
			if($form->isValid($data)){
								
				$mapper = new Application_Model_StateDataMapper();
				$stateObj = new Application_Model_State();
				$flagadapter = $form->countryflag->getTransferAdapter();				
				$countryname = trim($data['code']);
				$paths = $this->UploadCountryflag($flagadapter,$countryname);
				$flagpath  = null;
				
				if($paths){
					$flagpath .= '<img src='.$paths['flagpath'].' height="16">&nbsp;&nbsp;'.$data['desc'];
				}
				
				$formData = $form->getValues($data);
				
				$dialcode  = "+".$formData['dialcode'];
					
				$stateObj->setCode($formData['code']);
				$stateObj->setDescription($formData['desc']);
				$stateObj->setCurrency_code($formData['currency']);
				$stateObj->setTimezone($formData['timezone']);
				$stateObj->setCountry_dial_code($dialcode);
				$stateObj->setCountry_flag($flagpath);
				$statestatus = $mapper->AddState($stateObj);
				return $statestatus;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				return false;
			}			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetCityByRegionId($regionid,$page)
	{
		try{
			$city = new Application_Model_City();
			$city->setRegionId($regionid);
	
			$cityMapper = new Application_Model_CityDataMapper();
			$cityList = $cityMapper->getCityByRegionIdPagnitation($city,$page);
			return $cityList;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function GetRegionByStateId($stateid,$page)
	{
		try{
			$region = new Application_Model_Region();
			$region->setStateId($stateid);
	
			$regionMapper = new Application_Model_RegionDataMapper();
			$regionList = $regionMapper->getRegionByStateIdPagnitation($region,$page);
			return $regionList;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditState(array $data)
	{
		try{
			$form = $this->getEditStateForm();
			
			if($form->isValid($data)){
								
				$mapper = new Application_Model_StateDataMapper();
				$stateObj = new Application_Model_State();
//				$countryflag = $form->getValue('countryflag');
				if($form->countryflag){
					$flagadapter = $form->countryflag->getTransferAdapter();				
					$countryname = trim($data['editcode']);
					$paths = $this->UploadCountryflag($flagadapter,$countryname);
					$flagpath  = null;
				}
				if($paths){
					$flagpath .= '<img src='.$paths['flagpath'].' height="16">&nbsp;&nbsp;'.$data['editdesc'];
				}
				
				$formData = $form->getValues($data);
				
				$dialcode  = "+".$formData['editdialcode'];
					
				$stateObj->setId($formData['editstateid']);
				$stateObj->setCode($formData['editcode']);
				$stateObj->setDescription($formData['editdesc']);
				$stateObj->setCurrency_code($formData['editcurrency']);
				$stateObj->setTimezone($formData['edittimezone']);
				$stateObj->setCountry_dial_code($dialcode);
				if($flagpath){
					$stateObj->setCountry_flag($flagpath);
				}
				$statestatus = $mapper->EditState($stateObj);
				return $statestatus;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				return false;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditRegion($request)
	{
		try{
			$mapper = new Application_Model_RegionDataMapper();
			$regionObj = new Application_Model_Region();
			$regionObj->setId($request->editregionid);
			$regionObj->setCode($request->editregioncode);
			$regionObj->setDescription($request->editregiondesc);
			$resTypes = $mapper->EditRegion($regionObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function DeleteRegion($id)
	{
		try{
			$mapper = new Application_Model_RegionDataMapper();
			$resTypes = $mapper->DeleteResTypes($id);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function Addregion($request)
	{
		try{
			$mapper = new Application_Model_RegionDataMapper();
			$regionObj = new Application_Model_Region();
			$regionObj->setCode($request->regioncode);
			$regionObj->setDescription($request->regiondesc);
			$regionObj->setStateId($request->stateid);
			$regionObj->setStatus(1);
			$regions = $mapper->AddRegion($regionObj);
			return $regions;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditCity($request)
	{
		try{
			$mapper = new Application_Model_CityDataMapper();
			$NeighObj = new Application_Model_City();
			$NeighObj->setId($request->editcityid);
			$NeighObj->setCode($request->editcitycode);
			$NeighObj->setDescription($request->editcitydesc);
			$resTypes = $mapper->EditCity($NeighObj);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function DeleteCity($id)
	{
		try{
			$mapper = new Application_Model_CityDataMapper();
			$resTypes = $mapper->DeleteResTypes($id);
			return $resTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function AddCity($request)
	{
		try{
			$mapper = new Application_Model_CityDataMapper();
			$NeighObj = new Application_Model_City();
			$NeighObj->setCode($request->citycode);
			$NeighObj->setDescription($request->citydesc);
			$NeighObj->setRegionId($request->regionid);
			$NeighObj->setStatus(1);
			$neighbors = $mapper->AddCity($NeighObj);
			return $neighbors;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function GetAllContactUsDeatils(array $formData,$page,$userdata)
	{
		 try{

		 	$contSummObj = new Administrator_Model_ContactUs();
		 	$form = $this->getManageContactUsForm();
		 	$result = array();
			if($form->isValid($formData)){
				 if($formData){
					if($formData['id'])

					{
						$contSummObj->setId($formData['id']);
					}


					if($formData['name']){
						$contSummObj->setcontactname($formData['name']);
					}

					if($formData['status']){
						$contSummObj->setStatus($formData['status']);
					}
//						else if($formData['status'] != ""){
//							$contSummObj->setStatus($formData['status']);
//						}
						//else if($formData['status'] == ""){
						//$contSummObj->setStatus(TRUE);
						//}
					if($formData['startdate']){
						$contSummObj->setStartDate($formData['DP-startdate']);
					}
			        if($formData['enddate']){
						$contSummObj->setEndDate($formData['DP-enddate']);
					}
				    	
				}
				if($userdata['companyid']){
					$contSummObj->setCompanyId($userdata['companyid']);
				}
			 	$mapper = new Administrator_Model_ContactUsDataMapper();
			 	$resultset = $mapper->getAllCotactUsdeatils($page,$contSummObj);
			 	$result = array('status'=>true,'personalForm'=>$resultset);
			 	return $result;  

		 	}else{
			 	$Data = $form->getValues();
				$form->populate($Data);
				$result = array('status'=>false,'personalForm'=>$form);
				return $result;
			 }
		 }catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function CloseContactUsDeatils($request)
	{
		try{	
			$id = $request->id;
			$Service = new Administrator_Model_ContactUsDataMapper();
			$status = $Service->CloseContactUsDeatils($id);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetContactUsDeatils($request)
	{
		try{
			$id = $request->id;
			$Service = new Administrator_Model_ContactUsDataMapper();
			$resultset = $Service->GetContactUsDeatils($id);
			return $resultset;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddSponsor(array $data,$request)
	{
		try{
			$form = $this->getAddSponsorForm();
			if($form->isValid($data)){
				$formData = $form->getValues();
				$sponsor = new Administrator_Model_Sponsor();
				$sponsor->setCompanyName($formData['companyName'])
						->setEmpName($formData['contactPerson'])
						->setAddress($formData['billingAddress'])
						->setPhNo($formData['phNo'])
						->setEmail($formData['sponsorEmail'])
						->setFax($formData['sponsorFax']);
						
				$mapper = new Administrator_Model_SponsorDataMapper();
				$resultSet = $mapper->AddSponsor($sponsor);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'addSponsor'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditSponsor(array $data,$request)
	{
		try{
			$form = $this->getEditSponsorForm();
			if($form->isValid($data)){
				$formData = $form->getValues();
				$sponsor = new Administrator_Model_Sponsor();
				$sponsor->setEmpName($formData['contactPerson'])
						->setAddress($formData['billingAddress'])
						->setPhNo($formData['phNo'])
						->setEmail($formData['sponsorEmail'])
						->setFax($formData['sponsorFax'])
						->setId($formData['campSponsor']);
						
				$mapper = new Administrator_Model_SponsorDataMapper();
				$resultSet = $mapper->EditSponsor($sponsor);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'editSponsor'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditCampaign(array $data,$request)
	{
		try{
			if($request->form == 'campImage'){
				$form = $this->getEditCampImageForm();		
			}else if($request->form == 'campPlan'){
				$form = $this->getEditCampPlanDetailsForm();
			}else if($request->form == 'campLocation'){
				$form = $this->getEditCampPlanLocationForm();
			}
			if($form->isValid($data)){
				$campaign = new Administrator_Model_Campaign();
				$campaign->setFormType($request->form);
				if(isset($form->campImage) && $form->campImage->isUploaded()){
					$imageAdapter = $form->campImage->getTransferAdapter();
					$campaingName = $data['campName'];
					$paths = $this->UploadCampaignImage($imageAdapter,$campaingName);
					if($paths['status']){
						$campaign->setCampImage($paths['imagepath']);
					}
				}
				
				$formData = $form->getValues();
				$EnterLink = $formData['campaignWebsite'];
				$newlink = str_replace("http://","",$EnterLink);
				$SaveLink = "http://".$newlink;
				if($request->form == 'campImage'){
					$campaign->setId($formData['campId'])
						 	 ->setPriceId($formData['priceId'])
						 	 ->setLink($SaveLink)
						 	 ->setCampDesc($formData['campaignDesc']);
				}else if($request->form == 'campPlan'){
					$campaign->setId($formData['campId'])
						 	 ->setPriceId($formData['priceId'])
						 	 ->setStartDate($formData['campaignStartDate'])
						 	 ->setEndDate($formData['campaignEndDate'])
						 	 ->setCampTime($formData['campaignTime']);
						 	 
					if($formData['amount']){
						$campaign->setAmount((int)$formData['amount']);
					}	
				}else if($request->form == 'campLocation'){
					$campaign->setId($formData['campId'])
						 	 ->setPriceId($formData['priceId']);
					if($formData['state']){
						$campaign->setState((int)$formData['state']);
					}
					if($formData['region']){
						$campaign->setRegion((int)$formData['region']);
					}
					if($formData['city']){
						$campaign->setCity((int)$formData['city']);
					}	
				}
				$mapper = new Administrator_Model_CampaignDataMapper();
				$resultSet = $mapper->EditCampaign($campaign);
				$result = array('status'=>true,'result'=>$formData['campId']);
				return $result;
			}else{
				$formData = $form->getValues();
				if($request->form == 'campLocation'){
					if($formData['state'])
					{
						$regionObj = new Application_Model_Region();
						$regionObj->setStateId($formData['state']);
						$restServ = new Application_Service_Firm();
						$regionBd		= $restServ->getRegionsByStateId($regionObj);
						
						$regionArr=$regionBd->getRegionList();
						$form->region->addMultiOptions($regionArr);
					}
					if($formData['region'])
					{
						$cityObj = new Application_Model_City();
						$cityObj->setRegionId($formData['region']);
						$restServ = new Application_Service_Firm();
						$cityBd		= $restServ->getCitysByRegionId($cityObj);
						
						$cityArr=$cityBd->getCityList();
						$form->city->addMultiOptions($cityArr);
					}
				}
				$form->populate($data);
				$result = array('status'=>false,'editCampaign'=>$form,'form'=>$request->form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddPricePlan(array $data)
	{
		try{
			$form = $this->getAddPricePlanForm();
			if($form->isValid($data)){
				$formData = $form->getValues();
				$pricePlan = new Administrator_Model_PricePlan();
				$pricePlan->setPlanName($formData['planName'])
						  ->setPlanType(trim($formData['plantype']))
						  ->setAudience($formData['intendedAud'])
						  ->setAmount($formData['amount']);
				if($formData['noofemails']){
					$pricePlan->setNoOfEmails($formData['noofemails']);
				}
				$mapper = new Administrator_Model_PricePlanDataMapper();
				$resultSet = $mapper->AddPricePlan($pricePlan);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'addPricePlan'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddCampaign(array $data)
	{
		try{
			$form = $this->getAddCampaignForm();
			$EnterLink = $data['campaignWebsite'];
				$newlink = str_replace("http://","",$EnterLink);
				$SaveLink = "http://".$newlink;
//				$data['campaignWebsite']= $SaveLink;
			if($form->isValid($data)){
				$camp = $data['campaignName'];
				$imageadapter = $form->campImage->getTransferAdapter();
				$paths = $this->UploadCampaignImage($imageadapter,$camp);
				$imagepath = $paths['imagepath'];
				$campaign = new Administrator_Model_Campaign();
	//			$imageAdapter = $form->campaignImage->getTransferAdapter();
	//			$campaingName = $data['campaignName'];
	//			$paths = $this->UploadCampaignImage($imageAdapter,$campaingName);
				
				$formData = $form->getValues();
				
				$campaign->setCampName($formData['campaignName'])
						 ->setSponsor($formData['campSponsor'])
						 ->setCampDesc($formData['campaignDesc'])
						 ->setLink($SaveLink)
						 ->setCampTime($formData['campaignTime'])
						 ->setPlanName($formData['campPricePlan'])
						 ->setPlanType($formData['campaignTarget'])
						 ->setAudience($formData['campaignAudience'])
						 ->setCampImage($imagepath);
				if($formData['campaignStartDate']){
					$campaign->setStartDate($data['DP-campaignStartDate']);
				}
				if($formData['campaignEndDate']){
					$campaign->setEndDate($data['DP-campaignEndDate']);
				}
				if($formData['state']){
					$campaign->setState((int)$formData['state']);
				}
				if($formData['region']){
					$campaign->setRegion((int)$formData['region']);
				}
				if($formData['city']){
					$campaign->setCity((int)$formData['city']);
				}
				if($formData['noofemails']){
					$campaign->setNoOfEmails($formData['noofemails']);
				}
				if($formData['amount']){
					$campaign->setAmount((int)$formData['amount']);
				}
				if($formData['campaignDashboard']){
					$campaign->setDashboardStatus($formData['campaignDashboard']);
				}
	//			if($formData['campaignEndDate']){
	//				$campaign
	//			}
				$mapper = new Administrator_Model_CampaignDataMapper();
				$resultSet = $mapper->AddCampaign($campaign);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				if($formData['state'])
				{
					$regionObj = new Application_Model_Region();
					$regionObj->setStateId($formData['state']);
					$restServ = new Application_Service_Firm();
					$regionBd		= $restServ->getRegionsByStateId($regionObj);
					
					$regionArr=$regionBd->getRegionList();
					$form->region->addMultiOptions($regionArr);
				}
				if($formData['region'])
				{
					$cityObj = new Application_Model_City();
					$cityObj->setRegionId($formData['region']);
					$restServ = new Application_Service_Firm();
					$cityBd		= $restServ->getCitysByRegionId($cityObj);
					
					$cityArr=$cityBd->getCityList();
					$form->city->addMultiOptions($cityArr);
				}
				$form->populate($data);
				$result = array('status'=>false,'addCampaign'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	public function getSponsor($request)
	{
		try{
			$form = $this->getEditSponsorForm();
			$spoid = $request->campSponsor;
			$spoDetails = $this->GetSponsorDetailsById($spoid);
			$formValues = array(
						'campaignSponsor'		=>	$spoDetails->spocompany_name,
						'contactPerson'			=> 	$spoDetails->spocontact_person,
						'billingAddress'		=>	$spoDetails->spobilling_address,
						'phNo'					=>	$spoDetails->spophone_no,	
						'sponsorEmail'			=>	$spoDetails->spoemail,
						'sponsorFax'			=>	$spoDetails->spofax
				);
			$form->populate($formValues);
			return $form;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getCampaign($camId)
	{
		try{
			$result = array();
			$descform = $this->getEditCampImageForm();
			$planform = $this->getEditCampPlanDetailsForm();
			$locationform = $this->getEditCampPlanLocationForm();
			$scid = $camId;
			$spoDetails = $this->GetCampaignById($scid);
			$formValues = array(
						'campId'				=>	$scid,
						'campaignName'			=>	$scid,
						'priceId'				=>	$spoDetails->sppid,
						'campName'				=>	$spoDetails->scad_name,
						'campaignDesc'			=>	$spoDetails->scdesc,
						'campaignWebsite'		=>	$spoDetails->scweb_link,
						'campImage'				=>	$spoDetails->scimage
			);
			$descform->populate($formValues);
//			$descform->campaignDesc->setValue($spoDetails->scad_name);
			$result['descForm'] = $descform;
			$formValues = array(
						'campId'				=>	$scid,
						'campaignStartDate'		=>	date('m-d-Y',strtotime($spoDetails->sppstart_date)),	
						'campaignEndDate'		=>	date('m-d-Y',strtotime($spoDetails->sppend_date)),
						'campPricePlan'			=>	$spoDetails->sppplan_name,
						'priceId'				=>	$spoDetails->sppid,
						'campaignTime'			=>	$spoDetails->timecode,
						'amount'				=>	substr($spoDetails->sppamount,1),
			);
			$planform->populate($formValues);
			$result['planForm'] = $planform;
			$formValues = array(
						'campId'				=>	$scid,
						'priceId'				=>	$spoDetails->sppid,
						'state'					=>	$spoDetails->sppstate_id,
		                'region'				=>	$spoDetails->sppregion_id,
		                'city'				    =>	$spoDetails->sppcity_id
				);
			$locationform->populate($formValues);
			$cityBd  = array();
			$regionBd  = array();
			if($spoDetails->sppstate_id)
			{
			$regionmapper = new Application_Model_RegionDataMapper();
			$regionObj = new Application_Model_Region();
			$regionObj->setStateId($spoDetails->sppstate_id);
			$region = $regionmapper->getRegionByStateId($regionObj);
			$regionBd = $region->getRegionList();
			$locationform->region->addMultiOptions($regionBd);
			}
			if($spoDetails->sppregion_id)
			{
			$citymapper = new Application_Model_CityDataMapper();
			$cityObj = new Application_Model_City();
			$cityObj->setRegionId($spoDetails->sppregion_id);
			$city = $citymapper->getCityByRegionId($cityObj);
			$cityBd = $city->getCityList();
			$locationform->city->addMultiOptions($cityBd);
		
			}
			$result['locationForm'] = $locationform;
			//$form->region->addMultioptions($regionBd);
			//$form->city->addMultioptions($cityBd);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetSponsorDetailsById($spoid)
	{
		try{
			$mapper = new Administrator_Model_SponsorDataMapper();
			$sponsorDetails = $mapper->GetSponsorDetailsById($spoid);
			return $sponsorDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetCampaignDetails(Application_Model_GetCampaignForPost $camp)
	{
		try{
			$mapper = new Administrator_Model_CampaignDataMapper();
			$sponsorDetails = $mapper->GetCampaignDetailsForPost($camp);
			return $sponsorDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetCampaignDetailsLogin(Application_Model_GetCampaignForPost $camp)
	{
		try{
			$mapper = new Administrator_Model_CampaignDataMapper();
			$sponsorDetails = $mapper->GetCampaignDetailsForPostLogin($camp);
			return $sponsorDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function UpdateCampaignEmailCount($camId,$count)
	{
		try{
			$mapper = new Administrator_Model_SponsorCampaignEmailPostingDataMapper();
			$result = $mapper->UpdateEmailCount($camId,$count);
			return true;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetPricePlanById($sppid,$isAjaxCall)
	{
		try{
			$mapper = new Administrator_Model_PricePlanDataMapper();
			$planDetails = $mapper->GetPricePlanDetails($sppid,$isAjaxCall);
			return $planDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetCampaignById($campId)
	{
		try{
			$mapper = new Administrator_Model_CampaignDataMapper();
			$campDetails = $mapper->GetCampaignDetailsById($campId);
			return $campDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetAllSponsors()
	{
		try{
			$mapper = new Administrator_Model_SponsorDataMapper();
			$sponsorResult = $mapper->GetAllSponsors();
			return $sponsorResult;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetAllSponsorships()
	{
		try{
			$mapper = new Administrator_Model_SponsorDataMapper();
			$sponsorResult = $mapper->GetAllSponsorships();
			return $sponsorResult;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetCampaignDetailsBySponsorsId($request)
	{
		try{
			$spansorId = $request->id; 
			$mapper = new Administrator_Model_CampaignDataMapper();
			$campDetails = $mapper->GetCampaignDetailsBySponsorsId($spansorId);
			return $campDetails;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UploadCampaignImage($adapter,$campName)
	{
		try{
			$result = null;
			$imagepath = null;
			$uploadpath = 'images/sponsor/images/';
			$imageName = null;
			if($adapter && $campName){
				$fileInfo = $adapter->getFileInfo();
				if(isset($fileInfo['campImage'])){
					$info = $fileInfo['campImage'];
					$imageName = $info['name'];
					if($info['name']){
						$ext = $this->_findexts($info['name']);
						$fileName = trim($campName).'.'.$ext;
						$path = $uploadpath.$fileName;
						$adapter->addFilter('Rename', array('target'=>$path,'overwrite'=>true));
						if($adapter->receive($info['name'])){
							$imagepath = '/'.$uploadpath.$fileName;
						}
					}
				}
			}if($imagepath){
				$result = array('imagepath' => $imagepath,'status'=>true);
			}else{
				return false;
			}
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function _findexts($filename)
	{
		try{
			$filename = strtolower($filename) ;
			//$exts = preg_split("[/\\.]", $filename) ;
			$exts = @split("[/\\.]", $filename) ;
			$n = count($exts)-1;
			$exts = $exts[$n];
			return $exts;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetCampaignSentToDetails($request)
	{
		try{
			$campId = $request->campId;
			$usrtype = $request->usrtype;
			$mapper = new Communication_Model_EmailMessageDataMapper();
			$result = $mapper->GetCampaignSentToDetails($campId,$usrtype);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditSponsorStatus($request)
	{
		try{
			$spoid = $request->campSponsor;
			if($request->status){
				$stat = 0;
			}else{
				$stat = true;
			}
			
			$mapper	= new Administrator_Model_SponsorDataMapper();
			$result = $mapper->EditSponsorStatus($spoid,$stat);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditCampaignStatus($request)
	{
		try{
			$campid = $request->campaignName;
			if($request->status){
				$stat = 0;
			}else{
				$stat = true;
			}
			
			$mapper	= new Administrator_Model_CampaignDataMapper();
			$result = $mapper->EditCampaignStatus($campid,$stat);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function ReservationReport($request,$offset)
	{
		try{
		$bookService = new Application_Service_Reservation();
		
		$result = $bookService->ReservationReport($request,$offset);
		
		return $result;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddSubscriptionPlan(array $data,$request,$userData)
	{
		try{
			$form = $this->getAddSubscriptionPlanForm();
			if($form->isValid($data)){
				$formData = $form->getValues();
				$date = date('Y-m-d');
				$time = date('H:i:s');
				$status = array('ACT');
				$subscriptionmapper = new Application_Model_SubscriptionPlanStatusDataMapper();
				$subscriptionStatusRes = $subscriptionmapper->GetSubscriptionStatusByCode($status);
				$statusId = '';
				foreach($subscriptionStatusRes as $key=>$value){
					$statusId = $value->getId();
				}
			
				$subscription = new ManageRenumeration_Model_SubscriptionPlans();
				$subscription->setspplan_title($formData['planTitle'])
							 ->setspplan_description($formData['planDesc'])
							 ->setspplan_duration($formData['planDuration'])
							 ->setspamount($formData['planAmount'])
							 ->setspplan_status($statusId)
							 ->setspcreated_date($date)
							 ->setspcreated_time($time)
							 ->setspcreated_by($userData['User_Id']);
						
				$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
				$resultSet = $mapper->AddSubscription($subscription);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'addSubscription'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditSubscriptionPlan(array $data,$request,$userData)
	{
		try{
			$form = $this->getEditSubscriptionPlanForm();
			if($form->isValid($data)){
				$formData = $form->getValues();
				$date = date('Y-m-d');
				$time = date('H:i:s');
				$subscription = new ManageRenumeration_Model_SubscriptionPlans();
				$subscription->setspid($formData['PlanId'])
							 ->setspplan_title($formData['editplanTitle'])
							 ->setspplan_description($formData['editplanDesc'])
							 ->setspplan_duration($formData['editplanDuration'])
							 ->setspamount($formData['editplanAmount'])
							 ->setspupdated_date($date)
							 ->setspupdated_time($time)
							 ->setspupdated_by($userData['User_Id']);
						
				$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
				$resultSet = $mapper->EditSubscription($subscription);
				$result = array('status'=>true,'result'=>$resultSet);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'addSubscription'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditSubscriptionPlanDetails($request)
	{
		try{
			$form = $this->getEditSubscriptionPlanForm();
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$formvalues = $mapper->GetSubscriptionPlanDetailsById($request->PlanId);
			
			$formData = array();
			$formData = array(
								'PlanId'			=>	$formvalues->spid,
								'editplanTitle'		=>	$formvalues->spplan_title,
								'editplanDesc'		=>	$formvalues->spplan_description,
								'editplanDuration'	=>	$formvalues->spplan_duration,
								'editplanAmount'	=>	$formvalues->spamount
			);
			$form->populate($formData);
			return $form;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getSubscriptionPlans($page)
	{
		try{
			$subscription = new ManageRenumeration_Model_SubscriptionPlans();
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$result = $mapper->getSubscriptionPlans($subscription,$page);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getSubscriptionPlansSearch($data,$request,$page)
	{
		try{
			$subscription = new ManageRenumeration_Model_SubscriptionPlans();
			if($data['titlesearch']){
				$subscription->setspplan_title($data['titlesearch']);
			}
			if($data['amountsearch']){
				$subscription->setspamount($data['amountsearch']);
			}
			if($data['durationsearch']){
				$subscription->setspplan_duration($data['durationsearch']);
			}
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$result = $mapper->getSubscriptionPlans($subscription,$page);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditSubscriptionStatus($request)
	{
		try{
			$id = $request->PlanId;
			$stat = $request->substatus;
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$resultSet = $mapper->EditSubscriptionStatus($id,$stat);
			$result = array('status'=>true,'result'=>$resultSet);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRestaurantsbySubscpriotionId($request,$page)
	{
		try{
			$subscription = new Administrator_Model_SubscriptionPlansSearch();
			$subscription->setId($request->PlanId);
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$resultSet = $mapper->GetRestaurntsListbySubscriptionPlanId($subscription,$page);
			return $resultSet;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRestaurantsbySubscpriotionIdSearch($data,$request,$page)
	{
		try{
			$subscription = new Administrator_Model_SubscriptionPlansSearch();
			$subscription->setId($request->PlanId);
			if($data['resnamesearch']){
				$subscription->setresName($data['resnamesearch']);
			}
			if($data['firstsearch']){
				$subscription->setfirstName($data['firstsearch']);
			}
			if($data['lastsearch']){
				$subscription->setlastName($data['lastsearch']);
			}
			if($data['emailsearch']){
				$subscription->setEmail($data['emailsearch']);
			}
			if($data['datesearch']){
				$subscription->setActDate($data['datesearch']);
			}
			$mapper = new ManageRenumeration_Model_SubscriptionPlansMapper();
			$resultSet = $mapper->GetRestaurntsListbySubscriptionPlanId($subscription,$page);
			return $resultSet;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function retrieveServiceTax()
	{
		try{
			$mapper = new Application_Model_ServiceTaxMapper();
			$result = $mapper->RetrieveServiceTax();
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function editServiceTax(array $data)
	{
		try{
			$obj = new Application_Model_ServiceTax();
			$obj->setid($data['taxid']);
			$obj->settax($data['servicetax']);
			$mapper = new Application_Model_ServiceTaxMapper();
			$result = $mapper->EditServiceTax($obj);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function reterieveTransactionCharges()
	{
		try{
			$mapper = new Application_Model_TransactionChargesMapper();
			$result = $mapper->ReterieveTransactionCharges();
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function editTransactionCharges(array $data)
	{
		try{
			$chargeobj = new Application_Model_TransactionCharges();
			$chargeobj->setid($data['id']);
			$chargeobj->setcharge($data['transactioncharge']);
			$mapper = new Application_Model_TransactionChargesMapper();
			$result = $mapper->EditTransactionCharges($chargeobj);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function ManageSubscriptionRenewal($request)
	{
		try{
			$paymentService = new Application_Service_Renumeration();
			$status = $paymentService->ManageSubscriptionRenewal($request);		
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * display the entire restaurant owner list.
	 */
	public function manageRestaurantOwners(array $data,$page)
	{
		try{
			$userservice = new Application_Service_Client();
			$result = $userservice->manageRestaurantOwners($data,$page);		
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getrestaurantownerdetails($request)
	{
		try{
			$sourceMapper = new User_Model_ManagerDataMapper();
			$userid=$request->userid;
			$RestOwnProfile = $sourceMapper->getrestaurantownerdetailsbyUserid($userid);
			return $RestOwnProfile;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function viewAllUsers(array $data,$page)
	{
		try{
			$userservice = new Application_Service_Client();
			$result = $userservice->viewAllUsers($data,$page);		
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 *  Update the Restaurant status by admin 
	 *  new restaurant owner registration approved by admin 
	 */
	public function UpdateRestaurantOwnerStatus($request)
	{
		try{
			$msg = false;
			$userservice = new Application_Service_Client();
			$status = $userservice->UpdateRestaurantOwnerStatus($request);
			if($request->status == 'ACT' && $status == true){
				$msg = 'Restaurant Owner Activated Successfully.';
			}else if($request->status == 'INA' && $status == true){
				$msg = 'Restaurant Owner DeActivated Successfully.';
			}		
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function UpdateRestaurantViewStatus($request)
	{
		try{
			$msg = false;
			$userservice = new Application_Service_Client();
			$status = $userservice->UpdateRestaurantOwnerStatus($request);
			if($request->status == 'ACT' && $status == true){
				$msg = 'Activated Successfully.';
			}else if($request->status == 'INA' && $status == true){
				$msg = 'DeActivated Successfully.';
			}		
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * Update the restaurant owner email and password by admin
	 */
	public function EditRestaurantOwnerDetails($request)
	{
		try{
			$userservice = new Application_Service_Client();
			$status = $userservice->EditRestaurantOwnerDetails($request);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditGuestDetails($request,$userid)
	{
		try{
			$userservice = new Application_Service_Client();
			$status = $userservice->EditGuestDetails($request,$userid);

			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	
	/**
	 * Update the restaurant owner source of restaurant by admin
	 */
	public function EditSourceofRestaurant($request)
	{
		try{
			$restservice = new Application_Service_Firm();
			$status = $restservice->EditSourceofRestaurant($request);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	
	/**
	 * get the restaurants by restaurant owner  
	 */
	public function GetRestaurantDataByOwnerId($request)
	{
		try{
			$restservice = new Application_Service_Firm();
			$result = $restservice->GetRestaurantDetailsByOwnerId($request);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GenerateInvoicesForSubscriptionRenewal($request)
	{
		try{
			$paymentService = new Application_Service_Renumeration();
			$status = $paymentService->GenerateInvoicesForSubscriptionRenewal($request);		
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}		
	}
	
	public function ManagePaymentDueNotification($request)
	{
		try{
			$paymentService = new Application_Service_Renumeration();
			$status = $paymentService->ManagePaymentDueNotification($request);		
			return $status;	
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * display the entire customer list.
	 */
	public function manageCustomers(array $data,$page)
	{
		try{
			$userservice = new Application_Service_Client();
			$result = $userservice->manageCustomers($data,$page);		
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * Update the customer status
	 */
	public function UpdateCustomerStatus($request)
	{
		try{
			$userservice = new Application_Service_Client();
			$status = $userservice->UpdateCustomerStatus($request);
			if($request->status == 'ACT' && $status == true){
				$msg = 'Customer Activated Successfully.';
			}else if($request->status == 'INA' && $status == true){
				$msg = 'Customer DeActivated Successfully.';
			}		
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * Update customer email and password by admin
	 */
	public function EditCusEmailAndPassword($request)
	{
		try{
			$userservice = new Application_Service_Client();
			$status = $userservice->EditCusEmailAndPassword($request);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditSpecialType($request)
	{
		try{
			$mapper = new Application_Model_SpecialTypeDataMapper();
			$spclTypeObj = new Application_Model_SpecialType();
			$spclTypeObj->setId($request->spcleditrestypeid);
			$spclTypeObj->setDescription($request->spcldesc);
			$spclTypes = $mapper->Specialtype($spclTypeObj);
			return $spclTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditSpecialCategory($request)
	{
		try{
			$mapper = new Application_Model_SpecialCategoryDataMapper();
			$spclCateObj = new Application_Model_SpecialCategory();
			$spclCateObj->setId($request->spclcategoryid);
			$spclCateObj->setDescription($request->editdesc);
			$spclCategory = $mapper->EditSpecialCategory($spclCateObj);
			return $spclCategory;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditSpecialNumberRest($request)
	{
		try{
			$mapper = new Application_Model_SpecialCountTypeDataMapper();
			$spclnumbObj = new Application_Model_SpecialCountType();
			$spclnumbObj->setId($request->spclnumberid);
			$spclnumbObj->setDescription($request->editdesc);
			$spclNumber = $mapper->EditSpecialNumber($spclnumbObj);
			return $spclNumber;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditDiscountMode($request)
	{
		try{
			$mapper = new Application_Model_DiscountModeDataMapper();
			$spcldiscObj = new Application_Model_DiscountMode();
			$spcldiscObj->setId($request->discountmodeid);
			$spcldiscObj->setDescription($request->editdesc);
			$spclDiscount = $mapper->EditDiscountMode($spcldiscObj);
			return $spclDiscount;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function AddSpecialTypes($request)
	{
		try{
			$mapper = new Application_Model_SpecialTypeDataMapper();
			$spclTypeObj = new Application_Model_SpecialType();
			$spclTypeObj->setCode($request->addcode);
			$spclTypeObj->setDescription($request->adddesc);
			$spclresTypes = $mapper->AddSpecialTypes($spclTypeObj);
			return $spclresTypes;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function AddSpecialCategory($request)
	{
		try{
			$mapper = new Application_Model_SpecialCategoryDataMapper();
			$spclCateObj = new Application_Model_SpecialCategory();
			$spclCateObj->setCode($request->addcode);
			$spclCateObj->setDescription($request->adddesc);
			$spclCategory = $mapper->AddSpecialCategory($spclCateObj);
			return $spclCategory;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function AddSpecialNumber($request)
	{
		try{
			$mapper = new Application_Model_SpecialCountTypeDataMapper();
			$spclCountObj = new Application_Model_SpecialCountType();
			$spclCountObj->setCode($request->addcode);
			$spclCountObj->setDescription($request->adddesc);
			$spclCount = $mapper->AddSpecialNumber($spclCountObj);
			return $spclCount;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function AddDiscountMode($request)
	{
		try{
			$mapper = new Application_Model_DiscountModeDataMapper();
			$spclDisctObj = new Application_Model_DiscountMode();
			$spclDisctObj->setCode($request->addcode);
			$spclDisctObj->setDescription($request->adddesc);
			$spclDiscount = $mapper->AddDiscountMode($spclDisctObj);
			return $spclDiscount;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	
	
	
	
	public function GetCategoryBd()
	{
		try{
			$mapper = new Application_Model_UlistCategoryDataMapper();
			$result = $mapper->GetAllCategorys();
			return $result;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddCategory($request)
	{
		try{
			$mapper = new Application_Model_UlistCategoryDataMapper();
			$categoryObj = new Application_Model_UlistCategory();
			$categoryObj->setCode($request->code);
			$categoryObj->setDescription($request->desc);
			$statestatus = $mapper->AddCategory($categoryObj);
			return $statestatus;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function EditCategory($request)
	{
		try{
			$mapper = new Application_Model_UlistCategoryDataMapper();
			$categoryObj = new Application_Model_UlistCategory();
			$categoryObj->setId($request->editcategoryid);
			$categoryObj->setCode($request->editcode);
			$categoryObj->setDescription($request->editdesc);
			$status = $mapper->EditCategory($categoryObj);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AdminReport($data,$request)
	{
		try{
			$resservice = new Application_Service_Firm();
			$resultArr = $resservice->AdminReport($data,$request);
			return $resultArr;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function editEnquiryLog(array $formData,$userData)
	{
		try{
			date_default_timezone_set('EST5EDT');
			$date = date('m-d-Y');
			$time = date('H:i:s');
			$mapper = new Administrator_Model_EnquiryLogStatusDataMapper();
			$enquirylog = new Administrator_Model_EnquiryLogStatus();
			$enquirylog->setEnquiryId($formData['enquiryid'])
				->setLogDescription($formData['logdescription'])
				->setAssignedTo($formData['assignedto'])
				->setStatusId($formData['enquiry_list'])
				->setDate($date)
				->setTime($time)
				->setCreatedBy($userData['User_Id'])
				->setNextFollowUpDate($formData['DP-datetime']);
				
			$result = $mapper->EditEnquiryLog($enquirylog);
			return $result;
					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
		
	}
	
	public function getEnquiryLog($request)
	{
		try{
			$mapper = new Administrator_Model_EnquiryLogStatusDataMapper();
			$enquiryid=$request->enquiryid;
			$EnquiryLogList = $mapper->getEnquiryLogEnquiryId($enquiryid);
			return $EnquiryLogList;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function manageManualPayment($request)
	{
		try{
			$manual = new Administrator_Model_RestaurantManualPaymentDetails();
			$value = $request->data;
			$formvalues = array();
			foreach($value as $result){
				$formvalues[$result['name']] = $result['value'];
			}
			$manual->setResId($formvalues['resid'])
					->setEnd($formvalues['payEndDate'])
					->setStart($formvalues['payStartDate'])
					->setDesc($formvalues['payDescription'])
					->setCreatedon(date('Y-m-d h:i:a'));
			$mapper = new Administrator_Model_RestaurantManualPaymentDetailsMapper();
			$paydetails = $mapper->ManageManualPayment($manual);
			$paymentstatus = false;
			if($paydetails){
				$paymentmodeid = 0;
				if($request->offlinestatus){
					$mode = 'OFP';
					$modeMapper = new Application_Model_RestPaymentModeMapper(); 
					$paymentmode = $modeMapper->GetIdByCode($mode);
					$paymentmodeid = $paymentmode->getId();
				}
				//updating the payment mode id 
				$resmapper = new FirmManagement_Model_FirmDataMapper();
				$paymentresult = $resmapper->UpdatePaymentMode($manual, $paymentmodeid);
				if($paymentresult){
					$paymentstatus = true;
				}
			}
			return $paymentstatus;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function ManageSuggestions()
	{
		try{
			$mapper = new Application_Model_CustomerSuggestRestaurantMapper();
			$result = $mapper->getCustomerSuggestions();
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddCompany(array $data, $userdata)
	{
		try{
			$form = $this->getAddCompanyForm();
			if($form->isValid($data)){
				$logoadapter = $form->companyLogo->getTransferAdapter();
				
				$companyname = trim($data['companyname']);
				//$restid = $form->restId;
				$companyid = false;
				$paths = $this->UploadCompanylogo($logoadapter,$companyname,$companyid);
				$logopath  = null;
				if($paths){
					$logopath  = $paths['logopath'];
				}
				$formData = $form->getValues($data);
				$comapny = new Administrator_Model_Company();
				$comapny->setCompanyname($formData['companyname'])
						->setDescription($formData['comdescription'])
						->setEmail($formData['email'])
						->setPhone($formData['phone'])
						->setAddress($formData['address'])
						->setCreatedby($userdata['User_Id'])
						->setWebsite($formData['website'])
						->setLogoutUrl($formData['logouturl'])
						->setCompanyType($formData['companytype'])
						->setCompanylogo($logopath)
						->setPartnerweburl($formData['partnerurl'])
						->setLicenceKey(uniqid())
						->setStatus(true);
					
				$mapper = new Administrator_Model_CompanyDataMapper();
				$status = $mapper->addCompany($comapny);
				if($status){
					$folderRename = rename("images/partners/$companyname/","images/partners/$status/");
					if($logopath){
					  $companylogoRename = '/'.$companyname.'/';
					  $logoRename = str_replace($companylogoRename,'/'.$status.'/',$logopath);
					  $imgrow = $mapper->Updatecompanylogo($status,$logoRename);
					}
					$result = array('status'=>true);
				}
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}

	public function UpdateCompany(array $data, $userdata)
	{
		try{
			$form = $this->getAddCompanyForm();
			if($form->isValid($data)){
				$logoadapter = $form->companyLogo->getTransferAdapter();
				$companyname = trim($data['companyname']);
				$companyid = $data['companyID'];
				$paths = $this->UploadCompanylogo($logoadapter,$companyname,$companyid);
				$logopath  = null;
				if($paths){
					$logopath  = $paths['logopath'];
				}
				$formData = $form->getValues($data);
				$comapny = new Administrator_Model_Company();
				$comapny->setCompanyname($formData['companyname'])
						->setDescription($formData['comdescription'])
						->setEmail($formData['email'])
						->setPhone($formData['phone'])
						->setAddress($formData['address'])
						->setWebsite($formData['website'])
						->setUpdatedBy($userdata['User_Id'])
						->setLogoutUrl($formData['logouturl'])
						->setCompanyType($formData['companytype'])
						->setCompanylogo($logopath)
						->setPartnerweburl($formData['partnerurl'])
						->setId($formData['companyID']);
					
				$mapper = new Administrator_Model_CompanyDataMapper();
				$status = $mapper->UpdateCompany($comapny);
				if($status){
					$result = array('status'=>true);
				}
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function GetCompanys($offset)
	{
		try{
			$mapper = new Administrator_Model_CompanyDataMapper();
			$companyList = $mapper->getCompanys($offset);
			return $companyList;			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function getCompanyDetailsById($request)
	{
		try{
			$companyid = $request->id;
			$mapper = new Administrator_Model_CompanyDataMapper();
			$result = $mapper->getCompanyDetailsById($companyid);
			return $result;			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function checkCompanyExist($request)
	{
		try{
			$company = $request->comapny;
			$mapper = new Administrator_Model_CompanyDataMapper();
			$result = $mapper->checkCompanyExist($company);
			return $result;			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getComapnyNameList($userdata)
	{
		try{
			$mapper = new Administrator_Model_CompanyDataMapper();
			$companyList = $mapper->getComapnyNameList($userdata);
			return $companyList;			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddRoleToCompany(array $data, $userdata)
	{
		try{
			$form = $this->getAddAdminRoleForm();
			if($form->isValid($data)){
				$formData = $form->getValues($data);
				
				$permissionTypes =  explode(",", $formData['checkboxarr']);
				$respermissionTypes = array();
				foreach($permissionTypes as $types){
					$permissionTypesObj = new Application_Model_AdminPermissionsType();
					if($types != 0){
						$permissionTypesObj->setPermissionTypeId($types);
						$respermissionTypes[] = $permissionTypesObj;
					}
				}
				
				$roleObj = new Application_Model_Role();
				$roleObj->setCompanyId($formData['companyName']);
				$roleObj->setRoleCode($formData['rolename']);
				$roleObj->setRoleDesc($formData['roledesc']);
				$roleObj->setStatus(true);
				$roleObj->setRoleTypeId(2);
				$roleObj->setPermissionId($respermissionTypes);
				$roleObj->setCreatedBy($userdata['User_Id']);
				
				$mapper = new Application_Model_RoleDataMapper();
				$status = $mapper->addAdminRole($roleObj);
				if($status){
					$result = array('status'=>true);
				}
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UpdateRoleByCompany(array $data, $userdata)
	{
		try{
			$form = $this->getEditAdminRoleForm();
			if($form->isValid($data)){
				$formData = $form->getValues($data);
				
				$permissionTypes =  explode(",", $formData['editcheckboxarr']);
				$respermissionTypes = array();
				foreach($permissionTypes as $types){
					$permissionTypesObj = new Application_Model_AdminPermissionsType();
					if($types != 0){
						$permissionTypesObj->setPermissionTypeId($types);
						$respermissionTypes[] = $permissionTypesObj;
					}
				}
				
				$roleObj = new Application_Model_Role();
				$roleObj->setCompanyId($formData['editcompanyName']);
				$roleObj->setRoleCode($formData['editrolename']);
				$roleObj->setRoleDesc($formData['editroledesc']);
				$roleObj->setId($formData['roleid']);
				$roleObj->setPermissionId($respermissionTypes);
				$roleObj->setCreatedBy($userdata['User_Id']);
				
				$mapper = new Application_Model_RoleDataMapper();
				$status = $mapper->UpdateAdminRole($roleObj);
				if($status){
					$result = array('status'=>true);
				}
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRolesByCompanyId($companyid, $offset)
	{
		try{
			$mapper = new Application_Model_RoleDataMapper();
			$roles = $mapper->getRolesByCompanyId($companyid, $offset);
			return $roles;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRoleDetailsByRoleandCompanyid($request)
	{
		try{
			$companyid = $request->companyid;
			$roleid = $request->roleid;
			
			$mapper = new Application_Model_RoleDataMapper();
			$result = $mapper->getRoleDetailsByRoleandCompanyid($companyid, $roleid);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function changeRoleStatusByRoleId($request)
	{
		try{
			$roleObj = new Application_Model_Role();
			$roleObj->setId($request->roleid);
			if($request->status == 'INA'){
				$roleObj->setStatus(0);
			}else if($request->status == 'ACT'){
				$roleObj->setStatus(1);
			}			
			$mapper = new Application_Model_RoleDataMapper();
			$result = $mapper->changeRoleStatus($roleObj);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}	
	}
	
	public function adminRoleNameCheck($request)
	{
		try{
			$roleObj = new Application_Model_Role();
			$roleObj->setCompanyId($request->companyid);
			$roleObj->setRoleCode(trim($request->roleName));
			$roleObj->setStatus('TRUE');
			
			$mapper = new Application_Model_RoleDataMapper();
			$status = $mapper->adminRoleNameCheck($roleObj);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRolesByCompany($request)
	{
		try{
			$roleObj = new Application_Model_Role();
			$roleObj->setCompanyId($request->companyid);
			$roleObj->setStatus('TRUE');
			
			$mapper = new Application_Model_RoleDataMapper();
			$status = $mapper->getRolesByCompany($roleObj);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getPermissionsList()
	{
		try{
			$menumapper = new Application_Model_AdminPermissionsTypeDataMapper();
        	$menu = $menumapper->getAdminMenuBD();
			$restUserMenuList = array();
	    	foreach($menu as $menulist){
	    		$restUserMenuList[] = array('id'=>$menulist->getId(),'desc'=>$menulist->getDescription(),'detaileddesc'=>$menulist->getDetaileddescription());
	    	}
	    	return $restUserMenuList;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function manageRestaurantUsers(array $data,$page)
	{
		try{
			$userservice = new Application_Service_Client();
			$result = $userservice->manageRestaurantUsers($data,$page);		
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getrestaurantuserdetails($request)
	{
		try{
			$sourceMapper = new User_Model_PatronDataMapper();
			$userid=$request->userid;
			$RestOwnProfile = $sourceMapper->getrestaurantuserdetailsbyUserid($userid);
			return $RestOwnProfile;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditRestaurantUserDetails($request)
	{
		try{
			$userservice = new Application_Service_Client();
			$status = $userservice->EditRestaurantOwnerDetails($request);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UpdateRestaurantUserStatus($request)
	{
		try{
			$msg = false;
			$userservice = new Application_Service_Client();
			$status = $userservice->UpdateRestaurantUserStatus($request);
			if($request->status == 'ACT' && $status == true){
				$msg = 'Restaurant User Activated Successfully.';
			}else if($request->status == 'INA' && $status == true){
				$msg = 'Restaurant User DeActivated Successfully.';
			}		
			return $msg;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function RegisterRestaurantOwnerByAdminUser(array $data)
	{
		try{
			$form = $this->getAddRestaurantOwnerForm();
			$stateid = null;
			$regionid = null;
			$cityid  = null;
			$regionBd  = array();
			$cityBd  = array();
			$ngbhBd = array();
			$restService = new Application_Service_Firm();
			
			if($data['state'])
			{
				$stateid = $data['state'];
				$regionBd  = $restService->GetRegionByStateId_($stateid);
				if($data['region'])
				{
					$regionid = $data['region'];
					$cityBd  = $restService->GetCityByRegionId_($regionid);
				}
			}
			
			if($form->isValid($data)){
				$formData = $form->getValues();

				$restaurantowner= new User_Model_Manager();
				
				$restaurantowner->setFristName($formData['firstName'])
				->setLastName($formData['lastName'])
				->setEmail(strtolower($formData['emailAddress']))
				->setPassword($formData['password'])
				->setUsertypeid(3)
				->setRole(2)
				->setRegistereddate(date('Y-m-d H:i:s'))
				->setUserstatisid(1)
				->setRestaurantname($formData['restaurantName'])
				->setPhonenumber($formData['phone'])
				->setStateid($formData['state'])
				->setCityid($formData['city'])
				->setRegionid($formData['region'])
				->setWebsite($formData['website'])
				->setDescription($formData['description']);
				
				$storage = new Zend_Auth_Storage_Session();
				$data = $storage->read();
				$restaurantowner->setCompanyid($data['companyid']);
				
				$mapper = new User_Model_ManagerDataMapper();
				$res_own_id = $mapper->save($restaurantowner);
				$result = array('status'=>true);
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				if($regionBd){
					$form->region->addMultiOptions($regionBd);
				}
				if($cityBd){
					$form->city->addMultiOptions($cityBd);
				}
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	 

	//Payment History Details
	public function getPaymentHistory($request)
	{
	try{
			$resid=$request->resid;
			$mapper=new Administrator_Model_RestaurantManualPaymentDetailsMapper();
			$result=$mapper->getPaymentDetails($resid);
			return $result;
		}catch(Exception $ex){	
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	//Update the description in Payment History 
	public function payDescriptionUpdate($request)
	{
	try{
			$rmpd=$request->rmpd;
			$desc=$request->data;
			$mapper=new Administrator_Model_RestaurantManualPaymentDetailsMapper();
			if($desc)
			{
			$result=$mapper->updateDescription($rmpd,$desc);
			}
			else
			{
				$result=false;
			}
			return $result;
		}catch(Exception $ex){	
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetAllRestaurantCreditDetails($page,$data)
	{
		try{
			$mapper = new FirmManagement_Model_SmsRestaurantRequestCreditsDataMapper();
		 	$resultset = $mapper->GetAllRestaurantCreditDetails($page,$data);
		 	return $resultset;  
			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function PostCreditsOnRequest($request)
	{
		try{
			$mapper = new FirmManagement_Model_SmsRestaurantSubscriptionDataMapper();
		 	$resultset = $mapper->PostCreditsOnRequest($request);
		 	return $resultset;  
			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function SaveSmsCreditStatus($request)
	{
		try{
			$mapper = new FirmManagement_Model_SmsRestaurantRequestCreditsDataMapper();
		 	$resultset = $mapper->SaveSmsCreditStatus($request);
		 	return $resultset;  
			
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function AddSubscribedRestaurant(array $data)
	{
		try{
			$form = $this->getAddSubscribedRestaurantForm();
			$stateid = null;
			$regionid = null;
			$cityid  = null;
			$cityBd  = array();
			$regionBd  = array();
			$ngbhBd = array();
			$restService = new Application_Service_Firm();
			if($data['cantfind'] == 1)
			{
				$form->cantfindneigh->setRequired(true);
				$form->resNeighbour->setRequired(false);
				
				if($data['resState'])
				{
					$stateid = $data['resState'];
					$regionBd  = $restService->GetRegionByStateId_($stateid);
					$regionBd[] = array('key'=>'find','value'=>"Can't Find Your Region");
				}
				
				if($data['resRegion'])
				{
					$regionid = $data['resRegion'];
					$cityBd  = $restService->GetCityByRegionId_($regionid);
					$cityBd[] = array('key'=>'find','value'=>"Can't Find Your City");
				}
				
				if($data['resCity'])
				{
					$cityid = $data['resCity'];
					$ngbhBd  = $restService->GetNeighborhodByCityId_($cityid);
					$ngbhBd[] = array('key'=>'find','value'=>"Can't Find Your Neighbourhood");
				}
				
			}else if($data['cantfind'] == 2)
			{
				$form->cantfindcity->setRequired(true);
				$form->resCity->setRequired(false);
				$form->cantfindneigh->setRequired(true);
				$form->resNeighbour->setRequired(false);
				
				if($data['resState'])
				{
					$stateid = $data['resState'];
					$regionBd  = $restService->GetRegionByStateId_($stateid);
					$regionBd[] = array('key'=>'find','value'=>"Can't Find Your Region");
				}
				
				if($data['resRegion'])
				{
					$regionid = $data['resRegion'];
					$cityBd  = $restService->GetCityByRegionId_($regionid);
					$cityBd[] = array('key'=>'find','value'=>"Can't Find Your City");
				}
				
			}else if($data['cantfind'] == 3){
				
				$form->cantfindregion->setRequired(true);
				$form->resRegion->setRequired(false);
				$form->cantfindcity->setRequired(true);
				$form->resCity->setRequired(false);
				$form->cantfindneigh->setRequired(true);
				$form->resNeighbour->setRequired(false);
				
				if($data['resState'])
				{
					$stateid = $data['resState'];
					$regionBd  = $restService->GetRegionByStateId_($stateid);
					$regionBd[] = array('key'=>'find','value'=>"Can't Find Your Region");
				}
				
				$cityBd[] = array('key'=>'noCity','value'=>"Can't Find Your City");
				
			}else if($data['cantfind'] == 4){
				
				$form->cantfindstate->setRequired(true);
				$form->resState->setRequired(false);
				$form->cantfindregion->setRequired(true);
				$form->resRegion->setRequired(false);
				$form->cantfindcity->setRequired(true);
				$form->resCity->setRequired(false);
				$form->cantfindneigh->setRequired(true);
				$form->resNeighbour->setRequired(false);
				
				$cityBd[] = array('key'=>'find','value'=>"Can't Find Your City");
				$regionBd[] = array('key'=>'find','value'=>"Can't Find Your Region");
				
			}else if($data['cantfind'] == 0 || $data['cantfind'] == ''){
				
				if($data['resState'])
				{
					$stateid = $data['resState'];
					$regionBd  = $restService->GetRegionByStateId_($stateid);
					$regionBd[] = array('key'=>'find','value'=>"Can't Find Your Region");
				}
				if($data['resRegion'])
				{
					$regionid = $data['resRegion'];
					$cityBd  = $restService->GetCityByRegionId_($regionid);
					$cityBd[] = array('key'=>'find','value'=>"Can't Find Your City");
				}
				
			}
			if($form->isValid($data)){

				$imageadapter = $form->resImage->getTransferAdapter();
				$logoadapter = $form->resLogo->getTransferAdapter();
				$restname = trim($data['restName']);
				$paths = $restService->UploadImages($imageadapter,$logoadapter,$restname);
//				$imagepath = null;
//				$logopath  = null;
//				if($paths){
//					$imagepath = $paths['imagepath'];
//					$logopath  = $paths['logopath'];
//				}

				$storage = new Zend_Auth_Storage_Session();
				$data = $storage->read();

				$formData = $form->getValues();
				$restaurant = new FirmManagement_Model_Firm();

				$cuisineTypes = $formData['restype'];
				//$resCusisneType = array();
				//foreach($cuisineTypes as $types){
				$cusisneTypeObj = new FirmManagement_Model_FirmCuisine();
				$cusisneTypeObj->setRestaurantTypeId($cuisineTypes);
				//$resCusisneType[] = $cusisneTypeObj;
				//}
				/*$reservSys = 'FALSE';
				 if($formData['restSubResSys'] == 1)
				 {
				 $reservSys = 'TRUE';
				 }*/
				$restaddress = $formData['resAddress'];
				$paymentModes = $formData['resPayment'];
				$resPaymentMode = array();
				foreach($paymentModes as $types){
					$paymentModeObj = new FirmManagement_Model_FirmPaymentOptions();
					$paymentModeObj->setRestaurantPaymentTypeId($types);
					$resPaymentMode[] = $paymentModeObj;
				}

				$tagid = array();
				$tagidString = "";
	
				$tagidString = $formData['tagId'];
	
				if($tagidString){
					$tagid = explode(',',$tagidString);
				}
				/*	Listed Restaurant
				 $resByIdObj = new FirmManagement_Model_FirmById();
				 $resByIdObj->setRestaurantId($formData['restId']);
				 $restaurantMapper = new FirmManagement_Model_FirmDataMapper();
				 $resDetails = $restaurantMapper->getRestaurantById($resByIdObj);

				 $listedMapper = new FirmManagement_Model_ListedRestaurantsDataMapper();
				 $listedRes = $listedMapper->addRestaurant($resDetails);
				 */
					
				//			$paymentModel = new Application_Model_RestaurantPaymentMode();
				//			$paymentMapper = new Application_Model_RestaurantPaymentModeDataMapper();
				//			$paymentModel->setId($formData['resPayment']);
				//			$paymentObj = $paymentMapper->getPaymentModeById($paymentModel);
					
				if($formData['restId']){

					$restaurant->setRestListedResId($formData['restId']);
				}
				$latlong = '';
				
				if((int)$formData['cantfind'] < 2){
					/* Reterving City By Id */
						
					$cityModel = new Application_Model_City();
					$cityMapper = new Application_Model_CityDataMapper();
					$cityModel->setId($formData['resCity']);
					$cityObj = $cityMapper->getCityById($cityModel);
					$restaddress .= ", ".$cityObj->getDescription();
					$latlong = Rdine_Geocode_GeocodingAdapter::getGeocodedLatitudeAndLongitude($restaddress);
				}
				
				if(!$formData['restLatitude'] == NULL && !$formData['restLongitude'] == NULL)
				{
					$googlemapstatus ='TRUE';
				}else{ 
					$googlemapstatus = 'FALSE';
				}
				if($googlemapstatus == 'TRUE')
				{
					$latitude = $formData['restLatitude'];
					$longitude = $formData['restLongitude'];
				}
				else{
					$latitude = NULL;
					$longitude = NULL;
				}

				$resgoogleimage = Rdine_Geocode_GeocodingAdapter::getGoogleRestaurantImage($latitude,$longitude);
					
				$categoryModel = new Application_Model_RestaurantCategory();
				$categoryMapper = new Application_Model_RestaurantCategoryDataMapper();
				$categoryModel->setCode('SUB');
				$categoryObj = $categoryMapper->getIdByCode($categoryModel);
					
				if($data['Usertype'] == "ADM" || $data['Usertype'] == "ADU"){
					$restaurant->setRestaurantownerid($formData['restowner'])
							   ->setcompanyid($data['companyid']);							   
				}else{
					$restaurant->setRestaurantownerid($formData['restowner'])
							   ->setcompanyid(1);
				}
					
				$restaurant->setRestaurantname($formData['restName'])
							->setRescapacity($formData['rescapacity'])
							->setRestemail($formData['emailAddress'])
							//->setRestyrfound($formData['resYearFound'])
							->setMaxpax($formData['maxpax'])
							->setRestaddress($formData['resAddress'])
							->setReststateid($formData['resState'])
							->setRestRegion($formData['resRegion'])
							->setRestCity($formData['resCity'])
							->setCantFindState($formData['cantfindstate'])
							->setCantFindRegion($formData['cantfindregion'])
							->setCantFindCity($formData['cantfindcity'])
							->setCantFindNeighbour($formData['cantfindneigh'])
							->setCantFind($formData['cantfind'])
							->setRestPaymentMode($resPaymentMode)
							->setResttypeid($cusisneTypeObj)
							->setResttimezone($formData['restimezone'])
							->setRestPrice($formData['resprice'])
							->setRestneighboorhood($formData['resNeighbour'])
							->setRestzipcode($formData['postalCode'])
							->setres_country_code($formData['countryCode'])
							->setRestphone($formData['resPhone'])
							->setRestfax($formData['resFax'])
							->setRestwebsite($formData['resWebsite'])
							->setRestmanagername($formData['resManager'])
							->setRestdesc($formData['resDescription'])
							->setRestDiningStyle($formData['restDiningStyle'])
							->setRestParking($formData['restParking'])
							->setRestParkDetails($formData['restParkDetails'])
							->setRestPrivParty($formData['restPrivParty'])
							->setRestPrivPartyContact($formData['restPrivPartyContact'])
							->setRestAdditDet($formData['restAdditDetails'])
							->setRestEntertainment($formData['restEntertainment'])
							->setRestsubforreservation('TRUE')
							->setReststatus(1)
				//->setRestimage($imagepath)
				//->setRestlogo($logopath)
							->setRestverifiedstatus(3)
							->setRestCreatedOn(date('Y-m-d H:i:s'))
							->setRestLatitude($latitude)
							->setRestLongtitude($longitude)
							->setRestGoogleMapStatus($googlemapstatus)
							->setRestGoogleImage($resgoogleimage)
							->setRestTimings($formData['restTimings'])
							->setRestCategory($categoryObj->getId())
							->setResCreatedDate(date('Y-m-d H:i:s'))
							->setRestCreatedBy($data['User_Id'])
							->setreslandmark($formData['restLandMark'])
							->setres_delevery($formData['restDelevery'])
							->setreslunch_buffet($formData['restLunchBuffet'])
							->setresdinner_buffet($formData['restDinnerBuffet'])
							->setres_wifi($formData['restWifi'])
							->setres_alcohol($formData['restAlcohol'])
							->setres_smoking($formData['restSmoke'])
							->setres_ac($formData['restAC'])
							->setres_catering($formData['restCatering'])
							->setres_kids_section($formData['restKidsSection'])
							->setres_party_allowed($formData['restPrivParty'])
							->setres_meal_category($formData['restMealType'])
							->setres_new_tag($formData['restnewtag'])
							->settag_id($tagid);
				
				if($formData['restAvgMealPriceMax'] == ''){
					$restaurant->setresavg_mealprice_max(0);	
				}else{
					$restaurant->setresavg_mealprice_max($formData['restAvgMealPriceMax']);
				}
				
				if($formData['restAvgMealPriceMin'] == ''){
					$restaurant->setresavg_mealprice_min(0);	
				}else{
					$restaurant->setresavg_mealprice_min($formData['restAvgMealPriceMin']);
				}
					
				$mapper = new FirmManagement_Model_FirmDataMapper();
				$status = $mapper->addRestaurant($restaurant);
		        $restid = $status['resid'];
		        $ownerid = $restaurant->getRestaurantaownerid();
				$mapper = new User_Model_ManagerDataMapper;
				$status = $mapper->addPresid($restid,$ownerid);
				
				$storage = new Zend_Auth_Storage_Session();
				$userdata = $storage->read();
				$userdata['RestId'] = $restid;
				if($userdata['Usertype'] == 'RSO'){
					$restNameByOwnObj = new FirmManagement_Model_FirmNamesByOwnerId();
					$restNameByOwnObj->setRestOwnerId($userdata['User_Id']);
					$restMapper = new FirmManagement_Model_FirmDataMapper();
					$restList   = $restMapper->getRestaurantNamesByOwnerId($restNameByOwnObj);
					$userdata['restList'] = $restList;
				}else{
					$restNameByOwnObj = new FirmManagement_Model_FirmNamesByOwnerId();
					$restNameByOwnObj->setRestId($restid);
					$restMapper = new FirmManagement_Model_FirmDataMapper();
					$restList   = $restMapper->getRestaurantNamesByOwnerId($restNameByOwnObj);
					$userdata['restList'] = $restList;
				}
				$storage->write($userdata);	
				
		        $folderRename = rename("images/restaurant_images/$restname/","images/restaurant_images/$restid/");
		        $imagepath = null;
		        $logopath  = null; 
	          	if($paths){
		     	    $imagepath = $paths['imagepath'];
			        $logopath  = $paths['logopath'];
			        $imagelogoRename = '/'.$restname.'/';
			        $restid = $restid;
			        $imageRename = str_replace($imagelogoRename,'/'.$restid.'/',$imagepath);
			        $logoRename = str_replace($imagelogoRename,'/'.$restid.'/',$logopath);
			        $mapper1 = new FirmManagement_Model_FirmDataMapper();
			        $result = $mapper1->Updateimglogo($restid,$imageRename,$logoRename);
				}
				return $result;
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				if($regionBd){

					$form->resRegion->addMultiOptions($regionBd);
				}
				if($cityBd){

					$form->resCity->addMultiOptions($cityBd);
				}
				if($ngbhBd){
					$form->resNeighbour->addMultiOptions($ngbhBd);
				}
				return false;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UploadCompanylogo($logoadapter,$companyname,$companyid)
	{
		try{
			$fileInfo = $logoadapter->getFileInfo();
			$result = null;
			$logopath = null;
			if($companyid){
				$uploadpath = "images/partners/$companyid/";
			    if(!file_exists($uploadpath)){
					$dir = mkdir($uploadpath);
				}
			}else{
				$uploadpath = "images/partners/$companyname/";
			    if(!file_exists($uploadpath)){
					$dir = mkdir($uploadpath);
				}
			}
			if($logoadapter && $companyname){
				$info = $fileInfo['companyLogo'];
				if($info['name']){
					$ext = $this->_findexts($info['name']);
					$fileName = $companyname.'_logo'.'.'.$ext;
					$logoadapter->addFilter('Rename', array('target'=>$uploadpath.$fileName, 'overwrite'=>true));

					if($logoadapter->receive($info['name'])){
						$logopath = '/'.$uploadpath.$fileName;
					}else{
						if($imageName == $info['name']){
							$logopath = '/'.$uploadpath.$fileName;
						}
					}
				}
			}
			$result = array('logopath'  => $logopath);
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UploadCountryflag($flagadapter,$countryname)
	{
		try{
			$fileInfo = $flagadapter->getFileInfo();
			$result = null;
			$flagpath = null;
			$uploadpath = "images/flags/";
			if($flagadapter && $countryname){
				$info = $fileInfo['countryflag'];
				if($info['name']){
					$ext = $this->_findexts($info['name']);
					$fileName = 'flag_'.$countryname.'.'.$ext;
					$file_exists = $uploadpath.$fileName;
					if(file_exists($file_exists)){
						$deletefile = $file_exists;
						unlink($deletefile);
					}
					$flagadapter->addFilter('Rename', array('target'=>$uploadpath.$fileName, 'overwrite'=>false));
//					$flagadapter->setFilters(array(new Zend_Filter_File_Rename(array('target'=>$uploadpath.$fileName, 'overwrite'=>true))));
					if($flagadapter->receive($info['name'])){
						$flagpath = '/'.$uploadpath.$fileName;
					}else{
						if($imageName == $info['name']){
							$flagpath = '/'.$uploadpath.$fileName;
						}
					}
				}
			}
			if($flagpath != null){
				$result = array('flagpath'  => $flagpath);
			}
			return $result;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetdetailsofStatebyid($request)
	{
		try{								
			$mapper = new Application_Model_StateDataMapper();	
			$stateid = $request->stateid;			
			$result = $mapper->GetdetailsofStatebyid($stateid);
			return $result;					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetAllRestaurantEmailBlastDetails($page)
	{
		try{								
			$mapper = new Deals_Model_RestaurantEmailBlastTemplateMapper();	
			$result = $mapper->getAllRestaurantEmailBlastDetails($page);
			return $result;					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetWebReservationListbyCompanyid($data,$companyid)
	{
		try{	
			$form = $this->getCompanyInatReservationsForm();
			$resFilter = array();
			$dateArr = array();
			if($form->isValid($data)){
				if($data){
					$formData = $form->getValues();
					if($formData['restId'])
					{
						$resFilter['restId'] = $formData['restId'];
					}
					if($formData['restname'])
					{
						$resFilter['restname'] = $formData['restname'];
					}
					if($formData['resCountry']){
						$resFilter['resCountry'] = $formData['resCountry'];
					}
					if($formData['resState']){
						$resFilter['resState'] = $formData['resState'];
					}
					if($formData['resCity']){
						$resFilter['resCity'] = $formData['resCity'];
					}
					if($formData['bookStatus']){
						$resFilter['bookStatus'] = $formData['bookStatus'];
					}
					if($formData['rguName']){
						$resFilter['rguName'] = $formData['rguName'];
					}
					if($formData['rguEmail']){
						$resFilter['rguEmail'] = $formData['rguEmail'];
					}
					if($formData['rguPhone']){
						$resFilter['rguPhone'] = $formData['rguPhone'];
					}
					if($data['DP-startDate']){
						$sdatesplit = explode('-',$data['DP-startDate']);
						$resFilter['StartDate'] = date('Y-m-d',mktime(0,0,0,$sdatesplit[0],$sdatesplit[1],$sdatesplit[2]));
						$dateArr['StartDate'] = $data['DP-startDate'];
						if($data['DP-endDate']){
							$enddatesplit = explode('-',$data['DP-endDate']);
							$resFilter['EndDate'] = date('Y-m-d',mktime(0,0,0,$enddatesplit[0],$enddatesplit[1],$enddatesplit[2]));
							$dateArr['EndDate'] = $data['DP-endDate'];
						}	
					}
					
					if($formData['reservDateType']){
						$resFilter['reservDateType'] = $formData['reservDateType'];
					}
					
					if($data['booksorton']){
						$resFilter['booksorton'] = $data['booksorton'];
					}
						
			    }
			    $resFilter['CompanyId'] = $companyid;
			    $isAjax = false;
		    	$mapper = new Restaurant_Model_ReservationDataMapper();	
				$resultSet = $mapper->getWebReservationListbyCompanyid($resFilter,$isAjax);
				
				$restaurantMapper =  new FirmManagement_Model_FirmDataMapper();
				$restaurantList = $restaurantMapper->getRestaurantListbyCompanyid($resFilter);
				
				$result = array('status'=>true,'restForm'=>$resultSet,'dates'=>$dateArr,'resList' => $restaurantList);
				return $result;					    
			}else{
		 		
			 	$Data = $form->getValues();
				$form->populate($Data);
				$result = array('status'=>false,'restForm'=>$form,'dates'=>$dateArr);
				return $result;
			 }	
													
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function saveBookingOperations($request)
	{
		try{								
			$mapper = new Administrator_Model_BookingOperationsDataMapper();	
			$result = $mapper->saveBookingOperations($request);
			return $result;					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function AjaxConnoisseurService($request)
	{
		try{
			$ajaxresult	=	array();
			$isAjax = true;
			if($request->restId)
			{
				$resFilter['restId'] = $request->restId;
			}
			if($request->restname)
			{
				$resFilter['restname'] = $request->restname;
			}
			if($request->resCountry){
				$resFilter['resCountry'] = $request->resCountry;
			}
			if($request->resState != 'null' && $request->resState != ''){
				$resFilter['resState'] = $request->resState;
			}
			if($request->resCity != 'null'){
				$resFilter['resCity'] = $request->resCity;
			}
			if($request->bookStatus){
				$resFilter['bookStatus'] = $request->bookStatus;
			}			
			if($request->DPstartDate){
				$sdatesplit = explode('-',$request->DPstartDate);
				$resFilter['StartDate'] = date('Y-m-d',mktime(0,0,0,$sdatesplit[0],$sdatesplit[1],$sdatesplit[2]));
				if($request->DPendDate){
					$enddatesplit = explode('-',$request->DPendDate);
					$resFilter['EndDate'] = date('Y-m-d',mktime(0,0,0,$enddatesplit[0],$enddatesplit[1],$enddatesplit[2]));
				}	
			}
			if($request->reservDateType){
				$resFilter['reservDateType'] = $request->reservDateType;
			}
			if($request->rguName){
				$resFilter['rguName'] = $request->rguName;
			}
			if($request->rguEmail){
				$resFilter['rguEmail'] = $request->rguEmail;
			}
			if($request->rguPhone){
				$resFilter['rguPhone'] = $request->rguPhone;
			}
			if($request->companyid){
				 $resFilter['CompanyId'] = $request->companyid;
			}
			if($request->booksorton){
				$resFilter['booksorton'] = $request->booksorton;
			}
			$mapper = new Restaurant_Model_ReservationDataMapper();	
			$resultSet = $mapper->getWebReservationListbyCompanyid($resFilter,$isAjax);
			$jsonresultList = json_encode($resultSet);
			$ajaxresult['resultList'] = $jsonresultList;
			return $jsonresultList;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	
	
	public function UpdateResOwnerProfile($formData)
	{
		try{
			$restOwn = new User_Model_Manager();
			$restOwn->setId($formData->resownerId);
			$restOwn->setFristName(trim($formData->firstName));
			$restOwn->setLastName(trim($formData->lastName));
			$restOwn->setRestaurantname(trim($formData->restaurantName));
			$restOwn->setPhonenumber(trim($formData->phone));
			$restOwn->setCountryCode($formData->rescodetext);
			$restOwn->setTechfirstName($formData->techfirstName);
			$restOwn->setTechlastname($formData->techlastName);
			$restOwn->setTechemail($formData->techemail);
			$restOwn->setTechphone($formData->techphone);
			$restOwn->setTechcountrycode($formData->techrescodetext);
			$restOwn->setBilfirstName($formData->bilfirstName);
			$restOwn->setBillastname($formData->billastName);
			$restOwn->setbilemail($formData->bilemail);
			$restOwn->setBilphone($formData->bilphone);
			$restOwn->setBilcountrycode($formData->bilrescodetext);

			$mapper = new User_Model_ManagerDataMapper();
			$status = $mapper->update($restOwn);
			if($status){
				$result = array('status'=>true);
			}
			return $result;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	
	
	public function GetAllRestaurantEmailMarketDetails($page,$data)
	{
		try{								
			
			$mapper = new FirmManagement_Model_EmailMarketingTemplateDataMapper();	
			$result = $mapper->getAllRestaurantEmailMarketDetails($page,$data);
			return $result;					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getExcelPathByTempid($tempid)
	{
		try{								
			$mapper = new FirmManagement_Model_EmailMarketingTemplateDataMapper();	
			$result = $mapper->GetExcelPathByTempid($tempid);
			return $result;					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function editEmailMarketLog(array $formData,$userData)
	{
		try{
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$mapper = new Administrator_Model_EmailMarketLogDataMapper();
			$enquirylog = new Administrator_Model_EmailMarketLog();
			$enquirylog->setEnquiryId($formData['emailmarketid'])
				->setLogDescription($formData['logdescription'])
				->setAssignedTo($formData['assignedto'])
				->setStatusId($formData['emailmarket_list'])
				->setDate($date)
				->setTime($time)
				->setCreatedBy($userData['User_Id'])
				->setNextFollowUpDate($formData['DP-datetime']);
				
			$result = $mapper->EditEmailMarketLog($enquirylog);
			return $result;
					
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}		
	}
	
	public function getEmailmarketLogByID($request)
	{
		try{
			$mapper = new Administrator_Model_EmailMarketLogDataMapper();
			$enquiryid=$request->enquiryid;
			$EnquiryLogList = $mapper->getEmailMarketLogById($enquiryid);
			return $EnquiryLogList;
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
	public function getAdministratorForm()
	{
	try
	{
	    $form = new Administrator_Form_Administratordetails();
        $timezone_bdMapper = new Application_Model_TimezonebdMapper();
        $country_bdMapper = new Application_Model_CountrybdMapper();
        $restaurant_type_bdMapper = new Application_Model_RestaurantTypebdMapper();
        $form->restimezone->addMultiOptions($timezone_bdMapper->getAll());
        $form->rescountry_id->addMultiOptions($country_bdMapper->getCountries());
        $diningStyleList = array
        (
                array('key'=>'','value'=>'Select Dining Style'),
                array('key'=>'Casual Elegant','value'=>'Casual Elegant'),
                array('key'=>'Casual Dining','value'=>'Casual Dining'),
                array('key'=>'Fine Dining','value'=>'Fine Dining'),
                array('key'=>'Coffeehouse','value'=>'Coffeehouse'),
                array('key'=>'Pizzeria','value'=>'Pizzeria'),
                array('key'=>'Steakhouses','value'=>'Steakhouses'),
                array('key'=>'Seafood Administrators','value'=>'Seafood Administrators')
        );
        $cuisineList = $restaurant_type_bdMapper->getCusines();
        $form->restype_id->addMultiOptions($cuisineList);
        $form->resdining_style->addMultiOptions($diningStyleList);
        $form->res_state_id->addMultiOptions(array(array('key'=>0,'value'=>"Select")));
        $form->rescity_id->addMultiOptions(array(array('key'=>0,'value'=>"Select")));
        return $form;
    }
       catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	 public function getListJson($request,$baseUrl)
     {
     	try {
	     		$searchLocation = $request->searchLocation;
	     		$searchCriteria = $request->searchCriteria;
	     		$restaurantMapper = new Administrator_Model_AdministratorMapper();
	     		$rawData = $restaurantMapper->getListJson($searchLocation,$searchCriteria);
	     	
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
		     		$arrData['url'] = $value['resid'];
		     		$arrData['diningStyle'] = $value['resdining_style'];
		     		$arrData['type_icon'] = "/images/icons/cusine/restaurant.png";
		     		$arrData['rating'] = 0;
		     		$arrData['google_place_id'] = $value['resgoogle_place_id'];
		     		$arrData['country_name'] = $value['country_name'];
		     		$arrData['state_name'] = $value['state_name'];
		     		$arrData['city_name'] = $value['city_name'];
		     		$arrData['time_zone']=$value['time_zone'];
		      		$dir = $_SERVER['DOCUMENT_ROOT'].$baseUrl."/uploads/Administrator_images/".$value['resid']."/resimages/";
		      		$abspath = $baseUrl."/uploads/Administrator_images/".$value['resid']."/resimages/";
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
		     			"private_party" =>$value['resparty_allowed'],
		     			"menu"=>$value['resmenu'],
		     			"parking" => $value['resparking'],
		     			"ac" => $value['resair_conditioned'],
		     			"mealprice_min"=>intval($value['resavg_mealprice_min']),
		     			"mealprice_max"=>intval($value['resavg_mealprice_max']),
		     			"smoking" =>$value['res_smoking'],
		     			"cusine" => $value['cusine'],
		     			"diningStyle" => $value['resdining_style']
		     			);
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
		
	public function getCountryBdm()
	{
		try
        {
            $countryMapper = new Application_Model_CountrybdMapper();
            $countryData = $countryMapper->getAllCountries();
            return $countryData;
        }
        catch (Exception $ex) {
                Rdine_Logger_FileLogger::info($ex->getMessage());
                throw new Exception($ex->getMessage()) ;    
        }
	}
	public function getCusineBdm()
	{
		try
		{
			$cusineMapper = new Application_Model_RestaurantTypebdMapper();
			$cusineData = $cusineMapper->getAllCusines();
			return $cusineData;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}

	public function getCityBdm()
	{
		try
		{
			$cityMapper = new Application_Model_CitybdMapper();
			$cityData = $cityMapper->getAllCities();
			return $cityData;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}

	public function updateCusineBdm($request)
	{
		try
		{
			$action = $request->perform;
			$data = Array();
			foreach ($request->data as $value) 
			{
				$data[$value['name']]=$value['value'];		
			}
			$cusineMapper = new Application_Model_RestaurantTypebdMapper();
			switch($action)
			{
				case "append" :
				$code = $data['code'];
				$iscusine = $cusineMapper->verifyCode($code,0);
				if($iscusine)
				{
					$status = $cusineMapper->addCusine($data);
					return $status;
				}
				else
				{
					return 'f';
				}
				break;
				case "update" :
					$status= $cusineMapper->updateCusine($data);
					return $status;
				break;
			}
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}

	}

	public function updateCityBdm($request)
	{
		try
		{
			$action = $request->perform;
			$data = Array();
			foreach ($request->data as $value) 
			{
				$data[$value['name']]=$value['value'];		
			}
			$cityMapper = new Application_Model_CitybdMapper();
			switch($action)
			{
				case "append" :
				$code = $data['code'];
				$iscity = $cityMapper->verifyCode($code,0);
				if($iscity)
				{
					$status = $cityMapper->addCity($data);
					return $status;
				}
				else
				{
					return 'f';
				}
				break;
				case "update" :
					$status= $cityMapper->updateCity($data);
					return $status;
				break;
			}
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}

	public function updateCountryBdm($request)
	{
		try
		{
			$action = $request->perform;
			$data = Array();
			$timezone_country = Array();
			foreach ($request->data as $value) 
			{
				if($value['name']!="timezone")
				{
					$data[$value['name']]=$value['value'];	
				}
				else
				{
					$timezone_country[] = $value['value'];
				}
					
			}

			$countryMapper = new Application_Model_CountrybdMapper();
			switch($action)
			{
				case "append" :
				$code = $data['code'];
				$iscountry = $countryMapper->verifyCode($code,0);
				if($iscountry)
				{
					$status = $countryMapper->addCountry($data);
					$timezonemapper = new Application_Model_TimezonebdMapper();
					$timezonestatus = $timezonemapper->updateTimezone($timezone_country,$status);	
					if($timezonestatus=='t')
					{
						return $status;
					}
					else
					{
						return 'f';
					}
				}
				else
				{
					return 'f';
				}
				break;
				case "update" :
					$status= $countryMapper->updateCountry($data);
					return $status;
				break;
			}
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
}
	public function getTagsBdm()
	{
		try
		{
			$tagsMapper = new Application_Model_RestaurantTagsbdMapper();
			$tagsData = $tagsMapper->getAllTags();
			//print_r($tagsData);die();
			return $tagsData;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}
	
	public function updateTagsBdm($request)
	{
		try{
			$action = $request->perform;
			$data = Array();
			foreach ($request->data as $value) 
			{
				$data[$value['name']]=$value['value'];		
			}
			$tagsMapper = new Application_Model_RestaurantTagsbdMapper();
			switch($action)
			{
				case "append" :
				$code = $data['code'];
				$istag = $tagsMapper->verifyCode($code,0);
				if($istag)
				{
					$status = $tagsMapper->addTags($data);
					return $status;
				}
				else
				{
					return 'f';
				}
				break;
				case "update" :
					$status= $tagsMapper->updateTag($data);
					return $status;
				break;
			}
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}


	public function getDiningBdm()
	{
		try
		{			
			$diningMapper = new Application_Model_RestaurantDiningStylebdMapper();
			$diningData = $diningMapper->getAllDining();
			return $diningData;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}

	public function updateDiningBdm($request)
	{
		try{
				$action = $request->perform;
				$data = Array();
				foreach ($request->data as $value) 
				{
					$data[$value['name']]=$value['value'];		
				}
				$diningMapper = new Application_Model_RestaurantDiningStylebdMapper();
				switch($action)
				{
					case "append" :
					$code = $data['code'];
					$isdine = $diningMapper->verifyCode($code,0);
					if($isdine)
					{
						$status = $diningMapper->addDining($data);
						return $status;
					}
					else
					{
						return 'f';
					}
					break;
					case "update" :
						$status= $diningMapper->updateDine($data);				
						return $status;
					break;
				}
		   }
		   catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	public function getPriceBdm()
	{
		try
		{			
			$priceMapper = new Application_Model_PriceMapper();
			$priceData = $priceMapper->getAllPrice();
			return $priceData;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
		}
	}

	public function updatePriceBdm($request)
	{
		try{
				$action = $request->perform;
				$data = Array();
				foreach ($request->data as $value) 
				{
					$data[$value['name']]=$value['value'];		
				}
				$priceMapper = new Application_Model_PriceMapper();
				switch($action)
				{
					case "append" :
					$code = $data['code'];
					$country_fk_id = $data['country_fk_id'];
					$isprice = $priceMapper->verifyCode($code,$country_fk_id,0);
					if($isprice)
					{
						$status = $priceMapper->addPrice($data);
						return $status;
					}
					else
					{
						return 'f';
					}
					break;
					case "update" :
						$status= $priceMapper->updatePrice($data);				
						return $status;
					break;
				}
		   }
		   catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	/**
	*JSON DATA FUNCTION TO LOAD LOCATIONS DATA ON PAGE LOAD
	*/
 	public function locationsBdm($request)
	{
		try
		{
			$action = $request->perform;
		$data = Array();
		$postData = $request->data;
		if(isset($postData))
		{
			foreach ($postData as $value) 
			{
				$data[$value['name']]=$value['value'];		
			}
		}

		$locationMapper = new Application_Model_LocationboundariesMapper();
		switch ($action) {
			case 'getData':
				$result['data'] = Array();
				$result['data'] = $locationMapper->getLocationsBdm();
				$country_bdMapper = new Application_Model_CountrybdMapper();
	         	$country_data =  $country_bdMapper->getCountries();
				$result['country_data'] = $country_data;
				return $result;
				break;
			case "update" :
						$status= $locationMapper->updateLocation($data);
						return $status;
					break;
			case "append" :
					$code = $data['code'];
					$isloc = $locationMapper->verifyCode($code,0);
					if($isloc)
					{
						$status = $locationMapper->addLocation($data);
						return $status;
					}
					else
					{
						return 'f';
					}
					break;	

		}	
		}
		 catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
		
	}

	public function manageRestaurant($request)
	{
		try
		{
			$restaurantMapper = new Restaurant_Model_RestaurantMapper();
			$result ;
			if($request->isPost())
			{
				$postData = $request->getPost();
				$filterValues = array();
				foreach($postData as $key => $filter)
				{
					$filterValues[$key] = $filter;
				}
			$result = $restaurantMapper->manageRestaurant($filterValues);
			}
			else
			{
				$result = $restaurantMapper->manageRestaurant(array());
			}
			return $result;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	public function getResBookings($request)
	{
		try {
			
			$reservationMapper = new Restaurant_Model_ReservationDataMapper();
			$bookingDetails;
			if($request->isPost())
			{
				$postData = $request->getPost();				
				$filterValues = array();
				foreach($postData as $key => $filter)
				{
					$filterValues[$key] = $filter;
				}
				
				$bookingDetails = $reservationMapper->fetchBookingDetails($filterValues);
			
			}else{
				$resMapper = new Restaurant_Model_RestaurantMapper();
				$bookingDetails = $reservationMapper->fetchBookingDetails(array());
				
			}
			return $bookingDetails;
		} 
		catch (Exception $ex) {
			throw new Exception($ex->getMessage()) ;			
		}
	}
	public function changeBookingStatus($request)
	{
		try {
			$bookid = $request->getPost('bookingid');
			$status = $request->getPost('status');
			$reservationMapper = new Restaurant_Model_ReservationDataMapper();
			$status = $reservationMapper->getBookingStatus($bookid,$status);
			return $status;
		} catch (Exception $e) {
		throw new Exception($e->getMessage()) ;	
		}
	}


	public function updateRestaurantStatus($request)
	{
		try
		{
			$restaurantMapper = new Restaurant_Model_RestaurantMapper();
			$value = $request->getPost('data');
			$toUpdate;
			$returnStatus ;
			if($value==1)
			{
				$toUpdate = 2;
			}
			else
			{
				$toUpdate = 1;
			}
			$data = array("res_status"=>$toUpdate);
			$resid = $request->getPost("updateId");
			$result = $restaurantMapper->updateRestaurantDetails($data,$resid);
			if($result ==1 )
			{
				return $toUpdate;
			}
			else
			{
				return false;
			}
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	public function getManageRestaurantFilterForm()
	{
		try
		{
			$form = new Administrator_Form_ManageRestaurantFilter();
		return $form;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	public function ResBookingFilterForm()
	{
		try
		{
			$form = new Administrator_Form_BookingDetails();
		return $form;
		}
		catch (Exception $ex) {
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;	
			}
	}

	public function AddContact($data)
	{
		try{
			$form = $this->getContactUsForm();
			$result = array();
			/*if($data['contactType'] == 'email'){
				$form->emailAddress->setRequired(true);
				$form->phone->setRequired(false);
			}else if($data['contactType'] == 'phone'){
				$form->phone->setRequired(true);
				$form->contactType->setValue('phone');
				$form->emailAddress->setRequired(false);
			}*/
			if($form->isValid($data)){
				$formData = $form->getValues();
				$mapper = new Administrator_Model_ContactUsDataMapper();
				$contactObj = new Administrator_Model_ContactUs();
				
				$domain = $_SERVER["SERVER_NAME"];
				if ($domain == "www.dinedesk.com" || $domain == "dinedesk.com")
				{
					$contactObj->setCompanyId(1);
				}else if ($domain == "www.dinedesk.co.za" || $domain == "dinedesk.co.za"){
					$contactObj->setCompanyId(2);
				}else{
					$contactObj->setCompanyId(1);
				}
				$contactObj->setcontactname($formData['contactName']);
				$contactObj->setaddress($formData['address']);
				$contactObj->setcity($formData['city']);
				$contactObj->setstate($formData['state']);
				$contactObj->setcountry($formData['country']);
				$contactObj->setzip($formData['postalCode']);
				$contactObj->setphone($formData['phone']);
				$contactObj->setemail($formData['emailAddress']);
				$contactObj->setfax($formData['fax']);
				$contactObj->setwebsite($formData['website']);
				$contactObj->setmoreinformation($formData['moreinfo']);
				$contactObj->setcomments($formData['comments']);
				$contactObj->setpostedon(date('Y-m-d')); 
				$contactObj->setcontacttype($formData['type']);
				$status = $mapper->CreateContact($contactObj);
				
				if($status){
					$result['status'] = $status; 
					$result['form']	  = $form;	
				}

			//return $result;
				
			$mailmapper = new Application_Service_Administrator();
				//if($formData['notificationType'] == 'email'){
				if($result['status']){

					
					/*$mailObj = new Communication_Model_Mail();
					$mailObj->setMsgCode('EnquiryNot');
						$name = $formData['contactName'];
						$data = array('Name' => $name,
						  'City'    => $formData['city'],
						  'State' => $formData['state'],
						  'Country'  => $formData['country'],
						  'Phone'     => $formData['phone'],
						  'Email'     => $formData['emailAddress'],
						  'Comments'     => $formData['comments']);
						  //'Status'	 => $formData['bookingStatus']);
						$mailObj->setData($data);
						$mailStatus = $mailmapper->SendMail($mailObj);*/

					}
				return $result;

			}else{
			$formData = $form->getValues();
		 	$form->populate($formData);
		 	$result['status'] = false;
		 	$result['form'] = $form;
		 	return $result;
			}	
		}catch (Exception $ex){


			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	
	
}
