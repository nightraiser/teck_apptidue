<?php
class User_Model_FevRestById
{
	private $_userid;
	
	public function setUserId($userid)
	{
		$this->_userid = $userid;
		return $this;
	}
	
	public function getUserId()
	{
		return $this->_userid;
	}

}
