<?php 

/* @author Tim Daniëls
 * LogoutController, unsetting login related sessions + redirection to /
*/

class LogoutController {

    public function logout() {

        if(isset($_SESSION['user']) === true && isset($_SESSION['loggedIn']) === true) {

            unset($_SESSION['user']);
            unset($_SESSION['loggedIn']);
    
            redirect('/');
        }
    }
}