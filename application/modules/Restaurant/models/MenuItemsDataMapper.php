<?php
class Restaurant_Model_MenuItemsDataMapper
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
			$this->setDbTable('Restaurant_Model_DbTable_MenuItems');
		}
		return $this->_dbTable;
	}
	
	public function AddMenuItems($category_id, $request)
	{
		try{
			$itemNames = $request->itemname; 
			$itemDesc = $request->itemdesc;
	    	$itemPrice = $request->itemprice;
	    	$itemType = $request->type;
	    	
	    	$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			
			for($i = 0; $i < count($itemNames); $i++ )
			{
				$data = array(
		    		'mi_fk_mcid'	=>	$category_id,
		    		'mi_name'			=>	$itemNames[$i],
		    		'mi_description'	=>	$itemDesc[$i],
					'mi_price'			=>	$itemPrice[$i],
					'mi_status'			=>	true,
		    		'mi_createdby'		=>	$userdata['User_Id'],
		    		'mi_createddatetime'=>	date('Y-m-d H:i:s')
		    	);
		    	if($itemType[$i]){
		    		$data['mi_type'] = $itemType[$i]; 
		    	}
		    	$this->getDbTable()->insert($data);
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function GetMenuItems($categoryid)
	{
		try{
			$table  = $this->getDbTable();
			$select = $table->select();
			$select->setIntegrityCheck(false);
			$select->from(array('mi'=>'rd.menu_items'),array('miid','mi_name','mi_description','mi_price','mi_status'))
// 				   ->joinLeft(array('mtbd'=>'rd.menu_typebd'),'mtbd.id = mi.mi_type',array('description as itemtype'))
				   ->where('mi_fk_mcid = ?',$categoryid)
				   ->where('mi_status = ?',true)
				   ->order(array('mi_ordersequence ASC'));
			
			$rowSet = $table->fetchAll($select);
			$menuItems = array();
			foreach($rowSet as $row){
				$menuItems[] = array(
						'itemid'	=>	$row->miid,
						'itemname'	=>	$row->mi_name,
						'itemdesc'	=>	$row->mi_description,
						'itemprice'	=>	$row->mi_price,
						'itemtype'	=>	'VEG',//$row->itemtype,
						'itemstatus'=>	$row->mi_status	
					);
			}
			return $menuItems;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function EditMenuItems($request)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$itemNames = $request->itemname; 
			$itemDesc = $request->itemdesc;
	    	$itemPrice = $request->itemprice;
	    	$itemType = $request->type;
	    	$itemIds = $request->itemid;
	    	
	    	$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			
			for($i = 0; $i < count($itemNames); $i++ )
			{
				if($itemIds[$i] != "")
				{
					$set = array(
			    		'mi_name'			=>	$itemNames[$i],
			    		'mi_description'	=>	$itemDesc[$i],
						'mi_price'			=>	$itemPrice[$i],
						'mi_type'			=>	$itemType[$i],
			    		'mi_updatedby'		=>	$userdata['User_Id'],
			    		'mi_updateddatetime'=>	date('Y-m-d H:i:s')
			    	);
			    	$where = $db->quoteInto('miid = ?',$itemIds[$i]);
					$row_affected = $this->getDbTable()->update($set,$where);
				}else{
					$data = array(
		    		'mi_fk_mcid'	=>	$request->categoryid,
		    		'mi_name'			=>	$itemNames[$i],
		    		'mi_description'	=>	$itemDesc[$i],
					'mi_price'			=>	$itemPrice[$i],
					'mi_type'			=>	$itemType[$i],
		    		'mi_status'			=>	true,
		    		'mi_createdby'		=>	$userdata['User_Id'],
		    		'mi_createddatetime'=>	date('Y-m-d H:i:s')
		    	);
		    	
		    	$this->getDbTable()->insert($data);
				}
			}
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getMenuItemsByCategoryId($categoryid)
	{
		try{
			$table  = $this->getDbTable();
			$select = $table->select();
			
			$select->from($table,array('miid','mi_name','mi_description','mi_price','mi_status','mi_type'))
				   ->where('mi_fk_mcid = ?',$categoryid)
				   ->where('mi_status = ?',true);
				   //->order(array('miid ASC'));
			
			$rowSet = $table->fetchAll($select);
			$menuItems = array();
			foreach($rowSet as $row){
				$menuItems[] = array(
						'itemid'	=>	$row->miid,
						'itemname'	=>	$row->mi_name,
						'itemdesc'	=>	$row->mi_description,
						'itemprice'	=>	$row->mi_price,
						'itemtype'	=>	$row->mi_type,
						'itemstatus'=>	$row->mi_status	
					);
			}
			return $menuItems;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getRestaurantMenuItemsByCategoryId($categoryid)
	{
		try{
			$table  = $this->getDbTable();
			$select = $table->select();
			
			$select->from($table,array('miid','mi_name','mi_description','mi_price','mi_status','mi_type'))
				   ->where('mi_fk_mcid = ?',$categoryid)
				   ->where('mi_status = ?',true)
				   ->order(array('miid ASC'));
			
			$rowSet = $table->fetchAll($select);
			$menuItems = array();
			foreach($rowSet as $row){
				$menuItems[] = array(
						'itemid'	=>	$row->miid,
						'itemname'	=>	$row->mi_name,
						'itemdesc'	=>	$row->mi_description,
						'itemprice'	=>	$row->mi_price,
						'itemtype'	=>	$row->mi_type,
						'itemstatus'=>	$row->mi_status	
					);
			}
			return $menuItems;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function changeMenuItemStatus($itemid, $status)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			
			$set = array('mi_status' => $status);
			
			$where = $db->quoteInto('miid = ?',$itemid);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function updateItem($request)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			
			$set = array('mi_name'			=>	$request->itemname,
			    		'mi_description'	=>	$request->itemdesc,
						'mi_price'			=>	$request->itemprice,
						//mi_type'			=>	$request->itemtype,
			    		'mi_updatedby'		=>	$userdata['User_Id'],
			    		'mi_updateddatetime'=>	date('Y-m-d H:i:s'));
			if($request->itemtype){
	    		$set['mi_type'] = $request->itemtype;
	    	}
			
	    	$where = $db->quoteInto('miid = ?',$request->itemid);
			$row_affected = $this->getDbTable()->update($set,$where);
			return $row_affected;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}	
	
	public function addItemByCategoryid($request)
	{
		try{
			$storage = new Zend_Auth_Storage_Session();
			$userdata = $storage->read();
			
			$data = array(
		    		'mi_fk_mcid'	=>	$request->categoryid,
		    		'mi_name'			=>	$request->itemname,
		    		'mi_description'	=>	$request->itemdesc,
					'mi_price'			=>	$request->itemprice,
					'mi_status'			=>	true,
		    		'mi_createdby'		=>	$userdata['User_Id'],
		    		'mi_createddatetime'=>	date('Y-m-d H:i:s')
		    	);
		    	if($request->itemtype){
		    		$data['mi_type'] = $request->itemtype;
		    	}
		    	
		   	$id = $this->getDbTable()->insert($data);
		   	return $id;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function updateItemSequence($request)
	{
		try{
			$db = Zend_Db_Table::getDefaultAdapter();
			$itemIds = $request->itemidarr; 
			$rowIndexs = $request->rowindexarr;
	    	
			for($i = 0; $i < count($itemIds); $i++ )
			{
				$set = array('mi_ordersequence'	=>	$rowIndexs[$i]);		    	
		    	$where = $db->quoteInto('miid = ?',$itemIds[$i]);
				$row_affected = $this->getDbTable()->update($set,$where);
			}
			return true;
		}catch(Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}

	public function getRestaurantMenuItems($resid)
 	{
	  try{
	   $db  = $this->getDbTable();
	   $data=Array();
	   $select = $db->select()
	       ->from(array('mi'=>'rd.menu_items'))
	       ->joinLeft(array('mc'=>'rd.menu_category'),'mi.mi_fk_mcid = mc.mcid',array('category_name'=>'mc.mc_name'))
	       ->joinLeft(array('mr'=>'rd.menu_restaurant'),'mc.mc_fk_mrid = mr.mrid',array('menu_name'=>'mr.mr_title'))
	       ->where("mr.mr_fk_resid=?",$resid)
	       ->where("mi_status=TRUE")
	       //->order('mi.miid ASC')
	       ->setIntegrityCheck(false);
	       $stmt = $select->query();
	                $results = $stmt->fetchAll();
	                //print_r($results);die();
	                return $results;
	                
	  }
	  catch(Exception $ex){
	   throw new Exception($ex->getMessage());
	  }
 	}

 	public function getRestaurantMenuItemsPopular($resid)
 	{
	  try{
	   $db  = $this->getDbTable();
	   $data=Array();
	   $select = $db->select()
	       ->from(array('mi'=>'rd.menu_items'))
	       ->joinLeft(array('mc'=>'rd.menu_category'),'mi.mi_fk_mcid = mc.mcid',array())
	       ->joinLeft(array('mr'=>'rd.menu_restaurant'),'mc.mc_fk_mrid = mr.mrid',array())
	       ->where("mr.mr_fk_resid=?",$resid)
	       ->where("mi_status=TRUE")
	       ->order('mi.mi_likes DESC')
	       ->setIntegrityCheck(false);

	       $stmt = $select->query();
	                $results = $stmt->fetchAll();
	               //print_r($results);die();
	                return $results;
	                
	  }
	  catch(Exception $ex){
	   throw new Exception($ex->getMessage());
	  }
 	}

  public function updateLikes($likescount,$itemid)
            {
                try
                {
                     $db= $this->getDbTable();
                     return $db->update($likescount,"miid=".$itemid);
                }
                       

                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }

    public function updateReviews($itemid,$totalReviews)
            {
                try
                {
                     $db= $this->getDbTable();
                     $reviewcount = array('mi_reviews'=>$totalReviews);
                     return $db->update($reviewcount,"miid=".$itemid);
                }
                       

                catch(Exception $e)
                {
                    throw new Exception($e->getMessage());
                    
                }
            }   
      public function getMenunameById($itemid)
      {
      	try {
      			 $db = $this->getDbTable();
            $select = $db->select()
                         ->from('rd.menu_items',array('mi_name'))
                         ->where('miid =?',$itemid);
            $data = $select->query()->fetchAll();
            return $data;
      	}
      	 catch (Exception $e) {
      		throw new Exception($e->getMessage());
      	}
      }           
}
