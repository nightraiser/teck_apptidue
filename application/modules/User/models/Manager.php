<?php

class User_Model_Manager extends User_Model_Client
{
	protected $_userid;
	protected $_firstname;
	protected $_lastname;
	protected $_restaurantname;
	protected $_phonenumber;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_stateid;
	
	/**
	 * 
	 * @var integer
	 */
	private   $_cityid;
	
	/**
	 * 
	 * @var integer
	 */
	private   $_regionid;
	
	/**
	 * 
	 * @var string
	 */
	private   $_description;
	
	/**
	 * 
	 * @var array
	 */
	private   $_citybd;
	
	/**
	 * 
	 * @var array
	 */
	private   $_regionbd;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_sourceid;
	
	
	/**
	 * 
	 * @var string
	 */
	private   $_sourcedescription;
	
	
	/**
	 * 
	 * @var string
	 */
	protected $_website;
	
	protected $_cantfind;
	protected $_cantfindstate;
	protected $_cantfindregion;
	protected $_cantfindcity;
	private   $_comapnyid;
	protected $_dateofbirth;
	protected $_countryCode;
	protected $_techfirstname;
	protected $_techemail;
	protected $_techlastname;
	protected $_techphone;
	protected $_techcountrycode;
	protected $_bilfirstname;
	protected $_bilemail;
	protected $_billastname;
	protected $_bilphone;
	protected $_bilcountrycode;
	protected $_approval;
	protected $_disapproval;
	
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
		
	public function setFristName($firstname)
	{
		$this->_firstname = $firstname;
		return $this;
	}
	
	public function getFirstName()
	{
		return $this->_firstname;
	}
	
	public function setLastName($lasttname)
	{
		$this->_lastname = $lasttname;
		return $this;
	}
	
	public function getLastName()
	{
		return $this->_lastname;
	}
	
	public function setRestaurantname($restaurantname){
		$this->_restaurantname = (string)$restaurantname;
		return $this;	
	}
		
	public function getRestaurantname()
	{
		return $this->_restaurantname;	
	}

	public function setUserid($userid)
	{
		$this->_userid = (int)$userid;
		return $this;
	}
	
	public function getUserid()
	{
		return $this->_userid;
	}
	
	public function setPhonenumber($phonenumber)
	{
		$this->_phonenumber = (string)$phonenumber;
		return $this;
	}
	
