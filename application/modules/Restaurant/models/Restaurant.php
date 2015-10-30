<?php
 /**
            *   Name            : Restaurant.php
            *   Author          : Sai
            *   Creation Date   : 02-09-2015
            *   Path            : application/modules/Restaurant/models/Restaurant
            *   Description     : This model includes functions for restaurant table
            *  
 **/
class Restaurant_Model_Restaurant
{
	protected $_resid;		
	protected $_resname;	
	protected $_rescapacity;		
	protected $_resemail;
	protected $_resyear_founded;		
	protected $_resprice;
	protected $_resaddress;		
	protected $_rescity_id;	
	protected $_reslocation_id;	
	protected $_reszipcode;		
	protected $_resphone;	
	protected $_resfax;	
	protected $_restimezone;		
	protected $_reswebsite;	
	protected $_resdescription;	
	protected $_resdining_style;		
	protected $_resparking;	
	protected $_resparking_details;	
	protected $_resprivate_party;	
	protected $_resprivate_party_contact;		
	protected $_resentertainment;		
	protected $_resreservation_system;	
	protected $_resreservation_provider;	
	protected $_res_status;		
	protected $_resrestaurant_status;		
	protected $_resapprovalstatus;		
	protected $_resgooglemapstatus;	
	protected $_reslocation;
	protected $_restimings;		
	protected $_rescreateddatetime;		
	protected $_rescreatedby;		
	protected $_resupdatedby;		
	protected $_resupdateddatetime;		
	protected $_resexecutive_chef;	
	protected $_resaccept_walkin;	
	protected $_resmenu;	
	protected $_rescategory_id;		
	protected $_reslisted_restaurant_id;		
	protected $_resorigin_id;		
	protected $_respaymentstatus;	
	protected $_resspecial_request;	
	protected $_reslandmark;	
	protected $_resavg_mealprice_max;		
	protected $_resavg_mealprice_min;		
	protected $_resdelivery;
	protected $_resair_conditioned;
	protected $_reslunch_buffet;
	protected $_resdinner_buffet;	
	protected $_reswifi;
	protected $_resalcohol;
	protected $_res_smoking;
	protected $_resparty_allowed;	
	protected $_rescatering;
	protected $_reskids_section;
	protected $_resgoogle_place_id;
	protected $_res_social_media_fb_url;	
	protected $_res_likes;
	protected $_res_specialities;
	protected $_res_dislikes;
	protected $_res_reviews;	
	protected $_res_social_media_twitter_url;	
	protected $_resimage_data;
	protected $_rescountry_id;	
	protected $_restype_id;
	protected $_restypedescription; 
	protected $_resnon_veg;
	protected $_res_cash;
	protected $_res_credit_card;
	protected $_res_gift_vouchers;
	protected $_res_visa_card;
	protected $_res_master_card;
	protected $_resoutdoor_seating;
	protected $_resdine_in	;
	protected $_reswheel_chair;
	protected $_restelevision;
	protected $_res_sports_telecast;
	protected $_reslive_music;
	protected $_resromantic_setup;
	protected $_res_special_ocassion_dining;	
	protected $_resparking_valet;
	protected $_resparking_public;
	protected $_resparking_prepaid;
	protected $_resbreakfast;	
	protected $_reslunch;	
	protected $_resdinner;
	protected $_resrating;
	protected $_resbreakfast_buffet;
	protected $_res_social_media_instagram_url;
	protected $_restags;
	protected $_reslocation_name;
	protected $_rescity_name;
	protected $_rescusine_data;
	public function __construct($options = null){
		if(is_array($options))
		{
			$this->setOptions($options);
		}
	}

	public function setOptions(array $arr){
		$methods = get_class_methods($this);
		foreach ($arr as $key => $value) 
		{
			$method = 'set'.ucfirst($key);
			if(in_array($method, $methods))
			{
				if(!is_array($value))
				{
					$this->$method(htmlspecialchars($value));
				}
				else
				{
					$this->$method($value);
				}
			}
		}
		return $this;
	}

	public function setResid($value){ 
	$this->_resid = $value;
	return $this;
	}	

	public function setResname($value){ 
	$this->_resname = $value;
	return $this;
	}

