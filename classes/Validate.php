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

                                self::$errors[$keys] = 'Field is required!';
                            }
                        break;
                        case "max":
                   
                            if(strlen($_POST[$keys]) > $value) {

                                self::$errors[$keys] = 'Too many characters!';
                            }
                        break;
                        case "min":
                   
                            if(strlen($_POST[$keys]) < $value) {

                                self::$errors[$keys] = 'Field amount characters should be at least ' . $value . '!';
                            }
                        break;
                        case "match":

                            if($_POST[$keys] !== $_POST[$value]) {

                                self::$errors[$keys] = 'Field does not match with ' . $value . '!';
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