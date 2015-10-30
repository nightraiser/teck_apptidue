<?php

class User_Form_Guest extends Zend_Form
{

 	public function init()
    {
       	$passwordConfirm = new Rdine_Validate_PasswordConfirmation();
    	
    	$salutionList = array(
    			array('key'=>'Mr','value'=>'Mr'),
    			array('key'=>'Ms','value'=>'Ms'),
    			array('key'=>'Mrs','value'=>'Mrs')    	
    	);
    	
    	$gengerList   = array(
    	 		array('key'=>'Male','value'=>'Male'),
    	 		array('key'=>'Female','value'=>'Female')    	 
    	 );

    	
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '40')
        		->setAttrib('class','inp1')
				->setAttrib('placeholder', 'Email Address*')
        		->addValidators(array
                				  (array('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.')),
                				))
                ->addValidator('StringLength', false,array(5,50))
                ->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
				 ->addErrorMessage('Pleaes Enter Valid Email Address')        
                ->addFilters(array('StringTrim'))
                ->setValue('')
                ->addFilter('StringToLower')
                ->setRequired(true);
                
                
		 $password =  $this->createElement('password','password');
         $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '20')
        		->setAttrib('class','inp1')
        		->setAttrib('placeholder', 'Password*')
                ->addValidators(array($passwordConfirm,
                			array('NotEmpty', true, array('messages' => 'Please enter your Password.')),
                			array('StringLength', false, array(6, 20,'messages' => array(
                    Zend_Validate_StringLength::TOO_SHORT => 'Your password is too short(>6).',
                    Zend_Validate_StringLength::TOO_LONG => 'Your password is too long(<20).'))
            		)))
                ->setRequired(true)
                ->setValue('')                
                ->setIgnore(false);
        
        $confirmPassword =  $this->createElement('password','password_confirm');
        $confirmPassword->removeDecorator('Label')
        			->removeDecorator('HtmlTag')
        			->setAttrib('maxlength', '20')
        			->setAttrib('class','inp1')
       				->setAttrib('placeholder', 'Confirm Password*')
                    ->addValidators(array($passwordConfirm,
                    				  array('NotEmpty', true, array('messages' => 'Please enter confirm Password.')),
                					 
                				 ))
                    ->setRequired(true)
                    ->setValue('')
                    ->setIgnore(false);  
                    
		$salution = $this->createElement('select', 'salution');
        $salution->removeDecorator('Label') 
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('class', 'sel2')      		 
                 ->addMultiOptions($salutionList)
                 ->setRequired(false);

		$firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '30')
        		->setAttrib('class','inp1')
        		->setAttrib('placeholder', 'First Name*')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter FirstName.')),array('Alnum')))               					 
                ->setValue('')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '30')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('placeholder', 'Last Name')
        		 ->addFilters(array('StringTrim'))
        		  ->addValidators(array(array('StringLength', false,array(0,30)),array('Alnum')))
        		 ->setValue('')
                 ->setRequired(false); 
                
//        $gender = $this->createElement('select','gender');
//        $gender->removeDecorator('Label') 
//        		->removeDecorator('HtmlTag')
//        		->setAttrib('class', 'sel2')       		
//                ->addMultiOptions($gengerList)
//                ->setRequired(false);

        $address =  $this->createElement('textarea', 'address',array( 'rows' => '1', 'cols' => '22' ));
        $address->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '200')				
        		 ->setAttrib('class','inp1')
                ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please enter your Address.'))))
        		->addValidator('StringLength', false,array(1,200,'messages' => array(
              				Zend_Validate_StringLength::TOO_SHORT =>'address should be minimum 10 charactors',
              				Zend_Validate_StringLength::TOO_LONG => 'address is too long(>200).'
              				)))
              	->addFilters(array('StringTrim')) 
                ->setValue('')
                ->setRequired(false);
                
