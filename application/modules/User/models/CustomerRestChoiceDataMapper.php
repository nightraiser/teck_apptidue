<?php
class User_Model_CustomerRestChoiceDataMapper
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
			$this->setDbTable('User_Model_DbTable_CustomerRestChoice');
		}
		return $this->_dbTable;
	}
	
	public function save($resList,User_Model_FevRestById $userid)
	{
			$db = Zend_Db_Table::getDefaultAdapter();
			try{
				$db->beginTransaction();
				
				$user_id = $userid->getUserId();
				$restListId = $this->getCustRestFavId($user_id);
				$restaurantList = array();
				foreach($resList as $value){
					$rest_id = $value->getRestId();
					$data = array(
						'crcfk_user' 		=>	$user_id,
						'crcrestaurant_id'	=>	$rest_id,
						'crcstatus'			=>	'TRUE'
					);
					$status = $this->checkRestIds($restListId,$rest_id);		
					if(!$status){
						$this->getDbTable()->insert($data);	
					}				
				}
				$db->commit();
				return true;
			}catch (Exception $ex){
				$db->rollBack();
				throw new Exception($ex->getMessage()) ;	
			}
	}
	
	public function CusFevRestauarants(User_Model_FevRestById $userid,$offset)
	{
		try{
			$id = $userid->getUserId();
			$query = $this->getDbTable()->select();
			$query->setIntegrityCheck(false);
			
			$query->from(array('crc' => 'rd.customer_restaurant_choice'),array('crcfk_user','crcrestaurant_id'));
			$query->join(array('res' => 'rd.restaurant_details'),'res.resid = crc.crcrestaurant_id',array('resid','resname','resaddress','resdescription','resimage'));
			$query->join(array('nbh' => 'rd.neighborhood_bd'),'nbh.id = res.resneighborhood_id',array('description as neighbor'));
			$query->join(array('rgn'=>'rd.region_bd'),'rgn.id = res.resregion_id',array('description as region'));
			$query->join(array('cty'=>'rd.city_bd'),'cty.id = res.rescity_id',array('description as city'));
			$query->join(array('sbd'=>'rd.state_bd'),'sbd.id = res.resstate_id',array('description as state'));
			$query->where('crc.crcstatus =? ','TRUE');
			$query->where('crc.crcfk_user = ?',$id);
			$query->where('rescategory_id = 2');
			$query->order('crcid DESC');
			//$Result = $this->getDbTable()->fetchAll($query);
			$Result = new Zend_Paginator(
				new Zend_Paginator_Adapter_DbTableSelect($query)
			);
			$Result->setItemCountPerPage(10);
			$Result->setCurrentPageNumber($offset);
			
			
			$resultList = array();
			 foreach($Result as $value){
			 	$resdesc = $value->resdescription;
					 if(strlen($resdesc) > 1000){
						$resdesc = substr($resdesc, 0, 1000)."...";
					 }
			 	$obj = new User_Model_CustomerRestChoice();
			 	$obj->setRestId($value->resid)
			 		->setRestaurantname($value->resname)
			 		->setRestneighboorhood($value->neighbor)
			 		->setRestRegion($value->city)
			 		->setRestCity($value->city)
			 		->setRestState($value->state)
			 		->setResAddress($value->resaddress)
			 		->setResDesc($resdesc)
			 		->setRestImage($value->resimage);
			 	$resultList[] = $obj;
			 }
			 
			 return $Result;
		}catch (Exception $ex){
			throw new Exception($ex->getMessage()) ;
		}
	}
	
	public function getCustRestFavId($userid)
	{
		$table  = $this->getDbTable();
		$select = $table->select();

		$select->from($table,array('crcfk_user','crcrestaurant_id'))
			   ->where('crcfk_user = ?',$userid);
		$results = $table->fetchAll($select);

		$restId = array();
		foreach($results as $result){
			$restId[] = array('key'=>$result->crcrestaurant_id,'value'=>$result->crcfk_user);	
		}
		
		return $restId;
	}
	
	public function checkRestIds(array $restIdList,$rest_id)
	{
			foreach($restIdList as $restid){
		 		if($rest_id == $restid['key']){		 		
		 			return true;
		 		}	
		 	}
	}
	public function AddFavouriteRest($userid,$restid,$status)
	{
		$db = Zend_Db_Table::getDefaultAdapter();
		try{
			$db->beginTransaction();
			$table  = $this->getDbTable();
			if($status == 'NULL'){
				$data = array('crcfk_user' 		=> $userid,
						  'crcrestaurant_id' => $restid,
					      'crcstatus'		 =>	'TRUE');
				$result = $table->insert($data); 
				
			}else
			if($status == 'FALSE'){
				$set = array('crcstatus'		=>	'TRUE');
				$where = array('crcfk_user = ?'=> $userid, 'crcrestaurant_id = ?' => $restid );
				$result = $table->update($set,$where);
			}else{
				$set = array('crcstatus'		=>	'FALSE');
				$where = array('crcfk_user = ?'=> $userid, 'crcrestaurant_id = ?' => $restid );
				$result = $table->update($set,$where);
			}
			
			$db->commit();
			return $result;
		}catch (Exception $ex){
		throw new Exception($ex->getMessage()) ;
	}
	}	
}