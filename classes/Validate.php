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

                        /*
                         * To make input field required 
                        */
                        case "required":
                          
                            if($value === true && empty($_POST[$keys])) {

                                self::$errors[$keys] = 'Veld is leeg!';
                            }
                        break;
                        /*
                         * To limit input field amount characters 
                        */
                        case "max":
                   
                            if(strlen($_POST[$keys]) > $value) {

                                self::$errors[$keys] = 'Te veel veld karakters!';
                            }
                        break;
                        /*
                         * To ensure minimum input field amount characters are being applied
                        */
                        case "min":
                   
                            if(strlen($_POST[$keys]) < $value) {

                                self::$errors[$keys] = 'Aantal veld karakters moet minimaal ' . $value . ' zijn!';
                            }
                        break;
                        /*
                         * Force input field value match an other input value
                        */
                        case "match":

                            if($_POST[$keys] !== $_POST[$value[0]]) {

                                self::$errors[$keys] = 'Veld komt niet overeen met het ' . $value[1] . ' veld!';
                            }
                        break;
                        /*
                         * Not allowing special characters inside input value
                        */
                        case "special":

                            $regex = '/[#$%^&*()+=\\[\]\';,\/{}|":<>?~\\\\]/';
                            if($value === true && preg_match($regex, $_POST[$keys])) {
    
                                self::$errors[$keys] = 'Veld mag geen vreemde karakters bevatten!';
                            }
                        break;
                        /*
                         * Checking if html input value is unqiue based
                        */
                        case "unique":

                            if(!empty($value)) {

                                self::$errors[$keys] = 'Veld moet uniek zijn!';
                            }
                        break;
                        /*
                         * Checking if html input end date value is greater than start date input value
                        */
                        case "later":

                            if($value[0] > $_POST[$keys]) {

                                self::$errors[$keys] = 'Einddatum veld kan niet eerder zijn dan startdatum!';
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