<?php

class User_Form_Patron extends Zend_Form
{

    public function init()
    {
        $passwordConfirm = new Rdine_Validate_PasswordConfirmation();
        
           	
    	$salutionList = array(
    			array('key'=>'Mr','value'=>'Mr'),
    			array('key'=>'Ms','value'=>'Ms'),
    			array('key'=>'Mrs','value'=>'Mrs')    	
    	);
    	
    	$genderList = array(
    	 		array('key'=>'Male','value'=>'Male'),
    	 		array('key'=>'Female','value'=>'Female')    	 
    	 );
    	 
    	 $userList = array(
    	 		array('key'=>'RSU','value'=>'Restaurant User'),
    	 		array('key'=>'SRU','value'=>'Super User')    	 
    	 );
    	 
   		$CountryCodeMapper = new Application_Model_CountryCodeDataMapper();
    	$CountryCode = $CountryCodeMapper->fetchAll();
    	$CodeList = array();
    	$CodeList[] = array('key'=>'','value'=>'Select flag');
    	foreach($CountryCode as $listcode){
    		$CodeList[] = array('key'=>$listcode->getDescription(),'value'=>$listcode->getCode());
    	}
    	 
    
	/*	$restName = new Application_Model_RestaurantMapper();
		$restNamesResult = $restName->getRestaurantsNames();
		$restNamesList = array();
		foreach($restNamesResult as $rstNme){
		$restNamesList[] = array('key'=>$rstNme->getId(),'value'=>$rstNme->getRestaurantname());
		}
*/
		$restNameCtl = new Zend_Form_Element_Multiselect('RestaurantNameSel');
		$restNameCtl->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','sel2')
					->setRegisterInArrayValidator(false)					
					->setRequired(true);
					
		$restUsersType = $this->createElement('select','restUsersType');
		$restUsersType->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','sel2')
					->addMultiOptions($userList)
					->setRegisterInArrayValidator(false)					
					->setRequired(true);
    	 
    	$restUserRoles = $this->createElement('select','restUserRoles');
        $restUserRoles->removeDecorator('Label')
         			 ->removeDecorator('HtmlTag') 
         			 ->setAttrib('class','sel2 required')
         			 ->setRegisterInArrayValidator(false)
         			 ->setRequired(true);
         			 
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1 required')			 
				     ->setAttrib('placeholder','Email')
        			->setAttrib('maxlength', '40')
        			->addFilters(array('StringTrim'))
                	->addValidators(array
                				  (array('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.'))
                				))
              		->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
					 ->addErrorMessage('Pleaes Enter Valid Email Address')
                	->setValue('')
                	->addFilter('StringToLower')
                	->setRequired(true);
                
		 $password =  $this->createElement('password','password');
         $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')  
				->setAttrib('placeholder','Password')        	
        		->setAttrib('class','inp1 required')
        		->setAttrib('maxlength', '20')
        		->addValidators(array($passwordConfirm,
                				 array('NotEmpty', true, array('messages' => 'Please enter your Password.'))
                 	      	    ))
                ->setRequired(true)
                ->setValue('');
        
        $confirmPassword =  $this->createElement('password','password_confirm');
        $confirmPassword->removeDecorator('Label')
        				->removeDecorator('HtmlTag')        				
        				->setAttrib('class','inp1 required')						
				        ->setAttrib('placeholder','Re-type Password')
        				->setAttrib('maxlength', '20')
        				->addValidators(array($passwordConfirm,
                    					  array('NotEmpty', true, array('messages' => 'Please Confirm your password.'))
                    					))
                    	->setRequired(true)
                    	->setValue('');  
                    
		$salution = $this->createElement('select', 'salution');
        $salution->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
				 ->setAttrib('class','sel2 required') 
			   	 ->setAttrib('style','width:68px;')			 
                 ->addMultiOptions($salutionList)
                 ->setRequired(false);
         
		$firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')        		
        		->setAttrib('maxlength', '30')
        		->setAttrib('class','inp1 required')
				 ->setAttrib('placeholder','First Name')	
				->setAttrib('style','width:70%')
        		->addFilters(array('StringTrim'))
                ->addValidators(array
                				(array('NotEmpty', true, array('messages' => 'Please enter your First Name.')),
                					array('StringLength', false,array(0,30))))                					 
                ->setValue('')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('maxlength', '30')
				 ->setAttrib('placeholder','Last Name')
        		 ->setAttrib('class','inp1')
        		 ->addFilters(array('StringTrim'))
        		 ->addValidators(array
        		 				  (array('StringLength', false,array(0,30))
        		 				 ))
                 ->setValue('')
                 ->setRequired(true); 
                 
