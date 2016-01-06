<?php

class Administrator_Form_ManageCont extends Zend_Form
{

    public function init()
    {
    	
    	
    	$enquirystatus = new Application_Model_EnquiryStatusDataMapper();
		$enquries = $enquirystatus->fetchAll();
		$enquirystatusList[] = array('key'=>'','value'=>'Select Status');   	   
    	 foreach($enquries as $enquiry){
    		$enquirystatusList[] = array('key'=>$enquiry->getId(),'value'=>$enquiry->getDescription());
    	} 
     /*	$restAppStaMapper = new Application_Model_RestaurantApprovalStatusDataMapper();
    	$restAppStaRes = $restAppStaMapper->fetchAll();
   	    $restAppStaLst = array();
    	$restAppStaLst[] = array('key'=>'0','value'=>'Select Status');
    	foreach($restAppStaRes as $res){
    		$restAppStaLst[] = array('key'=>$res->getId(),'value'=>$res->getDescription());
    	} */
    	
    	/* Populating Manage Contact Us Bd  */
    	$id = $this->createElement('text','id');
    	$id->removeDecorator('Label')
    			  ->setAttrib('class','inp1 input_form')
    			  ->setAttrib('placeholder','Inquiry Id')
    			  ->setAttrib('title','Inquiry Id')
        		  ->removeDecorator('HtmlTag')
        		   
        		  ->addValidator('Digits',new Zend_Validate_Digits(),array('messages' => 'Please enter valid id'))
        		    //->addFilters(array('StringTrim'))
        			//->addValidators(array(array('Digits', true, array('messages' => 'Please enter valid id.'))))
        			//->addValidator('StringLength', false,array(0,15))
        		   //->addFilters(array('Digits'))
        		    ->setValue('');
        
    	
    	$name = $this->createElement('text','name');
    	$name->removeDecorator('Label')
    			  ->setAttrib('class','inp1 form input_form')
    			  ->setAttrib('placeholder','Contact Name')
    			  ->setAttrib('title','Contact Name')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        
		$status = $this->createElement('select','status');
		$status->removeDecorator('Label')
         		    ->removeDecorator('HtmlTag')
         		    ->setAttrib('class','drpDown form input_form')  
         		    ->setAttrib('placeholder','status')
    			  	->setAttrib('title','Status')
//        		    ->setAttrib('style','width:160px')
         		    ->addMultiOptions($enquirystatusList);
//        	        ->setValue($enquirystatusList[1]);
        	        //0=>'Select Status',
        	        
        $startdate = $this->createElement('text','startdate');
    	$startdate->removeDecorator('Label')
    			  ->setAttrib('class','inp1 datepicker form input_form')
    			  ->setAttrib('placeholder','Start Date')
    		  	  ->setAttrib('title','Start Date')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        		  
        $enddate = $this->createElement('text','enddate');
    	$enddate->removeDecorator('Label')
    			  ->setAttrib('class','inp1 datepicker2 form input_form')
    			  ->setAttrib('placeholder','End Date')
    		  	  ->setAttrib('title','End Date')
        		  ->removeDecorator('HtmlTag')
        		  ->addFilters(array('StringTrim'))
        		  ->setValue('');
        		  
		 $resSearch = $this->createElement('submit','search');
         $resSearch->removeDecorator('Label')
        		   ->removeDecorator('DtDdWrapper')
        		   ->setValue('Search')           		          		        		
        		   ->setAttrib('class','submitBtn')
                   ->setIgnore(true);
                   
		$this->addElements( array ($id,
								   $name,
								   $status,
								   $startdate,
								   $enddate
								   ));                           	        
    }


}

