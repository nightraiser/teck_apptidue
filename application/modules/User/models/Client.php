<?php

class User_Model_Client
{
	protected $_email;
	protected $_id;
	protected $_lastlogin;
	protected $_lastloginip;
	protected $_password;
	protected $_oldpassword;
	protected $_registereddate;
	protected $_roleid;
	protected $_userstatusid;
	protected $_usertypeid;
	protected $_userpassphrase;
	protected $_countryCode;
	protected $_zipCode;
	protected $_country;
	protected $_city;
	
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
			throw new Exception('Invalid User property');
		}
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid User property');
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
	
	public function setEmail($email)
	{
		$this->_email = $email;
		return $this;
	}
	
	public function getEmail()
	{
		return $this->_email;
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
	
	public function setLastlogin($lastlogin)
	{
		$this->_lastlogin = $lastlogin;
		return $this;
	}
	
	public function getLastlogin()
	{
		return $this->_lastlogin;
	}
	
	public function setLastloginip($lastloginip)
	{
		$this->_lastloginip = (string)$lastloginip;
		return $this;
	}
	
	public function getLastloginip()
	{
		return $this->_lastloginip;
	}
	
	public function setPassword($password)
	{
		$this->_password = (string)$password;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
	
	public function setRegistereddate($registereddate)
	{
		$this->_registereddate = $registereddate;
		return $this;
	}
	
	public function getRegistereddate()
	{
		return $this->_registereddate;
	}
	
	public function setRole($roleid)
	{
		$this->_roleid = $roleid;
		return $this;
	}
	
	public function getRole()
	{
		return $this->_roleid;
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
	
	public function setUsertypeid($usertypeid)
	{
		$this->_usertypeid = (int)$usertypeid;
		return $this;	
	}
	
	public function getUsertypeid()
	{
		return $this->_usertypeid;	
	}
	
	public function setOldpassword($oldpassword)
	{
		$this->_oldpassword = (string)$oldpassword;
		return $this;
	}
	
	public function getOldpassword()
	{
		return $this->_oldpassword;
	}
	
	public function setPassPhrase($PassPhrase)
	{
		$this->_userpassphrase = $PassPhrase;
		return $this;
	}
	
	public function getPassPhrase()
	{
		return $this->_userpassphrase;
	}
	
	public function setcountryCode($countryCode)
	{
		$this->_countryCode = $countryCode;
		return $this;
	}
	
	public function getcountryCode()
	{
		return $this->_countryCode;
	}
	
	public function setcountry($country)
	{
		$this->_country = $country;
		return $this;
	}
	
	public function getcountry()
	{
		return $this->_country;
	}
	
	public function setcity($city)
	{
		$this->_city = $city;
		return $this;
	}
	
	public function getcity()
	{
		return $this->_city;
	}
	
	public function setzipCode($zipCode)
	{
		$this->_zipCode = $zipCode;
		return $this;
	}
	
	public function getzipCode()
	{
		return $this->_zipCode;
	}
}

