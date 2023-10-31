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
        // fetching all schools, educations, subjects
        $data['schools'] = $this->education->getInstitutes();
        $data['educations'] = $this->education->getEducations();
        $data['subjects'] = $this->education->getSubjects();

        $this->view('adminPage', $data);

    }

    public function adminAction($post) {
        if (isset($post['deleteBtn']) && $post['userSelect'] !== "") {
            $this->user->deleteUser($post['userSelect']);
        } else if (isset($post['submitNewSchool']) && $post['addSchool'] !== "") {
            $this->education->createNewSchool($post['addSchool']);
        } else if (isset($post['submitNewEducation']) && $post['addEducation'] !== "") {
            $this->education->createNewEducation($post['addEducation']); 
        } else if (isset($post['submitNewSubject']) && $post['addSubject'] !== "") {
            $this->education->createNewSubject($post['addSubject']);
        } else if (isset($post['deleteSchool']) && $post['schoolSelect'] !== "") {
            $this->education->adminDeleteSchool($post['schoolSelect']);
        } else if (isset($post['deleteEducation']) && $post['educationSelect'] !== "") {
            $this->education->adminDeleteEducation($post['educationSelect']);
        } else if (isset($post['deleteSubject']) && $post['subjectSelect'] !== "") {
            $this->education->adminDeleteSubject($post['subjectSelect']);
        }
        header("Location: /admin");

    }

    
    public function deleteSchool() {

    }
    
   
    public function deleteEducation() {

    }

   

    public function deleteSubject() {

    }

    
    
}