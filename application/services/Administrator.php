<?php

class Application_Service_Administrator
{
	/**
	 * [addModule methods add a new module]
	 * @param [type] $request is a request object
	 */
	public function addModule($request)
	{
		try
		{
			$data = $request->getPost('data');
			$moduleMapper = new Administrator_Model_ModulesDataMapper();
			$res = $moduleMapper->addModule($data);
			return $res;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Get all modules
	 */
	public function getAllModules()
	{
		try
		{
			$cols = array('mod_id','mod_name','mod_description','mod_status');
			$order = array('mod_id DESC');
			$moduleMapper = new Administrator_Model_ModulesDataMapper();
			$res = $moduleMapper->fetchModulesData($cols,null,$order);
			return $res;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Edit module details
	 */
	
	public function editModule($request)
	{
		try
		{
			$data = $request->getPost('data');
			$moduleMapper = new Administrator_Model_ModulesDataMapper();
			$format = array();
			foreach ($data as $key => $value) {
				if($key!='mod_id')
				{
					$format[$key] = $value; 
				}
			}
			$where = array('mod_id = ?'=>$data['mod_id']);
			$res = $moduleMapper->updateModule($format,$where);
			return $res;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}

	/**
	 * Delete module details
	 */
	
	public function deleteModule($request)
	{
		try
		{
			$data = $request->getPost('data');
			$moduleMapper = new Administrator_Model_ModulesDataMapper();
			$where = array('mod_id = ?'=>$data['mod_id']);
			$res = $moduleMapper->deleteModule($where);
			return $res;
		}
		catch(Exception $e)
		{
			throw new Exception($ex->getMessage()) ;
		}
	}
}
