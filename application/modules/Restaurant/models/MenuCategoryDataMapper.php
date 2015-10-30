<?php
class Restaurant_Model_MenuCategoryDataMapper
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
			$this->setDbTable('Restaurant_Model_DbTable_MenuCategory');
		}
		return $this->_dbTable;
	}
	
	public function AddCategoryAndItems($request)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		
    	$storage = new Zend_Auth_Storage_Session();
		$userdata = $storage->read();
    	
    	$data = array(
    		'mc_fk_mrid'	=>	$request->menuid,
    		'mc_name'			=>	$request->category,
    		'mc_description'	=>	$request->categorydesc,
    		'mc_status'			=>	true,
    		'mc_createdby'		=>	$userdata['User_Id'],
    		'mc_createddatetime'=>	date('Y-m-d H:i:s')
    	);
		try{
			$db->beginTransaction();
			
			$category_id = $this->getDbTable()->insert($data);
			
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$itemMaper->AddMenuItems($category_id, $request);
			
			$db->commit();
			return $category_id;
		}catch(Exception $ex){
			$db->rollBack();
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetMenuCategoryAndItems($restId)
	{
		try{
			$menuRestMapper = new Restaurant_Model_MenuFirmDataMapper();
			$manuTable = $menuRestMapper->getDbTable(); 
			$menuSelect = $manuTable->select();
			
			$menuSelect->from(array('mr'=>'rd.menu_restaurant'),array('mrid','mr_title','mr_description','mr_status','mr_viewtype'))
				   ->where('mr_fk_resid = ?',$restId)
				   ->order(array('mrid ASC'));
			
			$rowSet = $manuTable->fetchAll($menuSelect);
			$menus = array();
			foreach($rowSet as $row){
				$table  = $this->getDbTable();
				$select = $table->select();
				$select->setIntegrityCheck(false);
				$select->from(array('cat'=>'rd.menu_category'),array('mcid','mc_name','mc_description','mc_status'))
// 					   ->join(array('res'=>'rd.restaurant_details'),'cat.mc_fk_mrid = res.resid',array())
// 					   ->join(array('st'=>'rd.state_bd'),'st.id = res.resstate_id',array('code as countrycode','description as countrydesc','currency_code'))
					   ->where('mc_fk_mrid = ?',$row->mrid)
					   ->order(array('mcid ASC'));
			
				$catrowSet = $table->fetchAll($select);
				$categorys = array();
				foreach($catrowSet as $catrow){
					$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
					$menuItems = $itemMaper->GetMenuItems($catrow->mcid);
					
					$categorys[] = array(
							'categoryid'	=>	$catrow->mcid,
							'categoryname'	=>	$catrow->mc_name,
							'categorydesc'	=>	$catrow->mc_description,
							'categorystatus'=>	$catrow->mc_status,
							'currency'		=>	'INR',//$catrow->currency_code,
							'currencytitle'	=>	'Indian Rupee',//$catrow->countrydesc,
							'itemsArr'		=>	$menuItems
						);
				}
				$menus[] = array(
								'menuid'	=> $row->mrid,
								'menutitle'	=> $row->mr_title,
								'menudesc'	=> $row->mr_description,
								'menustatus'=> $row->mr_status,
								'menuview'	=> $row->mr_viewtype,
								'categorys' => $categorys
							);
			}
			return $menus;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetMenuCategoryAndItemsByMenuId($menuId)
	{
		try{			
			$table  = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			$select->from(array('cat'=>'rd.menu_category'),array('mcid','mc_name','mc_description','mc_status'))
// 				   ->join(array('res'=>'rd.restaurant_details'),'cat.mc_fk_mrid = res.resid',array())
// 				   ->join(array('st'=>'rd.state_bd'),'st.id = res.resstate_id',array('code as countrycode','description as countrydesc','currency_code'))
				   ->where('mc_fk_mrid = ?',$menuId)
				   ->order(array('mcid ASC'));
		
			$catrowSet = $table->fetchAll($select);
			$categorys = array();
			foreach($catrowSet as $catrow){
				$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
				$menuItems = $itemMaper->GetMenuItems($catrow->mcid);
				
				$categorys[] = array(
						'categoryid'	=>	$catrow->mcid,
						'categoryname'	=>	$catrow->mc_name,
						'categorydesc'	=>	$catrow->mc_description,
						'categorystatus'=>	$catrow->mc_status,
						'currency'		=>	'INR',//$catrow->currency_code,
						'currencytitle'	=>	'Indian Rupee',//$catrow->countrydesc,
						'itemsArr'		=>	$menuItems
					);
			}
			return $categorys;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditCategoryAndItems($request)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		
    	$storage = new Zend_Auth_Storage_Session();
		$userdata = $storage->read();
		
    	$set = array(
    		'mc_name'			=>	$request->category,
    		'mc_description'	=>	$request->categorydesc,
    		'mc_updatedby'		=>	$userdata['User_Id'],
    		'mc_updateddatetime'=>	date('Y-m-d H:i:s')
    	);
		try{
			$db->beginTransaction();
			
			$where = $db->quoteInto('mcid = ?',$request->categoryid);
			$row_affected = $this->getDbTable()->update($set,$where);
			
			$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
			$itemMaper->EditMenuItems($request);
			
			$db->commit();
			return $row_affected;
		}catch(Exception $ex){
			$db->rollBack();
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function changeMenuCategoryStatus($categoryId, $status)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			
			$set = array('mc_status' => $status);
			
			$where = $db->quoteInto('mcid = ?',$categoryId);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function updateCategory($categoryId, $category,$categorydesc)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			$set['mc_updatedby'] = 	$userdata['User_Id'];
    		$set['mc_updateddatetime']=	date('Y-m-d H:i:s');
			if($category){
				$set['mc_name'] = $category;
			}
			if($categorydesc){
				$set['mc_description'] = $categorydesc;
			}
			$where = $db->quoteInto('mcid = ?',$categoryId);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function restaurantMenu($restId)
	{
		try{
			$menuRestMapper = new Restaurant_Model_MenuFirmDataMapper();
			$manuTable = $menuRestMapper->getDbTable(); 
			$menuSelect = $manuTable->select();
			
			$menuSelect->from(array('mr'=>'rd.menu_restaurant'),array('mrid','mr_title','mr_description','mr_status','mr_viewtype'))
				   ->where('mrfk_restaurantid = ?',$restId)
				   ->where('mr_status = ?',true)
				   ->order(array('mrid ASC'));
			
			$rowSet = $manuTable->fetchAll($menuSelect);
			$menus = array();
			foreach($rowSet as $row){
				$table  = $this->getDbTable();
				$select = $table->select();
				$select->setIntegrityCheck(false);
				$select->from(array('cat'=>'rd.menu_category'),array('mcid','mc_name','mc_description','mc_status'))
// 					   ->join(array('res'=>'rd.restaurant_details'),'cat.mc_fk_mrid = res.resid',array())
// 					   ->join(array('st'=>'rd.state_bd'),'st.id = res.resstate_id',array('code as countrycode','description as countrydesc','currency_code'))
					   ->where('mcfk_menu_restaurantid = ?',$row->mrid)
					   ->where('mc_status = ?',true)
					   ->order(array('mcid ASC'));
			
				$catrowSet = $table->fetchAll($select);
				$categorys = array();
				foreach($catrowSet as $catrow){
					$itemMaper = new Restaurant_Model_MenuItemsDataMapper();
					$menuItems = $itemMaper->GetMenuItems($catrow->mcid);
					
					$categorys[] = array(
							'categoryid'	=>	$catrow->mcid,
							'categoryname'	=>	$catrow->mc_name,
							'categorydesc'	=>	$catrow->mc_description,
							'categorystatus'=>	$catrow->mc_status,
							'currency'		=>	'INR',//$catrow->currency_code,
							'currencytitle'	=>	'Indian Rupee',//$catrow->countrydesc,
							'itemsArr'		=>	$menuItems
						);
				}
				$menus[] = array(
								'menuid'	=> $row->mrid,
								'menutitle'	=> $row->mr_title,
								'menudesc'	=> $row->mr_description,
								'menustatus'=> $row->mr_status,
								'menuview'	=> $row->mr_viewtype,
								'categorys' => $categorys
							);
			}
			return $menus;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}