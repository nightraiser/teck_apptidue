<?php
class User_Form_AddAdminPatron extends Zend_Form
{
	public function init()
    {	
    	
    	$passwordConfirm = new Rdine_Validate_PasswordConfirmation();
    	$confirmEmail = new Rdine_Validate_EMailConfirmation();
    	
    	$companyMapper  = new Administrator_Model_CompanyDataMapper();
    	$companyList = $companyMapper->getAllComapnyList();
    	
//    	$stateMapper  = new Application_Model_StateDataMapper();
//    	$states = $stateMapper->fetchAll();
//    	$stateList = array();  
//    	$stateList[] = array('key'=>'','value'=>'Select State');  	   
//    	foreach($states as $state){
//    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
//    	}
    	
    	$adminUserRole = $this->createElement('select','adminUserRole');
        $adminUserRole->removeDecorator('Label') 
		           	  ->removeDecorator('HtmlTag')
		           	  ->setAttrib('class','sel1 drpDown')
		              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Role.'))))       	   
		              ->setRegisterInArrayValidator(false)
		           	  ->setRequired(false);
           	
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
                	->addValidators(array($confirmEmail,
                						  array('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.'))
                				))
                	->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
					 ->addErrorMessage('Pleaes Enter Valid Email Address')
                	->addFilters(array('StringTrim'))
                	->setValue('')
                	->setAttrib('class','inp1 required')
                	->addFilter('StringToLower')
                	->setRequired(true);
  		$confirmEmailAdd = $this->createElement('text', 'confirmEmailAddress');
        $confirmEmailAdd->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
                	->addValidators(array($confirmEmail,
                						  array('NotEmpty', true, array('messages' => 'Please confirm your EmailAddress.'))
                				))              
                	->setValue('')
                	->setAttrib('class','inp1 required')
                	->addFilters(array('StringTrim'))
                	->addFilter('StringToLower')
                	->setRequired(true);   

                        	
		$password =  $this->createElement('password','password');
        $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')        	
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '20')
        		->setAttrib('class','inp1 required')
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
                    	->addValidators(array($passwordConfirm,
                    					  array('NotEmpty', true, array('messages' => 'Please Confirm your password.'))
                    					))
                    	->setRequired(true)
                    	->setAttrib('class','inp1 required')
                    	->setValue(''); 
                	
        $firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')        		
        		->setAttrib('maxlength', '30')
        		->setAttrib('class','inp1')
        		->addFilters(array('StringTrim'))
        		->setAttrib('class','inp1 required')
                ->addValidators(array
                				(array('NotEmpty', true, array('messages' => 'Please enter your First Name.')),
                					array('StringLength', false,array(0,30)),array('Alnum')))                					 
                ->setValue('')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		 ->removeDecorator('HtmlTag')
        		 ->setAttrib('maxlength', '30')
        		 ->setAttrib('class','inp1')
        		 ->addFilters(array('StringTrim'))
        		 ->addValidators(array
        		 				  (array('StringLength', false,array(0,30)),array('Alnum')
        		 				 ))
                 ->setValue('')
                 ->setAttrib('class','inp1 required')
                 ->setRequired(false);
                 
        $company = $this->createElement('select','company');
        $company->removeDecorator('Label') 
         		  ->removeDecorator('HtmlTag')
         		  ->setAttrib('class','sel1 drpDown')
         		  ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select company.'))))       	   
               	  ->addMultiOptions($companyList)
               	  ->setAttrib('class','inp1 required')
                  ->setRequired(true);
                  
//        $state = $this->createElement('select','state');
//        $state->removeDecorator('Label') 
//         		  ->removeDecorator('HtmlTag')
//         		  ->setAttrib('class','sel1 drpDown')
//         		  ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select State.'))))       	   
//               	  ->addMultiOptions($stateList)
//                  ->setRequired(true);
//                  
//        $region = $this->createElement('select','region');
//        $region->removeDecorator('Label') 
//         		  ->removeDecorator('HtmlTag')
//         		  ->setAttrib('class','sel1 drpDown')
//         		  ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Region.'))))       	   
//               	  ->setRegisterInArrayValidator(false)
//         		  ->setRequired(true);
//         		  
//		$city = $this->createElement('select', 'city');
//        $city->removeDecorator('Label')
//         		 ->removeDecorator('HtmlTag')
//         		 ->setAttrib('class','sel1 drpDown')
//         		 ->setRegisterInArrayValidator(false)
//         		 ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select City.'))))       	     
//                 ->setRequired(true);
//                 
//        $neighbourhood = $this->createElement('select', 'neighbourhood');
//        $neighbourhood->removeDecorator('Label')
//         		 ->removeDecorator('HtmlTag')
//         		 ->setAttrib('class','sel1 drpDown')
//         		 ->setRegisterInArrayValidator(false)
//         		 ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Neighbourhood.'))))       	     
//                 ->setRequired(true);
//                 
//        $address = $this->createElement('text','address');
//        $address->removeDecorator('Label')
//        		->removeDecorator('HtmlTag')
//        		->setAttrib('maxlength', '510')
//        		->setAttrib('class','inp1')
//        		->addFilters(array('StringTrim'))
//        		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter Address.')),
//			         					array('StringLength', false,array(1,510,'messages' => array(
//              					Zend_Validate_StringLength::TOO_LONG => 'address is too long(>510).'
//              				)))))        			               		 
//               	->setValue('')	
//        		->setRequired(false);
//        		 
//        $zipcode = $this->createElement('text', 'zipcode');
//        $zipcode->removeDecorator('Label')  
//         		->removeDecorator('HtmlTag')      		       
//        		->setAttrib('class','inp1')
//        		->addFilters(array('StringTrim'))
//        		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please Enter Zipcode.'))))    
//                ->addValidator('StringLength', false,array(1,10))
//                ->setValue('')
//                ->setAttrib('maxlength', '10')
//                ->setRequired(false);
                
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
                 
        $this->addElements(array($emailAddress,
	        					 $confirmEmailAdd,
	        					 $adminUserRole,
	        					 $password,
	        					 $confirmPassword,
        						 $firstName,
        						 $lastName,
        						 $company,
        						 $register,
        						 $reset   
        					));
    }
}