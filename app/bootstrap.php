<?php defined('SYSPATH') or die ('No Direct Access Allowed!');

// -- Environment setup --------------------------------------------------------

/**
 * Set default time zone
 * 
 * @link - http://www.php.net/manual/timezones
 */
date_default_timezone_set('Asia/Hong_Kong');

// -- Routing and Dispatching --------------------------------------------------

/**
 * The variable that contains an array of values extracted from the url that
 *     represents controller/action/parameters
 * @example : URL = http://www.domain.com/play/process/1
 *     where play    -> controller
 *           process -> method/action
 *           1       -> parameter
 */

$uri = explode('/', filter_var(rtrim(isset($_GET['url'])?  $_GET['url'] : null, '/'), FILTER_SANITIZE_URL));
$router = new Router($uri);
$router->map();

/**
* This one capitalize each word in a string separated by underscore
* and merge them as a single word
* @example welcome_controller -> WelcomeController
* @var (array) string $w This array contains the exploded controller
*/

$w = explode('_', $router->getController());
foreach ($w as $key => $value) {
   $w[$key] = ucfirst($value); 
}

$class = implode('', $w) . 'Controller';
$classFile = APPPATH . 'controllers' . DS . $class . EXT;
$view = str_replace('Controller', 'View', $class);
$viewFile = APPPATH . 'views' . DS . $view . EXT;

$method = $router->getAction();
$id = $router->getId();

if (file_exists($classFile)) {
    require $classFile;
    
    if (file_exists($viewFile)) {
        require $viewFile;
        $controller = new $class(new $view());
    } else {
        $controller = new $class();
    }
    
    $controller->{$method}($id);
    
}



// Add filters in here
