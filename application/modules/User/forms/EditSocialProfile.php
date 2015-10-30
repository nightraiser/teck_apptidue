<?php

class User_Form_EditSocialProfile extends Zend_Form
{

    public function init()
    {

      $cspid = $this->createElement('hidden','cspid');
      $cspid->removeDecorator('Label')
        		->removeDecorator('HtmlTag');
        		
      $userid = $this->createElement('hidden','userid');
      $userid->removeDecorator('Label')
        		->removeDecorator('HtmlTag');
    
      $emailAddress =  $this->createElement('text', 'emailAddress');
      $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
        			->addFilters(array('StringTrim'))
                	->addValidators(array
                				  (array('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.'))
                				))
                	->setValue('')
                	->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
					 ->addErrorMessage('Pleaes Enter Valid Email Address')
                	->setRequired(true);
                	
      $socialmedia = $this->createElement('text','socialmedia');
      $socialmedia->removeDecorator('Label')
      			  ->removeDecorator('HtmlTag') 
      			  ->setAttrib('readonly','readonly')
      			  ->setAttrib('class','inp1 inpReadOnly')
      			  ->setRequired(true);
      			  
      $update = $this->createElement('submit','update');
      $update->setLabel("Update")
        	 ->removeDecorator('DtDdWrapper')        		
        	 ->setAttrib('class','submitBtn')
             ->setIgnore(true);
            
      $this->addElements( array ($cspid,
        						$emailAddress,
        						$socialmedia,
        						$update
    						));
             
      
    }


}

