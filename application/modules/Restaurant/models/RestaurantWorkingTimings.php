<?php
/**
            *   Name            : RestaurantWokingTimings.php
            *   Author          : Sai
            *   Creation Date   : 8-9-2015
            *   Path            : application/modules/Restaurant/models/RestaurantWokingTimings
            *   Description     : This includes timming functions for restaurant table
            *                       
            */
/**
* 
*/
class Restaurant_Model_RestaurantWrokingTimings
{
protected $_rwt_id;
protected $_rwt_fk_restaurant;
protected $_rwt_week_day;
protected $_rwt_sch_type;
protected $_rwt_start_time;
protected $_rwt_end_time;
protected $_rwt_created_by;
protected $_rwt_updated_by;
protected $_rwt_created_time;
protected $_rwt_updated_time;
protected $_status;
public function __construct($options = null){
	if(is_array($options))
	{
		$this->setOptions($options);
	}
}

public function setOptions(array $arr){
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
public function setRwt_id($value)
{
	$this->_rwt_id = $value;
	return $this;
}
public function setRwt_fk_restaurant($value)
{
	$this->_rwt_fk_restaurant = $value;
	return $this;
}
public function setRwt_week_day($value)
{
	$this->_rwt_week_day = $value;
	return $this;
}
public function setRwt_sch_type($value)
{
	$this->_rwt_sch_type = $value;
	return $this;
}
public function setRwt_start_time($value)
{
	$this->_rwt_start_time = $value;
	return $this;
}
public function setRwt_end_time($value)
{
	$this->_rwt_end_time = $value;
	return $this;
}
public function setRwt_created_by($value)
{
	$this->_rwt_created_by = $value;
	return $this;
}
public function setRwt_updated_by($value)
{
	$this->_rwt_updated_by = $value;
	return $this;
}
public function setRwt_created_time($value)
{
	$this->_rwt_created_time = $value;
	return $this;
}
public function setRwt_updated_time($value)
{
	$this->_rwt_updated_time = $value;
	return $this;
}
public function setStatus($value)
{
	$this->_status = $value;
	return $this;
}
public function getRwt_id()
{
	return $this->_rwt_id;
}
public function getRwt_fk_restaurant()
{
	return $this->_rwt_fk_restaurant;
}
public function getRwt_week_day()
{
	return $this->_rwt_week_day;
}
public function getRwt_sch_type()
{
	return $this->_rwt_sch_type;
}
public function getRwt_start_time()
{
	return $this->_rwt_start_time;
}
public function getRwt_end_time()
{
	return $this->_rwt_end_time;
}
public function getRwt_created_by()
{
	return $this->_rwt_created_by;
}
public function getRwt_updated_by()
{
	return $this->_rwt_updated_by;
}
public function getRwt_created_time()
{
	return $this->_rwt_created_time;
}
public function getRwt_updated_time()
{
	return $this->_rwt_updated_time;
}
public function getStatus()
{
	return $this->_status;
}
}