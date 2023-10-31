<?php

class AdminController extends Controller {

    private $education;
    private $user;

    public function __construct () {
        $this->education = new Education();
        $this->user = new User();
    }

    public function show() {
        
        $data['usernames'] = $this->user->getAllEmailAdresses();// fetching all user emails

        $this->view('adminPage', $data);

    }

    public function createSchool() {
        
    }

    public function deleteSchool() {

    }
    
    public function createEducation() {

    }

    public function deleteEducation() {

    }

    public function createSubject() {

    }

    public function deleteSubject() {

    }

    public function deleteUser() {

    }

    
}