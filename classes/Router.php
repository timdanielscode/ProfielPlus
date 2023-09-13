<?php 

/* @author Tim Daniëls
 *
 * For setting request uri path and creating instances of controller classes
*/

class Router {

    private $_path;

    /* Setting request uri path for type of request method get
     *
     * @param string $path routing path
     * @return object Router
    */
    public function getRoute($path) {

        if($path === $this->getUri() && $_SERVER['REQUEST_METHOD'] === 'GET' || '/' . $path === $this->getUri() && $_SERVER['REQUEST_METHOD'] === 'GET') {

            $this->_path = $path;
        } 

        return $this;
    }

    /* Setting request uri path for type of request method post
     *
     * @param string $path routing path
     * @return object Router
    */
    public function postRoute($path) {

        if($path === $this->getUri() && $_SERVER['REQUEST_METHOD'] === 'POST' || '/' . $path === $this->getUri() && $_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->_path = $path;
        } 

        return $this;
    }

    /* Gettting request uri
     *
     * @return string request uri
    */
    public function getUri() {

        return $_SERVER['REQUEST_URI'];
    }

    /* Creating instances of controller classes
     *
     * @param string $class controller class name 
     * @param string $method controller method/function name
     * 
     * @return object controller class
    */
    public function add($class, $method) {

        if($this->_path !== null) {

            $controller = new $class;
            return $controller->$method();
        }
    }
}