<?php

/**
 * View - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		msi
 * @author              Joey Hipolito <me@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class View {
    
    protected $templatePath;
    protected $templateDirectory;
    public $data = array();
    
    public function getData($key = null) {
        if (!is_null($key)) {
            return isset($this->data[$key]) ? $this->data[$key] : null;
        } else {
            return $this->data;
        }
    }
    
    /**
     * Set data
     *
     * If two arguments:
     * A single datum with key is assigned value;
     *
     *     $view->setData('color', 'red');
     *
     * If one argument:
     * Replace all data with provided array keys and values;
     *
     *     $view->setData(array('color' => 'red', 'number' => 1));
     *
     * @param   mixed
     * @param   mixed
     * @throws  InvalidArgumentException If incorrect method signature
     */
    public function setData() {
        $args = func_get_args();
        if (count($args) === 1 && is_array($args[0])) {
            $this->data = $args[0];
        } elseif (count($args) === 2) {
            $this->data[(string) $args[0]] = $args[1];
        } else {
            throw new \InvalidArgumentException('Cannot set View data with provided arguments. Usage: `View::setData( $key, $value );` or `View::setData([ key => value, ... ]);`');
        }
    }
    
    public function setTemplate($template) {
        $w = explode('_', $template);
        foreach ($w as $key => $value) {
           $w[$key] = ucfirst($value); 
        }
        $template = implode('', $w) . 'Template';
        
        $this->templatePath = APPPATH . 'views' . DS . 'templates' . DS . $template . EXT;
        if (!file_exists($this->templatePath)) {
            throw new \RuntimeException($this->templatePath . ' does not exist');
        }
    }
    
    public function render($template) {
        $this->setTemplate($template);
        extract($this->data);
        require $this->templatePath;
    }
}

/* End of file View.php */