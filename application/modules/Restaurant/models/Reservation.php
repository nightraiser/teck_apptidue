<?php
/**
*	Name			: Reservation.php
*	Author			: Zubair Ahmed
*	Creation Date	: 9/30/2010
*	Path 			: application/modules/Reservation/models/Reservation.php
*	Description		: This is the Model class for booking a table.
*					   	
*/
class Restaurant_Model_Reservation
{
	/**
	 * 
	 * @var integer
	 */
	private $_bokid;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokuserid;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokfk_restaurant;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokemail;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokfirst_name;
	
	/**
	 * 
	 * @var string
	 */
	private $_boklast_name;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokparty_size;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokphone;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokquotedtime;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokpayment_type;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokspecial_request;
	
	/**
	 * 
	 * @var date
	 */
	private $_bokbooking_date;
	
	/**
	 * 
	 * @var time
	 */
	private $_bokbooking_timings;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokbooking_status_id;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokbooking_status_code;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokbooking_status_desc;
	
	/**
	 * 
	 * @var date
	 */
	private $_bokbooking_made_on;
	
	/**
	 * 
	 * @var integer
	 */
	private $_boktableid;
	
	/**
	 * 
	 * @var integer
	 */
	private $_boktablenumber;
	
	/**
	 * 
	 * @var integer
	 */
	private $_boktable_no_assigned;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokbooking_type_id;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokbooking_type_code;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokbooking_type_desc;
	
	/**
	 * 
	 * @var string
	 */
	private $_resrestaurant_name;
	
	/**
	 * 
	 * @var string
	 */
	private $_resaddress;
	
	/**
	 * 
	 * @var string
	 */
	private $_contactInfo;
	
	/**
	 * 
	 * @var integer
	 */
	private $_bokreservation_mode_id;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokreservation_mode_code;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokreservation_mode_desc;
	
	/**
	 * 
	 * @var time
	 */
	private $_statetime;
	
	/**
	 * 
	 * @var string
	 */
	private $_bokrestaurant_note;
	
	/**
	 * 
	 * @var integer
	 */
	private $_schmaxreservation;
	
	/**
	 * 
	 * @var integer
	 */
	private $_tablesize;
	
	/**
	 * 
	 * @var integer
	 */
	private $_nooftables;
	
	/**
	 * 
	 * @var string
	 */
	private $_notificationtype;
	
	/**
	 * 
	 * @var string
	 */
	private $_reschedulecode;
	
	/**
	 * 
	 * @var integer
	 */
	private $_ressch_status_id;
	
	/**
	 * 
	 * @var integer
	 */
	private $_inventoryid;
	
	/**
	 * 
	 * @var string
	 */
	private $_notiftypedesc;
	
	/**
	 * 
	 * @var integer
	 */
	private $_join_table_no;
	
	/**
	 * 
	 * @var array
	 */
	private $_table_no_array;
	
	/**
	 * 
	 * @var boolean
	 */
	private $_bokbooking_status;
	
	/**
	 * 
	 * @var date
	 */
	private $_bokbooking_created_on;
	private $_specialprice;
	private $_specialid;
	private $_diningid;	
	
