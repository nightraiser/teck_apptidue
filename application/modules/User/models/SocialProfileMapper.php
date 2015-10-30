<?php

class User_Model_SocialProfileMapper
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
			$this->setDbTable('User_Model_DbTable_CusSocialMedia');
		}
		return $this->_dbTable;
	}
	
	public function save(User_Model_SocialProfile  $socialmedia)
	{
		try{
			$data = array(
				'cspcustomerid'				=> 	$socialmedia->getCustomerid(),
				'cspsocial_media_userid'	=>	$socialmedia->getEmailid(),			
				'cspsocial_media_type_id' 	=> 	$socialmedia->getMediatype(),
				'cspcreatedon' 				=> 	$socialmedia->getCreatedon(),
				'cspstatus' 				=> 	$socialmedia->getUserStatusid(),			
			);
			$table = $this->getDbTable();
			$select = $table->select();
			$select->from($table,array('COUNT(cspid) as count'))
			       ->where('cspcustomerid = ?',$socialmedia->getCustomerid())
			       ->where('cspsocial_media_userid = ?',$socialmedia->getEmailid())
			       ->where('cspsocial_media_type_id = ?',$socialmedia->getMediatype());
			$rowset = $table->fetchAll($select);
			$count = 0;
			foreach($rowset as $row){
				$count = $row->count;	
			}
			if(!$count > 0){
				$this->getDbTable()->insert($data);
				return true;	
			}else{
				return false;
			}									       
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function update(User_Model_SocialProfile $socialmedia)
	{
		try{
			$status = false;
			
			$db = Zend_Db_Table::getDefaultAdapter();
			$table  = $this->getDbTable();
			$select = $table->select();
			
			$select->from($table,array('COUNT(cspid) as count'))
			       ->where('cspcustomerid = ?', $socialmedia->getCustomerid())
			       ->where('cspsocial_media_userid = ?',$socialmedia->getEmailid())
			       ->where('cspsocial_media_type_id = ?',$socialmedia->getMediatype());
			       
			$rowset = $table->fetchAll($select); 		       
			$count = 0;
			foreach($rowset as $row){
				$count = $row->count;	
			}
			if(!$count > 0){
				$set = array('cspsocial_media_userid' => $socialmedia->getEmailid());
				$where = array('cspid = ?' => $socialmedia->getId());
				$this->getDbTable()->update($set,$where);
				return true;
			}else{
				return false;
			}		
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;	
		}
	}

}

