<?php

class User_Form_Manager extends Zend_Form
{

    public function init()
    {
    	$stateMapper  = new Application_Model_CountrybdMapper();
        $states = $stateMapper->fetchAll();
        $stateList = array(); 
        $stateList[] = array('key'=>'','value'=>'Select Country');   	   
        foreach($states as $state){
    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
        }
        $stateList[] = array('key'=>'find','value'=>'cant find your Country'); 
    	$sourceofrestaurantMapper  = new Application_Model_SourceofRestaurantDataMapper();
        $sources = $sourceofrestaurantMapper->fetchAll();
        $sourceList = array(); 
        $sourceList[] = array('key'=>'','value'=>'Select Source');   	   
        foreach($sources as $source){
    		$sourceList[] = array('key'=>$source->getId(),'value'=>$source->getDescription());
        }
        
    	
  	    $passwordConfirm = new Rdine_Validate_PasswordConfirmation();
  //  	$confirmEmail = new Rdine_Validate_EMailConfirmation();
    	
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
        			->setAttrib('title', 'Email Address')
        			->setAttrib('placeholder', 'Email Address*')
                	->addValidator('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.'))
                	->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
					 ->addErrorMessage('Pleaes Enter Valid Email Address')
                	->addFilters(array('StringTrim'))
                	->setValue('')
                	->addFilter('StringToLower')
                	->setRequired(true);
                	
//	   $confirmEmailAdd = $this->createElement('text', 'confirmEmailAddress');
//       $confirmEmailAdd->removeDecorator('Label')
//        			->removeDecorator('HtmlTag')        		
//        			->setAttrib('class','inp1')
//        			->setAttrib('maxlength', '40')
//        			->setAttrib('title', 'Confirm Email Address')
//        			->setAttrib('placeholder', 'Confirm Email Address*')
//                	->addValidators(array($confirmEmail,
//                						  array('NotEmpty', true, array('messages' => 'Please confirm your EmailAddress.'))
//                				))              
//                	->setValue('')
//                	->addFilters(array('StringTrim'))
//                	->addFilter('StringToLower')
//                	->setRequired(true);                	
                
