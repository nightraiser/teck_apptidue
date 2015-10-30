<?php
class Administrator_Form_ContactUs extends Zend_Form
{
	public function init()
    {
    	$contact = array();
    	
    	$contact[] = array('key'=>'email','value'=>' Email');
    	$contact[] = array('key'=>'phone','value'=>' Phone');
    	
		$this->setAttrib('enctype', 'multipart/form-data');
		
        $contactName = $this->createElement('text', 'contactName');
        $contactName->removeDecorator('Label')
        			->removeDecorator('HtmlTag')
        			->setAttrib('maxlength', '100')
        			->setAttrib('class','input w90 required')
					->setAttrib('placeholder','Contact Name')
        			->addFilters(array('StringTrim'))
        	  		->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))         			   
        			->setValue('')
        			->setRequired(true);  

        $address = $this->createElement('text','address');
        $address->removeDecorator('Label')
        	    ->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '500')
        		->setAttrib('class','input w90')
				->setAttrib('placeholder','Address')
        		->addFilters(array('StringTrim'))
        		->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields')),
			       					array('StringLength', false,array(1,500,'messages' => array(
              			Zend_Validate_StringLength::TOO_LONG => 'address is too long(>510).'
              		)))))        			               		 
               	->setValue('')	
        		->setRequired(false);

         $city = $this->createElement('text', 'city');
         $city->removeDecorator('Label')  
         	  ->removeDecorator('HtmlTag')      		       
        	  ->setAttrib('class','input w90')
				->setAttrib('placeholder','City')
        	  ->addFilters(array('StringTrim'))
        	  ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))    
              ->addValidator('StringLength', false,array(1,100))
              ->setValue('')
              ->setAttrib('maxlength', '100')
              ->setRequired(false);
         
         $state = $this->createElement('text', 'state');
         $state->removeDecorator('Label')  
         	  ->removeDecorator('HtmlTag')      		       
        	  ->setAttrib('class','uinp1')
        	  ->addFilters(array('StringTrim'))
        	  ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))    
              ->addValidator('StringLength', false,array(1,200))
              ->setValue('')
              ->setAttrib('maxlength', '200')
              ->setRequired(false);     

		 $country = $this->createElement('text', 'country');
         $country->removeDecorator('Label')  
         	  ->removeDecorator('HtmlTag')      		       
        	  ->setAttrib('class','uinp1')
        	  ->addFilters(array('StringTrim'))
        	  ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))    
              ->addValidator('StringLength', false,array(1,100))
              ->setValue('')
              ->setAttrib('maxlength', '100')
              ->setRequired(false);

         $postalCode = $this->createElement('text', 'postalCode');
         $postalCode->removeDecorator('Label')  
         			   ->removeDecorator('HtmlTag')      		       
        		       ->setAttrib('class','uinp1')
        		       ->addFilters(array('StringTrim'))
        		       ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))    
                       ->addValidator('StringLength', false,array(1,10))
                       ->setValue('')
                       ->setAttrib('maxlength', '10')
                       ->setRequired(false);
                       
         $phone = $this->createElement('text', 'phone');
         $phone->removeDecorator('Label')
         		  ->removeDecorator('HtmlTag')                  
                  ->setAttrib('class','input w90')
				  ->setAttrib('placeholder','Phone')             
                  ->setAttrib('maxlength', '15')
                  ->addFilters(array('StringTrim'))
                  ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))
                  ->setValue('')              
                  ->setRequired(false);                       
                       
        $emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			 ->removeDecorator('HtmlTag')        			     
        			 ->setAttrib('maxlength', '40')
        			 ->setAttrib('class','input w90')
				  ->setAttrib('placeholder','Email')
                	 ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields')),
                	 				array('StringLength', false,array(5,40))))
                	 ->addValidator('EmailAddress')    
                	 ->addFilters(array('StringTrim'))
               		 ->setRequired(true);

         $fax = $this->createElement('text', 'fax');
         $fax->removeDecorator('Label') 
         		->removeDecorator('HtmlTag')               
                ->setAttrib('class','uinp1')              
                ->setAttrib('maxlength', '15')
                ->addFilters(array('StringTrim'))
                ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))
                ->setValue('')              
                ->setRequired(false);
                
		 $website = $this->createElement('text', 'website');
         $website->removeDecorator('Label') 
                    ->removeDecorator('HtmlTag')               	
                	->setAttrib('class','uinp1')              
                	->setAttrib('maxlength', '255')
                	->addFilters(array('StringTrim'))                	
                	->setValue('')              
                	->setRequired(false); 

		$moreinfo = $this->createElement('checkbox','moreinfo');
       	$moreinfo->removeDecorator('Label')
			        ->removeDecorator('HtmlTag')
			        ->setAttrib('class','addcontact')
			        ->setRequired(false)
			        ->setChecked(false);
        		
        $comments = $this->createElement('textarea', 'comments');
        $comments->removeDecorator('Label')
        			   ->removeDecorator('HtmlTag')
        			   ->setAttrib('maxlength', '1000')
        			   ->setAttrib('rows', '3')
        			   ->setAttrib('cols', '25')
        			   ->setAttrib('class','input w90 textarea')
        			   ->addFilters(array('StringTrim'))
        			   ->addValidators(array(array('NotEmpty', true, array('messages' => ' *Required fields'))))
        			   ->setRequired(true);         		

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
				->setAttrib('class','inp1')
				->setAttrib('style','position:relative;float:left; width:200px;');
				
        $contactType = new Zend_Form_Element_Radio('contactType');
		$contactType->removeDecorator('Label')
			   		 	 ->removeDecorator('HtmlTag')
			   		  	 ->setMultiOptions($contact)
			   		  	 ->setValue('email')
			   		  	 ->setSeparator('&nbsp;&nbsp;&nbsp;')
			   		  	 ->setRequired(false);        		
		
        $submit = $this->createElement('button','submit');
        $submit->removeDecorator('Label')
        		  ->removeDecorator('DtDdWrapper')
        		  ->setValue('Submit')           		          		        		
        		  ->setAttrib('class','submitBtn')
                  ->setIgnore(true);
                  
		$type = $this->createElement('hidden','type');
    	$type->removeDecorator('HtmlTag')
    		  		 ->removeDecorator('Label');                  
		                	
          $this->addElements( array ($contactName,
          							 $address,
          							 $city,
          							 $state,
          							 $country,
          							 $postalCode,
          							 $phone,
          							 $emailAddress,
          							 $fax,
          							 $website,
          							 $moreinfo,
          							 $comments,
          							 $contactType,
          							 $type,
          							 $captcha,
          							 $submit));
        	  
    }
}