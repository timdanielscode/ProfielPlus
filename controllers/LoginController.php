<?php

class LoginController extends Controller {
    
    
    public function show () {
        $this->view('login');
    }



    public function authenticate ($login) {
        if (isset($login["submit"])) {
            $user = new User();

            $user->getCredentials($login["email"], $login["password"]);
        }
    }
    
    
    
}