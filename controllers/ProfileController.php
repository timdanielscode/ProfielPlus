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

        $user = new User();
        $user->updateDetails($request, $_SESSION['userId']);

        redirect('/profile/' . $_SESSION['userId']);
    }
}