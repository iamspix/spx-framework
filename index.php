<?php

/**
 * The directory that contains the application specific resources
 * The application directory MUST contain the bootstrap.php file
 */

$app = 'app';

/** 
 * The directory that contains the system specific resources especially'
 * the routing mechanism
 */
$system = 'system';

/**
 * The default extension name used in the system
 */
define('EXT', '.php');

/**
 * This sets the PHP error reporting level.
 * It is HIGHLY RECOMMENDED to set this on  * if the project is under development
 */
define('DEVELOPMENT_ENVIRONMENT', true);

// Shorten DIRECTORY_SEPARATOR global,
define('DS', DIRECTORY_SEPARATOR);

// Set full path to the document root
define('ROOT', realpath(dirname(__FILE__)) . DS);

// Set the default controller, action and
define('DEFAULT_CONTROLLER', 'default');

// Make the application directory relative to ROOT directory
if (is_dir($app) and is_dir(ROOT.$app)) {
    $app = ROOT.$app;
}

// Make the system directory relative to ROOT directory
if (is_dir($system) and is_dir(ROOT.$system)) {
    $system = ROOT.$system;
}

// Set paths for the application
define('APPPATH', realpath($app).DS);
define('SYSPATH', realpath($system).DS);

// Clean Up configuration variables
unset($app, $system);

// require config file that contains user set configurations
require APPPATH . 'config' . EXT;

// require function file that contains common helper functions that will be used
require APPPATH . 'functions' . EXT;

// require autoload file that contains autoload functions
require APPPATH . 'autoload' . EXT;

// require bootstrap file that will handle uri request then process it through
require APPPATH . 'bootstrap' . EXT;


