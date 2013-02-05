<?php

/**
 * Router - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		msi
 * @author              Joey Hipolito <me@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Router {
    /**
     * @var (array)string $uri - contains the uri request
     */    
    private $uri;
    /**
     * @var (array)string $controller - describes what class to call
     */   
    private $controller;
    /**
     * @var (array)string $action - describes what class's method to execute
     */ 
    private $action;
    /**
     * @var (array)string $id - optional parameter
     * @example users/delete/5
     */ 
    private $id;
    /**
     * @param (array)string $uri - contains request parameters
     */
    public function __construct($uri) {
        $this->uri = $uri;
    }
    
    public function map() {
        
        if (empty($this->uri[0])) {
            $this->controller = DEFAULT_CONTROLLER;
            $this->action = 'index';
            $this->id = null;
        } else {
            $this->controller = $this->uri[0];
            if (empty($this->uri[1])) {
                $this->action = 'index';
            } else {
                $this->action = $this->uri[1];
                if (empty($this->uri[2])) {
                    $this->id = null;
                } else {
                    $this->id = $this->uri[2];
                }
            }
        }
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getId() {
        return $this->id;
    }
}

/* End of file Router.php */