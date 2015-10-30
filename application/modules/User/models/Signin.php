<?php
class User_Model_Signin
{
	private $_emailaddress;
	private $_password;
	private $_logintype;
	
	public function setEmailAddress($emailaddress)
	{
		$this->_emailaddress = $emailaddress;
		return $this;
	}
	
	public function getEmailAddress()
	{
		return $this->_emailaddress;
	}
	public function setPassword($password)
	{
		$this->_password = $password;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
	
	public function setLoginType($logintype)
	{
		$this->_logintype = $logintype;
		return $this;		
	}
	
	public function getLoginType()
	{
		return $this->_logintype;
	}
}
