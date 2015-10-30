<?php
class User_Form_SearchRestaurantUser extends Zend_Form
{
	public function init()
	{
		
		
		$userId = $this->createElement('hidden','userid');                    	
        $userId->removeDecorator('HtmlTag');
        
        $restNameCtl = $this->createElement('select','RestaurantName');
		$restNameCtl->removeDecorator('Label')
					->removeDecorator('HtmlTag')
					->setAttrib('class','form inp1')
					->setAttrib('style','height:auto')
					->setRegisterInArrayValidator(false)					
					->setRequired(true);
        
        $userName = $this->createElement('text', 'username');
        $userName->removeDecorator('Label')
        			   ->removeDecorator('HtmlTag')
        			   ->setAttrib('maxlength', '40')
        			  ->setAttrib('class','form inp1')
						->setAttrib('style','height:auto')
        			   ->addFilters(array('StringTrim'))
        			   ->addValidator('StringLength', false,array(0,40))
        			   ->setValue('')
        			   ->setRequired(true);
        			   
        $emailAddress =  $this->createElement('text', 'emailAddress');
        $emailAddress->removeDecorator('Label')
        		->removeDecorator('HtmlTag')
        		->setAttrib('maxlength', '40')
        		->setAttrib('class','form inp1')
				->setAttrib('style','height:auto')
        		->addValidator('StringLength', false,array(5,50))
                ->addValidator('EmailAddress')
                ->addFilters(array('StringTrim'))               
                ->setValue('')
                ->setRequired(true);
                
		$statusMapper  = new Application_Model_UserStatusDataMapper();
    	$status = $statusMapper->fetchAll();
    	$statusList = array();
		$statusList[] =array('key'=>'0','value'=>'Select status');    	    	   
    	foreach($status as $value){
    		$statusList[] = array('key'=>$value->getId(),'value'=>$value->getDescription());
    	}
    	
    	$status = $this->createElement('select','status');
        $status->removeDecorator('Label') 
         		  ->removeDecorator('HtmlTag')       	   
               	  ->addMultiOptions($statusList)
               	  ->setAttrib('class','form inp1')
				  ->setAttrib('style','height:auto')
                  ->setRequired(true);
                
       	$search = $this->createElement('submit','Search');
        $search->removeDecorator('Label')
        		  ->removeDecorator('HtmlTag')
        		  ->removeDecorator('DtDdWrapper') 
        		  ->setValue('Submit')           		          		        		
        		  ->setAttrib('class','submitBtn')
                  ->setIgnore(true);
                  
        $this->addElements( array ($userId,
        						   $restNameCtl,
        						   $userName,
        						   $emailAddress,
        						   $status,
        						   $search
        						));  
	}
}