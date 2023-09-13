<?php 

/*
 * @author Tim Daniëls
 * 
 * For setting type of request get method routes (get method)
*/

class Route extends Router {

    /* Setting route type of get
     *
     * @param array $paths css file paths + filenames
     * @return object Router
    */
    public static function get($path) {

        if(!empty($path) && $path !== null) {

           $router = new Router();
           return $router->getRoute($path);
        }
    }
}