	 /**
	* 
	* @var integer
	*/
	private $_rescountrycode;
	private $_resphone;
	private $_resemail;
	private $_rescity;
	private $_resneighborhood;
	private $_reszipcode;
	private $_bokresv_confirm_status;
	private $_bokbooking_confirm_status;
	private $_bokresv_checkedin_status;
	private $_bokinitial;
	private $_blockStatus;
	private $_blockAmount;
	private $_blockDesc;
	private $_mealid;
	private $_bokoptions;
	private $_boksecoptions;
	private $_bokoptioncode;
	private $_bokoptionsid;
	private $_bok_createdby;
	private $_bokseat_start;
	private $_bokseat_duration;
	private $_bokbooking_phrase;
	private $_bok_restsch_setting_id;
	private $_bok_restsch_setting_type;
	private $_bokresv_runninglate_status;
	private $_bokseat_end;
	private $_countrycode;
	private $_restimage;
	private $_cusadrress;
	private $_cuscompany;
	private $_cusdesig;
	private $_cusallergy;
	private $_splstatus;
	private $_bokcontactid;
	private $_bokresv_allarrived_status;
	private $_bokresv_partialarrived_status;
	private $_bokwaittime_start;
	private $_bokcompany_id;
	private $_feedback_status;
	private $_tablet_book_id;
	private $_rescountry;
	private $_resstate;
	private $_guest_notes;
	private $_notified;
	private $_phnnotreceive;
	private $_res_contactNotify;
	private $_resownerName;
	private $_resownerId;
	private $_resownerPhone;
	private $_restechName;
	private $_restechPhone;
	private $_restechEmail;
	private $_resbillName;
	private $_resbillPhone;
	private $_resbillEmail;
	private $_resownerCountryCode;
	private $_restechCountryCode;
	private $_resbillCountryCode;
	private $_resmanagerName;	
	private $_restarantname;
	private $_quotetimedesc;
	private $_bokupdateddatetime;
	private $_booktable;
	private $_res_company_resid;
	private $_res_company_url;
	/**
     * Public constructor
     *
     * @param  array $options
     */
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
			throw new Exception('Invalid Booking property');
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
			throw new Exception('Invalid Booking property');
		}
		return $this->$method();
	}

	/*public function setOptions(array $arr){
		$methods = get_class_methods($this);
		foreach ($arr as $key => $value) 
		{
			$method = 'set'.$key;
			if(in_array($method, $methods))
			{
				$this->$method(htmlspecialchars($value));
			}
		}
		return $this;
	}*/
	
	/**
     * @param integer $bokid
     * @return self
     */
	public function setbokid($bokid)
	{
		$this->_bokid = $bokid;
		return $this;
	}
	
	 /**
     * @return integer
     */
	public function getbokid()
	{
		return $this->_bokid;
	}
	
	/**
     * @param integer $bokuserid
     * @return self
     */
	public function setbokuserid($bokuserid)
	{
		$this->_bokuserid = $bokuserid;
		return $this;
	}
	
	 /**
     * @return integer
     */
	public function getbokuserid()
	{
		return $this->_bokuserid;
	}
	
	/**
     * @param integer $bokfk_restaurant
     * @return self
     */
	public function setbokfk_restaurant($bokfk_restaurant)
	{
		$this->_bokfk_restaurant = $bokfk_restaurant;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokfk_restaurant()
	{
		return $this->_bokfk_restaurant;
	}
	
	/**
     * @param string $bokemail
     * @return self
     */
	public function setbokemail($bokemail)
	{
		$this->_bokemail = $bokemail;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokemail()
	{
		return $this->_bokemail;
	}
	
	/**
     * @param string $bokfirst_name
     * @return self
     */
	public function setbokfirst_name($bokfirst_name)
	{
		$this->_bokfirst_name = $bokfirst_name;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokfirst_name()
	{
		return $this->_bokfirst_name;
	}
	
	/**
     * @param string $boklast_name
     * @return self
     */
	public function setboklast_name($boklast_name)
	{
		$this->_boklast_name = $boklast_name;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getboklast_name()
	{
		return $this->_boklast_name;
	}
	
	/**
     * @param integer $bokparty_size
     * @return self
     */
	public function setbokparty_size($bokparty_size)
	{
		$this->_bokparty_size = $bokparty_size;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokparty_size()
	{
		return $this->_bokparty_size;
	}
	
	/**
     * @param integer $bokphone
     * @return self
     */
	public function setbokphone($bokphone)
	{
		$this->_bokphone = $bokphone;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokphone()
	{
		return $this->_bokphone;
	}
	
	/**
     * @param string $bokpayment_type
     * @return self
     */
	public function setbokpayment_type($bokpayment_type)
	{
		$this->_bokpayment_type = $bokpayment_type;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokpayment_type()
	{
		return $this->_bokpayment_type;
	}
	
	/**
     * @param string $bokspecial_request
     * @return self
     */
	public function setbokspecial_request($bokspecial_request)
	{
		$this->_bokspecial_request = $bokspecial_request;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokspecial_request()
	{
		return $this->_bokspecial_request;
	}
	
	/**
     * @param date $bokbooking_date
     * @return self
     */
	public function setbokbooking_date($bokbooking_date)
	{
		$this->_bokbooking_date = $bokbooking_date;
		return $this;
	}
	
	/**
     * @return date
     */
	public function getbokbooking_date()
	{
		return $this->_bokbooking_date;
	}
	
	/**
     * @param time $bokbooking_timings
     * @return self
     */
	public function setbokbooking_timings($bokbooking_timings)
	{
		$this->_bokbooking_timings = $bokbooking_timings;
		return $this;
	}
	
	/**
     * @return time
     */
	public function getbokbooking_timings()
	{
		return $this->_bokbooking_timings;
	}
	
	/**
     * @param integer $bokbooking_status_id
     * @return self
     */
	public function setbokbooking_status_id($bokbooking_status_id)
	{
		$this->_bokbooking_status_id = $bokbooking_status_id;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokbooking_status_id()
	{
		return $this->_bokbooking_status_id;
	}
	
	/**
     * @param integer $bokbooking_status
     * @return self
     */
	public function setbokbooking_status($bokbooking_status)
	{
		$this->_bokbooking_status = $bokbooking_status;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokbooking_status()
	{
		return $this->_bokbooking_status;
	}
	
	/**
     * @param string $bokbooking_status_desc
     * @return self
     */
	public function setbokbooking_status_desc($bokbooking_status_desc)
	{
		$this->_bokbooking_status_desc = $bokbooking_status_desc;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokbooking_status_desc()
	{
		return $this->_bokbooking_status_desc;
	}
	
	/**
     * @param string $bokbooking_status_code
     * @return self
     */
	public function setbokbooking_status_code($bokbooking_status_code)
	{
		$this->_bokbooking_status_code = $bokbooking_status_code;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokbooking_status_code()
	{
		return $this->_bokbooking_status_code;
	}
	
	/**
     * @param date $bokbooking_made_on
     * @return self
     */
	public function setbokbooking_made_on($bokbooking_made_on)
	{
		$this->_bokbooking_made_on = $bokbooking_made_on;
		return $this;
	}
	
	/**
     * @return date
     */
	public function getbokbooking_made_on()
	{
		return $this->_bokbooking_made_on;
	}
	
	/**
     * @param integer $bokbooking_made_on
     * @return self
     */
	public function setboktable_no_assigned($boktable_no_assigned)
	{
		$this->_boktable_no_assigned = $boktable_no_assigned;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getboktable_no_assigned()
	{
		return $this->_boktable_no_assigned;
	}
	
	/**
     * @param integer $bokbooking_type_id
     * @return self
     */
	public function setbokbooking_type_id($bokbooking_type_id)
	{
		$this->_bokbooking_type_id = $bokbooking_type_id;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokbooking_type_id()
	{
		return $this->_bokbooking_type_id;
	}
	
	/**
     * @param string $resrestaurant_name
     * @return self
     */
	public function setresrestaurant_name($resrestaurant_name)
	{
		$this->_resrestaurant_name = $resrestaurant_name;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getresrestaurant_name()
	{
		return $this->_resrestaurant_name;	
	}
	
	/**
     * @param string $resaddress
     * @return self
     */
	public function setresaddress($resaddress)
	{
		$this->_resaddress = $resaddress;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getresaddress()
	{
		return $this->_resaddress;
	}
	
	/**
     * @param string $bokbooking_type_code
     * @return self
     */
	public function setbokbooking_type_code($bokbooking_type_code)
	{
		$this->_bokbooking_type_code = $bokbooking_type_code;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokbooking_type_code()
	{
		return $this->_bokbooking_type_code;
	}
	
	/**
     * @param string $bokbooking_type_desc
     * @return self
     */
	public function setbokbooking_type_desc($bokbooking_type_desc)
	{
		$this->_bokbooking_type_desc = $bokbooking_type_desc;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokbooking_type_desc()
	{
		return $this->_bokbooking_type_desc;
	}
	
	
	/**
     * @param integer $boktableid
     * @return self
     */
	public function setboktableid($boktableid)
	{
		$this->_boktableid = $boktableid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getboktableid()
	{
		return $this->_boktableid;
	}
	
	/**
     * @param integer $boktablenumber
     * @return self
     */
	public function setboktablenumber($boktablenumber)
	{
		$this->_boktablenumber = $boktablenumber;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getboktablenumber()
	{
		return $this->_boktablenumber;
	}
	
	/**
     * @param string $contactInfo
     * @return self
     */
	public function setbokcontact_information($contactInfo)
	{
		$this->_contactInfo = $contactInfo;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokcontact_information()
	{
		return $this->_contactInfo;
	}
	
	/**
     * @param integer $bokreservation_mode_id
     * @return self
     */
	public function setbokreservation_mode_id($bokreservation_mode_id)
	{
		$this->_bokreservation_mode_id = $bokreservation_mode_id;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getbokreservation_mode_id()
	{
		return $this->_bokreservation_mode_id;
	}
	
	/**
     * @param string $bokreservation_mode_code
     * @return self
     */
	public function setbokreservation_mode_code($bokreservation_mode_code)
	{
		$this->_bokreservation_mode_code = $bokreservation_mode_code;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokreservation_mode_code()
	{
		return $this->_bokreservation_mode_code;
	}
	
	/**
     * @param string $bokreservation_mode_desc
     * @return self
     */
	public function setbokreservation_mode_desc($bokreservation_mode_desc)
	{
		$this->_bokreservation_mode_desc = $bokreservation_mode_desc;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokreservation_mode_desc()
	{
		return $this->_bokreservation_mode_desc;
	}
	
	/**
     * @param time $startTime
     * @return self
     */
	public function setStartTime($startTime)
	{
		$this->_statetime = $startTime;
		return $this;
	}
	
	/**
     * @return time
     */
	public function getStartTime()
	{
		return $this->_statetime;
	}
	
	/**
     * @param string $_bokrestaurant_note
     * @return self
     */
	public function setbokrestaurant_note($_bokrestaurant_note)
	{
		$this->_bokrestaurant_note = $_bokrestaurant_note;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getbokrestaurant_note()
	{
		return $this->_bokrestaurant_note;
	}
	
	/**
     * @param integer $schmaxreservation
     * @return self
     */
	public function setSchMaxReservation($schmaxreservation)
	{
		$this->_schmaxreservation = $schmaxreservation;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getSchMaxReservation()
	{
		return $this->_schmaxreservation;
	}
	
	/**
     * @param integer $tablesize
     * @return self
     */
	public function setTableSize($tablesize)
	{
		$this->_tablesize = $tablesize;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getTableSize()
	{
		return $this->_tablesize;
	}
	
	/**
     * @param integer $nooftables
     * @return self
     */
	public function setNoOfTables($nooftables)
	{
		$this->_nooftables = $nooftables;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getNoOfTables()
	{
		return $this->_nooftables;
	}
	
	/**
     * @param integer $notificationtype
     * @return self
     */
	public function setNotificationType($notificationtype)
	{
		$this->_notificationtype = $notificationtype;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getNotificationType()
	{
		return $this->_notificationtype;
	}
	
	/**
     * @param string $reschedulecode
     * @return self
     */
	public function setRescheduleCode($reschedulecode)
	{
		$this->_reschedulecode = $reschedulecode;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getRescheduleCode()
	{
		return $this->_reschedulecode;
	}
	
	/**
     * @param integer $ressch_status_id
     * @return self
     */
	public function setRessch_Status_Id($ressch_status_id)
	{
		$this->_ressch_status_id = $ressch_status_id;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getRessch_Status_Id()
	{
		return $this->_ressch_status_id;
	}
	
	/**
     * @param integer $inventoryid
     * @return self
     */
	public function setInventoryId($inventoryid)
	{
		$this->_inventoryid = $inventoryid;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getInventoryId()
	{
		return $this->_inventoryid;
	}
	
	/**
     * @param string $notiftypedesc
     * @return self
     */
	public function setNotificationTypeDesc($notiftypedesc)
	{
		$this->_notiftypedesc = $notiftypedesc;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getNotificationTypeDesc()
	{
		return $this->_notiftypedesc;
	}
	
	/**
     * @param integer $jointableno
     * @return self
     */
	public function setJoinTableNo($jointableno)
	{
		$this->_join_table_no = $jointableno;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getJoinTableNo()
	{
		return $this->_join_table_no;
	}
	
	/**
     * @param array $jointableno
     * @return self
     */
	public function setTableNoArray($tablenos)
	{
		$this->_table_no_array = $tablenos;
		return $this; 	
	}
	
	/**
     * @return array
     */
	public function getTableNoArray()
	{
		return $this->_table_no_array;
	}

	/**
     * @param time $timstamp
     * @return self
     */
	public function setBookingMadeTime($timstamp)
	{
		$this->_bokbooking_created_on = $timstamp;
		return $this; 	
	}
	
	/**
     * @return time
     */
	public function getBookingMadeTime()
	{
		return $this->_bokbooking_created_on;
	}
	
	public function setSpecialPrice($specialprice)
	{
		$this->_specialprice = $specialprice;
		return $this;
	}
	
	public function getSpecialPrice()
	{
		return $this->_specialprice;
	}
	
	public function setSpecialId($specialid)
	{
		$this->_specialid = $specialid;
		return $this;
	}
	
	public function getSpecialId()
	{
		return $this->_specialid;
	}
	
	/**
     * @param integer $diningid
     * @return self
     */
	public function setDiningId($diningid)
	{
		$this->_diningid = $diningid;
		return $this;
	}

	/**
     * @return integer
     */
	public function getDiningId()
	{
		return	$this->_diningid;
	}
	
	/**
     * @param integer $quotedtime
     * @return self
     */
	public function setQuotedTime($quotedtime)
	{
		$this->_bokquotedtime = $quotedtime;
		return $this;
	}

	/**
     * @return integer
     */
	public function getQuotedTime()
	{
		return	$this->_bokquotedtime;
	}
	
 	/**
     * @param integer $resphone
     * @return self
     */
	public function setResPhone($resphone)
	{
		$this->_resphone = $resphone;
		return $this;
	}
	
	/**
     * @return integer
     */
	public function getResPhone()
	{
		return $this->_resphone;
	}
	
	public function setResEmail($resemail)
	{
		$this->_resemail = $resemail;
		return $this;
	}
	
	public function getResEmail()
	{
		return $this->_resemail;
	}
	
	public function setResCity($rescity)
	{
		$this->_rescity = $rescity;
		return $this;
	}
	
	public function getResCity()
	{
		return $this->_rescity;
	}
	
	public function setResNeighborhood($resneighborhood)
	{
		$this->_resneighborhood = $resneighborhood;
		return $this;
	}
	
	public function getResNeighborhood()
	{
		return $this->_resneighborhood;
	}
	
	public function setResState($resstate)
	{
		$this->_resstate = $resstate;
		return $this;
	}
	
	public function getResState()
	{
		return $this->_resstate;
	}
	
	public function setResCountry($rescountry)
	{
		$this->_rescountry = $rescountry;
		return $this;
	}
	
	public function getResCountry()
	{
		return $this->_rescountry;
	}
	
	public function setResZipcode($reszipcode)
	{
		$this->_reszipcode = $reszipcode;
		return $this;
	}
	
	public function getResZipcode()
	{
		return $this->_reszipcode;
	}
	
	public function setbokresv_confirm_status($bokresv_confirm_status)
	{
		$this->_bokresv_confirm_status = $bokresv_confirm_status;
		return $this;
	}
	
	public function getbokresv_confirm_status()
	{
		return $this->_bokresv_confirm_status;
	}
	
	public function setbokbooking_confirm_status($bokbooking_confirm_status)
	{
		$this->_bokbooking_confirm_status = $bokbooking_confirm_status;
		return $this;
	}
	
	public function getbokbooking_confirm_status()
	{
		return $this->_bokbooking_confirm_status;
	}
	
	public function setbokresv_checkedin_status($bokresv_checkedin_status)
	{
		$this->_bokresv_checkedin_status = $bokresv_checkedin_status;
		return $this;
	}
	
	public function getbokresv_checkedin_status()
	{
		return $this->_bokresv_checkedin_status;
	}
	
	public function setbokbooking_user_initials($bokbooing_user_initials)
	{
		$this->_bokinitial = $bokbooing_user_initials;
		return $this;
	}
	
	public function getbokbooking_user_initials()
	{
		return $this->_bokinitial;
	}
	
	public function setbokcreatedby($bok_createdby)
	{
		$this->_bok_createdby = $bok_createdby;
		return $this;
	}
	
	public function getbokcreatedby()
	{
		return $this->_bok_createdby;
	}
	
	public function setbokseat_duration($bokseat_duration)
	{
		$this->_bokseat_duration = $bokseat_duration;
		return $this;
	}
	
	public function getbokseat_duration()
	{
		return $this->_bokseat_duration;
	}
	
	public function setbokseat_start($bokseat_start)
	{
		$this->_bokseat_start = $bokseat_start;
		return $this;
	}
	
	public function getbokseat_start()
	{
		return $this->_bokseat_start;
	}
	
	public function setblockStatus($block)
	{
		$this->_blockStatus = $block;
		return $this;
	}
	
	public function getblockStatus()
	{
		return $this->_blockStatus;
	}
	
	public function setblockAmount($block)
	{
		$this->_blockAmount = $block;
		return $this;
	}
	
	public function getblockAmount()
	{
		return $this->_blockAmount;
	}
	
	public function setblockDescription($block)
	{
		$this->_blockDesc = $block;
		return $this;
	}
	
	public function getblockDescription()
	{
		return $this->_blockDesc;
	}
	
	public function setReservationMeal($ReservationMeal)
	{
		$this->_mealid = $ReservationMeal;
		return $this;
	}
	
	public function getReservationMeal()
	{
		return $this->_mealid;
	}
	
	public function setbokoptions($bokoptions)
	{
		$this->_bokoptions = $bokoptions;
		return $this;
	}
	
	public function getbokoptions()
	{
		return $this->_bokoptions;
	}
	
	public function setboksecoptions($boksecoptions)
	{
		$this->_boksecoptions = $boksecoptions;
		return $this;
	}
	
	public function getboksecoptions()
	{
		return $this->_boksecoptions;
	}
	
	public function setbokoptioncode($bokoptioncode)
	{
		$this->_bokoptioncode = $bokoptioncode;
		return $this;
	}
	
	public function getbokoptioncode()
	{
		return $this->_bokoptioncode;
	}
	
	public function setbokoptionsid($bokoptionsid)
	{
		$this->_bokoptionsid = $bokoptionsid;
		return $this;
	}
	
	public function getbokoptionsid()
	{
		return $this->_bokoptionsid;
	}
	
	public function setbokbookingphrase($bokbookingphrase)
	{
		$this->_bokbooking_phrase = $bokbookingphrase;
		return $this;
	}
	
	public function getbokbookingphrase()
	{
		return $this->_bokbooking_phrase;
	}
	
	public function setbok_restsch_setting_id($bok_restsch_setting_id)
	{
		$this->_bok_restsch_setting_id = $bok_restsch_setting_id;
		return $this;
	}
	
	public function getbok_restsch_setting_id()
	{
		return $this->_bok_restsch_setting_id;
	}
	
	public function setbok_restsch_setting_type($bok_restsch_setting_type)
	{
		$this->_bok_restsch_setting_type = $bok_restsch_setting_type;
		return $this;
	}
	
	public function getbok_restsch_setting_type()
	{
		return $this->_bok_restsch_setting_type;
	}
	public function setbokresv_runninglate_status($bokresv_runninglate_status)
	{
		$this->_bokresv_runninglate_status = $bokresv_runninglate_status;
		return $this;
	}
	
	public function getbokresv_runninglate_status()
	{
		return $this->_bokresv_runninglate_status;
	}
	
	public function setbokseat_end($bokseat_end)
	{
		$this->_bokseat_end = $bokseat_end;
		return $this;
	}
	
	public function getbokseat_end()
	{
		return $this->_bokseat_end;
	}
	
	public function setbokcountry_code($countrycode)
	{
		$this->_countrycode = $countrycode;
		return $this;
	}
	
	public function getbokcountry_code()
	{
		return $this->_countrycode;
	}

	
	public function setResCountrycode($rescountrycode)
	{
		$this->_rescountrycode = $rescountrycode;
		return $this;
	}
	
	public function getResCountrycode()
	{
		return $this->_rescountrycode;
	}
	
	public function setRestimage($restimage)
	{
		$this->_restimage = $restimage;
		return $this;
	}

	public function getRestimage()
	{
		return $this->_restimage;
	}

	public function setCusAdrress($CusAdrress)
	{
		$this->_cusadrress = $CusAdrress;
		return $this;
	}

	public function getCusAdrress()
	{
		return $this->_cusadrress;
	}
	
	public function setCusCompany($CusCompany)
	{
		$this->_cuscompany = $CusCompany;
		return $this;
	}

	public function getCusCompany()
	{
		return $this->_cuscompany;
	}
	
	public function setCusDesig($CusDesig)
	{
		$this->_cusdesig = $CusDesig;
		return $this;
	}

	public function getCusDesig()
	{
		return $this->_cusdesig;
	}
	
	public function setCusAllergy($CusAllergy)
	{
		$this->_cusallergy = $CusAllergy;
		return $this;
	}

	public function getCusAllergy()
	{
		return $this->_cusallergy;
	}
	
	public function setsplstatus($splstatus)
	{
		$this->_splstatus = $splstatus;
		return $this;
	}

	public function getsplstatus()
	{
		return $this->_splstatus;
	}
	
	public function setbokresv_partialarrived_status($bokresv_partialarrived_status)
	{
		$this->_bokresv_partialarrived_status = $bokresv_partialarrived_status;
		return $this;
	}

	public function getbokresv_partialarrived_status()
	{
		return $this->_bokresv_partialarrived_status;
	}
	
	public function setbokresv_allarrived_status($bokresv_allarrived_status)
	{
		$this->_bokresv_allarrived_status = $bokresv_allarrived_status;
		return $this;
	}

	public function getbokresv_allarrived_status()
	{
		return $this->_bokresv_allarrived_status;
	}
	public function setbokcontactid($bokcontactid)
	{
		$this->_bokcontactid = $bokcontactid;
		return $this;
	}

	public function getbokcontactid()
	{
		return $this->_bokcontactid;
	}
	
	public function setbokwaittime_start($bokwaittime_start)
	{
		$this->_bokwaittime_start = $bokwaittime_start;
		return $this;
	}
	
	public function getbokwaittime_start()
	{
		return $this->_bokwaittime_start;
	}
	public function setbokcompany_id($bokcompany_id)
	{
		$this->_bokcompany_id = $bokcompany_id;
		return $this;
	}
	
	public function getbokcompany_id()
	{
		return $this->_bokcompany_id;
	}
	public function setfeedback_status($feedback_status)
	{
		$this->_feedback_status = $feedback_status;
		return $this;
	}
	
	public function getfeedback_status()
	{
		return $this->_feedback_status;
	}
	
	public function settablet_book_id($tablet_book_id)
	{
		$this->_tablet_book_id = $tablet_book_id;
		return $this;
	}
	
	public function gettablet_book_id()
	{
		return $this->_tablet_book_id;
	}
	
	public function setguest_notes($guest_notes)
	{

		$this->_guest_notes = $guest_notes;
		return $this;
	}
	
	public function getguest_notes()
	{
		return $this->_guest_notes;
	}
	
	public function setbok_notified($notified)
	{
		$this->_notified = $notified;
		return $this;
	}
	
	public function getbok_notified()
	{
		return $this->_notified;
	}
	
	public function setbok_phnnotreceive($phnnotreceive)
	{
		$this->_phnnotreceive = $phnnotreceive;
		return $this;
	}
	
	public function getbok_phnnotreceive()
	{
		return $this->_phnnotreceive;
	}
	
	public function setres_contactNotify($rescontactNotify)
	{
		$this->_res_contactNotify = $rescontactNotify;
		return $this;
	}
	
	public function getres_contactNotify()
	{ 
		return $this->_res_contactNotify;
	}
	
	public function setresOwnerName($resownerName)
	{
		$this->_resownerName = $resownerName;
		return $this;
	}
	
	public function getresOwnerName()
	{ 
		return $this->_resownerName;
	}
	
	public function setresOwnerPhone($resownerPhone)
	{
		$this->_resownerPhone = $resownerPhone;
		return $this;
	}
	
	public function getresOwnerPhone()
	{ 
		return $this->_resownerPhone;
	}

	public function setresTechName($restechName)
	{
		$this->_restechName = $restechName;
		return $this;
	}
	
	
	public function getresTechName()
	{ 
		return $this->_restechName;
	}
	
	public function setresTechPhone($restechPhone)
	{
		$this->_restechPhone = $restechPhone;
		return $this;
	}
	
	
	public function getresTechPhone()
	{ 
		return $this->_restechPhone;
	}
	
	public function setresTechEmail($restechEmail)
	{
		$this->_restechEmail = $restechEmail;
		return $this;
	}
	
	
	public function getresTechEmail()
	{ 
		return $this->_restechEmail;
	}
	
	public function setresBillName($resbillName)
	{
		$this->_resbillName = $resbillName;
		return $this;
	}
	
	
	public function getresBillName()
	{ 
		return $this->_resbillName;
	}
	
	public function setresBillPhone($resbillPhone)
	{
		$this->_resbillPhone = $resbillPhone;
		return $this;
	}
	
	
	public function getresBillPhone()
	{ 
		return $this->_resbillPhone;
	}
	
	public function setresBillEmail($resbillEmail)
	{
		$this->_resbillEmail = $resbillEmail;
		return $this;
	}
	
	public function getresBillEmail()
	{ 
		return $this->_resbillEmail;
	}
	
	public function setresOwnerCountryCode($resownerCountryCode)
	{
		$this->_resownerCountryCode = $resownerCountryCode;
		return $this;
	}
	
	public function getresOwnerCountryCode()
	{ 
		return $this->_resownerCountryCode;
	}
	
	public function setresTechCountryCode($restechCountryCode)
	{
		$this->_restechCountryCode = $restechCountryCode;
		return $this;
	}
	
	public function getresTechCountryCode()
	{ 
		return $this->_restechCountryCode;
	}
	
	public function setresBillCountryCode($resbillCountryCode)
	{
		$this->_resbillCountryCode = $resbillCountryCode;
		return $this;
	}
	
	public function getresBillCountryCode()
	{ 
		return $this->_resbillCountryCode;
	}
	
	public function setresOwnerId($resownerId)
	{
		$this->_resownerId = $resownerId;
		return $this;
	}
	
	public function getresOwnerId()
	{ 
		return $this->_resownerId;
	}
	
	public function setresManagerName($resmanagerName)
	{
		$this->_resmanagerName = $resmanagerName;
		return $this;
	}
	
	public function getresManagerName()
	{ 
		return $this->_resmanagerName;
	}
			
	public function setrestarantname($restarantname)
	{
		$this->_restarantname = $restarantname;
		return $this;
	}
	
	public function getrestarantname()
	{
		return $this->_restarantname;
	}
	
	public function setquotetimedesc($quotetimedesc)
	{
		$this->_quotetimedesc = $quotetimedesc;
		return $this;
	}
	
	public function getquotetimedesc()
	{
		return $this->_quotetimedesc;
	}
	
	public function setbokupdateddatetime($bokupdateddatetime)
	{
		$this->_bokupdateddatetime = $bokupdateddatetime;
		return $this;
	}
	
	public function getbokupdateddatetime()
	{
		return $this->_bokupdateddatetime;
	}
	
	public function setbooktable($booktable)
	{
		$this->_booktable = $booktable;
		return $this;
	}
	
	public function getbooktable()
	{
		return $this->_booktable;
	}
	
	public function setres_company_resid($res_company_resid)
	{
		$this->_res_company_resid = $res_company_resid;
		return $this;
	}
	
	public function getres_company_resid()
	{
		return $this->_res_company_resid;
	}
	
	public function setres_company_url($res_company_url)
	{
		$this->_res_company_url = $res_company_url;
		return $this;
	}
	
	public function getres_company_url()
	{
		return $this->_res_company_url;
	}
}