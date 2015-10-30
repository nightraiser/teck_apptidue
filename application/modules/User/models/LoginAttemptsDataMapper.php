<?php
class User_Model_LoginAttemptsDataMapper
{
	protected $_dbTable;

	public function setDbTable($dbTable)
	{
		if (is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
			throw new Exception('Invalid table data gateway provided');
		}
		$this->_dbTable = $dbTable;
		return $this;
	}

	public function getDbTable()
	{
		if (null === $this->_dbTable) {
		$this->setDbTable('User_Model_DbTable_LoginAttempts');
		}
		return $this->_dbTable;
	}
	
	public function ManageInavlidLoginAttempts($email)
	{
		try{
			$attempts = 0;
			$select = $this->getDbTable()->select();
			$select->from($this->getDbTable(),array('ila_attempts as attempts','ila_time'))
					->where('lia_email = ?',$email)
					->where('ila_date = ?',date('Y-m-d'));
			$result = $this->getDbTable()->fetchRow($select);
			
			if($result == null)
			{
				$attempts = $attempts + 1;
				$data = array(
							'lia_email' 	=> $email,
							'ila_attempts' 	=> $attempts,
							'ila_date'		=> date('Y-m-d'),
							'ila_time'		=> date("H:i:s")
						);
		
				$roweff = $this->getDbTable()->insert($data);
			}else{
				
				$prvtime = strtotime($result->ila_time);
				$curtime = time();
				
				$dif = $curtime-$prvtime;
				$dif = date('i', $dif);
				
				if($dif <= 5){
					$attempts = $result->attempts;
					
					$attempts = $attempts + 1;
					$set = array('ila_attempts' => $attempts,
								 'ila_time'		=> date("H:i:s")
							);
				}else{
					$attempts = 1;
					$set = array('ila_attempts' => $attempts,
								 'ila_time'		=> date("H:i:s")
							);
				}
					
				$where = array(
							'lia_email = ?' => $email,
							'ila_date = ?' 	=> date('Y-m-d')
						);

				$roweff = $this->getDbTable()->update($set,$where);
			}	
			return $attempts;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function UpdateLoginAttempts($email)
	{
		try{
			$attempts = 0;
			
			$set = array('ila_attempts' => $attempts,
						 'ila_time'		=> date("H:i:s")
						);
				
			$where = array(
						'lia_email = ?' => $email,
						'ila_date = ?' 	=> date('Y-m-d')
					);

			$roweff = $this->getDbTable()->update($set,$where);
				
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}