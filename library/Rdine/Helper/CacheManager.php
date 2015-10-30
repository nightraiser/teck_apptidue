<?php
class Rdine_Helper_CacheManager
{
	public function Save($data,$key)
	{
		if($data && $key)
		{
			$cache = null;
			$cache = new Zend_Cache_Backend_ZendServer_ShMem();
			$cache->save($data,$key,3600,12*3600);
		}
	}
	
	public function SaveData($data,$key,$expirationtime = 3600)
	{
		if($data && $key)
		{
			$cache = null;
			$cache = new Zend_Cache_Backend_ZendServer_ShMem();
			$cache->save($data,$key,3600,$expirationtime);
		}
	}
		
	public function Fetch($key)
	{
		if($key)
		{
			$cache = null;
			$result = null;
			$cache = new Zend_Cache_Backend_ZendServer_ShMem(); 
			$result = $cache->load($key);
			return $result;
		} 
	}
	public function Clear($key)
	{
		if($key)
		{
			$cache  = null;
			$result = null;
			$status = null;
			$cache  = new Zend_Cache_Backend_ZendServer_ShMem(); 
			$result = $cache->test($key);
			if($result != false)
			{
				$status = $cache->remove($key);
				return $status;
			}
		}
	}
	public function Check($key)
	{
		if($key)
		{
			$cache = null;
			$result = null;
			$cache = new Zend_Cache_Backend_ZendServer_ShMem(); 
			$result = $cache->test($key);
			$flag = false;
			if($result == false)
			{
				return $flag;
			}
			else
			{
				$flag = true;
				return $flag;
			}
		}
	}
	
	public function SavePage($data,$key)
	{
		if($data && $key)
		{
			$cache = null;
			$cache = new Zend_Cache_Backend_ZendServer_ShMem();
			$cache->save($data,$key,3600,12*3600);
		}
	}
}