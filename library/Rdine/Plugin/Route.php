<?php
class Rdine_Plugin_Route extends Zend_Controller_Plugin_Abstract
{
	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{
		$module 	= $request->getModuleName();
		$controller = $request->getControllerName();
		$action 	= $request->getActionName();
		$switch = '';
		$service = new Application_Service_Restaurant();
		$frontController = Zend_Controller_Front::getInstance();
 		$router = $frontController->getRouter();
 		$cache = new Rdine_Helper_CacheManager();
		$uriArr = explode('/', $_SERVER['REQUEST_URI']);
		$index = 1;
		$isMap = false;
		//print_r($uriArr);
		$resource = $service->getRouteDetails();
		
		$indexpage = new Zend_Controller_Router_Route('index',
				array('controller' => 'Index',
					  'action'=> 'index'));														  	
		$router->addRoute('index', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('about', array('controller' => 'Index', 'action'=> 'about'));														  	
		$router->addRoute('about', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('careers', array('controller' => 'Index', 'action'=> 'careers'));														  	
		$router->addRoute('careers', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('news', array('controller' => 'Index', 'action'=> 'news'));														  	
		$router->addRoute('news', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('contact', array('controller' => 'Index', 'action'=> 'contact'));														  	
		$router->addRoute('contact', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('faqs', array('controller' => 'Index', 'action'=> 'faqs'));														  	
		$router->addRoute('faqs', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('privacy', array('controller' => 'Index', 'action'=> 'privacy'));														  	
		$router->addRoute('privacy', $indexpage);
		
		$indexpage = new Zend_Controller_Router_Route('termsofservice', array('controller' => 'Index', 'action'=> 'termsofservice'));														  	
		$router->addRoute('termsofservice', $indexpage);
		
			
		if((sizeof($uriArr)>=$index)&&($uriArr[$index]!=''))
		{
			$firstParameter = $uriArr[$index];
			if(($firstParameter=="Administrator")||($firstParameter=="User")||($firstParameter=="Restaurant"))
			{
				return $router;
			}
			$cityname = $uriArr[$index];
			$cityid = $resource['cities'][$cityname];
			//echo $cityid;
			//echo sizeof($uriArr);
			if(sizeof($uriArr)==($index)+1)
			{
				if(array_key_exists($cityname,$resource['cities']))
				{
					$location = new Zend_Controller_Router_Route("/$cityname/",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchCity'=>$cityname));	
					$router->addRoute('restaurantlist', $location);
				}
			}
			else
			{
				$secondParameter = $uriArr[$index+1];
				if($secondParameter=="")
				{
					$location = new Zend_Controller_Router_Route("/$cityname/",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchCity'=>$cityname));	
					$router->addRoute('restaurantlist', $location);
				}
				if($secondParameter=="restaurant")
				{
					if(array_key_exists(($index+2),$uriArr))
					{
						$thirdParameter = $uriArr[$index+2];
						$location = new Zend_Controller_Router_Route("/$cityname/restaurant/$thirdParameter",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchCriteria'=>$thirdParameter));	
						$router->addRoute('restaurantlist', $location);
					}
					else
					{
						$location = new Zend_Controller_Router_Route("/$cityname/",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid));	
						$router->addRoute('restaurantlist', $location);
					}
				}
				else
				{
					if($secondParameter=="best-restaurant")
					{
						$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchOrder'=>"best"));	
						$router->addRoute('restaurantlist', $location);
					}
					else
					{
						if(array_key_exists($secondParameter,$resource['restaurants']))
						{
							$resid = $resource['restaurants'][$secondParameter];
							$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
											array('module'=> 'Restaurant',
												  'controller' => 'Restaurant',
												  'action'=> 'resdetails',
													'resid' => $resid));	
							$router->addRoute('resdetails', $location);
						}
						else
						{
							$arr = explode("-",$secondParameter);
							$last = $arr[sizeof($arr)-1];
							$toAction = "restaurantlist";
							if($last=="map")
							{
								$toAction ="restaurantsearch";
							}
							switch($arr[0])
							{
								case "best":

								$place = $arr[1];
								if(array_key_exists($place,$resource['locations']))
								{
									$place_id = $resource['locations'][$place];
									$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> $toAction,
											  'searchCityId' => $cityid,
												'searchLocation' => $place_id,
												'searchOrder'=>"best",
												'searchCity'=>$cityname,
												'searchLocationName'=>$place));	
									$router->addRoute('restaurantlist', $location);
								}
								break;
								case "LuxuryDinner":
									$place = $arr[1];
									if(array_key_exists($place,$resource['locations']))
									{
										$place_id = $resource['locations'][$place];
										if(array_key_exists(($index+2),$uriArr))
										{
											$thirdParameter = $uriArr[$index+2];
											$thirdParameter = str_replace("%20"," ",$thirdParameter);
											$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter/$thirdParameter",
											array('module'=> 'Restaurant',
												  'controller' => 'Restaurant',
												  'action'=> $toAction,
												  'searchCityId' => $cityid,
													'searchLocation' => $place_id,
													'searchOrder'=>"LuxuryDinner",
													'searchCity'=>$cityname,
													'searchLocationName'=>$place,
													'searchCriteria'=>$thirdParameter));	
										$router->addRoute('restaurantlist', $location);
										}
										else
										{
											$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
											array('module'=> 'Restaurant',
												  'controller' => 'Restaurant',
												  'action'=> $toAction,
												  'searchCityId' => $cityid,
													'searchLocation' => $place_id,
													'searchOrder'=>"LuxuryDinner",
													'searchCity'=>$cityname,
													'searchLocationName'=>$place));	
										$router->addRoute('restaurantlist', $location);
										}
									}
								break;
								case "Buffet":
									$place = $arr[1];
									if(array_key_exists($place,$resource['locations']))
									{
										$place_id = $resource['locations'][$place];
										if(array_key_exists(($index+2),$uriArr))
										{
											$thirdParameter = $uriArr[$index+2];
											$thirdParameter = str_replace("%20"," ",$thirdParameter);
											$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter/$thirdParameter",
											array('module'=> 'Restaurant',
												   'controller' => 'Restaurant',
												   'action'=> $toAction,
												   'searchCityId' => $cityid,
													'searchLocation' => $place_id,
													'searchOrder'=>"Buffet",
													'searchCity'=>$cityname,
													'searchLocationName'=>$place,
													'searchCriteria'=>$thirdParameter));	
										$router->addRoute('restaurantlist', $location);
										}
										else
										{
											$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
											array('module'=> 'Restaurant',
												  'controller' => 'Restaurant',
												  'action'=> $toAction,
												  'searchCityId' => $cityid,
													'searchLocation' => $place_id,
													'searchOrder'=>"Buffet",
													'searchCity'=>$cityname,
													'searchLocationName'=>$place));	
										$router->addRoute('restaurantlist', $location);
										}
									}
								break;
								default :
								$place = $arr[0];
								if(array_key_exists($place,$resource['locations']))
								{
									if(array_key_exists($index+2, $uriArr))
									{
										$place_id = $resource['locations'][$place];
										$criteria = $uriArr[$index+2];
										$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter/:searchCriteria",
											array('module'=> 'Restaurant',
												  'controller' => 'Restaurant',
												  'action'=> $toAction,
													'searchLocation' => $place_id,
													'searchCriteria'=>'',
													'searchCity'=>$cityname,
													'searchCityId' => $cityid,
												'searchLocationName'=>$place));	
										$router->addRoute('restaurantlist', $location);	
									}
									else
									{
										$place_id = $resource['locations'][$place];
										$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
										array('module'=> 'Restaurant',
											  'controller' => 'Restaurant',
											  'action'=> $toAction,
												'searchLocation' => $place_id,
												'searchCity'=>$cityname,
												'searchCityId' => $cityid,
												'searchLocationName'=>$place));	
									$router->addRoute('restaurantlist', $location);
									}
								}
								break;
							}
						}
					}
				}
			}
		}
		return $router;
	}
}
