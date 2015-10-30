<?php

class Restaurant_Form_Reviewdetails extends Zend_Form
{

    public function init()
    {
      $this->setMethod('post');
   
	   	$review = $this->createElement('textarea', 'review_text', array(
	   			'required'=>'',
	   			'placeholder'=>'Write a Review',
	   			'rows'=>'10',
	   			'cols'=>'70'));
	   		$this->addElement($review);

	   	$res_image_button = $this->createElement('file','res_image_button',array(
	  		'label'=>'Upload photos',
	  		'id'=>'file_button',
	  		'multiple'=>''));
	  		$this->addElement($res_image_button);	

	

	$postreview = $this->createElement('submit','submit',array('class'=>'btn pull-right btn-default'
	  		));
	  		$this->addElement($postreview);

    $elements = $this->getElements();
        foreach($elements as $element)
        {
            $element->removeDecorator('DtDdWrapper')
            ->removeDecorator('HtmlTag')
            ->removeDecorator('Label');
        }
   }     
}        
