<?php

error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

    
define('ROOT_DIR', dirname(dirname(__FILE__)));
    
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);


// load configuration
$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'production');
$registry = Zend_Registry::getInstance();
$registry->set('config', $config);

// setup database
$db = Zend_Db::factory($config->resources->db);
Zend_Db_Table::setDefaultAdapter($db);

// Initialise Zend_Layout's MVC helpers
Zend_Layout::startMvc(array('layoutPath' => ROOT_DIR.'/application/views/layouts'));

$application->bootstrap()
            ->run();