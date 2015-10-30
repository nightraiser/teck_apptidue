<?php

/**
* Includes data fromat for LIST JSON
*/
class Listjson 
{
	protected $_id;
	protected $_category;
	protected $_title;
	protected $_location;
	protected $_latitude;
	protected $_longitude;
	protected $_url;
	protected $_type;
	protected $_type_icon;
	protected $_rating;
	protected $_image;
	protected $_item_specific;
		
	public function __construct(array $options)
	{
		if(is_array($options))
		{

			$this->setOptions($options);
		}
	}

		public function setId($value)
		{
		    $this->_id=$value;
		    return $this;
		}
		public function setCategory($value)
		{
		    $this->_category=$value;
		    return $this;
		}
		public function setTitle($value)
		{
		    $this->_title=$value;
		    return $this;
		}
		public function setLocation($value)
		{
		    $this->_location=$value;
		    return $this;
		}
		public function setLatitude($value)
		{
		    $this->_latitude=$value;
		    return $this;
		}
		public function setLongitude($value)
		{
		    $this->_longitude=$value;
		    return $this;
		}
		public function setUrl($value)
		{
		    $this->_url=$value;
		    return $this;
		}
		public function setType($value)
		{
		    $this->_type=$value;
		    return $this;
		}
		public function setType_icon($value)
		{
		    $this->_type_icon=$value;
		    return $this;
		}
		public function setRating($value)
		{
		    $this->_rating=$value;
		    return $this;
		}
		public function setImage($value)
		{
		    $this->_image=$value;
		    return $this;
		}
		public function setItem_specific($value)
		{
		    $this->_item_specific=$value;
		    return $this;
		}
		public function getId()
		{
		    return $this->_id;
		}
		public function getCategory()
		{
		    return $this->_category;
		}
		public function getTitle()
		{
		    return $this->_title;
		}
		public function getLocation()
		{
		    return $this->_location;
		}
		public function getLatitude()
		{
		    return $this->_latitude;
		}
		public function getLongitude()
		{
		    return $this->_longitude;
		}
		public function getUrl()
		{
		    return $this->_url;
		}
		public function getType()
		{
		    return $this->_type;
		}
		public function getType_icon()
		{
		    return $this->_type_icon;
		}
		public function getRating()
		{
		    return $this->_rating;
		}
		public function getImage()
		{
		    return $this->_image;
		}
		public function getItem_specific()
		{
		    return $this->_item_specific;
		}
}