<?php 

/*
 * @author Tim Daniëls
 * 
 * For setting type of request get method routes (get method)
*/

class Route extends Router {

    /* Setting route type of get
     *
     * @param string route path
     * @return object Router
    */
    public static function get($path) {

        if(!empty($path) && $path !== null) {

           $router = new Router();
           return $router->getRoute($path);
        }
    }

    /* Setting route type of post
     *
     * @param string route path
     * @return object Router
    */
    public static function post($path) {

        if(!empty($path) && $path !== null) {

            $router = new Router();
            return $router->postRoute($path);
        }
    }
}