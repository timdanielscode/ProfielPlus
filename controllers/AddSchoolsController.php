<?php

class AddSchoolsController extends Controller {
    
    public function show () {

        $education = new Education();

        $data['institutes'] = $education->getInstitutes();
        $data['educations'] = $education->getEducations();
        $data['subjects'] = $education->getSubjects();


        $this->view('addEducation', $data);
    }

    public function addSchoolOrSubject($add) {
        $education = new Education();

        if (isset($add['addEducation'])) {
            if (isset($add['addEducation'], $add['instituutSelect'], $add['educationSelect'])) {
                $education->userAddsSchool($_SESSION['userId'], $add['hasDiploma'], $add['instituutSelect'], $add['educationSelect']);
            } else {
                echo "<script>alert('Vul alle velden in alstublieft');</script>";
                header("Location: /add-schools");
            }
        }
        else if (isset($add['addSubject'])) {
            if ($add['subjectSelect'] !== "") {
                $education->userAddsSubject($_SESSION['userId'], $add['subjectSelect'], $add['mark']);
            } else {
                echo "<script>alert('Vul alle velden in alstublieft');</script>";
                header("Location: /add-schools");
            }
        }
    }
    
    

}
