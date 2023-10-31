<?php

class AddSchoolsController extends Controller {

    private $education;

    public function __construct() {
        $this->education = new Education();
    }
    
    public function show () {

        $data['institutes'] = $this->education->getInstitutes();
        $data['educations'] = $this->education->getEducations();
        $data['subjects'] = $this->education->getSubjects();


        $this->view('addEducation', $data);
    }

    public function addSchoolOrSubject($add) {

        if (isset($add['addEducation'])) {
            // if (isset($add['addEducation'], $add['instituutSelect'], $add['educationSelect'])) {
            //     $education->userAddsSchool($_SESSION['userId'], $add['hasDiploma'], $add['instituutSelect'], $add['educationSelect']);
            // } else {
            //     echo "<script>alert('Vul alle velden in alstublieft');</script>";
            //     header("Location: /add-schools");
            // }

            $addedSubjects = [];
            
            if ($add['instituutSelect'] !== "" && $add['educationSelect'] !== "") {

                for ($i = 0; $i < $add['subjectsCount']; $i++) {
                    $subjectName = $add["subjectSelect$i"];
                    $subjectMark = floatval($add["mark$i"]);
                    if ($subjectName !== "") {
                        if (!is_float($subjectMark)) {
                            $subjectMark = 0;
                        }
                        array_push($addedSubjects, ["subject" => $subjectName, "mark" => $subjectMark]);
                    }
                };

                $this->education->userAddsSchool(
                    $_SESSION['userId'], 
                    $add['hasDiploma'], 
                    $add['instituutSelect'], 
                    $add['educationSelect']
                );

                $this->education->userAddsSubject(
                    $_SESSION['userId'], 
                    $addedSubjects
                );

                $this->education->updateEducationsSchoolsSubjects(
                    $addedSubjects, 
                    $add['instituutSelect'], 
                    $add['educationSelect']
                );


            }
        header("Location: /edit-schools");

        }
        else if (isset($add['subjectCountSend'])) {
            // if ($add['subjectSelect'] !== "") {
            //     $education->userAddsSubject($_SESSION['userId'], $add['subjectSelect'], $add['mark']);
            // } else {
            //     echo "<script>alert('Vul alle velden in alstublieft');</script>";
            //     header("Location: /add-schools");
            // } 
        
            $data['institutes'] = $this->education->getInstitutes();
            $data['educations'] = $this->education->getEducations();
            $data['subjects'] = $this->education->getSubjects();
            if (is_int(intval($add["subjectsCount"]))) {
                $data["subjectCount"] = $add['subjectsCount'];
            } else {
                $data["subjectCount"] = 0;
            }
            $data['selectedInstitute'] = $add['instituutSelect'];
            $data['selectedEducation'] = $add['educationSelect'];


            $this->view('addEducation', $data);
        }
    }
    
    

}
