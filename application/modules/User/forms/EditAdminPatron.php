<?php
class User_Form_EditAdminPatron extends Zend_Form
{
	public function init()
    {	
    	$this->setMethod('post');
    	
    	//$confirmEmail = new Rdine_Validate_EMailConfirmation();
    	
    	$companyMapper  = new Administrator_Model_CompanyDataMapper();
    	$companyList = $companyMapper->getAllComapnyList();
    	
//    	$stateMapper  = new Application_Model_StateDataMapper();
//    	$states = $stateMapper->fetchAll();
//    	$stateList = array();  
//    	$stateList[] = array('key'=>'','value'=>'Select State');  	   
//    	foreach($states as $state){
//    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
//    	}
    	
    	$adminUserRole = $this->createElement('select','editadminUserRole');
        $adminUserRole->removeDecorator('Label') 
		           	  ->removeDecorator('HtmlTag')
		           	  ->setAttrib('class','sel1 drpDown')
		              ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Role.'))))       	   
		              ->setRegisterInArrayValidator(false)
		           	  ->setRequired(false);
		           	  
        $firstName =  $this->createElement('text', 'editfirstName');
        $firstName->removeDecorator('Label')
        		->removeDecorator('HtmlTag')        		
        		->setAttrib('maxlength', '30')
        		->setAttrib('class','inp1')
        		->addFilters(array('StringTrim'))
                ->addValidators(array
                				(array('NotEmpty', true, array('messages' => 'Please enter your First Name.')),
                					array('StringLength', false,array(0,30)),array('Alnum')))                					 
                ->setValue('')
                ->setAttrib('class','inp1 required')
                ->setRequired(true);
        
        $lastName = $this->createElement('text', 'editlastName');
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
                 
        $company = $this->createElement('select','editcompany');
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

        $id = $this->createElement('hidden','id');
       	$id->removeDecorator('DtDdWrapper')
			  	 ->removeDecorator('Label')
			  	 ->removeDecorator('HtmlTag');
                 
        $this->addElements(array(//$emailAddress,
	        					 //$confirmEmailAdd,
	        					 $adminUserRole,
        						 $firstName,
        						 $lastName,
        						 $company,
        						 $id
//        						 $state,
//        						 $region,
//        						 $city,
//        						 $neighbourhood,
//        						 $address,
//        						 $zipcode 
        					));
    }
}