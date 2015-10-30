<?php
class  Restaurant_Model_ItemReview
{
	protected $_item_id;
	protected $_review_text;
	protected $_res_id;
	protected $_username;

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
				$this->$method(htmlspecialchars($value));
			}
		}
		return $this;
	}

	public function setUsername($value){ 
	$this->_username = $value;
	return $this;
	} 

	public function setItem_id($value){ 
	$this->_item_id = $value;
	return $this;
	}	

	public function setReview_text($value){ 

	$this->_review_text = $value;
	return $this;
	}	

	public function setRes_id($value){ 
	$this->_res_id = $value;
	return $this;
	}

	public function getUsename(){
	return $this->_username; 
	}	

	public function getItem_id(){
	return $this->_item_id; 
	}	

	public function getReview_text(){
	return $this->_review_text; 
	}

	public function getRes_id(){
	return $this->_res_id; 
	}	
}	





 