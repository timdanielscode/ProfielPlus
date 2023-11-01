<?php 

class EditSchoolsController extends Controller {

    private $education;

    public function __construct() {
        $this->education = new Education();
    }
    
    public function show () {


        /**
         *  getting all institutes, education programs of a certain user and 
         *  store them in the achieved array if they have a diploma for it
         */
        $data['schoolsAchieved'] = $this->education->getUserEducations($_SESSION['userId'])[0];
        $data['schoolsNotAchieved'] = $this->education->getUserEducations($_SESSION['userId'])[1];

        /**
         * getting all institutes, education programs and subjects
         */
        $data['institutes'] = $this->education->getInstitutes();
        $data['educations'] = $this->education->getEducations();
        $data['subjects'] = $this->education->getSubjects();

        /**
         * getting all the subjects and marks from current user
         */
        $data["subjectsWithMarks"] = $this->education->getUserSubjectsMarks($_SESSION['userId'])['with'];
        $data["subjectsWithoutMarks"] = $this->education->getUserSubjectsMarks($_SESSION['userId'])['without'];

        $this->view('addEducation', $data);
        $this->view('editSchools', $data);
    }

    public function editOrDelete($data) {
        if (isset($data['updateEducation'])) {
           
            $this->education->editEducation(
                $data['instituutSelect'], 
                $data['educationSelect'], 
                $data['diplomaAchieved'], 
                $_SESSION['userId'], 
                $data['oldeducationSelect'], 
                $data['oldInstituutSelect']
            );
        } else if (isset($data['deleteEducation'])) {
            $this->education->deleteSchool(
                $data['instituutSelect'], 
                $data['educationSelect'], 
                $_SESSION['userId']
            );
        } else if (isset($data['updateSubject'])) {
            $this->education->editSubject(
                $data['subjectSelect'], 
                $data['mark'], 
                $data['oldSubject'], 
                $_SESSION['userId']
            );
        } else if (isset($data['deleteSubject'])) {
            $this->education->deleteSubject(
                $data['subjectSelect'], 
                $_SESSION['userId']
            );
        }

    }

}