//		$city = $this->createElement('select', 'city');
//        $city->removeDecorator('Label')
//        	 ->removeDecorator('HtmlTag') 
//        	 ->setAttrib('class', 'sel1') 
//        	 ->addValidators(array
//        		 				  (array('NotEmpty', true, array('messages' => 'Please select City.'))))
//        	 ->setRegisterInArrayValidator(false)
//             ->setRequired(true);
//  
//             
//        $neighborhood = $this->createElement('select','neighborhood');
//        $neighborhood->removeDecorator('Label')
//        			 ->removeDecorator('HtmlTag')
//        			 ->setAttrib('class', 'sel1')
//        			 ->addValidators(array
//        		 				  (array('NotEmpty', true, array('messages' => 'Please select Neighborhood.'))))
//        			 ->setRegisterInArrayValidator(false)
//        			 ->setRequired(true);
//    
//        		 		    
//		$region = $this->createElement('select','region');
//        $region->removeDecorator('Label')
//        	  ->removeDecorator('HtmlTag') 
//        	  ->setAttrib('class', 'sel1')       	   
//              ->addValidators(array
//        		 				  (array('NotEmpty', true, array('messages' => 'Please select Region.'))))
//        	  ->setRegisterInArrayValidator(false)
//              ->setRequired(true);
//              
//        $state = $this->createElement('select','state');
//        $state->removeDecorator('Label')
//        	  ->removeDecorator('HtmlTag') 
//        	  ->setAttrib('class', 'sel1')       	   
//              ->addValidators(array
//        		 				  (array('NotEmpty', true, array('messages' => 'Please select State.'))))
//        	  ->addMultiOptions($stateList)
//              ->setRequired(true);
//		
//        $timezone = $this->createElement('select','timezone');
//        $timezone->removeDecorator('label')
//        		 ->removeDecorator('HtmlTag')
//        		 ->setAttrib('class','sel1')
//        		 ->addValidators(array
//        		 					 (array('NotEmpty', true, array('messages' => 'Please select TimeZone.'))))
//        		 ->addMultiOptions($timezoneList)
//        		 ->setRequired(true);
              
		$postalCode =  $this->createElement('text', 'postalCode');
        $postalCode->removeDecorator('Label')
       			   ->removeDecorator('HtmlTag')
        		   ->setAttrib('maxlength', '10')
        		   ->setAttrib('class','inp1')
        		   ->addFilters(array('StringTrim'))    
                   ->addValidators(array
                   					(array('NotEmpty', true, array('messages' => 'Please enter Zipcode.'))))
               	   ->setValue('')
                   ->setRequired(false);
               
        $countryCode = $this->createElement('text', 'countryCode');
        $countryCode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1')  
        		       ->setAttrib('style','width:116px; float:left')
					   ->setAttrib('placeholder', 'Code')
//         		       ->setAttrib('readonly','readonly')
        		       ->addFilters(array('StringTrim'))
        		       ->setAttrib('placeholder','Code')
        		       ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select country code.'))))    
                        ->setValue('')
                       ->setAttrib('maxlength', '5')
                       ->setRequired(false);        
        
        $phone = $this->createElement('text', 'phone');
        $phone->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1')    
              ->setAttrib('style','float:right;')
        	  ->setAttrib('placeholder', 'Phone*')          
              ->setAttrib('maxlength', '15')
              ->addFilters(array('StringTrim'))
              ->addValidators(array
                   					(array('NotEmpty', true, array('messages' => 'Please enter Your Phone Number.')),
                   					))
             ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
              ->setValue('')              
              ->setRequired(false);
              
        $mobile = $this->createElement('text','mobile');
        $mobile->removeDecorator('Label')
               ->removeDecorator('HtmlTag')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1')              
              ->setAttrib('maxlength', '15')
              ->addFilters(array('StringTrim'))              
              ->setValue('');
              
//        $favoritefood = $this->createElement('textArea', 'favoritefood');
//        $favoritefood->removeDecorator('Label')
//        		->removeDecorator('HtmlTag')        		   		
//        		->setAttrib('maxlength', '1000')
//        		->setAttrib('cols', '40')
//			    ->setAttrib('rows', '4')
//			    ->addFilters(array('StringTrim'))
//        		->setValue('');
//        			 
//        $favoritemusic =  $this->createElement('textArea', 'favoritemusic');
//		$favoritemusic->removeDecorator('label')
//					  ->removeDecorator('HtmlTag')
//					  ->setAttrib('cols', '40')
//			   		  ->setAttrib('rows', '4')
//        			  ->setAttrib('maxlength', '1000')
//        			  ->addFilters(array('StringTrim'))
//        			  ->setvalue('')
//        			  ->setrequired(false);
        			  
        $imageCaptcha = new Zend_Captcha_Image();
        $imageCaptcha->setWidth(120)
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
             
		                
	$this->addElements( array (
        					$emailAddress,
        					$password,
                            $confirmPassword,
                            $salution,
                            $firstName,
                            $lastName,
//                            $gender,
                            $address,
//                            $city,
//                            $neighborhood,
//                            $state,
//                            $region,
//                            $timezone,                            
                            $postalCode,                            
                            $phone,
                            $countryCode,
                            $mobile,
//                            $favoritefood,
//                            $favoritemusic,
                            $register,
                            $reset,
                            $captcha                      
                            )
                );
    }
}