	public function setRescapacity($value){ 
	$this->_rescapacity = $value;
	return $this;
	}		

	public function setResemail($value){ 
	$this->_resemail = $value;
	return $this;
	}

	public function setResyear_founded($value){ 
	$this->_resyear_founded = $value;
	return $this;
	}		

	public function setResprice($value){ 
	$this->_resprice = $value;
	return $this;
	}

	public function setResaddress($value){ 
	$this->_resaddress = $value;
	return $this;
	}		

	public function setRescity_id($value){ 
	$this->_rescity_id = $value;
	return $this;
	}	

	public function setReslocation_id($value){ 
	$this->_reslocation_id = $value;
	return $this;
	}	

	public function setReszipcode($value){ 
	$this->_reszipcode = $value;
	return $this;
	}		

	public function setResphone($value){ 
	$this->_resphone = $value;
	return $this;
	}	

	public function setResfax($value){ 
	$this->_resfax = $value;
	return $this;
	}	

	public function setRestimezone($value){ 
	$this->_restimezone = $value;
	return $this;
	}		

	public function setReswebsite($value){ 
	$this->_reswebsite = $value;
	return $this;
	}	

	public function setResdescription($value){ 
	$this->_resdescription = $value;
	return $this;
	}	

	public function setResdining_style($value){ 
	$this->_resdining_style = $value;
	return $this;
	}		

	public function setResparking($value){ 
	$this->_resparking = $value;
	return $this;
	}	

	public function setResparking_details($value){ 
	$this->_resparking_details = $value;
	return $this;
	}	

	public function setResprivate_party($value){ 
	$this->_resprivate_party = $value;
	return $this;
	}	

	public function setResprivate_party_contact($value){ 
	$this->_resprivate_party_contact = $value;
	return $this;
	}		

	public function setResentertainment($value){ 
	$this->_resentertainment = $value;
	return $this;
	}		

	public function setResreservation_system($value){ 
	$this->_resreservation_system = $value;
	return $this;
	}	

	public function setResreservation_provider($value){ 
	$this->_resreservation_provider = $value;
	return $this;
	}	

	public function setRes_status($value){ 
	$this->_res_status = $value;
	return $this;
	}		

	public function setResrestaurant_status($value){ 
	$this->_resrestaurant_status = $value;
	return $this;
	}		

	public function setResapprovalstatus($value){ 
	$this->_resapprovalstatus = $value;
	return $this;
	}		

	public function setResgooglemapstatus($value){ 
	$this->_resgooglemapstatus = $value;
	return $this;
	}	

	public function setReslocation($value){ 
	$this->_reslocation = $value;
	return $this;
	}

	public function setRestimings($value){ 
	$this->_restimings = $value;
	return $this;
	}		

	public function setRescreateddatetime($value){ 
	$this->_rescreateddatetime = $value;
	return $this;
	}		

	public function setRescreatedby($value){ 
	$this->_rescreatedby = $value;
	return $this;
	}		

	public function setResupdatedby($value){ 
	$this->_resupdatedby = $value;
	return $this;
	}		

	public function setResupdateddatetime($value){ 
	$this->_resupdateddatetime = $value;
	return $this;
	}		

	public function setResexecutive_chef($value){ 
	$this->_resexecutive_chef = $value;
	return $this;
	}	

	public function setResaccept_walkin($value){ 
	$this->_resaccept_walkin = $value;
	return $this;
	}	

	public function setResmenu($value){ 
	$this->_resmenu = $value;
	return $this;
	}	

	public function setRescategory_id($value){ 
	$this->_rescategory_id = $value;
	return $this;
	}		

	public function setReslisted_restaurant_id($value){ 
	$this->_reslisted_restaurant_id = $value;
	return $this;
	}		

	public function setResorigin_id($value){ 
	$this->_resorigin_id = $value;
	return $this;
	}		

	public function setRespaymentstatus($value){ 
	$this->_respaymentstatus = $value;
	return $this;
	}

	public function setResspecial_request($value){ 
	$this->_resspecial_request = $value;
	return $this;
	}	

	public function setReslandmark($value){ 
	$this->_reslandmark = $value;
	return $this;
	}	

	public function setResavg_mealprice_max($value){ 
	$this->_resavg_mealprice_max = $value;
	return $this;
	}

