<?php
/**
*     Name              : Country.php
*     Author                  : eshwar
*     Creation Date     : 9/2/2015
*     Path              : application/models/Country.php
*     Description       : This is model class to fetch Countrries.
*                                   
*/
class Application_Model_Countrybd
{
	protected $_id;
	protected $_code;
	protected $_description;
	protected $_status;
	protected $_currency_code;
	protected $_country_flag;
	protected $_country_dial_code;
	protected $_timezone;

	public function __construct(array $options)
	{	try{
			if(is_array($options))
			{
				$this->setOptions($options);
			}
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function setOptions(array $arr)
	{
		try
		{
			$methods = get_class_methods($this);
			foreach ($arr as $key => $value) 
			{
				$method = 'set'.ucfirst($key);
				if(in_array($method, $methods))
				{
					$this->$method($value);
				}
			}
		}
		catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function setId($value)
	{
		$this->_id = $value;
		return $this;
	}

	public function setCode($value)
	{
		$this->_code = $value;
		return $this;
	}

	public function setDescription($value)
	{
		$this->_description = $value;
		return $this;
	}

	public function setStatus($value)
	{
		$this->_status = $value;
		return $this;
	}

	public function setCurrency_code($value)
	{
		$this->_currency_code = $value;
		return $this;
	}

	public function setCountry_flag($value)
	{
		$this->_country_flag = $value;
		return $this;
	}

	public function setCountry_dial_code($value)
	{
		$this->_country_dial_code = $value;
		return $this;
	}

	public function setTimezone($value)
	{
		$this->_timezone = $value;
		return $this;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function getCode()
	{
		return $this->_code;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	public function getCurrency_code()
	{
		return $this->_currency_code;
	}

	public function getCountry_flag()
	{
		return $this->_country_flag;
	}

	public function getCountry_dial_code()
	{
		return $this->_country_dial_code;
	}

	public function getTimezone()
	{
		return $this->_timezone;
	}

}

