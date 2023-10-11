<?php 

/* @author Tim Daniëls
 * Edit profile functionality
*/

class ProfileController extends Controller {

    public function edit() {

        $user = new User();
        $data['details'] = $user->getDetails($_SESSION['userId']);

        return $this->view('/profile/edit', $data);
    }

    public function update($request) {

        if(isset($request['submit']) === true) {

            $user = new User();
            $uniqueEmail = $user->getUniqueEmail($request['email'], $_SESSION['userId']);

            Validate::rules([

                'firstName' => ['required' => true, 'max' => 30, 'special' => true],
                'lastName' => ['required' => true, 'max' => 50, 'special' => true],
                'email' => ['required' => true, 'max' => 50, 'special' => true, 'unique' => $uniqueEmail]
            ]);

            if(Validate::validated() === true) {

                $user = new User();
                $user->updateDetails($request, $_SESSION['userId']);

                redirect('/profile/' . $_SESSION['userId']);
            } else {

                $data['errors'] = Validate::errors();
                $data['details'] = $request;

                return $this->view('profile/edit', $data);
            }
        }
    }
}