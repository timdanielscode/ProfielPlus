<?php

/* @author Tim Daniëls
 * For form validation
*/

class Validate {

    private static $_inputNames;
    public static $errors = [];

    /* Setting form validation rules
     *
     * @param array $data input names + rules (multidimensional)
    */
    public static function rules($data) {

        if(!empty($data) && $data !== null) {

            foreach($data as $keys => $values) {

                foreach($values as $key => $value) {

                    switch ($key) {
                        case "required":
                          
                            if($value === true && empty($_POST[$keys])) {

                                self::$errors[$keys] = $key;
                            }
                        break;
                        case "max":
                   
                            if(strlen($_POST[$keys]) > $value) {

                                self::$errors[$keys] = $key;
                            }
                        break;
                    }
                }
            }
        }
    }

    /* 
     * Getting validation errors
     *
    */
    public static function errors() {

        return self::$errors;
    }

    /* 
     * Checking validation
     *
    */
    public static function validated() {

        if(empty(self::$errors) ) {

            return true;
        } else {
            return false;
        }
    }
}