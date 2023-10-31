<?php 

/*
 * @author Tim Daniëls
 * 
 * Adding js scripts
 * 
*/

class Script {

    /*
     * @param array $scripts script src (defering boolean)
     * @return void 
    */
    public static function add($scripts) {

        foreach($scripts as $src => $defer) {

            if($defer === true) {

                echo '<script type="text/javascript" src="' . $src . '" defer></script>';
            } else {
                echo '<script type="text/javascript" src="'. $src . '"></script>';
            }
        }
    }
}