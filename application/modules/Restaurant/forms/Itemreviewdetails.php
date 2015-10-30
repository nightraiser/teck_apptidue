<?php

class Restaurant_Form_Itemreviewdetails extends Zend_Form
{

    public function init()
    {
      $this->setMethod('post');
	   	$ir_review_text = $this->createElement('textarea', 'ir_review_text', array(
	   			'placeholder'=>'Write a Review',
	   			'rows'=>'25',
	   			'cols'=>'25'));
	   		$this->addElement($ir_review_text);

	   	$ir_image_button = $this->createElement('file','ir_image_button',array(
	  		'label'=>'Upload photos',
	  		'class'=>'ir_file_button',
	  		'multiple'=>''));
	  		$this->addElement($ir_image_button);	

	

	$postir_review = $this->createElement('submit','postir_review',array(
	  		'class'=>'btn pull-right btn-default'));
	  		$this->addElement($postir_review);

    $elements = $this->getElements();
        foreach($elements as $element)
        {
            $element->removeDecorator('DtDdWrapper')
            ->removeDecorator('HtmlTag')
            ->removeDecorator('Label');
        }
   }     
}        
