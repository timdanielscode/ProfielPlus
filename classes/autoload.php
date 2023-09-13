<?php 

/* @autor Tim Daniëls
 * Autloading, to include/require classes automatically
 * 
*/

spl_autoload_register(function ($class) {

    if(file_exists("classes/" . $class . '.php')) {
        
        require_once $class . '.php';
    }
});

