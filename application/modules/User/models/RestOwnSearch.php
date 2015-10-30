<?php

class User_Model_RestOwnSearch
{
	protected $_email;
	protected $_id;
	protected $_firstname;
	protected $_lastname;
	protected $_statusid;
	protected $_stateid;
	protected $_regionid;
	protected $_cityid;
	protected $_ResName;
	protected $_company;
	
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
		$this->_email = (string)$email;
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
	
	public function setFirstname($firstname)
	{
		$this->_firstname = (string)$firstname;
		return $this;
	}	
	
	public function getFirstname()
	{
		return $this->_firstname;
	}
	
	public function setLastname($lastname)
	{
		$this->_lastname = (string)$lastname;
		return $this;
	}
	
	public function getLastname()
	{
		return $this->_lastname;
	}
	
	public function setStatusId($statusid)
	{
		$this->_statusid = $statusid;
		return $this;
	}
	
	public function getStatusId()
	{
		return $this->_statusid;
	}
	
	/**
     * @param integer $phonenumber
     * @return self
     */	
	public function setStateid($stateid)
	{
		$this->_stateid = $stateid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getStateid()
	{
		return $this->_stateid;
	}
	
	/**
     * @param integer $cityid
     * @return self
     */
	public function setRegionid($regionid)
	{
		$this->_regionid = $regionid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getRegionid()
	{
		return $this->_regionid;
	}
	
	/**
     * @param integer $cityid
     * @return self
     */
	public function setCityid($cityid)
	{
		$this->_cityid = $cityid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCityid()
	{
		return $this->_cityid;
	}
	
	public function setResName($ResName)
	{
		$this->_ResName = $ResName;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getResName()
	{
		return $this->_ResName;
	}
	
	public function setCompany($company)
	{
		$this->_company = $company;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCompany()
	{
		return $this->_company;
	}
}

