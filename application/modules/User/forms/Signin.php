<?php

class User_Form_Signin extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    	
    	$emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        			->removeDecorator('HtmlTag') 
        			->setAttrib('class','inp1')
        			->setAttrib('maxlength', '40')
        			->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter your Email.')),))
        			->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
					->addErrorMessage('Pleaes Enter Valid Email Address')
                	->setValue('')
                	->addFilter('StringToLower')
                	->setRequired(true);
                
		 $password =  $this->createElement('password','password');
         $password->removeDecorator('Label') 
         		  ->removeDecorator('HtmlTag')        		
        		  ->setAttrib('class','inp1')
        		  ->setAttrib('maxlength', '20')
        		  ->addValidators(array(array('NotEmpty', true, array('messages' => 'Please enter your Password.')),
        		  				array('StringLength', false, array(6, 20,'messages' => array(
                    			Zend_Validate_StringLength::TOO_SHORT => 'Your password is too short(>6).',
                    			Zend_Validate_StringLength::TOO_LONG => 'Your password is too long(<20).'))
            				)))
                  ->setRequired(true)
                  ->setValue('');
                  
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
		$captcha->removeDecorator('Label')
				->removeDecorator('DtDdWrapper')
				->removeDecorator('HtmlTag')
				->setAttrib('style','position:relative;margin-top:20px')
				->setRequired(false);
                
	  	$login = $this->createElement('submit','login');
        $login->setLabel("")
              ->removeDecorator('DtDdWrapper')        		
              ->setAttrib('class','submitBtnLgn login')        	  
              ->setIgnore(true);

        $InvalidAttempts = $this->createElement('hidden','InvalidAttempts');                    	
        $InvalidAttempts->removeDecorator('HtmlTag')
        				->removeDecorator('DtDdWrapper')
        				->removeDecorator('Label');
         
		$this->addElements( array (
        					$emailAddress,
        					$password,
        					$captcha,
        					$login,
        					$InvalidAttempts));
    }

	

}

