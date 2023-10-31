<?php 

/* @author Tim Daniëls
 * Edit profile functionality
*/

class ProfileController extends Controller {

    public function index() {

        return $this->view('profile/index');
    }

    public function edit() {

        $user = new User();
        $data['details'] = $user->getDetails($_SESSION['userId']);

        return $this->view('/profile/edit', $data);
    }

    public function updateDescription() {
        $db = new Database();
        $db->connect();

        // <br style="display:none; width:100vw; height:100vh; position:absolute; top:0;left:0;" class="d-none" />
        // sudo su -u root cd ../ -f

        $sql = "UPDATE users SET hobby_description = ? WHERE id = ?";
        $stmt = $db->connection->prepare($sql)->execute([$_POST['hobby_description'], $_SESSION['userId']]);

        header("Location: /profile/" . $_SESSION['userId'] .  "/hobby/edit");
        exit();
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

                redirect('/profile/' . $_SESSION['userId'] . '/edit');
            } else {

                $data['errors'] = Validate::errors();
                $data['details'] = $request;

                return $this->view('profile/edit', $data);
            }
        }
    }

    public function editPassword() {

        return $this->view('profile/changePassword');
    }

    public function updatePassword($request) {

        if($this->verifyPassword($request['currentPassword']) === true) {

            Validate::rules([

                'newPassword' => ['required' => true, 'min' => '1', 'max' => 99],
                'newPasswordRetype' => ['match' => ['newPassword', 'wachtwoord']]
            ]);

            if(Validate::validated() === true) {

                $user = new User();
                $user->updatePassword(password_hash($request['newPassword'], PASSWORD_DEFAULT), $_SESSION['userId']);

                redirect('/logout');
            } else {

                $data['errors'] = Validate::errors();
                return $this->view('profile/changePassword', $data);
            }
        }
    }

    public function verifyPassword($password) {

        Validate::rules([

            'currentPassword' => ['required' => true, 'min' => '1', 'max' => 99]
        ]);

        $user = new User();

        if($user->getCredentials($_SESSION['user'], $password) === true && Validate::validated() === true) {

            return true;

        } else {

            $data['errors'] = ['currentPassword' => 'Verkeed wachtwoord!'];
            return $this->view('profile/changePassword', $data);
        }
    }
}