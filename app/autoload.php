<?php

// autoload

if (!function_exists('autoload_system')) {
    function autoload_system($className) {
        $fileName = SYSPATH . $className . '.php';
        if (file_exists($fileName)) {
            require $fileName;
        }
    }
}

// autoload_register

spl_autoload_register('autoload_system');