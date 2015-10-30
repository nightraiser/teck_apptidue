<?php
/**
*	Name			: EnquiryStatus.php
*	Author			: Sairam
*	Creation Date	: 28/03/2012
*	Path 			: application/models/EnquiryStatus.php
*	Description		: This is the Model class for the Enquiry Status basedata table.
*/

class Application_Model_EnquiryStatus
{
	/**
	 * 
	 * @var integer
	 */
	protected $_id;
	
	/**
	 * 
	 * @var string
	 */
	protected $_code;
	
	/**
	 * 
	 * @var string
	 */
	protected $_description;
	
	/**
	 * 
	 * @var boolean
	 */
	protected $_status;
	
	/**
     * Public constructor
     *
     * @param  array $options
     */		
	public function __construct(array $options = null)
	{
		if(is_array($options)){
			$this->setOptions($options);
		}		
	}
	
	/**
	 * Writing data to properties
	 */
	public function __set($name, $value)
	{
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid EnquiryStatus_BD property');
		}
		$this->$method($value);
	}
	
	/**
	 * Reading data from properties
	 */
	public function __get($name)
	{
		$method = 'get' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
			throw new Exception('Invalid EnquiryStatus_BD property');
		}
		return $this->$method();
	}
	
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods)) {
				$this->$method($value);
			}
		}
		return $this;
	}
	
	/**
     * @param integer $id
     * @return self
     */
	public function setId($id)
	{
		$this->_id = $id;
		return $this;
	}
	
	 /**
     * @return integer
     */
	public function getId()
	{
		return $this->_id;
	}
	
	/**
     * @param string $code
     * @return self
     */
	public function setCode($code)
	{
		$this->_code = $code;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getCode()
	{
		return $this->_code;
	}
	
	/**
     * @param string $description
     * @return self
     */
	public function setDescription($description)
	{
		$this->_description = $description;
		return $this;
	}
	
	/**
     * @return string
     */
	public function getDescription()
	{
		return $this->_description;
	}
	
	/**
     * @param boolean $status
     * @return self
     */
	public function setStatus($status)
	{
		$this->_status = $status;
		return $this;
	}
	
	/**
     * @return boolean
     */
	public function getStatus()
	{
		return $this->_status;
	}

}