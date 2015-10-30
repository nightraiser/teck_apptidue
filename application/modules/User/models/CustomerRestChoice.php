<?php
class User_Model_CustomerRestChoice extends User_Model_Client
{
	protected $_restid;
	protected $_userid;
	protected $_restaurantname;
	protected $_restneighboorhood;
	protected $_rescity;
	protected $_resregion;
	protected $_resstate;
	protected $_resaddress;
	protected $_resdesc;
	private	  $_restimage;
	
	public function __construct(array $options = null)
	{
		if(is_array($options)){
			$this->setOptions($options);
		}		
	}
	
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid Customer property');
		}
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid Customer property');
		}
		return $this->$method();
	}
	
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}
	
	public function setRestId($restid)
	{
		$this->_restid = $restid;
		return $this;
	}
	
	public function getRestId()
	{
		return $this->_restid;	
	}
	
	public function setUserId($userid)
	{
		$this->_userid = $userid;
		return $this;
	}
	
	public function getUserId()
	{
		return $this->_userid;	
	}
	
	public function setRestneighboorhood($restneighboorhood)
	{
		$this->_restneighboorhood = $restneighboorhood;
		return $this;
	}

	public function getRestneighboorhood()
	{
		return $this->_restneighboorhood;
	}
	
	public function setRestaurantname($restaurantname)
	{
		$this->_restaurantname = $restaurantname;
		return $this;
	}

	public function getRestaurantname()
	{
		return $this->_restaurantname;
	}
	
	public function setRestRegion($region)
	{
		$this->_resregion = $region;
		return $this;
	}
	
	public function getRestRegion()
	{
		return $this->_resregion;
	}
	public function setRestCity($city)
	{
		$this->_rescity = $city;
		return $this;
	}
	
	public function getRestCity()
	{
		return $this->_rescity;
	}
	public function setRestState($state)
	{
		$this->_resstate = $state;
		return $this;
	}
	
	public function getRestState()
	{
		return $this->_resstate;
	}
	public function setResAddress($address)
	{
		$this->_resaddress = $address;
		return $this;
	}
	
	public function getResAddress()
	{
		return $this->_resaddress;
	}
	public function setResDesc($desc)
	{
		$this->_resdesc = $desc;
		return $this;
	}
	
	public function getResDesc()
	{
		return $this->_resdesc;
	}
	
	public function setRestImage($image)
	{
		$this->_restimage = $image;
		return $this;
	}
	
	public function getRestImage()
	{
		return $this->_restimage;
	}

}