	public function getPhonenumber()
	{
		return $this->_phonenumber;
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
	
	/**
     * @param integer $regionid
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
     * @param text $description
     * @return self
     */
	public function setDescription($description)
	{
		$this->_description = $description;
		return $this;
	}
	
	/**
     * @return text
     */
	public function getDescription()
	{
		return $this->_description;
	}
	
	/**
     * @param array $citybd
     * @return self
     */
	public function setCityBd($citybd)
	{
		$this->_citybd = $citybd;
		return $this;
	}
	
	/**
     * @return array
     */
	public function getCityBd()
	{
		return $this->_citybd;
	}
	
	/**
     * @param array $regionbd
     * @return self
     */
	public function setRegionBd($regionbd)
	{
		$this->_regionbd = $regionbd;
		return $this;
	}
	
	/**
     * @return array
     */
	public function getRegionBd()
	{
		return $this->_regionbd;
	}
	
	/**
     * @param integer $sourceid
     * @return self
     */
	public function setSourceid($sourceid)
	{
		$this->_sourceid = $sourceid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getSourceid()
	{
		return $this->_sourceid;
	}
	
	
	/**
     * @param text $sourcedescription
     * @return self
     */
	public function setSourcedescription($sourcedescription)
	{
		$this->_sourcedescription = $sourcedescription;
		return $this;
	}
	
	/**
     * @return text
     */
	public function getSourcedescription()
	{
		return $this->_sourcedescription;
	}
	
	/**
     * @param text website
     * @return self
     */
	public function setWebsite($website)
	{
		$this->_website = $website;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getWebsite()
	{
		return $this->_website;
	}
	
	/**
     * @param text cantfindstate
     * @return self
     */
	public function setCantFindState($cantfindstate)
	{
		$this->_cantfindstate = $cantfindstate;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCantFindState()
	{
		return $this->_cantfindstate;
	}
	
	/**
     * @param text cantfindregion
     * @return self
     */
	public function setCantFindRegion($cantfindregion)
	{
		$this->_cantfindregion = $cantfindregion;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCantFindRegion()
	{
		return $this->_cantfindregion;
	}
	
	/**
     * @param text cantfindcity
     * @return self
     */
	public function setCantFindCity($cantfindcity)
	{
		$this->_cantfindcity = $cantfindcity;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCantFindCity()
	{
		return $this->_cantfindcity;
	}
	
	/**
     * @param text cantfind
     * @return self
     */
	public function setCantFind($cantfind)
	{
		$this->_cantfind = $cantfind;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCantFind()
	{
		return $this->_cantfind;
	}
	
	public function setCompanyid($comapnyid)
	{
		$this->_comapnyid = $comapnyid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCompanyid()
	{
		return $this->_comapnyid;
	}
	
	public function setDateofbirth($dateofbirth)
	{
		$this->_dateofbirth = $dateofbirth;
		return $this;
	}
	
	public function getDateofbirth()
	{
		return $this->_dateofbirth;
	}
	
	public function setPresid($presid)
	{
		$this->_presid = $presid;
		return $this;
	}
	
	public function getPresid()
	{
		return $this->_presid;
	}
	
	public function setCountryCode($CountryCode)
	{
		$this->_countryCode = $CountryCode;
		return $this;
	}
	
	public function getCountryCode()
	{
		return $this->_countryCode;
	}
	
public function setTechfirstName($techfirstname)
	{
		$this->_techfirstname = $techfirstname;
		return $this;
	}
	
	public function getTechfirstName()
	{
		return $this->_techfirstname;
	}
	
	public function setTechemail($techemail)
	{
		$this->_techemail = $techemail;
		return $this;
	}
	
	public function getTechemail()
	{
		return $this->_techemail;
	}
	
	public function setTechlastname($techlastname)
	{
		$this->_techlastname = $techlastname;
		return $this;
	}
	
	public function getTechlastname()
	{
		return $this->_techlastname;
	}
	
	public function setTechphone($techphone)
	{
		$this->_techphone = $techphone;
		return $this;
	}
	
	public function getTechphone()
	{
		return $this->_techphone;
	}
	
	public function setTechcountrycode($techcountrycode)
	{
		$this->_techcountrycode = $techcountrycode;
		return $this;
	}
	
	public function getTechcountrycode()
	{
		return $this->_techcountrycode;
	}
		
	public function setBilfirstName($bilfirstname)
	{
		$this->_bilfirstname = $bilfirstname;
		return $this;
	}
	
	public function getBilfirstName()
	{
		return $this->_bilfirstname;
	}
	
	public function setbilemail($bilemail)
	{
		$this->_bilemail = $bilemail;
		return $this;
	}
	
	public function getBilemail()
	{
		return $this->_bilemail;
	}
	
	public function setBillastname($billastname)
	{
		$this->_billastname = $billastname;
		return $this;
	}
	
	public function getBillastname()
	{
		return $this->_billastname;
	}
	
	public function setBilphone($bilphone)
	{
		$this->_bilphone = $bilphone;
		return $this;
	}
	
	public function getBilphone()
	{
		return $this->_bilphone;
	}
	
	public function setBilcountrycode($bilcountrycode)
	{
		$this->_bilcountrycode = $bilcountrycode;
		return $this;
	}
	
	public function getBilcountrycode()
	{
		return $this->_bilcountrycode;
	}
public function setDisapproval($disapproval)
	{
		$this->_disapproval = $disapproval;
		return $this;
	}
	
	public function getDisapproval()
	{
		return $this->_disapproval;
	}
	
public function setApproval($approval)
	{
		$this->_approval = $approval;
		return $this;
	}
	
	public function getApproval()
	{
		return $this->_approval;
	}
}

