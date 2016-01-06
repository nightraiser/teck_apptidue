<?php
/**
*	Name			: RestaurantTagsbd.php
*	Author			: eshwar
*	Creation Date	: 9/2/2015
*	Path 			: application/models/RestaurantTagsbd.php
*	Description		: This is the model class for fetching features of restaurant.
*					   	
*/
class Application_Model_Providersbd
{
	protected $_id;
	protected $_description;
	protected $_status;
	protected $_code;

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

	public function setCode($value)
	{
		$this->_code=$value;
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

	public function getCode()
	{
		return $this->_code;
	}
}

