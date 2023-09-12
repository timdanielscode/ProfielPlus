<?php 

/*
 * @author Tim Daniëls
 * 
 * Adding css stylesheets 
 * 
*/
class Stylesheet {
    
    /*
     * @param array $paths css file paths + filenames
     * @return void 
    */
    public static function add($paths) {

        if(!empty($paths) && $paths !== null) {

            foreach($paths as $path) {

                echo '<link rel="stylesheet" href="' . $path . '"></head><body>';
            }
        }
    }
}