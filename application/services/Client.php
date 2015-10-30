<?php
/**
*	Name			: User.php
*	Author			: Kartheek
*	Creation Date	: 9/30/2010
*	Path 			: application/services/User.php
*	Description		: This is the service class for the usermanagementsystem module.
*					   	
*/
class Application_Service_Client
{
	/**
	 * Instance variable of the form
	 * @var array
	 */
	protected $_form = array();
	
	/**
     * @param instance of zend form
     */
	public function setCustomerForm(Zend_Form $form)
	{
		$this->_form['Customer'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getCustomerForm()
	{
		if(empty($this->_form['Customer'])) {
			$this->setCustomerForm(new User_Form_Guest());
		}
		return $this->_form['Customer'];
	}

	/**
     * @param instance of zend form
     */
	public function setEditCustomerProfileForm(Zend_Form $form)
	{
		$this->_form['EditCustomerProfile'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getEditCustomerProfileForm()
	{
		if(empty($this->_form['EditCustomerProfile'])){
			$this->setEditCustomerProfileForm(new User_Form_EditCustomerProfile());
		}
		return $this->_form['EditCustomerProfile'];
	}

	/**
     * @param instance of zend form
     */
	public function setRestaurantOwnerForm(Zend_Form $form)
	{
		$this->_form['RestaurantOwner'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getRestaurantOwnerForm()
	{
		if(empty($this->_form['RestaurantOwner'])) {
			$this->setRestaurantOwnerForm(new User_Form_Manager());
		}
		return $this->_form['RestaurantOwner'];
	}

	/**
     * @param instance of zend form
     */
	public function setChangePasswordForm(Zend_Form $form)
	{
		$this->_form['ChangePassword'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getChangePasswordForm($data)
	{
		if(empty($this->_form['ChangePassword'])) {
			$changePwdform = new User_Form_ChangePassword();
			$formvalue = array('userid'=>$data['User_Id']);
			$changePwdform->populate($formvalue);
			$this->setChangePasswordForm($changePwdform);
		}
		return $this->_form['ChangePassword'];
	}
	
	public function setUserPasswordChangeForm(Zend_Form $form)
	{
		$this->_form['UserPasswordChange'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getUserPasswordChangeForm()
	{
		if(empty($this->_form['UserPasswordChange'])) {
			$this->setUserPasswordChangeForm(new User_Form_UserPasswordChange());
		}
		return $this->_form['UserPasswordChange'];
	}
	
	/**
     * @param instance of zend form
     */
	public function setSocialMediaTypeForm(Zend_Form $form)
	{
		$this->_form['SocialMediaType'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getSocialMediaTypeForm($data)
	{
		if(empty($this->_form['SocialMediaType'])){
			$socialmediatype = new User_Form_SocialMediaType();
			$formvalue = array('userid'=>$data['User_Id']);
			$socialmediatype->populate($formvalue);
			$this->setSocialMediaTypeForm($socialmediatype);
		}
		return $this->_form['SocialMediaType'];
	}

	/**
     * @param instance of zend form
     */
	public function setEditRestOwnProfile(Zend_Form $form)
	{
		return $this->_form['EditRestOwnProfile'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getEditRestOwnProfile()
	{
		if(empty($this->_form['EditRestOwnProfile'])){
			$this->setEditRestOwnProfile(new User_Form_EditRestOwnFrom());
		}
		return $this->_form['EditRestOwnProfile'];
	}

	/**
     * @param instance of zend form
     */
	public function setEditSocialProfileForm(Zend_Form $form)
	{
		$this->_form['EditSocialProfile'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getEditSocialProfileForm()
	{
		if(empty($this->_form['EditSocialProfile'])){
			$this->setEditSocialProfileForm(new User_Form_EditSocialProfile());
		}
		return $this->_form['EditSocialProfile'];
	}
	
	public function setEditAdminUserForm(Zend_Form $form)
	{
		$this->_form['EditAdminUser'] = $form;
	}

	public function getEditAdminUserForm()
	{
		if(empty($this->_form['EditAdminUser'])) {
			$this->setEditAdminUserForm(new User_Form_EditAdminPatron());
		}
		return $this->_form['EditAdminUser'];
	}
	
	public function setAddAdminUserForm(Zend_Form $form)
	{
		$this->_form['AddAdminUser'] = $form;
	}

	public function getAddAdminUserForm()
	{
		if(empty($this->_form['AddAdminUser'])) {
			$this->setAddAdminUserForm(new User_Form_AddAdminPatron());
		}
		return $this->_form['AddAdminUser'];
	}

	/**
     * @param instance of zend form
     */
	public function setSearcgFevRestaurant(Zend_Form $form)
	{
		$this->_form['SearcgFevRestaurant'] = $form;
	}

	/**
     * @return instance of form
     */
	public function getSearcgFevRestaurant($data)
	{
		if(empty($this->_form['SearcgFevRestaurant'])){
			$searchFevRestForm = new User_Form_SearchFevRestaurant();
			$formvalue = array('userid'=>$data['User_Id']);
			$searchFevRestForm->populate($formvalue);
			$this->setSearcgFevRestaurant($searchFevRestForm);
		}
		return $this->_form['SearcgFevRestaurant'];
	}
	
	/* commented for later use
	public function setSearchRestaurantUserForm(Zend_Form $form)
	{
		$this->_form['SearchRestaurantUser'] = $form;
	}

	
	public function getSearchRestaurantUserForm($data)
	{
		if(empty($this->_form['SearchRestaurantUser'])){
			$searchResUser = new User_Form_SearchRestaurantUser();
			$userid = $data['User_Id'];
				
			$mapper = new FirmManagement_Model_FirmDataMapper();
			$restObj = new FirmManagement_Model_FirmNamesByOwnerId();
			if($data['Usertype'] == "RSO"){
				$restObj->setRestOwnerId($userid);
			}else if($data['Usertype'] == "RSU" || $data['Usertype'] == "SRU"){
				$restObj->setRestId($data['RestId']);
			}else if($data['Usertype'] == "ADM" || $data['Usertype'] == "ADU"){
				$restObj->setRestOwnerId($data['restownerId']);		
			}
			$results = $mapper->getRestaurantNamesByOwnerId($restObj);
			$searchResUser->RestaurantName->addMultiOptions($results);
			$this->setSearchRestaurantUserForm($searchResUser);
		}
		return $this->_form['SearchRestaurantUser'];
	}
	
	*/

	/**
     * @param instance of zend form
     */
	public function setLoginForm(Zend_Form $form)
	{
		$this->_form['Login'] = $form;
	}
	
	/**
     * @return instance of form
     */
	public function getLoginForm()
	{
		if(empty($this->_form['Login'])) {
			$this->setLoginForm(new User_Form_Signin());
		}
		return $this->_form['Login'];
	}
	

	/**
	 * registration of customer
	 * 
     * @param customer registration form data
     * @return status of registration completed or not
     */	
	public function RegisterCustomer(array $data)
	{
		try{
			$form = $this->getCustomerForm();
			$stateid = null;
			$regionid = null;
			$cityid  = null;
			$regionBd  = array();
			$cityBd  = array();
			$ngbhBd = array();
           	$restService = new Application_Service_Restaurant();
           	if($data['phone'] != ''){
           		$form->countryCode->setRequired(true);
           	}
           	if($form->isValid($data)){

				$formData = $form->getValues();
				$date = new Zend_Date();
				$customer = new User_Model_Guest();
				$customer->setEmail(strtolower($formData['emailAddress']))
				->setPassword($formData['password'])
				->setUsertypeid(2)
				->setRole(4)
				->setRegistereddate(date('Y-m-d H:i:s'))
				->setUserstatisid(1)
				->setSalution($formData['salution'])
				->setFirstname($formData['firstName'])
				->setLastname($formData['lastName'])
				->setAddress($formData['address'])
				->setPhonenumber($formData['phone'])
				->setcountryCode($formData['countryCode'])
				->setZipcode($formData['postalCode']);

				$mapper = new User_Model_GuestDataMapper();
				$customer_id = $mapper->save($customer);

				if($customer_id){
					/* For E-Mail
					$mailmapper = new Application_Service_Communication();
					$mailObj = new Communication_Model_Mail();
					$mailObj->setMsgCode('Customer_Confirmation');
					$name = $formData['firstName'].' '.$formData['lastName'];
					$data = array('UserName' => $name,
								  'SenTo'    => $customer->getEmail());
					$mailObj->setData($data);
					$mailStatus = $mailmapper->SendMail($mailObj);
					For SMS*/
					/*if(isset($formData['phone'])){
						$smsObj = new Communication_Model_Sms();
						$smsObj->setMsgCode('Customer_Confirmation');
						$data = array(
						 	'to'	=>	trim($formData['phone'])
						 );
						 $smsObj->setData($data);
						 $mailStatus = $mailmapper->SendSms($smsObj);
					}*/
					return true;
				}else{
					return false;
				}
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				if($regionBd){
					$form->region->addMultiOptions($regionBd);
				}
				if($cityBd){
					$form->city->addMultiOptions($cityBd);
				}
				if($ngbhBd){
					$form->neighborhood->addMultiOptions($ngbhBd);
				}
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * get customer information
	 * 
     * @param $data array contains login user information
     * @return the customer information
     */	
	public function GetCustomerProfileById($data)
	{
		try{
			$userid = $data['User_Id'];
			$cusProfileByIdObj= new User_Model_CustomerProfileById();
			$cusProfileByIdObj->setUserId($userid);

			$mapper= new User_Model_GuestDataMapper();
			$cusProfileResult = $mapper->getCustomerProfileById($cusProfileByIdObj);

			$formValues = array('userid'    =>  $userid,
							'emailAddress'	=>  $cusProfileResult->getEmail(),
	                        'salution'		=>	$cusProfileResult->getSalution(),
	                        'firstName'		=>	$cusProfileResult->getFirstname(),
	                        'lastName'		=>	$cusProfileResult->getLastname(),
	                        'phone'			=>	$cusProfileResult->getPhonenumber(),
	                        'mobile'		=>	$cusProfileResult->getMobilenumber(),
	                        'address'		=>	$cusProfileResult->getAddress(),
	                        'postalCode'	=>	$cusProfileResult->getZipcode(),
	                        'favoritefood'	=>	$cusProfileResult->getFavoritefood(),
	                        'favoritemusic'	=>	$cusProfileResult->getFavoritemusic()
			);

			$cusform = $this->getEditCustomerProfileForm();
			$cusform->populate($formValues);

			return $cusform;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Edit and Update customer information
	 * 
     * @param $data array contains login user information
     * @return status and form
     */		
	public function EditCustomerProfile(array $data)
	{
		try{
			$form = $this->getEditCustomerProfileForm();
			$stateid = null;
			$regionid = null;
			$cityid  = null;
			$cityBd  = array();
			$cityBd  = array();
			$ngbhBd = array();
            $restService = new Application_Service_Firm();
            if($form->isValid($data)){

				$formData = $form->getValues();
				$customer = new User_Model_Guest();

				$customer->setId((int)$form->getValue('userid'));
				$customer->setEmail(strtolower($formData['emailAddress']));
				$customer->setSalution($formData['salution']);
				$customer->setFirstname($formData['firstName']);
				$customer->setLastname($formData['lastName']);
				$customer->setPhonenumber($formData['phone']);
				$customer->setAddress($formData['address']);
				$customer->setZipcode($formData['postalCode']);
				$customer->setFavoritefood($formData['favoritefood']);
				$customer->setFavoritemusic($formData['favoritemusic']);

				$mapper = new User_Model_GuestDataMapper();
				$status = $mapper->update($customer);
				if($status){
					$form->populate($data);
					$result = array('status'=>true,'form'=>$form);
					return $result;
				}
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				if($cityBd){

					$form->city->addMultiOptions($cityBd);
				}
				if($ngbhBd){
					$form->neighborhood->addMultiOptions($ngbhBd);
				}

				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}	

	/**
	 * registration of Restaurant Owner
	 * 
     * @param owner registration form data
     * @return status of registration completed or not
     */
	public function RegisterRestaurantOwner(array $data,$source = 'DD')
	{
		try{
			$form = $this->getRestaurantOwnerForm();
			$stateid = null;
			$regionid = null;
			$cityid  = null;
			$regionBd  = array();
			$cityBd  = array();
			$ngbhBd = array();
			$restService = new Application_Service_Restaurant();
						
			if($form->isValid($data)){
				$storage = new Zend_Auth_Storage_Session();
				$userdata = $storage->read();
				
				$formData = $form->getValues();

				$restaurantowner= new User_Model_Manager();

				$restaurantowner->setFristName($formData['firstName'])
								->setLastName($formData['lastName'])
								->setEmail(strtolower($formData['emailAddress']))
								->setPassword($formData['password'])
								->setUsertypeid(3)
								->setRole(2)
								->setRegistereddate(date('Y-m-d H:i:s'))				
								->setRestaurantname($formData['restaurantName'])
								->setPhonenumber($formData['phone'])
								->setCountryCode($formData['countryCode'])	
								->setcity($formData['resownercity'])
								->setzipCode($formData['resownerzipcode'])
								->setSourceid($formData['source'])
								->setWebsite($formData['website'])
								->setSourcedescription($formData['sourcedescription'])
								->setDescription($formData['description'])
								->setDateofbirth($formData['dateofbirth']);
				
				if($userdata['Usertype'] == "ADM" || $userdata['Usertype'] == "ADU" || $source == 'WIX'){
					$restaurantowner->setUserstatisid(1);
				}else{
					$restaurantowner->setUserstatisid(3);
				}
				
				if(isset($userdata['companyid'])){
					$restaurantowner->setCompanyid($userdata['companyid']);
				}else{
					$restaurantowner->setCompanyid(1);
				}

				$mapper = new User_Model_ManagerDataMapper();
				$res_own_id = $mapper->save($restaurantowner,$source);
				if($res_own_id){
// 					$mailmapper = new Application_Service_Communication();
					/* for E-mail
					$mailObj = new Communication_Model_Mail();
					//$mailObj->setMsgCode('ResOwnConf');
					
					$mailObj->setMsgCode('New Registration email');
					$name 		= $formData['firstName'].' '.$formData['lastName'];
										
					$data = array('name'=> $name,
								  'restname'=> $formData['restaurantName'],
								  'phone'	=> $formData['countryCode'].$formData['phone'],
								  'email'	=> strtolower($formData['emailAddress']),
						//		  'state'	=> $state,
								  'city'	=> $city,
								  'userid'	=> $formData['userid'],
								  'approval'=> $approval,
                                                                  'uId'         => $res_own_id,
								  'disapproval'=>$disapproval,
								  'state'	=> $formData['resownercountry'],
								  'city'	=> $formData['resownercity'],
								  'desc'	=> $formData['description']);
					$mailObj->setData($data);
					$mailStatus = $mailmapper->SendMail($mailObj);
					*/
					$result = array('status'=>true,'userid'=>$res_own_id);
					if($source == 'DD'){
						return $result;
					}else{
						return array('status'=>true,'result'=>$res_own_id);
					}
				}
			}else{
				$formData = $form->getValues();
				$form->populate($data);
				$result = array('status'=>false,'form'=>$form);
				return $result;
			}
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	/**
	 * @param array
	 * function to login the users
	 */
	public function Login(array $data)
	{
		try{
			$form = new User_Form_Signin();
			if($form->isValid($data)){

				$formValues = $form->getValues();
				$loginRes = $this->_process($formValues);
				return $loginRes;

			}else{
				$form->populate($data);
				return $loginRes = array('Status'=>false,'Form'=>$form,'isFormValid'=>false);
			}
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	/**
	*function to login ajax users
	*
	*/
	public function AjaxLogin(array $data)
	{
		try{
				$loginRes = $this->_process($data);
				return $loginRes;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * @param instance of login
	 * function to check whether email id exists or not
	 */
	public function CheckEmailAvaliable(User_Model_Signin $obj)
	{
		try{
			$mapper = new User_Model_ClientDataMapper();
			$status = $mapper->getEmailStatus($obj);
			return $status;
		}catch (Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * function to logout the users
	 */
	public function Logout()
	{
		try{
			$auth = Zend_Auth::getInstance();
			$auth->clearIdentity();
			return true;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * @param values
	 * function to check whether emailaddress and password valid or not
	 * if it is valid user enters to his/her account
	 */
	protected function _process($values)
	{
		$adapter = $this->_getAuthAdapter();
		$userMapper = new User_Model_ClientDataMapper();
		$passPhrase = $userMapper->getUserPassPhrase($values['emailAddress']);
		if($passPhrase){
			$passwordHash = sha1($values['password'].$passPhrase->usrpassphrase);
			$email = strtolower($values['emailAddress']);
			$adapter->setIdentity(trim($email))
			->setCredential($passwordHash);
			$auth = Zend_Auth::getInstance();
			try{
				$select = $adapter->getDbSelect();
				$select->where('usruser_status_id = 1');
				$result = $auth->authenticate($adapter);
			}
			catch(Zend_Exception $ex){
				$this->view->errorMsg = $ex->getMessage() . "<br>";
				Rdine_Logger_FileLogger::info($ex->getMessage());
				throw new Exception($ex->getMessage()) ;
			}
	
			if($result->isValid()){
				$data = $adapter->getResultRowObject();
				$loginProfile = $userMapper->getLoginProfile($data);
				$storage = new Zend_Auth_Storage_Session();
				$data = $storage->read();
				$namespace = new Zend_Session_Namespace(); 
				$loginProfile['lang'] = $namespace->lang;
				$storage->write($loginProfile);	
				$userType = $loginProfile['Usertype'];
				if(($userType == "ADU" || $userType == "RSO" || $userType == "RSU" || $userType == "SRU" || $userType == "CUS")  && $loginProfile['companyid'] != 1){
					/*$companyMapper = new Administrator_Model_CompanyDataMapper();
					$status = $companyMapper->getComapnyStatusById($loginProfile['companyid']);
					if($status == true){*/
						$loginRes = array('Status'=> true,'Usertype'=>$userType,'loginprofile'=>$loginProfile);
					/*}else{
						$auth->clearIdentity();
						return $loginRes = array('Status'=>false,'CompanyInActive'=>true);
					}*/
					return $loginRes;
				}else{				
					$loginRes = array('Status'=> true,'Usertype'=>$userType,'loginprofile'=>$loginProfile);
				}
				//$LoginAttemptMapper = new User_Model_LoginAttemptsDataMapper();
				//$LoginAttemptMapper->UpdateLoginAttempts($data['Email']);
				return $loginRes;
			}else{
				$userMapper = new User_Model_ClientDataMapper();
				$userstatus = $userMapper->getUserStatusByEmail($values['emailAddress']);
				if($userstatus['userstatusid'] == 3){
					return $loginRes = array('Status'=>false,'UserNotApproved'=>true);
				}else if($userstatus['userstatusid'] == 2){
					return $loginRes = array('Status'=>false,'UserInActive'=>true);
				}else{
					return $loginRes = array('Status'=>false,'isFormValid'=>true);
				}
			}
		}else{
			return $loginRes = array('Status'=>false,'isFormValid'=>true);
		}
	}

	public function _getAuthAdapter()
	{
		$users = new User_Model_DbTable_Client();
		$authAdapter = new Zend_Auth_Adapter_DbTable($users->getAdapter());
		$authAdapter->setTableName('rd.user');
		$authAdapter->setIdentityColumn('usremail')
		->setCredentialColumn('usrpassword');
		return $authAdapter;
	}
	
	public function manageRestaurantOwners($data,$page)
	{
		try{
			$obj = new User_Model_RestOwnSearch();
			$adminService = new Application_Service_Administrator();
			$form = $adminService->getRestOwnerSearchForm();
			if($form->isValid($data)){
				if($data)
				{
					$formData = $form->getValues();
					if($formData['userId'])
					{
						$obj->setId($formData['userId']);
					}
					if($formData['email']){
						$obj->setEmail($formData['email']);
					}
					if($formData['status']){
						$obj->setStatusId($formData['status']);
					}
					if($formData['firstname']){
						$obj->setFirstname($formData['firstname']);
					}
					if($formData['lastname']){
						$obj->setLastname($formData['lastname']);
					}
					if($formData['state']){
						$obj->setStateid($formData['state']);
					}
					if($formData['region']){
						$obj->setRegionid($formData['region']);
					}
					if($formData['city']){
						$obj->setCityid($formData['city']);
					}
					if($formData['resname']){
						$obj->setResName($formData['resname']);
					}
					if($formData['company']){
						$obj->setCompany($formData['company']);
					}
				}
				$userMapper = new User_Model_ClientDataMapper();
				$result = $userMapper->manageRestaurantOwners($obj,$page);
				return $result;
			}
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	public function UpdateRestaurantOwnerStatus($request)
	{
		try{
			if($request->userid)
			{
				$userid = $request->userid;
			}else{
				$userid = $request->uid;
			}
			$code = $request->status;
			$userMapper = new User_Model_ClientDataMapper();
			$status = $userMapper->UpdateRestaurantOwnerStatus($userid, $code);

			if(isset($request->appstatus)){
				$result = $userMapper->getNameandEmailByUserId($userid);
				
// 				$mailmapper = new Application_Service_Communication();
// 				$mailObj = new Communication_Model_Mail();
// 				$name	= $result['rsofirst_name'].' '.$result['rsolast_name']; 
// 				$email	= $result['usremail']; 
// 				$mailObj->setMsgCode('Registration Approved');
				
// 				$data = array('UserName' => $name,
// 						  'SenTo'    => $email);
// 				$mailObj->setData($data);
// 				$mailmapper->SendMail($mailObj);
			}
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditRestaurantOwnerDetails($request)
	{
		try{
			$obj = new User_Model_Client();
			if($request->emailAddress){
				$email 		= strtolower($request->emailAddress);
				$obj->setEmail($email);
				$userid 	= $request->id;
				$obj->setId($userid);
			}
			if($request->password){
				$password 	= $request->password;
				$obj->setPassword($password);
				$userid 	= $request->userid;
				$obj->setId($userid);
			}			
			$userMapper = new User_Model_ClientDataMapper();
			$status = $userMapper->EditRestaurantOwnerDetails($obj);
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function EditGuestDetails($request,$userid)
	{
		try{
		
			$userMapper = new User_Model_ClientDataMapper();
			if($request->emailAddress){
				$email = strtolower($request->emailAddress);
				$cusid = $request->id;
				$status = $userMapper->updateGuestEmailDetails($cusid,$email,$userid);
			}
			if($request->password){

				$password 	= $request->password;
				$cusid = $request->userid;
				$status = $userMapper->updateGuestPassDetails($cusid,$password,$userid); 
			}			
			return $status;
		}catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function manageGuests($request)
	{
		try
		{
			$guestMapper = new User_Model_GuestDataMapper();
			$result ;
			if($request->isPost())
			{
				$postData = $request->getPost();
				$filterValues = array();
				foreach($postData as $key => $filter)
				{
					$filterValues[$key] = $filter;
				}
			$result = $guestMapper->manageGuests($filterValues);
			}
			else
			{
				$result = $guestMapper->manageGuests(array());
			}
			return $result;
		}
		catch(Exception $ex){
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function updateGuestStatus($request)
	{
		try
		{
			$guestMapper = new User_Model_GuestDataMapper();
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
			$data = array("cus_status"=>$toUpdate);
			$usrid = $request->getPost("updateId");
			$result = $guestMapper->updateGuestDetails($data,$usrid);
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
	public function manageProfile($request)
	{
		try
		{
			$userProfile = $request->getPost('profile');
			$userDetails = array();
			$userDetails['email'] = $userProfile['email'];
			$name = $userProfile['full_name'];
			$nameArr = explode(" ",$name);
			$userDetails['first_name'] = $nameArr[0];
			$userDetails['last_name'] = $nameArr[1];
			$gdMapper = new User_Model_GuestDataMapper();
			$results = $gdMapper->manageLoginProfileWidget($userDetails);
			return $results;
		}
		catch(Exception $ex)
		{
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	 public function manageLoginProfileWidget($user,$userLoginProf)
 {
  try{  
   $userDetails = array();
   //print_r($user);
			$userDetails['email'] = $user->email;
			$userDetails['first_name'] = $user->first_name;
			$userDetails['last_name'] = $user->last_name;
   $userMapper = new User_Model_GuestDataMapper();

   $loginProfile = $userMapper->manageLoginProfileWidget($userDetails);
//   $loginProfile[] = $userLoginProf; 
//   $storage = new Zend_Auth_Storage_Session();
//   $storage->write($loginProfile); 

   $userType = $loginProfile['Usertype'];
   if(($userType == "ADU" || $userType == "RSO" || $userType == "RSU" || $userType == "RSU")  && $loginProfile['companyid'] != 1){
    $companyMapper = new Administrator_Model_CompanyDataMapper();
    $status = $companyMapper->getComapnyStatusById($loginProfile['companyid']);
    if($status == true){
     $loginRes = array('Status'=> true,'Usertype'=>$userType,'loginprofile'=>$loginProfile);
    }else{
     $auth->clearIdentity();
     return $loginRes = array('Status'=>false,'CompanyInActive'=>true);
    }
   }else{    
    $loginRes = array('Status'=> true,'Usertype'=>$userType,'loginprofile'=>$loginProfile);
   }
  // $LoginAttemptMapper = new User_Model_LoginAttemptsDataMapper();
  // $LoginAttemptMapper->UpdateLoginAttempts($user->email);
   return $loginRes;
   
  }catch(Exception $ex){ 
   Rdine_Logger_FileLogger::info($ex->getMessage());
   throw new Exception($ex->getMessage()) ;
  }
 }

 public function widgetUserRegistration($request)
	{
		try{
			$customer = new User_Model_Guest();
			$customer->setEmail(strtolower($request['emailAddress']))
					->setPassword($request['password'])
					->setUsertypeid(2)
					->setRole(4)
					->setRegistereddate(date('Y-m-d H:i:s'))
					->setUserstatisid(1)
					->setFirstname($request['firstName']);
					
			if(isset($name[1])){
				$customer->setLastname(($request['lastName']));
			}

			$mapper = new User_Model_GuestDataMapper();
			$customer_id = $mapper->widgetsave($customer);
			$values = array('emailAddress'=>$request['emailAddress'],'password'=>$request['password']);
			$createLoginProf = $this->_process($values);
			if($customer_id){
				/* For E-Mail*/
				/*$mailmapper = new Application_Service_Communication();
				$mailObj = new Communication_Model_Mail();
				$mailObj->setMsgCode('Customer_Confirmation');
//				$name = $request->firstName.' '.$request->lastName;
				$data = array('UserName' => $request->username,
							  'SenTo'    => $customer->getEmail());
				$mailObj->setData($data);
				$mailStatus = $mailmapper->SendMail($mailObj);*/
				/*For SMS*/
				/*if(isset($request['phone'])){
					$smsObj = new Communication_Model_Sms();
					$smsObj->setMsgCode('Customer_Confirmation');
					$data = array(
					 	'to'	=>	trim($request['phone'])
					 );
					 $smsObj->setData($data);
					 $mailStatus = $mailmapper->SendSms($smsObj);
				}*/
				return true;
			}else{
				return false;
			}
		}catch(Exception $ex){	
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getNumberOfUsers()
	{
		try
		{
			$cusMapper = new User_Model_ClientDataMapper();
			$number = $cusMapper->getUserCount();
			return $number;
		}
		catch(Exception $ex){	
			Rdine_Logger_FileLogger::info($ex->getMessage());
			throw new Exception($ex->getMessage()) ;
		}
	}
}