        $gender = $this->createElement('select','gender');
        $gender->removeDecorator('Label') 
        		->removeDecorator('HtmlTag')
        		->setAttrib('class', 'sel2 required')       		
                ->addMultiOptions($genderList)
                ->setRequired(false);
        
        $address =  $this->createElement('textarea', 'address', array('label' => 'Address', 'rows' => '4', 'cols' => '40' ));
        $address->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '200')
				->setAttrib('style','width:97%')
				->setAttrib('placeholder','Address')
        		->addFilters(array('StringTrim'))
        		->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please enter your Address.'))))
        		->addValidator('StringLength', false,array(1,200,'messages' => array(
              				Zend_Validate_StringLength::TOO_SHORT =>'address should be minimum 10 charactors',
              				Zend_Validate_StringLength::TOO_LONG => 'address is too long(>200).'
              				)))                
                ->setValue('')
                ->setRequired(false);
                
//		$rescountryCode = $this->createElement('select','rescountryCode');
//		$rescountryCode->removeDecorator('Label')
//        			    ->removeDecorator('HtmlTag')
//        			    ->setAttrib('maxlength', '100')
//        			    ->setAttrib('class','sel1 drpDown')    
//        			    ->setAttrib('style','width:92px;')  
//        			    ->addMultiOptions($CodeList)   
//        			    ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select country code.'))))    
//                        ->setValue('')
//        			    ->setRequired(false);

//         $countryCode = $this->createElement('text', 'countryCode');
//         $countryCode->removeDecorator('Label')  
//         			   ->removeDecorator('HtmlTag')      		       
//        		       ->setAttrib('class','inp1 required')
//        		       ->setAttrib('style','width:68px;')
//        		       ->setAttrib('readonly','readonly')
//        		       ->addFilters(array('StringTrim'))
//        		       ->setAttrib('title','Country Code')
//        		       ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select country code.')))) 
//        		       ->setValue('')
//                       ->setAttrib('maxlength', '5')
//                       ->setRequired(false); 
                
                
//        $phone = $this->createElement('text', 'phone');
//        $phone->removeDecorator('Label')
//        	  ->removeDecorator('HtmlTag')
//              ->setAttrib('class','inp1 required')   
//			  ->setAttrib('placeholder','Phone')           
//              ->setAttrib('maxlength', '15')
//              ->setAttrib('style','width:68%')
//              ->addFilters(array('StringTrim'))
//              ->addValidators(array
//                   					(array('NotEmpty', true, array('messages' => 'Please enter Your Phone Number.'))
//                   				 ))
//              ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
//              ->setValue('')              
//              ->setRequired(false);
              
        $mobile = $this->createElement('text','mobile');
        $mobile->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1')  									   
			  ->setAttrib('placeholder','Mobile')               
              ->setAttrib('maxlength', '10')
              ->addFilters(array('StringTrim'))
              ->addValidators(array(array('StringLength', false,array(0,15,'messages' => array(
              				Zend_Validate_StringLength::TOO_SHORT =>'mobile should be minimum 10 charactors',
              				Zend_Validate_StringLength::TOO_LONG => 'mobile is too long(>10).'
              				))))) 
              ->setValue('')              
              ->setRequired(false);
              
        $designation = $this->createElement('text','designation');
        $designation->removeDecorator('Label')
        			->removeDecorator('HtmlTag')
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '50')
        			->addFilters(array('StringTrim'))
        			->setValue('')              
              		->setRequired(false);

              
        $register = $this->createElement('submit','register');
        $register->setLabel("Register")
        		 ->removeDecorator('DtDdWrapper')        		
        		 ->setAttrib('class','submitBtn')
                 ->setIgnore(true);

		$reset = $this->createElement('reset','reset');
        $reset->removeDecorator('Label')
        	  ->removeDecorator('DtDdWrapper')
        	  ->setLabel("Reset")
        	  ->setAttrib('class','submitBtn')
              ->setIgnore(true);
              
         $this->addElements( array (
        					$emailAddress,
        					$password,
                            $confirmPassword,
                            $salution,
                            $firstName,
                            $lastName,
                            $gender,
                            $address,
                            $restNameCtl,
//                            $phone,
                            $mobile,
                            $designation,
                            $register,
                            $reset,
                            $restUserRoles,
                            $restUsersType                   
                            )
                );
    }


}

