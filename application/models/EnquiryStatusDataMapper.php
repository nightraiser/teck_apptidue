<?php
/**
*	Name			: EnquiryStatusDataMapper.php
*	Author			: Sairam
*	Creation Date	: 28/03/2012
*	Path 			: application/models/EnquiryStatusDataMapper.php
*	Description		: This is the dataMapper class for the enquiry status basedata table.
*					   	
*/
class Application_Model_EnquiryStatusDataMapper
{
	/**
	 * Instance variable of enquiry status basedata table
	 * @var object
	 */
	protected $_dbTable;
	
	/**
     * @param instance of DbTable enquiryStatus $dbTable
     * @return self
     */
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
	
	/**
     * @return instance of DbTable enquiryStatus
     */
	public function getDbTable()
	{
		if (null === $this->_dbTable) {
			$this->setDbTable('Application_Model_DbTable_EnquiryStatus');
		}
		return $this->_dbTable;
	}
	/**
	 * Fetches all the enquiry status basedata rows and saves in cache
	 */
	public function fetchAll()
	{
		$cache = new Rdine_Helper_CacheManager();
		$enquirystatus = array();
		if(!$enquirystatus = $cache->Fetch('enquirystatus')){
			$where = array('status = ?'=> true);
			$records = $this->getDbTable()->fetchAll($where);
						
			foreach($records as $record){
				$enquirystatus[] = new Application_Model_EnquiryStatus(						
					$record->toArray());	
			}
			$cache->Save($enquirystatus,'enquirystatus');			
		}else{
			$enquirystatus = $cache->Fetch('enquirystatus');
		}
		
		$cache = null;
		return $enquirystatus;
	}
}