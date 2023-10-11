<?php 

/* @author Tim Daniëls
 * Autoloading, to include/require classes automatically
 * Currently from following folders + routes.php file: classes, controllers
*/

require_once 'config.php';
require_once "database/Database.php";
require_once 'functions/functions.php';

spl_autoload_register(function ($class) {

    if(file_exists("classes/" . $class . '.php')) {
        
        require_once 'classes/' . $class . '.php';
    } else if(file_exists("controllers/" . $class . '.php')) {
        require_once 'controllers/' .  $class . '.php';
    } else if(file_exists("models/" . $class . '.php')) {
        require_once 'models/' .  $class . '.php';
    } 
});

require_once 'routing/routes.php';

