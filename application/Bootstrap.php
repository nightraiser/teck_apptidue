<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initAutoload()
	{
		$moduleLoader = new Zend_Application_Module_Autoloader(array(
		'namespace'=> '',
		'basePath' => APPLICATION_PATH)

		);
		$autoloader = Zend_Loader_Autoloader::getInstance();
		$autoloader->registerNamespace('Rdine_');
		$autoloader->registerNamespace('LeaderSend_');
		return $moduleLoader;
	}

	protected function _initDoctype()
	{
		$this->bootstrap('view');
		$view = $this->getResource('view');
		$view->doctype('XHTML1_STRICT');
		$view->addHelperPath('Rdine/Helper/', 'Rdine_Helper');
	}
	protected function _initResourceLoader()
	{
		$this->_resourceLoader->addResourceType( 'service', 'services', 'Service' );

	}
	
	protected function _initSetTranslations()
	{
		$translate = new Zend_Translate(
					    array(
					        'adapter' => 'gettext',
					        'content' => APPLICATION_PATH . '/../library/Rdine/Translate/Language',
					    	'locale'	=>	null,
					    	'scan' => Zend_Translate::LOCALE_FILENAME
					    )
					);
		$namespace = new Zend_Session_Namespace(); 
		
		$language = 'en';
		if($namespace->lang){
			if($namespace->lang == 'en_US'){
				$language = 'en';
				$namespace->lang = 'en_US';
			}
			if($namespace->lang == 'es_SP'){
				$language = 'es_SP';
			}
		}else{
			$language = 'en';
			$namespace->lang = 'en_US';
			
		}
		$translate->setLocale($language);
		$view = $this->getResource('view');
		$view->translate = $translate;
		if($namespace->lang){
			$view->lang = $namespace->lang;
		}else{
			$view->lang = 'en_US';
			$namespace->lang = 'en_US';
		}
	}

	protected function _initLog()
	{
		if($this->hasPluginResource("log")){
				
			$r = $this->getPluginResource("log");
			$log = $r->getLog();
			Zend_Registry::set('log',$log);
		}
	}
	
}

