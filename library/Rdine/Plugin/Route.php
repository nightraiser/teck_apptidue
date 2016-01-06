<?php
class Rdine_Plugin_Route extends Zend_Controller_Plugin_Abstract
{
	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		$moduleName = "Restaurant";
		$mobileIndex = "index";
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		{
			$moduleName = "M";
			$mobileIndex = "M";
		}
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
		
		$indexpage = new Zend_Controller_Router_Route($mobileIndex,
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
			if(($firstParameter=="Index")||($firstParameter=="Administrator")||($firstParameter=="User")||($firstParameter=="Restaurant")||(($firstParameter=="M"))||(($firstParameter=="Communication")))
			{
				return $router;
			}
			switch($firstParameter)
			{
				case 'index':
					$indexpage = new Zend_Controller_Router_Route($mobileIndex,
					array('controller' => 'Index',
						  'action'=> 'index'));														  	
					$router->addRoute('index', $indexpage);
					return $router;
				break;
				case 'about':
					$indexpage = new Zend_Controller_Router_Route('about', array('controller' => 'Index', 'action'=> 'about'));														  	
					$router->addRoute('about', $indexpage);
					return $router;
				break;
				case 'careers':
					$indexpage = new Zend_Controller_Router_Route('careers', array('controller' => 'Index', 'action'=> 'careers'));														  	
					$router->addRoute('careers', $indexpage);
					return $router;
				break;
				case 'news':
					$indexpage = new Zend_Controller_Router_Route('news', array('controller' => 'Index', 'action'=> 'news'));														  	
					$router->addRoute('news', $indexpage);
					return $router;
				break;
				case 'contact':
					$indexpage = new Zend_Controller_Router_Route('contact', array('controller' => 'Index', 'action'=> 'contact'));														  	
					$router->addRoute('contact', $indexpage);oute('news', array('controller' => 'Index', 'action'=> 'news'));														  	
					$router->addRoute('news', $indexpage);
					return $router;
				break;
				case 'faqs':
					$indexpage = new Zend_Controller_Router_Route('faqs', array('controller' => 'Index', 'action'=> 'faqs'));														  	
					$router->addRoute('faqs', $indexpage);
					return $router;
				break;
				case 'privacy':
					$indexpage = new Zend_Controller_Router_Route('privacy', array('controller' => 'Index', 'action'=> 'privacy'));														  	
					$router->addRoute('privacy', $indexpage);
				break;
				case 'termsofservice':
				$indexpage = new Zend_Controller_Router_Route('termsofservice', array('controller' => 'Index', 'action'=> 'termsofservice'));														  	
				$router->addRoute('termsofservice', $indexpage);
				return $router;
				break;
				case 'feed':
					$cityname = $uriArr[$index+1];
					if(!array_key_exists(strtolower($cityname), $resource['cities']))
					{
						$str = implode('/', $uriArr);
						$message = "Page not found error for url : ".$str;
						Rdine_Logger_FileLogger::info($message);
						$location = new Zend_Controller_Router_Route("/$str",
												array(
													  'controller' => 'Error',
													  'action'=> 'pagenotfound'));	
						$router->addRoute('error', $location);	
					}
					else
					{
						$cityid = $resource['cities'][strtolower($cityname)];
						$str = implode('/', $uriArr);
						$location = new Zend_Controller_Router_Route("/$str",
												array(
													'module'=>'Restaurant',
													  'controller' => 'Restaurant',
													  'action'=> 'dineexpress',
													  'cityId'=>$cityid));	
						$router->addRoute('dineexpress', $location);
					}
					return $router;
				break;

			}
			$cityname = $uriArr[$index];
			if(!array_key_exists(strtolower($cityname), $resource['cities']))
			{
				$str = implode('/', $uriArr);
				$message = "Page not found error for url : ".$str;	
				Rdine_Logger_FileLogger::info($message);
				$location = new Zend_Controller_Router_Route("/$str",
										array(
											  'controller' => 'Error',
											  'action'=> 'pagenotfound'));	
					$router->addRoute('error', $location);	
			}
			else
			{
			$cityid = $resource['cities'][strtolower($cityname)];
			if(sizeof($uriArr)==($index)+1)
			{
				if(array_key_exists(strtolower($cityname),$resource['cities']))
				{
					$location = new Zend_Controller_Router_Route("/$cityname/",
										array('module'=>$moduleName,
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
					$str = implode($uriArr,"/");
					$location = new Zend_Controller_Router_Route("$str",
										array('module'=>$moduleName,
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchCity'=>$cityname));
					$router->addRoute('restaurantlist', $location);
					return $router;
				}
				if(($secondParameter=="restaurant")||($secondParameter=="Buffet-restaurant")||($secondParameter=="LuxuryDinner-restaurant"))
				{
					if(array_key_exists(($index+2),$uriArr))
					{
						$str = implode('/', $uriArr);
						$thirdParameter = $uriArr[$index+2];
						$linkArr = array('module'=>$moduleName,
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
												'searchCityId' => $cityid,
												'searchCity'=>$cityname,
												'searchCriteria'=>$thirdParameter);
						if($secondParameter=="Buffet-restaurant")
						{
							$linkArr['searchOrder'] = "Buffet";
						}
						if($secondParameter=="LuxuryDinner-restaurant")
						{
							$linkArr['searchOrder'] = "LuxuryDinner";
						}
					
						$location = new Zend_Controller_Router_Route("/$cityname/".$secondParameter."/:searchCriteria",
										$linkArr);	
						$router->addRoute('restaurantlist', $location);
					}
					else
					{
						$location = new Zend_Controller_Router_Route("/$cityname/".$secondParameter,
										array('module'=>$moduleName,
											  'controller' => 'Restaurant',
											  'action'=> 'restaurantlist',
											  'searchCity'=>$cityname,
												'searchCityId' => $cityid));	
						$router->addRoute('restaurantlist', $location);
					}
				}
				else
				{
					if($secondParameter=="best-restaurant")
					{
						$location = new Zend_Controller_Router_Route("/$cityname/$secondParameter",
										array('module'=>$moduleName,
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
											array('module'=>$moduleName,
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
										array('module'=>$moduleName,
											  'controller' => 'Restaurant',
											  'action'=> $toAction,
											  'searchCityId' => $cityid,
												'searchLocation' => $place_id,
												'searchOrder'=>"best",
												'searchCity'=>$cityname,
												'searchLocationName'=>$place));	
									$router->addRoute('restaurantlist', $location);
								}
								else
								{
									$str = implode('/', $uriArr);
									$message = "Page not found error for url : ".$str;
									Rdine_Logger_FileLogger::info($message);
									$location = new Zend_Controller_Router_Route("/$str",
															array(
																  'controller' => 'Error',
																  'action'=> 'pagenotfound'));	
										$router->addRoute('error', $location);	
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
											array('module'=>$moduleName,
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
											array('module'=>$moduleName,
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
								else
								{
									$str = implode('/', $uriArr);
									$message = "Page not found error for url : ".$str;
									Rdine_Logger_FileLogger::info($message);
									$location = new Zend_Controller_Router_Route("/$str",
															array(
																  'controller' => 'Error',
																  'action'=> 'pagenotfound'));	
										$router->addRoute('error', $location);	
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
											array('module'=>$moduleName,
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
											array('module'=>$moduleName,
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
								else
								{
									$str = implode('/', $uriArr);
									$message = "Page not found error for url : ".$str;
									Rdine_Logger_FileLogger::info($message);
									$location = new Zend_Controller_Router_Route("/$str",
															array(
																  'controller' => 'Error',
																  'action'=> 'pagenotfound'));	
										$router->addRoute('error', $location);	
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
											array('module'=>$moduleName,
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
										array('module'=>$moduleName,
											  'controller' => 'Restaurant',
											  'action'=> $toAction,
												'searchLocation' => $place_id,
												'searchCity'=>$cityname,
												'searchCityId' => $cityid,
												'searchLocationName'=>$place));	
									$router->addRoute('restaurantlist', $location);
									}
								}
								else
								{
									$str = implode('/', $uriArr);
									$message = "Page not found error for url : ".$str;
									Rdine_Logger_FileLogger::info($message);
									$location = new Zend_Controller_Router_Route("/$str",
															array(
																  'controller' => 'Error',
																  'action'=> 'pagenotfound'));	
										$router->addRoute('error', $location);	
								}
								break;
							}
						}
					}
				}
			}
		
			}
		}
		else
		{
			$location = new Zend_Controller_Router_Route("/",
										array('module'=>$mobileIndex,
											  'controller' => 'Index',
											  'action'=> 'index',
												));	
					$router->addRoute('index', $location);
		}
		return $router;
	}
}
