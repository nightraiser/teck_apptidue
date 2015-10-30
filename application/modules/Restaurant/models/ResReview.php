<?php
class  Restaurant_Model_ResReview
{
	protected $_rrid;
	protected $_rr_review_text;
	protected $_rr_fk_resid;
	protected $_rr_review_ratings;	
	protected $_rrcreatedby;	
	protected $_rrcreateddateandtime;	
	protected $_rrupdatedby;	
	protected $_rrupdateddateandtime;
	protected $_rrcreateddate;
	protected $_gallery;
	protected $_username;
	protected $_resname;
	protected $_resgallery;
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
	public function setUsername($value)
	{
		$this->_username = $value;
		return $this;
	}

	public function setRrid($value){ 		
	$this->_rrid = $value;
	return $this;
	}
	
	public function setRr_review_text($value){ 		
	$this->_rr_review_text = $value;
	return $this;
	}	

	public function setRr_fk_resid($value){ 
	$this->_rr_fk_resid = $value;
	return $this;
	}

	public function setRr_review_ratings($value)
	{
		$this->_rr_review_ratings = $value;
		return $this;	
	}	
	public function setRrcreatedby($value)
	{
		$this->_rrcreatedby = $value;
		return $this;	
	}	
	public function setRrcreateddateandtime($value)
	{
		$this->_rrcreateddateandtime = $value;
		return $this;	
	}	
	public function setRrupdatedby($value)
	{
		$this->_rrupdatedby = $value;
		return $this;	
	}	
	public function setRrupdateddateandtime($value)
	{
		$this->_rrupdateddateandtime = $value;
		return $this;
	}
	public function setRrcreateddate($value)
	{
		$this->_rrcreateddate = $value;
		return $this;
	}
	public function setGallery($value)
	{
		$this->_gallery = $value;
		return $this;
	}
	public function setResGallery($value)
	{
		$this->_resgallery = $value;
		return $this;
	}
	public function setResname($value)
	{
		$this->_resname = $value;
		return $this;
	}

	public function getUsername()
	{
		return $this->_username;
	}
	public function getRrid(){
	return $this->_rrid; 
	}
	public function getRr_review_text(){
	return $this->_rr_review_text; 
	}

	public function getRr_fk_resid(){
	return $this->_rr_fk_resid; 
	}	

	public function getRr_review_ratings()
	{
		return $this->_rr_review_ratings;	
	}	
	public function getRrcreatedby()
	{
		return $this->_rrcreatedby;	
	}	
	public function getRrcreateddateandtime()
	{
		return $this->_rrcreateddateandtime;	
	}	
	public function getRrupdatedby()
	{
		return $this->rrupdatedby;	
	}	
	public function getRrupdateddateandtime()
	{
		return $this->_rrupdateddateandtime;
	}
	public function getRrcreateddate()
	{
		return $this->_rrcreateddate;
	}

	public function getGallery()
	{
		return $this->_gallery;
	}
	public function getResGallery()
	{
		return $this->_resgallery;
	}
	public function getResname()
	{
		return $this->_resname;
	}
}	





 