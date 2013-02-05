<?php

/**
 * Controller - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		msi
 * @author              Joey Hipolito <me@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Controller {
    protected $view;
    public function __construct(View $view = null) {
        $this->view = $view;
    }
}

/* End of file Controller.php */