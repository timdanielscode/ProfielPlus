<?php

class LoginController extends Controller {
    
    
    public function show () {
        $this->view('login');
    }



    public function authenticate ($login) {
        if (isset($login["submit"])) {
            $user = new User();

            if($user->getCredentials($login["email"], $login["password"]) === true) {

                redirect('/portfolio');
            } else {

                return $this->view('/login');
            }
        }
    }
    
    
    
}