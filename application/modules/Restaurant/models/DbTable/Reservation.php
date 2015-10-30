<?php
/**
*	Name			: Reservation.php
*	Author			: Zubair Ahmed
*	Creation Date	: 09/30/2010
*	Path 			: application/modules/Reservation/models/DbTable/Reservation.php
*	Description		: This is the DbTable class for the booking a table.
*/
class Restaurant_Model_DbTable_Reservation extends Zend_Db_Table_Abstract
{
	/** Table name */
    protected $_name = 'rd.booking';
}

