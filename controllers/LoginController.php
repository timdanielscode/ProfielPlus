<?php

class LoginController extends Controller {
    
    
    public function show () {
        $this->view('login');
    }



    public function authenticate ($login) {
        if ($login["submit"] == "Login") {
            $user = new User();

            if($user->getCredentials($login["email"], $login["password"]) === true) {

                redirect('/profile/' . $_SESSION["userId"]);
            } else {

                return $this->view('/login');
            }
        }
        else if ($login["submit"] == "Register") {
            header ("Location: /register");
        }
    }
    
    
    
}