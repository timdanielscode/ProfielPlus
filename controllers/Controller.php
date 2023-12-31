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
    public function view($file, $data = null) {

        if(file_exists('views/' . $file . '.php')) {

            if(!empty($data) && $data !== null) {

                extract($data);
            }

            require_once 'views/' . $file . '.php';
        }
    }

    /* For require view files
     *
     * @param string $file view filename
     * @return void
    */
    public function include($file) {

        if(file_exists('views/includes/' . $file . '.php')) {

            require_once 'views/includes/' . $file . '.php';
        }
    }
}