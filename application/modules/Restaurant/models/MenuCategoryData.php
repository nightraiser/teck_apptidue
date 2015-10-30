<?php
class Restaurant_Model_MenuCategoryData
{

protected $_mcid;	
protected $_mc_fk_mrid;	
protected $_mc_name;	
protected $_mc_description;	
protected $_mc_image;	
protected $_mc_status;	
protected $_mc_createdby;	
protected $_mc_createddatetime;	
protected $_mc_updatedby;	
protected $_mc_updateddatetime;	


public function __construct($options)
	{
		
		if(is_array($options))
		{

			$this->setOptions($options);
		}
	}

public function setOptions(array $arr)
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
		return $this;
	}

public function setMcid($value)
{
	$this->_mcid=$value;
	return $this;
}
public function setMc_fk_mrid($value)
{
	$this->_mc_fk_mrid=$value;
	return $this;
}
public function setMc_name($value)
{
	$this->_mc_name=$value;
	return $this;
}
public function setMc_description($value)
{
	$this->_mc_description=$value;
	return $this;
}
public function setMc_image($value)
{
	$this->_mc_image=$value;
	return $this;
}
public function setMc_status($value)
{
	$this->_mc_status=$value;
	return $this;
}
public function setMc_createdby($value)
{
	$this->_mc_createdby=$value;
	return $this;
}
public function setMc_createddatetime($value)
{
	$this->_mc_createddatetime=$value;
	return $this;
}
public function setMc_updatedby($value)
{
	$this->_mc_updatedby=$value;
	return $this;
}
public function setMc_updateddatetime($value)
{
	$this->_mc_updateddatetime=$value;
	return $this;
}

public function getMcid($value)
{
	return $this->_mcid;
}
public function getMc_fk_mrid($value)
{
	return $this->_mc_fk_mrid;
}
public function getMc_name($value)
{
	return $this->_mc_name;
}
public function getMc_description($value)
{
	return $this->_mc_description;
}
public function getMc_image($value)
{
	return $this->_mc_image;
}
public function getMc_status($value)
{
	return $this->_mc_status;
}
public function getMc_createdby($value)
{
	return $this->_mc_createdby;
}
public function getMc_createddatetime($value)
{
	return $this->_mc_createddatetime;
}
public function getMc_updatedby($value)
{
	return $this->_mc_updatedby;
}
public function getMc_updateddatetime($value)
{
	return $this->_mc_updateddatetime;
}
	




}