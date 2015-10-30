<?php
/**
*     Name              : Timezonebd.php
*     Author                  : eshwar
*     Creation Date     : 9/2/2015
*     Path              : application/models/Timezonebd.php
*     Description       : This is model class to fetch timezones of countries.
*                                   
*/
class Application_Model_Timezonebd
{
	protected $_id;
	protected $_code;
	protected $_description;
	protected $_status;
	protected $_country_id;

	public function __construct(array $options)
	{
		try
		{	
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
		$this->_id=$value;
		return $this;
	}

	public function setCode($value)
	{
		$this->_code=$value;
		return $this;
	}

	public function setDescription($value)
	{
		$this->_description=$value;
		return $this;
	}

	public function setStatus($value)
	{
		$this->_status=$value;
		return $this;
	}

	public function setCountry_id($value)
	{
		$this->_country_id=$value;
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
	
	public function getCountry_id()
	{
		return $this->_country_id;	
	}
}

