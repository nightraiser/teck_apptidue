<?php
/**
*     Name              : Neighborhoodbd.php
*     Author                  : eshwar
*     Creation Date     : 9/2/2015
*     Path              : application/models/Neighborhoodbd.php
*     Description       : This is model class to fetch Neighborhood.
*                                   
*/
class Application_Model_Neighborhoodbd
{
	protected $_id;
	protected $_description;
	protected $_status;
	protected $_city_id;
	protected $_state_id;
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
		$this->_id = $value;
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

	public function setCity_id($value)
	{
		$this->_currency_cod = $valuee;
		return $this;
	}

	public function setState_id($value)
	{
		$this->_state_id = $value;
		return $this;
	}

	public function setCountry_id($value)
	{
		$this->_country_dial = $value;
		return $this;
	}


	public function getId()
	{
		return $this->_id;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function getStatus()
	{
		return $this->_status;
	}

	public function getCity_id()
	{
		return $this->_city_id;
	}

	public function getState_id()
	{
		return $this->_state_id;
	}

	public function getCountry_id()
	{
		return $this->_country_id;
	}
}

