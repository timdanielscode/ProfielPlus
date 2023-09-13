<?php 

/* @author Tim Daniëls
 * For registering users
*/

class RegisterController {

    public function register() {

        require_once 'register.php';
    }

    public function store() {

        print_r($_POST);
    }
}