<?php

class User_Form_SocialMediaType extends Zend_Form
{

    public function init()
    {
		$mediaMapper  = new Application_Model_SocialMediaTypeDataMapper();
    	$medias = $mediaMapper->fetchAll();
    	$mediaList = array();    	   
    	foreach($medias as $socialmedia){
    		$mediaList[] = array('key'=>$socialmedia->getId(),'value'=>$socialmedia->getDescription());
    	}
    	
    	$socialmedia = $this->createElement('select','socialmedia');
        $socialmedia->removeDecorator('Label')
        	  ->removeDecorator('HtmlTag')        	   
              ->addMultiOptions($mediaList)
              ->setRequired(true);
              
        $userId = $this->createElement('hidden','userid');
        $userId->removeDecorator('HtmlTag') 
        		->removeDecorator('DtDdWrapper')
        		->removeDecorator('Label');
    	
      	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('maxlength', '25')
        			->setAttrib('class','inp1')
        			->addFilters(array('StringTrim'))
        			->addValidators(array
                				  (array('NotEmpty', true, array('messages' => 'Please enter UserId.'))
                				))
                	->setValue('')
                	->addFilter('StringToLower')
                	->setRequired(true);
                	
        $save = $this->createElement('submit','save');
        $save->setLabel("Save")
        	 ->removeDecorator('DtDdWrapper')        		
        	 ->setAttrib('class','submitBtn')
             ->setIgnore(true);
                	

        $this->addElements( array ($userId,
        					$emailAddress,
        					$socialmedia,
        					$save
    					));
    	
    }


}