	public function setResavg_mealprice_min($value){ 
	$this->_resavg_mealprice_min = $value;
	return $this;
	}	

	public function setResdelivery($value){ 
	$this->_resdelivery = $value;
	return $this;
	}

	public function setResair_conditioned($value){ 
	$this->_resair_conditioned = $value;
	return $this;
	}

	public function setReslunch_buffet($value){ 
	$this->_reslunch_buffet = $value;
	return $this;
	}

	public function setResdinner_buffet($value){ 
	$this->_resdinner_buffet = $value;
	return $this;
	}

	public function setReswifi($value){ 
	$this->_reswifi = $value;
	return $this;
	}

	public function setResalcohol($value){ 
	$this->_resalcohol = $value;
	return $this;
	}

	public function setRes_smoking($value){ 
	$this->_res_smoking = $value;
	return $this;
	}

	public function setResparty_allowed($value){ 
	$this->_resparty_allowed = $value;
	return $this;
	}	

	public function setRescatering($value){ 
	$this->_rescatering = $value;
	return $this;
	}

	public function setReskids_section($value){ 
	$this->_reskids_section = $value;
	return $this;
	}

	public function setResgoogle_place_id($value){ 
	$this->_resgoogle_place_id = $value;
	return $this;
	}

	public function setRes_social_media_fb_url($value){ 
	$this->_res_social_media_fb_url = $value;
	return $this;
	}

	public function setRes_likes($value){ 
	$this->_res_likes = $value;
	return $this;
	}

	public function setRes_specialities($value){ 
	$this->_res_specialities = $value;
	return $this;
	}

	public function setRes_dislikes($value){ 
	$this->_res_dislikes = $value;
	return $this;
	}

	public function setRes_reviews($value){ 
	$this->_res_reviews = $value;
	return $this;
	}	

	public function setRes_social_media_twitter_url($value){ 
	$this->_res_social_media_twitter_url = $value;
	return $this;
	}	

	public function setResimage_data($value){ 
	$this->_resimage_data = $value;
	return $this;
	}

	public function setRescountry_id($value){ 
	$this->_rescountry_id = $value;
	return $this;
	}

	public function setRestype_id($value)
	{
	$this->_restype_id = $value;
	return $this;
	}
	public function setResnon_veg($value)
	{
		$this->_resnon_veg = $value;
		return $this;
	}

	public function setRestypedescription($value)
	{
	$this->_restypedescription = $value;
	return $this;
	}
	public function setRes_cash($value)
	{
		$this->_res_cash = $value;
		return $this;
	}
	public function setRes_credit_card($value)
	{
		$this->_res_credit_card = $value;
		return $this;
	}
	public function setRes_gift_vouchers($value)
	{
		$this->_res_gift_vouchers = $value;
		return $this;
	}
	public function setRes_visa_card($value)
	{
		$this->_res_visa_card = $value;
		return $this;
	}
	public function setRes_master_card($value)
	{
		$this->_res_master_card = $value;
		return $this;
	}
	public function setResoutdoor_seating($value)
	{
		$this->_resoutdoor_seating = $value;
		return $this;
	}
	public function setResdine_in($value)
	{
		$this->_resdine_in	 = $value;
		return $this;
	}	
	public function setReswheel_chair($value)
	{
		$this->_reswheel_chair = $value;
		return $this;
	}
	public function setRestelevision($value)
	{
		$this->_restelevision = $value;
		return $this;
	}
	public function setRes_sports_telecast($value)
	{
		$this->_res_sports_telecast = $value;
		return $this;
	}
	public function setReslive_music($value)
	{
		$this->_reslive_music = $value;
		return $this;
	}
	public function setResromantic_setup($value)
	{
		$this->_resromantic_setup = $value;	
		return $this;
	}
	public function setRes_special_ocassion_dining($value)
	{
		$this->_res_special_ocassion_dining = $value;	
		return $this;
	}	
	public function setResparking_valet($value)
	{
		$this->_resparking_valet = $value;	
		return $this;
	}
	public function setResparking_public($value)
	{
		$this->_resparking_public = $value;	
		return $this;
	}
	public function setResparking_prepaid($value)
	{
		$this->_resparking_prepaid = $value;	
		return $this;
	}

