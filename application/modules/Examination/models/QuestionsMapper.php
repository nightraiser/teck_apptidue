<?php
class Examination_Model_QuestionsMapper
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
			$this->setDbTable('Examination_Model_DbTable_Questions');
		}
		return $this->_dbTable;
	}
	
	/**
	 * Add a new Module
	 */

	public function fetchQuestionsForTest($testid)
    {
        try
        {
            $db = $this->getDbTable();
             $select = $db->select()
                            ->from(array('qs'=>'questions'),array('qid','qtitle','qstatement','qoption1','qoption2','qoption3','qoption4','qanswer'))
                            ->joinLeft(array('md'=>'modules'),'qs.qid = md.mod_id', array('mod_name'=>'md.mod_name'))
                            ->joinLeft(array('tmd'=>'test_module_data'),'tmd.tmdfk_module_id = md.mod_id', array('duration'=>'tmd.tmd_module_duration','number_of_questions'=>'tmd_no_questions'))
                            ->joinLeft(array('test'=>'tests'),'test.test_id=tmdfk_test_id', array('test_name'=>'test_name'))
                            ->where('qs.qstatus = ?',true)
                            ->where('md.mod_status = ?',true)
                            ->where('test.test_id = ?',$testid)
                            ->where('test.test_status = ?',true)
                            ->setIntegrityCheck(false);
            $data = $select->query()->fetchAll();
            echo json_encode($data);die();
        }
        catch(Execption $ex)
        {
            throw new Exception($ex->getMessage());
            
        }
    }
}
