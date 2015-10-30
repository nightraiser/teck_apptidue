<?php
/**
*	Name			: Customer.php
*	Author			: Mahesh
*	Creation Date	: 09/30/2010
*	Path 			: application/modules/User/models/Customer.php
*	Description		: This is the Model class for the booking customer table.
*					   	
*/
class User_Model_Guest extends User_Model_Client
{
	/**
	 * 
	 * @var string
	 */
	protected $_address;

	/**
	 * 
	 * @var integer
	 */
	protected $_cityid;

	/**
	 * 
	 * @var string
	 */
	protected $_favoritefood;
	
	/**
	 * 
	 * @var string
	 */
	protected $_favoritemusic;
	
	/**
	 * 
	 * @var string
	 */
	protected $_firstname;
	
	/**
	 * 
	 * @var string
	 */
	protected $_gender;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_id;
	
	/**
	 * 
	 * @var string
	 */
	protected $_lastname;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_mobilenumber;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_phonenumber;
	
	/**
	 * 
	 * @var string
	 */
	protected $_salution;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_stateid;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_timezone;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_regionid;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_userid;	
	
	/**
	 * 
	 * @var string
	 */
	protected $_zipcode;
	
	/**
	 * 
	 * @var integer
	 */
	protected $_neighborhoodid;
	
	/**
	 * 
	 * @var integer
	 */
	private   $_regionbd;
	
	/**
	 * 
	 * @var integer
	 */
	private   $_citybd;
	
	/**
	 * 
	 * @var integer
	 */
	private   $_neighborhodbd;  

	/**
	 * 
	 * @var integer
	 */
	private   $_statusid;  
	/**
	 * 
	 * @var integer
	 */
	protected   $_countryCode;
	/**
     * Public constructor
     *
     * @param  array $options
     */	
	protected $_email;
	protected $_password;
	public function __construct(array $options = null)
	{
		if(is_array($options)){
			$this->setOptions($options);
		}		
	}
	
	/**
	 * Writing data to properties
	 */	
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid Customer property');
		}
		$this->$method($value);
	}
	
	/**
	 * Reading data from properties
	 */
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
		
	/**
     * @param string $address
     * @return self
     */
	public function setAddress($address)
	{
		$this->_address = $address;
		return $this;	
	}
	
	/**
     * @return string
     */
	public function getAddress()
	{
		return $this->_address;	
	}
	
	/**
     * @param integer $age
     * @return self
     */
	public function setAge($age)
	{
		$this->_age = $age;
		return $this;	
	}	
	
	/**
     * @return integer
     */
	public function getAge()
	{
		return $this->_age;
	}
	
	public function setRegionid($regionid)
	{
		$this->_regionid = $regionid;
		return $this;
	}
	
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
	
	/**
     * @param integer $neighborhoodid
     * @return self
     */
	public function setNeighborhoodid($neighborhoodid)
	{
		$this->_neighborhoodid = $neighborhoodid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getNeighborhoodid()
	{
		return $this->_neighborhoodid;
	}
	
	/**
     * @param string $Favoritefood
     * @return self
     */
	public function setFavoritefood($Favoritefood)
	{
		$this->_favoritefood = $Favoritefood;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getFavoritefood()
	{
		return $this->_favoritefood;
	}
	
	/**
     * @param string $Favoritemusic
     * @return self
     */
	public function setFavoritemusic($Favoritemusic)
	{
		$this->_favoritemusic = $Favoritemusic;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getFavoritemusic()
	{
		return $this->_favoritemusic;
	}
	
	/**
     * @param string $firstname
     * @return self
     */
	public function setFirstname($firstname)
	{
		$this->_firstname = $firstname;
		return $this;
	}	
	
	/**
     * @return string
     */
	public function getFirstname()
	{
		return $this->_firstname;
	}
	
	/**
     * @param string $gender
     * @return self
     */
	public function setGender($gender)
	{
		$this->_gender = $gender;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getGender()
	{
		return $this->_gender;
	}
	
	/**
     * @param integer $id
     * @return self
     */
	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
     * @param string $lastname
     * @return self
     */
	public function setLastname($lastname)
	{
		$this->_lastname = $lastname;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getLastname()
	{
		return $this->_lastname;
	}
	
	/**
     * @param integer $mobilenumber
     * @return self
     */
	public function setMobilenumber($mobilenumber)
	{
		$this->_mobilenumber = $mobilenumber;
		return $this;
	}

	/**
     * @return integer
     */
	public function getMobilenumber()
	{
		return $this->_mobilenumber;
	}
	
	/**
     * @param integer $phonenumber
     * @return self
     */
	public function setPhonenumber($phonenumber)
	{
		$this->_phonenumber = $phonenumber;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getPhonenumber()
	{
		return $this->_phonenumber;
	}
	
	/**
     * @param string $salution
     * @return self
     */
	public function setSalution($salution)
	{
		$this->_salution = $salution;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getSalution()
	{
		return $this->_salution;
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
     * @param integer $timezone
     * @return self
     */
	public function setTimezone($timezone)
	{
		$this->_timezone = $timezone;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getTimezone()
	{
		return $this->_timezone;
	}
	
	/**
     * @param integer $userid
     * @return self
     */
	public function setUserid($userid)
	{
		$this->_userid = $userid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getUserid()
	{
		return $this->_userid;
	}
	
	/**
     * @param string $zipcode
     * @return self
     */
	public function setZipcode($zipcode)
	{
		$this->_zipcode = $zipcode;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getZipcode()
	{
		return $this->_zipcode;
	}

	/**
     * @param integer $citybd
     * @return self
     */
	public function setCityBd($citybd)
	{
		$this->_citybd = $citybd;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getCityBd()
	{
		return $this->_citybd;
	}
	
	public function setRegionBd($regionbd)
	{
		$this->_regionbd = $regionbd;
		return $this;
	}
	
	public function getRegionBd()
	{
		return $this->_regionbd;
	}
	
	/**
     * @param integer $neighborhodbd
     * @return self
     */
	public function setNeighborhodBd($neighborhodbd)
	{
		$this->_neighborhodbd = $neighborhodbd;
		return $this;	
	}
	
	/**
     * @return integer
     */
	public function getNeighborhodBd()
	{
		return $this->_neighborhodbd;
	}
	
	/**
     * @param integer $statusid
     * @return self
     */
	public function setStatusId($statusid)
	{
		$this->_statusid = $statusid;
		return $this;	
	}
	
	/**
     * @return integer
     */
	public function getStatusId()
	{
		return $this->_statusid;
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

	public function setEmail($value)
	{
		$this->_email = $value;
		return $this;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}

	public function setPassword($value)
	{
		$this->_password = $value;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
}

