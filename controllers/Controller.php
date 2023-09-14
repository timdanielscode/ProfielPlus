<?php 

/* @author Tim Daniëls
 * Base Controller class which can be extended in other controllers
 * For using it's functionality
*/

class Controller {

    /* For require view files
     *
     * @param string $file filename
     * @return void
    */
    public function view($file) {

        if(file_exists($file . '.php')) {

            require_once $file . '.php';
        }
    }
}