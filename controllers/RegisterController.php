<?php 

/* @author Tim Daniëls
 * For registering users
*/

class RegisterController extends Controller {

    public function register() {

        return $this->view('register');
    }

    public function store($request) {

        if(isset($request['submit']) === true) {

            Validate::rules([

                'firstName' => ['required' => true, 'max' => 30, 'special' => true],
                'lastName' => ['required' => true, 'max' => 50, 'special' => true],
                'email' => ['required' => true, 'max' => 50, 'special' => true],
                'password' => ['required' => true, 'min' => 2, 'max' => 99],
                'retypePassword' => ['match' => ['password', 'wachtwoord']]
            ]);

            if(Validate::validated() === true) {

                $user = new User();
                $user->insert($request);

                header("Location: /");
            } else {

                $rules['errors'] = Validate::errors();
                return $this->view('register', $rules);
            }
        }
    }
}