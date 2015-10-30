<?php

class Administrator_Form_BookingDetails extends Zend_Form
{

    public function init()
    {
      //$status = array('key'=>'','value'=>'Select status');
      //$status = array('key'=>'approved','value'=>'Approved');
      //$status = array('key'=>'notapproved','value'=>'Not Approved');
      $bokid = $this->createElement('text', 'bokid'); 
       $bokid->removeDecorator('Label')
                        ->removeDecorator('HtmlTag')
                        ->setAttrib('class','inp1')
                        ->setAttrib('maxlength', '225')
                        ->setAttrib('title', 'Booking Id')
                        ->setAttrib('placeholder', 'Restaurant Id')
                        ->addValidator('Digits',new Zend_Validate_Digits(),array('messages' => 'Please enter Numbers only'))
                        ->addFilters(array('StringTrim'));
      
      $bokemail =  $this->createElement('text', 'bokemail');
      $bokemail->removeDecorator('Label')
                        ->removeDecorator('HtmlTag')                    
                        ->setAttrib('class','inp1')
                        ->setAttrib('maxlength', '40')
                        ->setAttrib('title', 'Email Address')
                        ->setAttrib('placeholder', 'Email Address')
                  
                  ->addValidator('EmailAddress',false,array('messages'=>array(Zend_Validate_EmailAddress::INVALID =>'Please enter a valid Host Name')))
                               ->addErrorMessage('Pleaes Enter Valid Email Address')
                  ->addFilters(array('StringTrim'))
                  ->setValue('')
                  ->addFilter('StringToLower');
      $bokfirst_name = $this->createElement('text','bokfirst_name');
      $bokfirst_name->removeDecorator('Label')
                    ->setAttrib('class','inp1 form input_form')
                    ->setAttrib('placeholder','First Name')
                    ->setAttrib('title','First Name')
                    ->removeDecorator('HtmlTag')
                    ->addFilters(array('StringTrim'))
                    ->setValue('');            
                  
      $boklast_name = $this->createElement('text','boklast_name');
      $boklast_name->removeDecorator('Label')
                    ->setAttrib('class','inp1 form input_form')
                    ->setAttrib('placeholder','Last Name')
                    ->setAttrib('title','Last Name')
                    ->removeDecorator('HtmlTag')
                    ->addFilters(array('StringTrim'))
                    ->setValue('');  
      $resName = $this->createElement('text','resname');
      $resName->removeDecorator('Label')
                    ->setAttrib('class','inp1 form input_form')
                    ->setAttrib('placeholder','Restaurant Name')
                    ->setAttrib('title','Restaurant Name')
                    ->removeDecorator('HtmlTag')
                    ->addFilters(array('StringTrim'))
                    ->setValue('');
      $bokphone = $this->createElement('text','bokphone');
      $bokphone->removeDecorator('Label')         
                    ->setAttrib('class','inp1 form input_form')
                    ->setAttrib('placeholder','Phone Number')
                    ->setAttrib('title','Phone Number')
                    ->removeDecorator('HtmlTag')
                    ->addFilters(array('StringTrim'))
                    ->setValue('');

      $resname = $this->createElement('text','resname');
      $resname->removeDecorator('Label')         
                    ->setAttrib('class','inp1 form input_form')
                    ->setAttrib('placeholder','Restaurant Name')
                    ->setAttrib('title','Restaurant Name')
                    ->removeDecorator('HtmlTag')
                    ->addFilters(array('StringTrim'))
                    ->setValue('');
      $bokresv_confirm_status = $this->createElement('select','bokresv_confirm_status');
            $bokresv_confirm_status->addMultiOptions(array(
                    "" => "select status",
                    "true" => "Approved",
                    "false" => "Not Approved"
                ));  
      $bokresv_confirm_status->removeDecorator('Label')
                        ->removeDecorator('DtDdWrapper');
      
      $bokbooking_phrase = $this->createElement('select','bokbooking_phrase');
            $bokbooking_phrase->addMultiOptions(array(
                    "" => "select origin",
                    "dinedesk" => "Dinedesk",
                    "rdine" => "Rdine"
                ));  
      $bokbooking_phrase->removeDecorator('Label')
                        ->removeDecorator('DtDdWrapper');                                              
      
      $Search = $this->createElement('submit','search');
         $Search->removeDecorator('Label')
                     ->removeDecorator('DtDdWrapper')
                     ->setValue('Search')                                                       
                     ->setAttrib('class','submitBtn')
                   ->setIgnore(true);                          
      
      $this->addElements( array ($bokid,
                                 $bokemail,
                                 $resName,
                                 $bokfirst_name,
                                 $boklast_name,
                                 $bokphone,
                                 $bokresv_confirm_status,
                                 $bokbooking_phrase,
                                 $Search));

     }
}                                                                                 
                 