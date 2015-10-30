<?php

class User_Model_DbTable_Customer extends Zend_Db_Table_Abstract
{
    protected $_name = 'rd.customer';
	
    protected $_referenceMap = array(
	'User' => array(
		'columns' => 'cusfk_user',
		'refTableClass' => 'User_Model_DbTable_Client',
		'refcolumns'    => 'usrid'
	),
	);
}

