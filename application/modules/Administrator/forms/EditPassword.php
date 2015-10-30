<?php

class Administrator_Form_EditPassword extends Zend_Form
{

    public function init()
    {
    	
    	$passwordConfirm = new Rdine_Validate_PasswordConfirmation();
    	
    	$userid = $this->createElement('hidden','userid');
    	$userid->removeDecorator('DtDdWrapper')
			  	 ->removeDecorator('Label')
			  	 ->removeDecorator('HtmlTag');
    	
    	/*$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag')        		
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
                	->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter your EmailAddress.'))
                				))
                	->addFilters(array('StringTrim'))
                	->setValue('')
                	->addFilter('StringToLower')
                	->setRequired(true);*/
                	            
		 $password =  $this->createElement('password','password');
         $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')        	
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '20')
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
                    	->setValue(''); 


     	$this->addElements( array ($userid,
     							   //$emailAddress,
	        					   $password,
	        					   $confirmPassword));
    }
}