<?php 

/* @author Tim Daniëls
 * For registering users
*/

class RegisterController extends Controller {

    public function register() {

        return $this->view('register');
    }

    public function store($request) {

        $user = new User();
        $user->insert();
    }
}