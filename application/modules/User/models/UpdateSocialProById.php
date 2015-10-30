<?php

class User_Model_UpdateSocialProById
{
	private $_id;
	
	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	

}

