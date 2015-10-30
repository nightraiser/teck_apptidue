<?php

class User_Form_PatronCodes extends Zend_Form
{

    public function init()
    {
       $userId = $this->createElement('hidden','userid');                    	
        $userId->removeDecorator('HtmlTag');
        
        $restNameCtl = $this->createElement('select','RestaurantName');
		$restNameCtl->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','sel1 required')
					->setRegisterInArrayValidator(false)
					->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select Restaurant Name.'))))					
					->setRequired(true);
		$userNameCtl = $this->createElement('select','UserName');
		$userNameCtl->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','sel1 required')
					->setRegisterInArrayValidator(false)
					->addValidators(array(array('NotEmpty', true, array('messages' => 'Please select UserName.'))))					
					->setRequired(true);
		         	
        $userinitial =  $this->createElement('text', 'initial');
        $userinitial->removeDecorator('Label')
        		->removeDecorator('HtmlTag')        		
        		->setAttrib('maxlength', '3')
        		->setAttrib('class','inp1 required')
        		->addFilters(array('StringTrim'))
               ->addValidators(array
                				(array('NotEmpty', true, array('messages' => 'Please enter Initials.')),
                					array('StringLength', false,array(0,3)),array('Alnum')))               					 
                ->setValue('')
                ->setRequired(true);
                
        $update = $this->createElement('submit','update');
        $update->setLabel("Update")
        		 ->removeDecorator('DtDdWrapper')        		
        		 ->setAttrib('class','submitBtn')
                 ->setIgnore(true);

		$reset = $this->createElement('reset','reset');
        $reset->removeDecorator('Label')
        	  ->removeDecorator('DtDdWrapper')
        	  ->setLabel("Reset")
        	  ->setAttrib('class','submitBtn')
              ->setIgnore(true);
                
         $this->addElements(array($restNameCtl,
	        					 $userNameCtl,
	        					 $userinitial,
	        					 $update,
        						 $reset 
	        				));
    }


}

