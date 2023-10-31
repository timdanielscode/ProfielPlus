<?php 

/*
 * @author Tim Daniëls
 * 
 * Can be used to display session success messages
*/

class Message {

    /* Displaying success session messages and unseting session afterwards
     *
     * @param string $sessionName name session
    */
    public static function success($sessionName) {

        if(isset($_SESSION[$sessionName]) ) {

            echo '<span class="message successMessageg">' . $_SESSION[$sessionName] . '</span>';
        }

        unset($_SESSION[$sessionName]);
    }
}