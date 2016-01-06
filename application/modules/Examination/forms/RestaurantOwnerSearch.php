<?php

class Administrator_Form_RestaurantOwnerSearch extends Zend_Form
{

    public function init()
    {
    	/* Populating Restaurant  Status Bd*/
  	    $StatusMapper = new Application_Model_UserStatusDataMapper();
    	$statusres = $StatusMapper->fetchAll();
    	$statusresLst = array();
    	$statusresLst[] = array('key'=>'','value'=>'Select Status');
    	foreach($statusres as $val){
    		$statusresLst[] = array('key'=>$val->getId(),'value'=>$val->getDescription());
    	}
    	
    	/* Populating State Base Data */
    	$stateMapper  = new Application_Model_StatebdMapper();
        $states = $stateMapper->fetchAll();
        $stateList = array(); 
        $stateList[] = array('key'=>'','value'=>'Select Country');   	   
        foreach($states as $state){
    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
        }
        
//         $companyList = array();
//     	$companyMapper = new Administrator_Model_CompanyDataMapper();
//     	$companyList = $companyMapper->getAllComapnyList();
    	
    	$firstName = $this->createElement('text','firstname');
    	$firstName->removeDecorator('Label')
    			  ->setAttrib('class','inp1 form input_form')
    			  ->setAttrib('placeholder','First Name')
    			  ->setAttrib('title','First Name')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        		  
        $resName = $this->createElement('text','resname');
    	$resName->removeDecorator('Label')
    			  ->setAttrib('class','inp1 form input_form')
    			  ->setAttrib('placeholder','Restaurant Name')
    			  ->setAttrib('title','Restaurant Name')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        		  
		$lastName = $this->createElement('text','lastname');
		$lastName->removeDecorator('Label')
    			  ->setAttrib('class','inp1 form input_form')
    			  ->setAttrib('placeholder','Last Name')
    			  ->setAttrib('title','Last Name')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');	

        $userId = $this->createElement('text','userId');
    	$userId->removeDecorator('Label')
    			 ->setAttrib('class','inp1 form input_form')
    			 ->setAttrib('placeholder','User Id')
    		  	 ->setAttrib('title','User Id')	
        	     ->removeDecorator('HtmlTag')
        		 ->addValidator('Digits',new Zend_Validate_Digits(),array('messages' => 'Please enter Numbers only'))
        		 ->setValue('');
    	
    	$email = $this->createElement('text','email');
    	$email->removeDecorator('Label')
    			 ->setAttrib('class','inp1 form input_form')
    			 ->setAttrib('placeholder','Email')
    		  	 ->setAttrib('title','Email')
        		 ->removeDecorator('HtmlTag')
        		 ->addFilters(array('StringTrim'))
        		 ->setValue('');

		$Status = $this->createElement('select','status');
		$Status->removeDecorator('Label')
         		    ->removeDecorator('HtmlTag')
//         		     ->setAttrib('style','width:160px') 
         		    ->setAttrib('class','drpDown form input_form')    
         		   ->setAttrib('title','Status')   	     
        	        ->addMultiOptions($statusresLst);
        	        
       	$state = $this->createElement('select','state');
        $state->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1 form input_form')
        	  ->setAttrib('title','Country')       	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select State.'))))
        	  ->addMultiOptions($stateList)
              ->setRequired(false);
              
        $region = $this->createElement('select', 'region');
        $region->removeDecorator('Label')
         		 ->removeDecorator('HtmlTag') 
         		 ->setAttrib('class','drpDown form input_form')
         		 ->setAttrib('title','State') 
//         		 ->setAttrib('style','width:160px')     	     
        	     ->setRegisterInArrayValidator(false)
             	 ->setRequired(false);
              
        $city = $this->createElement('select', 'city');
        $city->removeDecorator('Label')
        	 ->removeDecorator('HtmlTag') 
        	 ->setAttrib('class', 'sel1 form input_form') 
        	 ->setAttrib('title','City') 
        	 ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select City.'))))
        	 ->setRegisterInArrayValidator(false)
             ->setRequired(false);
             
//          $company = $this->createElement('select','company');
// 		 $company->removeDecorator('Label')
//          	     ->removeDecorator('HtmlTag')
// //         	     ->setAttrib('style','width:160px') 
//          	     ->setAttrib('class','drpDown form input_form')
//          	     ->setAttrib('title','Company')        	     
//                  ->addMultiOptions($companyList);
        	       
		 $Search = $this->createElement('submit','search');
         $Search->removeDecorator('Label')
        		   ->removeDecorator('DtDdWrapper')
        		   ->setValue('Search')           		          		        		
        		   ->setAttrib('class','submitBtn')
                   ->setIgnore(true);
                   
		$this->addElements( array ($userId,
								   $email,
								   $resName,
		                           $firstName,
								   $lastName,
								   $Status,
								   $state,
								   $region,
								   $city,
								   $Search));                           	        
    }


}

