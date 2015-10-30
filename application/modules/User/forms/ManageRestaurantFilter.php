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
    		   
        foreach($sources as $source){
    		$sourceList[] = array('key'=>$source->getId(),'value'=>$source->getDescription());
        }
        $cityMapper  = new Application_Model_CitybdMapper();
        $citys = $cityMapper->fetchAll();
        $cityList = array(); 
        $cityList[] = array('key'=>'','value'=>'Select City');         
        foreach($citys as $city){
            $cityList[] = array('key'=>$city->getId(),'value'=>$city->getDescription());
        }
        $cityList[] = array('key'=>'find','value'=>'cant find your City'); 
    	
    	$emailAddress =  $this->createElement('text', 'resemail');
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
    

       $rastaurantname = $this->createElement('text', 'resname'); 
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
        $resid = $this->createElement('text', 'resid'); 
       $resid ->removeDecorator('Label')
                        ->removeDecorator('HtmlTag')
                        ->setAttrib('class','inp1')
                        ->setAttrib('maxlength', '225')
                        ->setAttrib('title', 'Restaurant/Group')
                        ->setAttrib('placeholder', 'Restaurant/Group*')
                        ->addFilters(array('StringTrim'))
                        ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter RestaurantName.'))))
                        ->setvalue('')
                        ->setrequired(true);

        $region = $this->createElement('select','reslocation_id');
        $region->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1') 
        	  ->setAttrib('title', 'State')      	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select Region.'))))
        	  ->setRegisterInArrayValidator(false)
              ->setRequired(false);
              
        $country = $this->createElement('select','rescountry_id');
        $country->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag') 
        	  ->setAttrib('class', 'sel1')    
        	  ->setAttrib('title', 'Country')      	   
              ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select State.'))))
        	  ->addMultiOptions($stateList)
              ->setRequired(false);
              
        $city = $this->createElement('select', 'rescity_id');
        $city->removeDecorator('Label')
        	 ->removeDecorator('HtmlTag') 
        	 ->setAttrib('class', 'sel1') 
        	 ->setAttrib('title', 'City') 
        	 ->addValidators(array
        		 				  (array('NotEmpty', true, array('messages' => 'Please select City.'))))
        	->addMultiOptions($citymapperList)
             ->setRequired(false);
                 

        $this->addElements( array (
                                    $resid,
                                    $restuarantname,
                                    $emailAddress,
                                    $country,
                                    $city,
                                    $region
                            	));
    }


}

