<?php

class User_Form_EditRestUserProfileFrom extends Zend_Form
{

    public function init()
    {
    	$passwordConfirm = new Rdine_Validate_PasswordConfirmation();
    	$userId = $this->createElement('hidden','userid');
    	$userId->removeDecorator('Label')
        		->removeDecorator('HtmlTag');

    	$salutionList = array(
    			array('key'=>'Mr','value'=>'Mr'),
    			array('key'=>'Ms','value'=>'Ms'),
    			array('key'=>'Mrs','value'=>'Mrs')    	
    	);
    	
    	$statusList = array(
    		array('key'=>'1','value'=>'Active'),
    		array('key'=>'2','value'=>'InActive')
    	);
    	
    	$gengerList   = array(
    	 		array('key'=>'Male','value'=>'Male'),
    	 		array('key'=>'Female','value'=>'Female')    	 
    	 );
    	
    	$salution = $this->createElement('select', 'salution');
        $salution->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')  
				 ->setAttrib('class','sel2 required')
				 ->setAttrib('style','width:68px')				 
                 ->addMultiOptions($salutionList)
                 ->setRequired(false);
				 
                 
       	$status = $this->createElement('select', 'status');
        $status->removeDecorator('Label')
				 ->setAttrib('class','sel2 required')
        		 ->removeDecorator('HtmlTag')        		 
                 ->addMultiOptions($statusList)
                 ->setRequired(false);
    
		$restNameCtl = new Zend_Form_Element_Multiselect('EditRestaurantName');
		$restNameCtl->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select RestaurantName.'))))
			//		->setValue('')
					->setAttrib('class','sel2')
					->setRegisterInArrayValidator(false)
					->setRequired(true);
    	
		$restRoleCtl = $this->createElement('select','RestaurantRole');
		$restRoleCtl->removeDecorator('Label')
         		    ->removeDecorator('HtmlTag')
         		    ->setAttrib('class','sel1 drpDown required')
         		    ->setRegisterInArrayValidator(false)
         		    ->setRequired(true);
					
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
       			     ->removeDecorator('HtmlTag')       		
        			 ->setAttrib('class','inp1 required')					 
				     ->setAttrib('placeholder','Email')
        			 ->setAttrib('readonly','readonly')
      				 ->setAttrib('maxlength', '40')
                	 ->setValue('')
                	 ->setRequired(true);
                
		$password =  $this->createElement('password','password');
        $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')  
				->setAttrib('placeholder','Password')      	
        		->setAttrib('class','inp1 required')
        		->setAttrib('maxlength', '20')
				->setAttrib('minlength', '6')
        		->addValidators(array($passwordConfirm,
                				 array('NotEmpty', true, array('messages' => 'Please enter your New Password.')),
                				 array('StringLength', false, array(6, 20,'messages' => array(
                    				Zend_Validate_StringLength::TOO_SHORT => 'Your password is too short(>6).',
                    				Zend_Validate_StringLength::TOO_LONG => 'Your password is too long(<30).'))
            					)))
               	->setRequired(false)
                ->setValue('');
        
        $confirmPassword =  $this->createElement('password','password_confirm');
        $confirmPassword->removeDecorator('Label')
        				->removeDecorator('HtmlTag')        				
        				->setAttrib('class','inp1 required')						
				        ->setAttrib('placeholder','Re-type Password')
        				->setAttrib('maxlength', '20')
						->setAttrib('minlength', '6')
        				->addValidators(array($passwordConfirm,
                    					  array('NotEmpty', true, array('messages' => 'Please Confirm your password.'))
                    					))
                    	->setRequired(false)
                    	->setValue('');

		$firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')  
				 ->setAttrib('placeholder','First Name')				
        		->setAttrib('maxlength', '30')
        		->setAttrib('class','inp1 required')
				 ->setAttrib('style','width:70%')
        		->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter FirstName.')),
                					  array('StringLength', false,array(0,30))))        					 
                ->setValue('')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('class','inp1')
				 ->setAttrib('placeholder','Last Name')
        		 ->addFilters(array('StringTrim'))
        		 ->addValidators(array(array('StringLength', false,array(0,30))))
                 ->setValue('')
                 ->setRequired(true); 
                 
        $gender = $this->createElement('select','gender');
        $gender->removeDecorator('Label') 
        		->removeDecorator('HtmlTag')
        		->setAttrib('class', 'sel2 required')       		
                ->addMultiOptions($gengerList)
                ->setRequired(false);
                 
        $address =  $this->createElement('textarea', 'address', array('rows' => '4', 'cols' => '40' ));
        $address->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '200')
			    ->setAttrib('placeholder','Address')				
			    ->setAttrib('style','width:97%')
        		->addFilters(array('StringTrim'))  
        		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter your Address.')),
        		 				  array('StringLength', false,array(1,200,'messages' => array(
              					Zend_Validate_StringLength::TOO_SHORT =>'address should be minimum 10 charactors',
              					Zend_Validate_StringLength::TOO_LONG => 'address is too long(>200).'
              				)))))      		
                ->setValue('')
                ->setRequired(false);
                
               
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
//			  ->setAttrib('style','width:68%')   			  
//              ->setAttrib('maxlength', '15')
//              ->addFilters(array('StringTrim'))
//              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter Your Phone Number.')),
//                   					))
//             ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
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
				    ->setAttrib('placeholder','Designation')
        			->setAttrib('maxlength', '50')
        			->addFilters(array('StringTrim'))
        			->setValue('')              
              		->setRequired(false);
  
        $register = $this->createElement('submit','register');
        $register->setLabel("Submit")
        		 ->removeDecorator('DtDdWrapper')        		
        		 ->setAttrib('class','submitBtn')
                 ->setIgnore(true);

		$userList = array(
    	 		array('key'=>'RSU','value'=>'Restaurant User'),
    	 		array('key'=>'SRU','value'=>'Super User')    	 
    	 );
    	 
    	$EditrestUsersType = $this->createElement('select','EditrestUsersType');
		$EditrestUsersType->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','sel2')
					->addMultiOptions($userList)
					->setRegisterInArrayValidator(false)					
					->setRequired(true);
					
              
         $this->addElements( array ($userId,
         					$salution,
                            $status,
        					$emailAddress,
        					$password,
                            $confirmPassword,
        					$firstName,
                            $lastName,
                            $gender,
                            $address,
                            $restNameCtl,
//                            $phone,
                            $mobile,
                            $designation,
                            $register,
                            $restRoleCtl,
                            $EditrestUsersType
//                            $countryCode       
                            )
                );
    }


}