	public function setResbreakfast($value)	
	{
		$this->_resbreakfast = $value;
		return $this;
	}
	public function setReslunch($value)	
	{
		$this->_reslunch = $value;
		return $this;
	}
	public function setResdinner($value)
	{
		$this->_resdinner = $value;
		return $this;
	}
	public function setResrating($value)
	{
		$this->_resrating = $value;
		return $this;
	}
	public function setResbreakfast_buffet($value)
	{
		$this->_resbreakfast_buffet= $value;
		return $this;
	}
	public function setRes_social_media_instagram_url($value)
	{
		$this->_res_social_media_instagram_url	= $value;
		return $this;
	}
	public function setRestags($value)
	{
		$this->_restags= $value;
		return $this;
	}
	public function setReslocation_name($value)
	{
		$this->_reslocation_name = $value;
		return $this;
	}
	public function setRescity_name($value)
	{
		$this->_rescity_name = $value;
		return $this;
	}
	public function setRescusine_data($value)
	{
		$this->_rescusine_data = $value;
		return $this;

	}
	public function getResdescription(){
	return $this->_resdescription; 
	}

	public function getResid(){
	return $this->_resid; 
	}		

	public function getResname(){
	return $this->_resname; 
	}	

	public function getRescapacity(){
	return $this->_rescapacity; 
	}		

	public function getResemail(){
	return $this->_resemail; 
	}

	public function getResyear_founded(){
	return $this->_resyear_founded; 
	}		

	public function getResprice(){
	return $this->_resprice; 
	}

	public function getResaddress(){
	return $this->_resaddress; 
	}		

	public function getRescity_id(){
	return $this->_rescity_id; 
	}	

	public function getReslocation_id(){
	return $this->_reslocation_id; 
	}	

	public function getReszipcode(){
	return $this->_reszipcode; 
	}		

	public function getResphone(){
	return $this->_resphone; 
	}	

	public function getResfax(){
	return $this->_resfax; 
	}	

	public function getRestimezone(){
	return $this->_restimezone; 
	}		

	public function getReswebsite(){
	return $this->_reswebsite; 
	}	

	public function getResdining_style(){
	return $this->_resdining_style; 
	}		

	public function getResparking(){
	return $this->_resparking; 
	}	

	public function getResparking_details(){
	return $this->_resparking_details; 
	}	

	public function getResprivate_party(){
	return $this->_resprivate_party; 
	}	

	public function getResprivate_party_contact(){
	return $this->_resprivate_party_contact; 
	}		

	public function getResentertainment(){
	return $this->_resentertainment; 
	}		

	public function getResreservation_system(){
	return $this->_resreservation_system; 
	}	

	public function getResreservation_provider(){
	return $this->_resreservation_provider; 
	}	

	public function getRes_status(){
	return $this->_res_status; 
	}		

	public function getResrestaurant_status(){
	return $this->_resrestaurant_status; 
	}		

	public function getResapprovalstatus(){
	return $this->_resapprovalstatus; 
	}		

	public function getResgooglemapstatus(){
	return $this->_resgooglemapstatus; 
	}	

	public function getReslocation(){
	return $this->_reslocation; 
	}

	public function getRestimings(){
	return $this->_restimings; 
	}		

	public function getRescreateddatetime(){
	return $this->_rescreateddatetime; 
	}		

	public function getRescreatedby(){
	return $this->_rescreatedby; 
	}		

	public function getResupdatedby(){
	return $this->_resupdatedby; 
	}		

	public function getResupdateddatetime(){
	return $this->_resupdateddatetime; 
	}		

	public function getResexecutive_chef(){
	return $this->_resexecutive_chef; 
	}	

	public function getResaccept_walkin(){
	return $this->_resaccept_walkin; 
	}	

	public function getResmenu(){
	return $this->_resmenu; 
	}	

	public function getRescategory_id(){
	return $this->_rescategory_id; 
	}		

	public function getReslisted_restaurant_id(){
	return $this->_reslisted_restaurant_id; 
	}		

	public function getResorigin_id(){
	return $this->_resorigin_id; 
	}		

	public function getRespaymentstatus(){
	return $this->_respaymentstatus; 
	}	

	public function getResspecial_request(){
	return $this->_resspecial_request; 
	}	