		$password =  $this->createElement('password','password');
        $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')        	
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '20')
        		->setAttrib('title', 'Password')
        		->setAttrib('placeholder', 'Password*')
                ->addValidators(array($passwordConfirm,
                				 array('NotEmpty', true, array('messages' => 'Please enter your Password.')),
                				 array('StringLength', false, array(6, 20,'messages' => array(
                    		Zend_Validate_StringLength::TOO_SHORT => 'Your password is too short(>6).',
                    Zend_Validate_StringLength::TOO_LONG => 'Your password is too long(<20).'))
            		)))
                ->setRequired(true)
                ->setValue('');
        
       $confirmPassword =  $this->createElement('password','password_confirm');
       $confirmPassword->removeDecorator('Label')
       				->removeDecorator('HtmlTag')        				
       				->setAttrib('class','inp1')
       				->setAttrib('maxlength', '20')
       				->setAttrib('title', 'Confirm Password')
       				->setAttrib('placeholder', 'Confirm Password*')
                   	->addValidators(array($passwordConfirm,
                   					  array('NotEmpty', true, array('messages' => 'Please Confirm your password.'))
                   					))
                   	->setRequired(true)
                   	->setValue(''); 

		$firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->setAttrib('title', 'First Name')
        		->setAttrib('placeholder', 'First Name*')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter FirstName.')),
                					  array('StringLength', false,array(0,30))))                					                 					 
                ->setValue('')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('maxlength', '30')
        		 ->addFilters(array('StringTrim'))
        		 ->setAttrib('title', 'Last Name')
        		 ->setAttrib('placeholder', 'Last Name')
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
        		 ->setAttrib('class','inp1')
        		 ->setValue('')
                 ->setRequired(false);                     	

        $countryCode = $this->createElement('text', 'countryCode');
        $countryCode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1')  
        		       ->setAttrib('style','width:116px; float:left')
        		       ->setAttrib('readonly','readonly')
        		       ->setAttrib('placeholder', 'Code')
        		       ->setAttrib('title', 'Country Code')
        		       ->addFilters(array('StringTrim'))
        		       ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select country code.')))) 
        		       ->setValue('')
                       ->setAttrib('maxlength', '5')
                       ->setRequired(false);   
                       
        $phone = $this->createElement('text', 'phone');
        $phone->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1')              
              ->setAttrib('maxlength', '10')
              ->setAttrib('title', 'Phone')
              ->setAttrib('style','width:325px; float:right;')
        	  ->setAttrib('placeholder', 'Phone*')
              ->addFilters(array('StringTrim'))
              ->addValidators(array
                   					(array('NotEmpty', true, array('messages' => 'Please enter Your Phone Number.'))
                   				 ))
              ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
              ->setValue('')              
              ->setRequired(false);
              
       $rastaurantname = $this->createElement('text', 'restaurantName'); 
       $rastaurantname ->removeDecorator('Label')
       					->removeDecorator('HtmlTag')
       					->setAttrib('class','inp1')
        			  	->setAttrib('maxlength', '225')
        			  	->setAttrib('title', 'Restaurant/Group')
        			    ->setAttrib('placeholder', 'Restaurant/Group*')
        			  	->addFilters(array('StringTrim'))
        			  	->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter RestaurantName.'))))
        			  	->setvalue('')
        			  	->setrequired(true);
        			  	
        $resownercountry = $this->createElement('text', 'resownercountry');
        $resownercountry->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->setAttrib('title', 'Country')
        		->setAttrib('placeholder', 'Country*')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter Country.')),
                					  array('StringLength', false,array(0,30)),array('Alnum')))                					                 					 
                ->setValue('')
                ->setRequired(false);  	
                
        $resownercity = $this->createElement('text', 'resownercity');
        $resownercity->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->setAttrib('title', 'City')
        		->setAttrib('placeholder', 'City*')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter City.')),
                					  array('StringLength', false,array(0,30))))                					                 					 
                ->setValue('')
                ->setRequired(false); 
        $resownerzipcode = $this->createElement('text', 'resownerzipcode');
        $resownerzipcode->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '10')
        		->setAttrib('title', 'Zipcode')
        		->setAttrib('placeholder', 'Zipcode')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter Zipcode.')),
                					  array('StringLength', false,array(0,10)),array('Alnum')))                					                 					 
                ->setValue('')
                ->setRequired(false); 

        $region = $this->createElement('select','region');
        $region->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1') 
        	  ->setAttrib('title', 'State')      	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select Region.'))))
        	  ->setRegisterInArrayValidator(false)
              ->setRequired(true);
              
        $state = $this->createElement('select','state');
        $state->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1')    
        	  ->setAttrib('title', 'Country')      	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select State.'))))
        	  ->addMultiOptions($stateList)
              ->setRequired(true);
              
         $source = $this->createElement('select','source');
         $source->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1') 
        	  ->setAttrib('title', 'How did you hear about us?') 
        	        	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select source.'))))
        	  ->addMultiOptions($sourceList)
              ->setRequired(false);
              
         $sourcedescription = $this->createElement('textarea', 'sourcedescription');
		 $sourcedescription->removeDecorator('Label')
		               ->removeDecorator('HtmlTag')                	   
                	   ->setAttrib('maxlength', '5000')
                	   ->setAttrib('cols', '40')
			           ->setAttrib('rows', '4')
			           ->setAttrib('class','inp1')              
			           ->setAttrib('title','Source Description')              
			           ->setAttrib('placeholder','Would you like to provide more information')              
                	   ->setValue('')              
                	   ->addValidators(array(array('StringLength', false,array(1,200,'messages' => array(
              					Zend_Validate_StringLength::TOO_LONG => 'Description is too long(>5000).'
              				)))))
			           ->setRequired(false);
              
        $city = $this->createElement('select', 'city');
        $city->removeDecorator('Label')
        	 ->removeDecorator('HtmlTag') 
        	 ->setAttrib('class', 'sel1') 
        	 ->setAttrib('title', 'City') 
        	 ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select City.'))))
        	 ->setRegisterInArrayValidator(false)
             ->setRequired(true);
		
        $cantfind = $this->createElement('hidden','cantfind');
		$cantfind->removeDecorator('HtmlTag')
    		  	 ->removeDecorator('Label');

		$cantfindcity = $this->createElement('text', 'cantfindcity');
        $cantfindcity->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('title', 'Cant Find City')
        		 ->setAttrib('placeholder', 'Enter Your City')
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
        		 ->setValue('')
                 ->setRequired(false); 
        
        $cantfindstate = $this->createElement('text', 'cantfindstate');
        $cantfindstate->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('title', 'Cant Find Country')
        		 ->setAttrib('placeholder', 'Enter Your Country')
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
        		 ->setValue('')
                 ->setRequired(false); 
                 
        $cantfindregion = $this->createElement('text', 'cantfindregion');
        $cantfindregion->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('title', 'Cant Find State')
        		 ->setAttrib('placeholder', 'Enter Your State')
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
        		 ->setValue('')
                 ->setRequired(false); 
                 
        $description = $this->createElement('textarea', 'description');
		$description->removeDecorator('Label')
		               ->removeDecorator('HtmlTag')                	   
                	   ->setAttrib('maxlength', '5000')
                	   ->setAttrib('cols', '40')
			           ->setAttrib('rows', '4')
			           ->setAttrib('class','inp1')  
			           ->setAttrib('title', 'Description')
        			   ->setAttrib('placeholder', 'Enter your comments')            
                	   ->setValue('')              
                	   ->addValidators(array(array('StringLength', false,array(1,5000,'messages' => array(
              					Zend_Validate_StringLength::TOO_LONG => 'Description is too long(>5000).'
              				)))))
			           ->setRequired(false);
			           
		      
         $website = $this->createElement('text', 'website');
         $website->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('title', 'Website')
        	     ->setAttrib('placeholder', 'Website') 
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
        		 ->setValue('')
                 ->setRequired(false); 
                 
                 
        $dateofbirth = $this->createElement('text','dateofbirth');
    	$dateofbirth->removeDecorator('Label')
    			  ->setAttrib('class','inp1 datepicker')
        		  ->removeDecorator('HtmlTag')
        		  ->setAttrib('title', 'Date of Birth')
        		  ->setAttrib('placeholder', 'Date of Birth') 
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        
			           
        			  	
        $imageCaptcha = new Zend_Captcha_Image();
        $imageCaptcha->setWidth(200)
        			 ->setWordlen(4)
        			 ->setHeight(50)
        			 ->setTimeout(900)
        			 ->setFontSize(20)
        			 ->setGcFreq(5)
        			 ->setFont('Fonts/tahoma.ttf')
        			 ->setImgDir('images/captcha/')
        			 ->setImgUrl('/images/captcha/')
        			 ->setDotNoiseLevel(0)
        			 ->setLineNoiseLevel(0);
        			   
        $captcha = new Zend_Form_Element_Captcha('captcha',array(
										         					'captcha' => $imageCaptcha 
										         			)); 
		$captcha->removeDecorator('DtDdWrapper')
				->removeDecorator('HtmlTag')
				->setAttrib('title', 'Captcha')
        		->setAttrib('placeholder', 'Enter characters as shown in box *') 
				->setAttrib('style','position:relative;margin-top:-10px;width:182px;');
        			  	
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
              
        $comapnyid = $this->createElement('hidden','comapnyid');
    	$comapnyid->removeDecorator('HtmlTag')
    		      ->removeDecorator('Label')
    		      ->removeDecorator('DtDdWrapper');
        			 		  
        $this->addElements( array ($firstName,
        							$lastName,
	        						$emailAddress,
	        		//				$confirmEmailAdd,
	        						$password,
	        						$confirmPassword,
	        						$rastaurantname,
	        		//				$state,
	        		//				$city,
	        		//				$region,
	        						$description,
	                           	 	$phone,
	                           	 	$source,
	                           	 	$sourcedescription,
	                           	 	$website,
	                           	 	$dateofbirth,
	                 //          	 	$cantfindstate,
	                  //         	 	$cantfindregion,
	                   //        	 	$cantfind,
	                    //       	 	$cantfindcity,
	                            	$register,
	                            	$reset,
	                            	$captcha,
	                            	$comapnyid,
	                            	$countryCode,
	                    //        	$resownercountry,
	                            	$resownercity,
	                            	$resownerzipcode                            	
                            	));
    }


}

