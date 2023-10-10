<?php

class PasswordResetRequestController extends Controller
{
    public function show()
    {
        $this->view('passwordresetrequest');
    }

    public function verify($code)
    {
        if (password_verify($code['code'], $_GET['c'])) {
            header("Location: /passwordreset");
        } else {
            echo "go home you filty hacker!";
        }
    }
}