	public function getReslandmark(){
	return $this->_reslandmark; 
	}	

	public function getResavg_mealprice_max(){
	return $this->_resavg_mealprice_max; 
	}		

	public function getResavg_mealprice_min(){
	return $this->_resavg_mealprice_min; 
	}		

	public function getResdelivery(){
	return $this->_resdelivery; 
	}

	public function getResair_conditioned(){
	return $this->_resair_conditioned; 
	}

	public function getReslunch_buffet(){
	return $this->_reslunch_buffet; 
	}

	public function getResdinner_buffet(){
	return $this->_resdinner_buffet; 
	}	

	public function getReswifi(){
	return $this->_reswifi; 
	}

	public function getResalcohol(){
	return $this->_resalcohol; 
	}

	public function getRes_smoking(){
	return $this->_res_smoking; 
	}

	public function getResparty_allowed(){
	return $this->_resparty_allowed; 
	}	

	public function getRescatering(){
	return $this->_rescatering; 
	}

	public function getReskids_section(){
	return $this->_reskids_section; 
	}

	public function getResgoogle_place_id(){
	return $this->_resgoogle_place_id; 
	}

	public function getRes_social_media_fb_url(){
	return $this->_res_social_media_fb_url; 
	}	

	public function getRes_likes(){
	return $this->_res_likes; 
	}

	public function getRes_specialities(){
	return $this->_res_specialities; 
	}

	public function getRes_dislikes(){
	return $this->_res_dislikes; 
	}

	public function getRes_reviews(){
	return $this->_res_reviews; 
	}	

	public function getRes_social_media_twitter_url(){
	return $this->_res_social_media_twitter_url; 
	}	

	public function getResimage_data(){
	return $this->_resimage_data; 
	}

	public function getRescountry_id(){
	return $this->_rescountry_id; 
	}

	public function getRestype_id()
	{
	return $this->_restype_id ;
	}

	public function getResnon_veg()
	{
		return $this->_resnon_veg;
	}

	public function getRestypedescription()
	{
	return $this->_restypedescription ;
	}
	public function getRes_cash()
	{
		return $this->_res_cash;
	}
	public function getRes_credit_card()
	{
		return $this->_res_credit_card;
	}
	public function getRes_gift_vouchers()
	{
		return $this->_res_gift_vouchers;
	}
	public function getRes_visa_card()
	{
		return $this->_res_visa_card;
	}
	public function getRes_master_card()
	{
		return $this->_res_master_card;
	}
	public function getResoutdoor_seating()
	{
		return $this->_resoutdoor_seating;
	}
	public function getResdine_in()
	{
		return $this->_resdine_in;	
	}	
	public function getReswheel_chair()
	{
		return $this->_reswheel_chair;
	}
	public function getRestelevision()
	{
		return $this->_restelevision;
	}
	public function getRes_sports_telecast()
	{
		return $this->_res_sports_telecast;
	}
	public function getReslive_music()
	{
		return $this->_reslive_music;
	}
	public function getResromantic_setup()
	{
		return $this->_resromantic_setup;
	}
	public function getRes_special_ocassion_dining()
	{
		return $this->_res_special_ocassion_dining;
	}	
	public function getResparking_valet()
	{
		return $this->_resparking_valet;
	}
	public function getResparking_public()
	{
		return $this->_resparking_public;
	}
	public function getResparking_prepaid()
	{
		return $this->_resparking_prepaid;
	}
	public function getResbreakfast()	
	{
		return $this->_resbreakfast;
	}
	public function getReslunch()	
	{
		return $this->_reslunch;
	}
	public function getResdinner()
	{
		return $this->_resdinner;
	}
	public function getResrating()
	{
		return $this->_resrating;
	}
	public function getResbreakfast_buffet()
	{
		return $this->_resbreakfast_buffet;
	}
	public function getRes_social_media_instagram_url()
	{
		return $this->_res_social_media_instagram_url;
	}
	public function getRestags()
	{
		return $this->_restags;
	}
	public function getReslocation_name()
	{
		return $this->_reslocation_name;
	}
	public function getRescity_name()
	{
		return $this->_rescity_name;
	}
	public function getRescusine_data()
	{
		return $this->_rescusine_data;
	}
	
}
