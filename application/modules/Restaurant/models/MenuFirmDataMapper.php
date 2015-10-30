<?php
class Restaurant_Model_MenuFirmDataMapper
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
			$this->setDbTable('Restaurant_Model_DbTable_MenuFirm');
		}
		return $this->_dbTable;
	}
	
	public function addMenuHeader($request)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$menu_id = '';
	    	$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
	    	if($request->menuid){
	    		$menu_id = $request->menuid;
	    		$set = array(
		    		'mr_title'			=>	$request->menutitle,
		    		'mr_description'	=>	$request->menutitle,
		    		'mr_updatedby'		=>	$userdata['User_Id'],
		    		'mr_updateddatetime'=>	date('Y-m-d H:i:s')
		    	);
		    	$where = $db->quoteInto('mrid = ?',$menu_id);
				$row_affected = $this->getDbTable()->update($set,$where);
				
	    	}else{
	    		$data = array(
		    		'mr_fk_resid'	=>	$request->restaurantid,
		    		'mr_title'			=>	$request->menutitle,
		    		'mr_description'	=>	$request->menutitle,
		    		'mr_status'			=>	true,
		    		'mr_createdby'		=>	$userdata['User_Id'],
		    		'mr_createddatetime'=>	date('Y-m-d H:i:s')
		    	);
				
		    	$menu_id = $this->getDbTable()->insert($data);
	    	}
			return $menu_id;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getMenuHeader($request)
	{
		try{
			$table  = $this->getDbTable();
			$select = $table->select();
			
			$select->from($table,array('mr_title','mr_description','mr_fk_resid','mr_status'))
				   ->where('mrid = ?',$request->menuid);
		
			$rowSet = $table->fetchRow($select);
			$resultArr = array();
	    	if($rowSet){
				$resultArr['menutitle'] = $rowSet->mr_title;
				$resultArr['menudesc'] = $rowSet->mr_description;
				$resultArr['menustatus'] = $rowSet->mr_status;
	    	}
	    	return $resultArr;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function changeMenuStatus($menuid, $status)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			
			$set = array('mr_status' => $status);
			
			$where = $db->quoteInto('mrid = ?',$menuid);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetRestauramtMenuByRestId($restid)
	{
		try
		{
			$table  = $this->getDbTable();
			$select = $table->select();
			
			$select->from($table,array('mrid','mr_fk_resid','mr_title','mr_description','mr_status','mr_createdby','mr_createddatetime','mr_updatedby','mr_updateddatetime'))
				   ->where('mr_fk_resid = ?',$restid);
				   
			$rowSet = $table->fetchAll($select); 
			
			$result 	 = array();
			$menu_names  = array();
			$menu_cat 	 = array();
			$menu_item 	 = array();
			$menu_id 	 = array();
			$menu_cat_id = array();
			
			if(count($rowSet) > 0)
			{
				foreach($rowSet as $row)
				{
					$menu_id[] = $row->mrid;
					$menu_names[] = array('mrid' 			   => $row->mrid,
										  'mr_fk_resid'  => $row->mr_fk_resid,
										  'mr_title'		   => $row->mr_title,
										  'mr_description' 	   => $row->mr_description,
										  'mr_status' 		   => $row->mr_status,
										  'mr_createdby' 	   => $row->mr_createdby,
										  'mr_createddatetime' => $row->mr_createddatetime,
										  'mr_updatedby' 	   => $row->mr_updatedby,
										  'mr_updateddatetime' => $row->mr_updateddatetime);
				}
				if(count($menu_names) > 0){
					$result["MenuNames"] = $menu_names;
				}else{
					$result["MenuNames"] = false;
				}
				
				/* Get Menu Category */
				if(count($menu_id) > 0){
					
						$menuCatMapper = new Restaurant_Model_MenuCategoryDataMapper();
						$tableMenuCat = $menuCatMapper->getDbTable();
						$selectMenuCat = $tableMenuCat->select();
						$selectMenuCat->from($tableMenuCat,array('mcid','mc_fk_mrid','mc_name','mc_description','mc_image','mc_status','mc_createdby','mc_createddatetime','mc_updatedby','mc_updateddatetime','mcfk_menu_restaurantid'))
									  ->where('mcfk_menu_restaurantid IN(?)',$menu_id);
						
						$menuCatRowSet = $tableMenuCat->fetchAll($selectMenuCat);
										
						if($menuCatRowSet)
						{
							foreach($menuCatRowSet as $catrow){
								
								$menu_cat_id[] = $catrow->mcid; 
								$menu_cat[] = array('mcid' 				     => $catrow->mcid,
													'mc_fk_mrid'      => $catrow->mc_fk_mrid,
													'mc_name' 			     => $catrow->mc_name,
													'mc_description' 	     => $catrow->mc_description,
													'mc_image' 			     => $catrow->mc_image,
													'mc_status' 		     => $catrow->mc_status,
													'mc_createdby' 		     => $catrow->mc_createdby,
													'mc_createddatetime' 	 => $catrow->mc_createddatetime,
													'mc_updatedby' 		 	 => $catrow->mc_updatedby,
													'mc_updateddatetime' 	 => $catrow->mc_updateddatetime,
													'mcfk_menu_restaurantid' => $catrow->mcfk_menu_restaurantid);
								}
						}
						if(count($menu_cat) > 0){
							$result["MenuCategory"] = $menu_cat;
						}else{
							$result["MenuCategory"] = false;
						}
						
					}else{
						$result["MenuCategory"] = false;
					}
									
					/* Get Menu Items */
					if(count($menu_cat_id) > 0){
						
						$menuItemsMapper = new Restaurant_Model_MenuItemsDataMapper();
						$tableMenuItem = $menuItemsMapper->getDbTable();
						$selectMenuItem = $tableMenuItem->select();
						
						$selectMenuItem->from($tableMenuItem,array('miid','mi_fk_mcid','mi_name','mi_description','mi_price','mi_type','mi_image','mi_status','mi_createdby','mi_createddatetime','mi_updatedby','mi_updateddatetime','mi_ordersequence'))
									   ->where('mi_fk_mcid IN(?)',$menu_cat_id);
									   
						$rowSetMenuItem = $tableMenuItem->fetchAll($selectMenuItem);
					
						if($rowSetMenuItem)
						{
							foreach($rowSetMenuItem as $rowMenuItem){
								$menu_item[] = array('miid' 			  => $rowMenuItem->miid,
													 'mi_fk_mcid' 	  => $rowMenuItem->mi_fk_mcid,
													 'mi_name' 			  => $rowMenuItem->mi_name,
													 'mi_description' 	  => $rowMenuItem->mi_description,
													 'mi_price' 		  => $rowMenuItem->mi_price,
													 'mi_type' 			  => $rowMenuItem->mi_type,
										 		 	 'mi_image' 		  => $rowMenuItem->mi_image,
													 'mi_status' 		  => $rowMenuItem->mi_status,
													 'mi_createdby' 	  => $rowMenuItem->mi_createdby,
													 'mi_createddatetime' => $rowMenuItem->mi_createddatetime,
													 'mi_updatedby' 	  => $rowMenuItem->mi_updatedby,
													 'mi_updateddatetime' => $rowMenuItem->mi_updateddatetime,
													 'mi_ordersequence'   => $rowMenuItem->mi_ordersequence);
							}
							if(count($menu_item) > 0){
								$result["MenuItem"] = $menu_item;
							}else{
								$result["MenuItem"] = false;
							}
						}
					}else{
						$result["MenuItem"] = false;
					}				
				}else{
					$result["MenuNames"]  = false;
				}
			
			return $result;
			
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function setMobileMenuViewType($restid, $viewtype)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			
			$set = array('mr_viewtype' => $viewtype);
			
			$where = $db->quoteInto('mr_fk_resid = ?',$restid);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
}