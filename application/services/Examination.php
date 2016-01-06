<?php
class Application_Service_Examination
{
	/**
	 * Fetch Questions given a testid
	 */
	
	public function fetchQuestionsForTest($testid)
	{
		try
		{
			$quesMapper = new Examination_Model_QuestionsMapper();
			$data = $quesMapper->fetchQuestionsForTest($testid);

		}
		catch(Exception $e)
		{
			throw new Exception($e->getMessage()) ;
		}
	}
}