<?php

class User_Form_ChangePassword extends Zend_Form
{

    public function init()
    {
        $passwordConfirm = new Rdine_Validate_PasswordConfirmation();
        
        $oldpassword =  $this->createElement('password','oldpassword');
        $oldpassword->removeDecorator('Label')
         		->removeDecorator('HtmlTag')        	
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '20')
        		->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter your Password.')),
                 	      	     ))
                ->setRequired(true)
                ->setValue('');
                
		$password =  $this->createElement('password','password');
        $password->removeDecorator('Label')
         		->removeDecorator('HtmlTag')        	
        		->setAttrib('class','inp1')
        		->setAttrib('maxlength', '20')
        		->addValidators(array($passwordConfirm,
                				 array('NotEmpty', true, array('messages' => 'Please enter your New Password.')),
                				 array('StringLength', false, array(6, 20,'messages' => array(
                    				Zend_Validate_StringLength::TOO_SHORT => 'Your password is too short(>6).',
                    				Zend_Validate_StringLength::TOO_LONG => 'Your password is too long(<30).'))
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
                    	
		$userId = $this->createElement('hidden','userid');                    	
        $userId->removeDecorator('HtmlTag');
           	
        $register = $this->createElement('submit','register');
        $register->setLabel("Change") 
        		->removeDecorator('DtDdWrapper')       		
        		->setAttrib('class','submitBtn')
                ->setIgnore(true);
                    	
        $this->addElements( array (
        					$oldpassword,
        					$password,
                            $confirmPassword,
                            $userId,
                            $register));
    	
    }

}

