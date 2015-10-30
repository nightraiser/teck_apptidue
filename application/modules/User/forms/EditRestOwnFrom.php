<?php

class User_Form_EditRestOwnFrom extends Zend_Form
{

    public function init()
    {
  		$stateMapper  = new Application_Model_StateDataMapper();
        $states = $stateMapper->fetchAll();
        $stateList = array(); 
        $stateList[] = array('key'=>'','value'=>'Select State');   	   
        foreach($states as $state){
    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
        }
    	
    	$userId = $this->createElement('hidden','userid');
    	$userId->removeDecorator('Label')
        		->removeDecorator('HtmlTag');
    	
     
    	$firstName =  $this->createElement('text', 'firstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))
        		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter FirstName.')),
                				array('StringLength', false,array(0,30)),array('Alnum')))                					 
                ->setValue('')
                ->setRequired(true);
       					
        $lastName = $this->createElement('text', 'lastName');
        $lastName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		 ->setAttrib('class','inp1')
        		 ->setAttrib('maxlength', '30')
        		 ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter LastName.')),
        		 		array('StringLength', false,array(0,30)),array('Alnum')))
                 ->setValue('')
                 ->setRequired(false);   

                 
        $rescodetext = $this->createElement('text', 'rescodetext');
        $rescodetext->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1')  
        		       ->setAttrib('style','width:50px;')
        		       ->setAttrib('readonly','readonly')
        		       ->setAttrib('placeholder', 'Country Code')
        		       ->setAttrib('title', 'Country Code')
        		       ->addFilters(array('StringTrim'))
        		       ->setValue('')
                       ->setAttrib('maxlength', '3')
                       ->setRequired(true);     
                       
    	$phone = $this->createElement('text', 'phone');
        $phone->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1')  
              ->setAttrib('style','width:105px;')            
              ->setAttrib('maxlength', '10')
              ->addFilters(array('StringTrim'))
              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter PhoneNumber.')),
                   				 ))
              ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
              ->setValue('')              
              ->setRequired(true);
              
       $rastaurantname = $this->createElement('text', 'restaurantName'); 
       	$rastaurantname ->removeDecorator('Label')
       					->removeDecorator('HtmlTag')
       					->setAttrib('class','inp1')
        			  	->setAttrib('maxlength', '225')
        			  	->addFilters(array('StringTrim'))
        			  	->addValidators(array(
        			  				array('NotEmpty', true, array('messages' => 'Please enter RestaurantName.'))
        			  				))
        			  	->setvalue('')
        			  	->setrequired(true);
        $state = $this->createElement('select','state');
        $state->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1')       	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select State.'))))
        	  ->addMultiOptions($stateList)
              ->setRequired(true);
              
        $region = $this->createElement('select','region');
        $region->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1')       	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select Region.'))))
        	  ->setRegisterInArrayValidator(false)
              ->setRequired(true);
              
        $city = $this->createElement('select', 'city');
        $city->removeDecorator('Label')
        	 ->removeDecorator('HtmlTag') 
        	 ->setAttrib('class', 'sel1') 
        	 ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select City.'))))
        	 ->setRegisterInArrayValidator(false)
             ->setRequired(true);
             
        $description = $this->createElement('textarea', 'description');
		$description->removeDecorator('Label')
		               ->removeDecorator('HtmlTag')                	   
                	   ->setAttrib('maxlength', '5000')
                	   ->setAttrib('cols', '40')
			           ->setAttrib('rows', '4')
			           ->setAttrib('class','inp1')              
                	   ->setValue('')              
                	   ->addValidators(array(array('StringLength', false,array(1,5000,'messages' => array(
              					Zend_Validate_StringLength::TOO_LONG => 'Description is too long(>5000).'
              				)))))
			           ->setRequired(false);
        			  	
     	$techfirstName =  $this->createElement('text', 'techfirstName');
        $techfirstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('placeholder', 'Firstname')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))                					 
                ->setValue('');

        $techlastName =  $this->createElement('text', 'techlastName');
        $techlastName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('placeholder', 'Lastname')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))                					 
                ->setValue('');

        $techemail =  $this->createElement('text', 'techemail');
        $techemail->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('placeholder', 'Email')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))  
        		->addValidator('regex', false, array('pattern' =>'/^([a-zA-Z0-9_\-\.]+)@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/','messages' => 'Enter a valid Email'))               					 
                ->setValue('');

        $techphone =  $this->createElement('text', 'techphone');
        $techphone->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1') 
              ->setAttrib('placeholder', 'Phone') 
              ->setAttrib('style','width:105px;')            
              ->setAttrib('maxlength', '10')
              ->addFilters(array('StringTrim'))
              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter PhoneNumber.')),                  				 ))
              ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))
              ->setValue('');

        $techrescode =  $this->createElement('text', 'techrescodetext');
        $techrescode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1') 
        		       ->setAttrib('placeholder', 'Code') 
        		       ->setAttrib('style','width:50px;')
        		       ->setAttrib('readonly','readonly')
        		       ->setAttrib('placeholder', 'Country Code')
        		       ->setAttrib('title', 'Country Code')
        		       ->addFilters(array('StringTrim'))
        		       ->setValue('')
                       ->setAttrib('maxlength', '3');

        $bilfirstName =  $this->createElement('text', 'bilfirstName');
        $bilfirstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '30')
        		->setAttrib('placeholder', 'Firstname')
        		->addFilters(array('StringTrim'))                					 
                ->setValue('');

        $billastName =  $this->createElement('text', 'billastName');
        $billastName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('placeholder', 'Lastname')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))                					 
                ->setValue('');

        $bilemail =  $this->createElement('text', 'bilemail');
        $bilemail->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('class','inp1')
        		->setAttrib('placeholder', 'Email')
        		->setAttrib('maxlength', '30')
        		->addFilters(array('StringTrim'))
        		->addValidator('regex', false, array('pattern' =>'/^([a-zA-Z0-9_\-\.]+)@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/','messages' => 'Enter a valid Email'))                					 
                ->setValue('');

        $bilphone =  $this->createElement('text', 'bilphone');
        $bilphone->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')
              ->setAttrib('class','inp1') 
              ->setAttrib('placeholder', 'Phone') 
              ->setAttrib('style','width:105px;')            
              ->setAttrib('maxlength', '10')
              ->addFilters(array('StringTrim'))
              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter PhoneNumber.')),                   				 ))
              ->addValidator('regex', false, array('pattern' =>'/^[0-9 ]+$/','messages' => 'Enter a valid Phone Number'))           
              ->setValue('');

        $bilrescode =  $this->createElement('text', 'bilrescodetext');
        $bilrescode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1') 
        		       ->setAttrib('placeholder', 'Code') 
        		       ->setAttrib('style','width:50px;')
        		       ->setAttrib('readonly','readonly')
        		       ->setAttrib('placeholder', 'Country Code')
        		       ->setAttrib('title', 'Country Code')
        		       ->addFilters(array('StringTrim'))
        		       ->setValue('')
                       ->setAttrib('maxlength', '3');
                        
     	$register = $this->createElement('submit','register');
        $register->setLabel("Update")
        		 ->removeDecorator('DtDdWrapper')        		
        		 ->setAttrib('class','submitBtn')
                 ->setIgnore(true);
                
         $this->addElements( array ($userId,
         						$firstName,
         						$lastName,
         						$rastaurantname,
                           	 	$phone,
                           	 	$state,
                           	 	$region,
        						$city,
        						$description,
                            	$register,
                            	$rescodetext,
                            	$techfirstName,
								$techlastName,
								$techemail,
								$techphone,
								$techrescode,
								$bilfirstName,
								$bilemail,
								$billastName,
								$bilphone,
								$bilrescode
                            	));
       
    }
}

