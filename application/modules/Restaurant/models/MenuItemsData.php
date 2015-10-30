<?
class Restaurant_Model_MenuItemsData
{
	 protected  $_miid;	
	 protected  $_mi_fk_mcid;	
	 protected  $_mi_name;	
	 protected  $_mi_description;	
	 protected	$_mi_price;	
	 protected  $_mi_type;	
	 protected  $_mi_image;	
	 protected  $_mi_status;	
	 protected  $_mi_likes;	
	 protected  $_mi_dislikes;	
	 protected  $_mi_reviews;
	 protected  $_mi_createdby;	
	 protected  $_mi_createddatetime;	
	 protected  $_mi_updatedby;	
	 protected  $_mi_updateddatetime;		
	 protected  $_mi_ordersequence; 
		
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
public function setMiid($value)
{
	$this->_miid=$value;
	return $this;
}
public function setMifk_categoryid($value)
{
	$this->_mi_fk_mcid=$value;
	return $this;
}
public function setMi_name($value)
{
	$this->_mi_name=$value;
	return $this;
}
public function setMi_description($value)
{
	$this->_mi_description=$value;
	return $this;
}
public function setMi_price($value)
{
	$this->_mi_price=$value;
	return $this;
}
public function setMi_type($value)
{
	$this->_mi_type=$value;
	return $this;
}
public function setMi_image($value)
{
	$this->_mi_image=$value;
	return $this;
}
public function setMi_status($value)
{
	$this->_mi_status=$value;
	return $this;
}
public function setMi_likes($value)
{
	$this->_mi_likes=$value;
	return $this;
}
public function setMi_dislikes($value)
{
	$this->_mi_dislikes=$value;
	return $this;
}
public function setMi_reviews($value)
{
	$this->_mi_reviews=$value;
	return $this;
}
public function setMi_createdby($value)
{
	$this->_mi_createdby=$value;
	return $this;
}
public function setMi_createddatetime($value)
{
	$this->_mi_createddatetime=$value;
	return $this;
}
public function setMi_updatedby($value)
{
	$this->_mi_updatedby=$value;
	return $this;
}
public function setMi_updateddatetime($value)
{
	$this->_mi_updateddatetime=$value;
	return $this;
}
public function setMi_ordersequence($value)
{
	$this->_mi_ordersequence=$value;
	return $this;
}

public function getMiid()
{
	return $this->_miid;
}
public function getMifk_categoryid()
{
	return $this->_mi_fk_mcid;
}
public function getMi_name()
{

	return $this->_mi_name;
}
public function getMi_description()
{
	return $this->_mi_description;
}
public function getMi_price()
{
	return $this->_mi_price;
}
public function getMi_type()
{
	return $this->_mi_type;
}
public function getMi_image()
{
	return $this->_mi_image;
}
public function getMi_status()
{
	return $this->_mi_status;
}
public function getMi_likes()
{
	return $this->_mi_likes;
}
public function getMi_dislikes()
{
	return $this->_mi_dislikes;
}
public function getMi_reviews()
{
	return $this->_mi_reviews;
}
public function getMi_createdby()
{
	return $this->_mi_createdby;
}
public function getMi_createddatetime()
{
	return $this->_mi_createddatetime;
}
public function getMi_updatedby()
{
	return $this->_mi_updatedby;
}
public function getMi_updateddatetime()
{
	return $this->_mi_updateddatetime;
}
public function getMi_ordersequence()
{
	return $this->_mi_ordersequence;
}


}