<?php
class Restaurant_Model_GetRestaurantTimings
{
	private $_restid;
	private $_time;
	private $_date;
	private $_day;
    private $_weekday_id;
    private $_splid;
	private $_partysize;
	private $_splschid;
	private $_splschdate;
	private $_schtype;
	private $_tableid;
	private $_resType;
	private $_mealType;
	
	public function setRestId($restid)
	{
		$this->_restid = $restid;
		return $this;
	}
	
	public function getRestId()
	{		
		return $this->_restid;
	}
	
	public function setTime($time)
	{
		$this->_time = $time;
		return $this;
	}
	
	public function getTime()
	{
		return $this->_time;
	}
	
	public function setDate($date)
	{
		$this->_date = $date;
		return $this;
	}
	
	public function getDate()
	{
		return $this->_date;
	}
	
	public function setpartysize($partysize)
	{
		$this->_partysize = $partysize;
		return $this;
	}
	
	public function getpartysize()
	{
		return $this->_partysize;
	}
	
	public function setsplschid($splschid)
	{
		$this->_splschid = $splschid;
		return $this;
	}
	
	public function getsplschid()
	{
		return $this->_splschid;
	}
	
	public function setsplschdate($splschdate)
	{
		$this->_splschdate = $splschdate;
		return $this;	
	}
	
	public function getsplschdate()
	{
		return $this->_splschdate;
	}
	
	public function setschtype($schtype)
	{
		$this->_schtype = $schtype;
		return $this;
	}
	
	public function getschtype()
	{
		return $this->_schtype;
	}
	
	public function setDay($day)
    {
    	$this->_day = $day;
    	return $this;
    }
    
    public function getDay()
    {
    	return $this->_day;
    }
    
	public function setWeekDayId($weekday_id)
	{
		$this->_weekday_id = $weekday_id;
		return $this;
	}
	
	public function getWeekDayId()
	{
		return $this->_weekday_id;
	}
	
	public function setSplId($spl)
	{
		$this->_splid = $spl;
		return $this;
	}
	
	public function getSplId()
	{
		return $this->_splid;
	}
	
	public function setTableId($Table)
	{
		$this->_tableid = $Table;
		return $this;
	}
	
	public function getTableId()
	{
		return $this->_tableid;
	}
	
	public function setResType($ResType)
	{
		$this->_resType = $ResType;
		return $this;
	}
	
	public function getResType()
	{
		return $this->_resType;
	}
	
	public function setMealType($MealType)
	{
		$this->_mealType = $MealType;
		return $this;
	}
	
	public function getMealType()
	{
		return $this->_mealType;
	}
}