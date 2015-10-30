<?php

class Restaurant_Form_Restaurantdetails extends Zend_Form
{

    public function init()
    {
      $this->setMethod('post');
	   	$resname = $this->createElement('text', 'resname', array(
	   			'requried'=>true,
	   			'label'=>'Restaurant Name'));
	   		$this->addElement($resname);

	   	$rescapacity = $this->createElement('text','rescapacity',array(
	   		'requried'=>true,
	   		'label'=>'Capacity of the restaurant'));
	   		$this->addElement($rescapacity);

	   	$resemail = $this->createElement('text','resemail',array(
	   		'required'=>true,
	   		'validators' => array(
                'EmailAddress',
            ),
            'label'=>'Email address'));
	   		$this->addElement($resemail);
	   	$resyear_founded = $this->createElement('text','resyear_founded',array(
	   		'required'=>true,
	   		'label'=>'Year in which restaurant was founded'));
	   		$this->addElement($resyear_founded);
	   	$resprice = $this->createElement('text','resprice',array(
	   		'required'=>true,
	   		'label'=>'Average Price for 2'));
	   		$this->addElement($resprice);
	   	$resaddress = $this->createElement('textarea','resaddress',array(
	   		'required'=>true,
	   		'label'=>'Restaurant Address',
	   		'id'=>'resaddress'))->setAttrib('rows', 5)->setAttrib('coloumns',10);
	   		$this->addElement($resaddress);
	   	$rescity_id = $this->createElement('select','rescity_id',array(
	   		'label'=>'City'))->setAttrib('class','framed locationSel');
	   		$this->addElement($rescity_id);
	   	$restype_id = $this->createElement('select','restype_id',array(
	   		'lable'=>'Cusine',
	   		'multiple'=>true))->setAttrib('class','framed');
	   		$this->addElement($restype_id);
	   	$rescountry_id = $this->createElement('select','rescountry_id',array(
	   		'label'=>'Country'))->setAttrib('class','framed locationSel locality');
	   		$this->addElement($rescountry_id);
	   	$reslocation_id = $this->createElement('select','reslocation_id',array(
	   		'label'=>'Location',
	   		'id'=>'reslocation_id'))->setAttrib('class','framed locationSel');
	   		$this->addElement($reslocation_id);
	   	$reszipcode = $this->createElement('text','reszipcode',array(
	   		'required'=>true,
	   		'label'=>'Zip code'));
	   		$this->addElement($reszipcode);
	   	$resphone = $this->createElement('text','resphone',array(
	   		'required'=>true,
	   		'label'=>'Phone number'));
	   		$this->addElement($resphone);
	   	$resfax = $this->createElement('text','resfax',array(
	   		'label'=>'Fax'));
	   		$this->addElement($resfax);
	   	$restimezone = $this->createElement('select','restimezone',array(
	   		'label'=>'Time zone'))->setAttrib('class','framed locationSel');
	   		$this->addElement($restimezone);
		 $reswebsite	 = $this->createElement('text','reswebsite',array(
	   	'label'=>'Website Url'));
	   	$this->addElement($reswebsite);
	   	$resdescription = $this->createElement('textarea','resdescription',array(
	   		'label'=>'Description'))->setAttrib('rows', 2)->setAttrib('coloumns',10);
	   		$this->addElement($resdescription);
	  	$resdining_style = $this->createElement('select','resdining_style',array(
	  		'label'=>'Dining style'))->setAttrib('class','framed');
	  		$this->addElement($resdining_style);
	  	$resparking = $this->createElement('checkbox','resparking',array(
	  		'label'=>'Parking availability'));
	  	$resnon_veg = $this->createElement('checkbox','resnon_veg',array(
	  		'label'=>'Serves Non-veg'));
	  		$this->addElement($resnon_veg);
	  	$resprivate_party = $this->createElement('checkbox','resprivate_party',array(
	  		'Private party availability'));
	  		$this->addElement($resprivate_party);
	  	$resprivate_party_contact = $this->createElement('text','resprivate_party_contact',array(
	  		'label'=>'Contact number for Private party'));
	  		$this->addElement($resprivate_party_contact);
	  	$resentertainment= $this->createElement('text','resentertainment',array(
	  		'label'=>'Entertainment provided'));
	  		$this->addElement($resentertainment);
	  	$resreservation_system=$this->createElement('checkbox','resreservation_system',array(
	  		'label'=>'Reservation system availability'));
	  		$this->addElement($resreservation_system);
	  	$resreservation_provider = $this->createElement('textarea','resreservation_provider',array(
	  		'label'=>'Reservation system provider'))->setAttrib('rows', 2)->setAttrib('coloumns',10);
	  		$this->addElement($resreservation_provider);
	  	$res_restaurant_status = $this->createElement('select','res_restaurant_status',array(
	  		'label'=>'Status of te restaurant'))->setAttrib('class','framed');
	  		$this->addElement($res_restaurant_status);
	  	$reslocation = $this->createElement('text','reslocation',array(
	  		'label'=>''));
	  		$this->addElement($reslocation);
	  	$restimings = $this->createElement('text','restimings',array(
	  		'label'=>'Restaurant Timings'));
	  		$this->addElement($restimings);
	  	$resexecutive_chef = $this->createElement('text','resexecutive_chef',array(
	  		'label'=>'Executive Chef'));
	  		$this->addElement($resexecutive_chef);
	  	$resaccept_walkin = $this->createElement('checkbox','$resaccept_walkin',array(
	  		'label'=>' Accept Walkin'));
	  		$this->addElement($resaccept_walkin);
	  	$resmenu = $this->createElement('checkbox','resmenu',array(
	  		'label'=>'Menu'));
	  		$this->addElement($resmenu);
	  	$reslandmark = $this->createElement('textarea','reslandmark',array(
	  		'label'=>' Landmarks'))->setAttrib('rows', 2)->setAttrib('coloumns',10);
	  		$this->addElement($reslandmark);
	  	$resprice = $this->createElement('text','resprice',array(
	  		'label'=>'Cost for 2'));
	  		$this->addElement($resprice);

	  	$resavg_mealprice_min = $this->createElement('text','resavg_mealprice_min',array(
	  		'label'=>' Minimum meal price'));
	  		$this->addElement($resavg_mealprice_min);
	  	$resdelivery = $this->createElement('checkbox','resdelivery',array(
	  		'label'=>' Delivery'));
	  		$this->addElement($resdelivery);
	  	$resair_conditioned =  $this->createElement('checkbox','resair_conditioned',array(
	  		'label'=>' Air conditioned'));
	  		$this->addElement($resair_conditioned);
	  	$reslunch_buffet =  $this->createElement('checkbox','reslunch_buffet',array(
	  		'label'=>' Lunch Buffet'));
	  		$this->addElement($reslunch_buffet);
	  	$resdinner_buffet =  $this->createElement('checkbox','resdinner_buffet',array(
	  		'label'=>' Dinner Buffet'));
	  		$this->addElement($resdinner_buffet);	
	  $reswifi =  $this->createElement('checkbox','reswifi',array(
	  		'label'=>'Wifi'));
	  		$this->addElement($reswifi);

	 $resalcohol =  $this->createElement('checkbox','resalcohol',array(
	  		'label'=>'Alcohol'));
	  		$this->addElement($resalcohol);
	   $res_smoking =  $this->createElement('checkbox','res_smoking',array(
	  		'label'=>'Smoking'));
	  		$this->addElement($res_smoking);
	   $resparty_allowed =  $this->createElement('checkbox','resparty_allowed',array(
	  		'label'=>'Party allowed'));
	  		$this->addElement($resparty_allowed);
	  	 $rescatering =  $this->createElement('checkbox','rescatering',array(
	  		'label'=>'Catering'));
	  		$this->addElement($rescatering);
	  	 $reskids_section =  $this->createElement('checkbox','reskids_section',array(
	  		'label'=>'Kids section'));
	  		$this->addElement($reskids_section);
	  	 $resgoogleplace_id =  $this->createElement('text','resgoogle_place_id',array(
	  		'id'=>'place_id',
	  		'hidden'=>true
	  		));

	  		$this->addElement($resgoogleplace_id);
	  		 $reslocation = $this->createElement('text','reslocation',array(
	  	 	'hidden'=>true,
	  	 	'id'=>'latlon'));
	  	 	$this->addElement($reslocation);
	  	$res_social_media_fb_url = $this->createElement('text','res_social_media_fb_url',array(
	  		'label'=>'Facebook url',
	  		'placeholder'=>'Enter Facebook Url'));
	  		$this->addElement($res_social_media_fb_url);
  		$res_social_media_instagram_url = $this->createElement('text','res_social_media_instagram_url',array(
  		'label'=>'Instagram url',
  		'placeholder'=>'Enter Instagram Url'));
  		$this->addElement($res_social_media_instagram_url);
  		$restags = $this->createElement('text','restags',array(
	  		'label'=>'Tags'));
	  		$this->addElement($restags);
	  	$res_social_media_twitter_url = $this->createElement('text','res_social_media_twitter_url',array(
	  		'label'=>'Twitter url',
	  		'placeholder'=>'Enter Twitter Url'));
	  		$this->addElement($res_social_media_twitter_url);
	  	$res_specialities = $this->createElement('textarea','res_specialities',array(
	  		'label'=>'Specialites'))->setAttrib('rows', 2)->setAttrib('coloumns',10);
	  		$this->addElement($res_specialities);
	  	$res_image_button = $this->createElement('file','res_image_button',array(
	  		'label'=>'Upload photos',
	  		'id'=>'file_button',
	  		'multiple'=>''));
	  		$this->addElement($res_image_button);
	  	$res_image_data = $this->createElement('text','resimage_data',array(
	  		'hidden'=>true,
	  		'value'=>'null',
	  		'id'=>'file_data'));
	  		$this->addElement($res_image_data);
	$resromantic_setup = $this->createElement('checkbox','resromantic_setup',array(
	  		'label'=>''));
	  		$this->addElement($resromantic_setup);
		$res_special_ocassion_dining = $this->createElement('checkbox','res_special_ocassion_dining',array(
			  		'label'=>''));
			$this->addElement($res_special_ocassion_dining);
		$resparking_valet = $this->createElement('checkbox','resparking_valet',array(
			  		'label'=>''));
			$this->addElement($resparking_valet);
		$resparking_public = $this->createElement('checkbox','resparking_public',array(
			  		'label'=>''));
			$this->addElement($resparking_public);
		$resparking_prepaid = $this->createElement('checkbox','resparking_prepaid',array(
			  		'label'=>''));
			$this->addElement($resparking_prepaid);
		$res_cash = $this->createElement('checkbox','res_cash',array(
                                   'label'=>''));
            $this->addElement($res_cash);
		$res_credit_card = $this->createElement('checkbox','res_credit_card',array(
		                                   'label'=>''));
		    $this->addElement($res_credit_card);
		$res_gift_vouchers = $this->createElement('checkbox','res_gift_vouchers',array(
		                                   'label'=>''));
		    $this->addElement($res_gift_vouchers);
		$res_visa_card = $this->createElement('checkbox','res_visa_card',array(
		                                   'label'=>''));
		    $this->addElement($res_visa_card);
		$res_master_card = $this->createElement('checkbox','res_master_card',array(
		                                   'label'=>''));
		    $this->addElement($res_master_card);
		$resoutdoor_seating = $this->createElement('checkbox','resoutdoor_seating',array(
		                                   'label'=>''));
		    $this->addElement($resoutdoor_seating);
		$resdine_in = $this->createElement('checkbox','resdine_in',array(
		                                   'label'=>''));
		    $this->addElement($resdine_in);
		$reswheel_chair = $this->createElement('checkbox','reswheel_chair',array(
		                                   'label'=>''));
		    $this->addElement($reswheel_chair);
		$restelevision = $this->createElement('checkbox','restelevision',array(
		                                   'label'=>''));
		    $this->addElement($restelevision);
		$res_sports_telecast = $this->createElement('checkbox','res_sports_telecast',array(
		                                   'label'=>''));
		    $this->addElement($res_sports_telecast);
		$reslive_music = $this->createElement('checkbox','reslive_music',array(
		                                   'label'=>''));
		     $this->addElement($reslive_music);
		 $resbreakfast = 
		$this->createElement('checkbox','resbreakfast',array(
			  		'label'=>''));
			  $this->addElement($resbreakfast);	
		$resbreakfast_buffet = 
		$this->createElement('checkbox','resbreakfast_buffet',array(
			  		'label'=>''));
			  $this->addElement($resbreakfast_buffet);	
		$reslunch = 	
		$this->createElement('checkbox','reslunch',array(
			  		'label'=>''));
			  $this->addElement($reslunch);
		$resdinner = $this->createElement('checkbox','resdinner',array(
			  		'label'=>''));
			 $this->addElement($resdinner);
	  	$res_submit_button = $this->createElement('submit','Register',array(
	  		'class'=>"btn btn-default pull-right"));
	  		$this->addElement($res_submit_button);

    $elements = $this->getElements();
        foreach($elements as $element) {
            $element->removeDecorator('DtDdWrapper')
            ->removeDecorator('HtmlTag')
            ->removeDecorator('Label');
        }
    }




}

