<?php

class PasswordforgottenController extends Controller
{
    public function show()
    {
        $this->view('passwordforgotten');
    }

    public function verify($login)
    {
        if (isset($login['email'])) {
            $user = new User();

            if ($user->verify($login['email']) == false) {
                echo "no user with that email found";
            } else {
                header("Location: https://coachjoshuadebruijn.com/?mail=" . $login['email']);
            }
        }
    }
}
