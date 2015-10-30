<?php

class Restaurant_Model_DbTable_RestaurantVisitors extends Zend_Db_Table_Abstract
{

    protected $_name = 'rd.restaurant_visitors_list';
	
    protected $_dependenetTables = array(
	'User_Model_DbTable_Customer'
	);

}

