<?php

class User_Model_DbTable_Client extends Zend_Db_Table_Abstract
{

    protected $_name = 'rd.user';
	
    protected $_dependenetTables = array(
	'User_Model_DbTable_Customer'
	);

}

