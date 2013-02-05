<?php defined('SYSPATH') or die ('No Direct Access Allowed!');

// -- Configuration specific functions -----------------------------------------

// Set up
if (!function_exists('set_error_reporting')) {
    function set_error_reporting() {
        error_reporting(E_ALL | E_STRICT);
        if (DEVELOPMENT_ENVIRONMENT == true) {
            ini_set('display_errors', 'On');
        } else {
            ini_set('display_errors', 'Off');
        }
        ini_set('log_errors', 'On');
        ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log');
    }
}

// -- Helper functions ---------------------------------------------------------
/**
 * @name base_url() 
 * @description returns base url set in the config file
 */
if (!function_exists('base_url')) {
    function base_url() {
        return 'http://localhost/';
    }
}

/**
 * @name asset_url() 
 * @description returns asset url set in the config file
 */
if (!function_exists('asset_url')) {
    function asset_url() {
        return 'http://localhost/public/';
    }
}

/**
 * @name get_header()
 * @description returns application common header
 * @param $name - name of the header file, set to default if null
 */
if (!function_exists('get_header')) {
    function get_header($name = null) {
        $file = '';
        if (!isset($name)) {
            $file = 'default_header';
        } else {
            $file = $name . '_header';
        }
        include APPPATH . 'views' . DS . 'includes' . DS . $file . EXT;
        echo "\n";
    }
}

/**
 * @name get_footer()
 * @description returns application common footer
 * @param $name - name of the footer file, set to default if null
 */
if (!function_exists('get_footer')) {
    function get_footer($name = null) {
        $file = '';
        if (!isset($name)) {
            $file = 'default_footer';
        } else {
            $file = $name . '_footer';
        }
        include APPPATH . 'views' . DS . 'includes' . DS . $file . EXT;
        echo "\n";
    }
}

/**
 * @name link_file
 * @description This function help scripts and stylesheet linking
 * @note Original function created by Aaron Noel De Leon
 * @note Modified by Joey Hipolito @link http://joeyhipolito.com/
 * @uses asset_url() that returns asset directory
 */
if (!function_exists('link_file')) {
    function link_file($file, $rel) {
        
        if ($rel === 'script') {
            echo '<script src="' . asset_url() . 'js/' . $file . '.js"></script>' . "\n";
        } elseif ($rel === 'icon') {
            echo '<link rel="shortcut icon" href="' . asset_url() . 'images/icons/' . $file . '.ico">'. "\n";
        } else {
            echo '<link rel="' . $rel . '" href="' . asset_url() . 'css/' . $file . '.css">'. "\n";
        }
    }
}

// Handle Error Pages
if (!function_exists('notfound')) {
    function notfound() {
        header('Location: ' . base_url() . 'notfound');
    }
}


// enable general functions files
set_error_reporting();
