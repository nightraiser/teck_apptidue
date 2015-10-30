<?php
class User_Form_SearchFevRestaurant extends Zend_Form
{
	 public function init()
	 {
	 	
	 	$userId = $this->createElement('hidden','userid');                    	
        $userId->removeDecorator('HtmlTag');
        
	 	$stateMapper  = new Application_Model_StateDataMapper();
    	$states = $stateMapper->fetchAll();
    	$stateList = array();
		$stateList[] =array('key'=>'0','value'=>'Select State');    	    	   
    	foreach($states as $state){
    		$stateList[] = array('key'=>$state->getId(),'value'=>$state->getDescription());
    	}
    	
    	$resTypeMapper  = new Application_Model_RestaurantTypeDataMapper();
    	$resTypes = $resTypeMapper->getRestauranttypeBD();
    	$resTypeList = array(); 
    	$resTypeList[] = array('key'=>'0','value'=>'Select Cuisine');    	   
    	foreach($resTypes as $resType){
    		$resTypeList[] = array('key'=>$resType->getId(),'value'=>$resType->getDescription());
    	} 
    	 
    	/*$cityMapper = new Application_Model_CityDataMapper();
    	$citys = $cityMapper->fetchAll();
    	$cityList = array();
    	$cityList[] = array('key'=>'0','value'=>'Select City');
    	foreach($citys as $city){
    		$cityList[] = array('key'=>$city->getId(),'value'=>$city->getDescription());
    	}
    	
    	$neighborhoodMapper = new Application_Model_NeighborhoodDataMapper();
    	$neighborhoods = $neighborhoodMapper->fetchAll();
    	$neighborhoodList = array();
    	$neighborhoodList[] = array('key'=>'0','value'=>'Select Neighborhod');
    	foreach($neighborhoods as $neighborhood){
    		$neighborhoodList[] = array('key'=>$neighborhood->getId(),'value'=>$neighborhood->getDescription());
    	}
    	*/
    	$states = $this->createElement('select','state');
        $states->removeDecorator('Label') 
         		  ->removeDecorator('HtmlTag') 
         		  ->setAttrib('class','sel1')      	   
               	  ->addMultiOptions($stateList)
                  ->setRequired(false);

        $restaurantType = $this->createElement('select','restype');
        $restaurantType->removeDecorator('Label') 
         				->removeDecorator('HtmlTag') 
         				//->setAttrib('multiple', 'multiple')
         				->setAttrib('class','sel1')
               			->addMultiOptions($resTypeList)
               			->setRegisterInArrayValidator(false)
               			->setRequired(false);
        $regions = $this->createElement('select', 'region');
        $regions->removeDecorator('Label')
         		 ->removeDecorator('HtmlTag')
         		 ->setAttrib('class','sel1 drpDown')
         		 ->setRegisterInArrayValidator(false)
         		 ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Region.'))))        	          
                 ;
         		  
             
        $citys = $this->createElement('select','city');
        $citys->removeDecorator('Label') 
         	  ->removeDecorator('HtmlTag')
         	  ->setAttrib('class','sel1')
         	 ->setRegisterInArrayValidator(false)
         	  ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select City.'))))        	          
                 	;
         	  
        $neighborhoods = $this->createElement('select','neighborhood');
        $neighborhoods->removeDecorator('Label') 
         	  		 ->removeDecorator('HtmlTag')
         	  		 ->setAttrib('class','sel1')
         	  		 //->addMultiOptions($neighborhoodList)
         	  		// ->setRequired(false);
         	  		->setRegisterInArrayValidator(false)
         	 		 ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Neighborhood.'))))        	          
                 	;
         	  		 
         $resPostalCode =  $this->createElement('text', 'postalCode');
         $resPostalCode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','inp1')    
                       ->addValidator('StringLength', false,array(3,15))
                       ->setValue('')
                       ->setAttrib('maxlength', '10')
                       ->addFilters(array('StringTrim'))
                       ->setRequired(false); 
                       
		$restaurantName = $this->createElement('text', 'restName');
        $restaurantName->removeDecorator('Label')
        			   ->removeDecorator('HtmlTag')
        			   ->setAttrib('maxlength', '240')
        			   ->setAttrib('class','inp1 required')
        			   ->addValidator('StringLength', false,array(0,240))
        			   ->setValue('')
        			   ->addFilters(array('StringTrim'))
        			   ->setRequired(false);
          
        $resSearch = $this->createElement('submit','Search');
        $resSearch->removeDecorator('Label')
        		  ->removeDecorator('HtmlTag')
        		  ->removeDecorator('DtDdWrapper') 
        		  ->setValue('Submit')           		          		        		
        		  ->setAttrib('class','submitBtn')
                  ->setIgnore(true); 

        $this->addElements( array ($userId,
        						$states,
        						$regions,
        						$neighborhoods,
        						$restaurantType,
        						$citys,
        						$resPostalCode,
        						$restaurantName,
        						$resSearch
        						));  
    	 
    	
	 }
}