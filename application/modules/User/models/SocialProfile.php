<?php

class User_Model_SocialProfile
{
	protected $_id;
	protected $_customerid;
	protected $_emailid;
	protected $_password;
	protected $_mediatype;
	protected $_createdon;
	protected $_userstatusid;
	protected $_description;
	protected $_status;
	
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
	
	public function setId($id)
	{
		$this->_id = (int)$id;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
	public function setCustomerid($customerid)
	{
		$this->_customerid = $customerid;
		return $this;
	}
	
	public function getCustomerid()
	{
		return $this->_customerid;
	}

	public function setEmailid($emailid)
	{
		$this->_emailid = $emailid;
		return $this;
	}
	
	public function getEmailid()
	{
		return $this->_emailid;
	}
	
	public function setPassword($password)
	{
		$this->_password = $password;
		return $this;
	}

	public function getPassword()
	{
		return $this->_password;
	}
	
	public function setMediatype($mediatype)
	{
		$this->_mediatype = $mediatype;
		return $this;
	}
	
	public function getMediatype()
	{
		return $this->_mediatype;
	}
	
	public function setCreatedon($createdon)
	{
		$this->_createdon = $createdon;
		return $this;
	}
	
	public function getCreatedon()
	{
		return $this->_createdon;
	}
	
	public function setUserstatisid($userstatusid)
	{
		$this->_userstatusid = (int)$userstatusid;
		return $this;
	}
	
	public function getUserStatusid()
	{
		return $this->_userstatusid;
	}
	
	public function setDescription($description)
	{
		$this->_description = $description;
		return $this;
	}
	
	public function getDescription()
	{
		return $this->_description;
	}
	
	public function setStatus($status)
	{
		$this->_status = $status;
		return $this;
	}
	
	public function getStatus()
	{
		return $this->_status;
	}

}

