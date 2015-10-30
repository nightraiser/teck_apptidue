<?php

class Restaurant_Model_RestNamesByOwnerId
{
	private $_restownerid;
	private $_restid;
	
	public function setRestOwnerId($restownerid)
	{
		$this->_restownerid = $restownerid;
		return $this;
	}

	public function getRestOwnerId()
	{
		return $this->_restownerid;
	}

	public function setRestId($restid)
	{
		$this->_restid = $restid;
		return $this;
	}

	public function getRestId()
	{
		return $this->_restid;
	}
}

