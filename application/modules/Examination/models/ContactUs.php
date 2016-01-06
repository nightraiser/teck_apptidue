<?php
class Administrator_Model_ContactUs
{
	private $_id;
	private $_contactname;
	private $_address;
	private $_city;
	private $_state;
	private $_country;
	private $_zip;
	private $_phone;
	private $_email;
	private $_fax;
	private $_website;
	private $_moreinformation;
	private $_contactby;
	private $_comments;
	private $_postedon;
	private $_status;
	private $_contacttype;
	private $_startDate;
	private $_endDate;
	private $_restname;
	private $_restid;
	private	$_helpinfo;
	private $_countrycode;
	private $_companyid;

	
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
			throw new Exception('Invalid City_BD property');
		}
		$this->$method($value);
	}
	
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid State_BD property');
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
	
	
	public function setid($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	public function getid()
	{
		return $this->_id;
	}
	
	public function setcontactname($contactname)
	{
		$this->_contactname = $contactname;
		return $this;
	}
	
	public function getcontactname()
	{
		return $this->_contactname;
	}
	
	public function setaddress($address)
	{
		$this->_address = $address;
		return $this;
	}
	
	public function getaddress()
	{
		return $this->_address;
	}
	
	public function setcity($city)
	{
		$this->_city = $city;	
	}
	
	public function getcity()
	{
		return $this->_city;
	}
	
	public function setstate($state)
	{
		$this->_state = $state;
		return $this;
	}
	
	public function getstate()
	{
		return $this->_state;
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
	
	public function setzip($zip)
	{
		$this->_zip = $zip;
		return $this;
	}
	
	public function getzip()
	{
		return $this->_zip;
	}
	
	public function setphone($phone)
	{
		$this->_phone = $phone;
		return $this;
	}
	
	public function getphone()
	{
		return $this->_phone;
	}
	
	public function setemail($email)
	{
		$this->_email = $email;
		return $this;
	}
	
	public function getemail()
	{
		return $this->_email;
	}
	
	public function setfax($fax)
	{
		$this->_fax = $fax;
		return $this;
	}
	
	public function getfax()
	{
		return $this->_fax;
	}
	
	public function setwebsite($website)
	{
		$this->_website = $website;
		return $this;
	}
	
	public function getwebsite()
	{
		return $this->_website;
	}
	
	public function setmoreinformation($moreinformation)
	{
		$this->_moreinformation = $moreinformation;
		return $this;
	}
	
	public function getmoreinformation()
	{
		return $this->_moreinformation;
	}
	
	
	public function setcontactby($contactby)
	{
		$this->_contactby = $contactby;
		return $this;
	}
	
	public function getcontactby()
	{
		return $this->_contactby;
	}
	
	
    public function setcomments($comments)
	{
		$this->_comments = $comments;
		return $this;
	}
	
	public function getcomments()
	{
		return $this->_comments;
	}
	
   public function setpostedon($postedon)
	{
		$this->_postedon = $postedon;
		return $this;
	}
	
	public function getpostedon()
	{
		return $this->_postedon;
	}
	
   public function setstatus($status)
	{
		$this->_status = $status;
		return $this;
	}
	
	public function getstatus()
	{
		return $this->_status;
	}
	
	public function setcontacttype($contacttype)
	{
		$this->_contacttype = $contacttype;
		return $this;
	}
	
	public function getcontacttype()
	{
		return $this->_contacttype;
	}
public function setStartDate($startdate)
	{
		$this->_startDate = $startdate;
		return $this;
	}
	
	public function getStartDate()
	{
		return $this->_startDate;
	}
	
	public function setEndDate($enddate)
	{
		$this->_endDate = $enddate;
		return $this;
	}
	
	public function getEndDate()
	{
		return $this->_endDate;
	}
	
	public function setRestname($restname)
	{
		$this->_restname = $restname;
		return $this;
	}
	
	public function getRestname()
	{
		return $this->_restname;
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
	
	public function setHelpInfo($helpinfo)
	{
		$this->_helpinfo = $helpinfo;
		return $this;
	}
	
	public function getHelpInfo()
	{
		return $this->_helpinfo;
	}
	
	public function setCountryCode($Countrycode)
	{
		$this->_countrycode = $Countrycode;
		return $this;
	}
	
	public function getCountryCode()
	{
		return $this->_countrycode;
	}
	
	public function setCompanyId($companyid)
	{
		$this->_companyid = $companyid;
		return $this;
	}
	
	public function getCompanyId()
	{
		return $this->_companyid;
	}
}











