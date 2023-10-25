<?php 

class EditSchoolsController extends Controller {

    private $education;

    public function __construct() {
        $this->education = new Education();
    }
    
    public function show () {


        // getting all the subjects and their marks
        $data['subjectsWithMarks'] = $this->education->getUserSubjectsWithMarks($_SESSION['userId']);
        $data['subjectsWithoutMarks'] = $this->education->getUserSubjectsWithoutMarks($_SESSION['userId']);
        
        /**
         *  getting all institutes, education programs of a certain user and 
         *  store them in the achieved array if they have a diploma for it
         */
        $data['schoolsAchieved'] = $this->education->getUserEducations($_SESSION['userId'])[0];
        $data['schoolsNotAchieved'] = $this->education->getUserEducations($_SESSION['userId'])[1];

        /**
         * getting all institutes and education programs
         */
        $data['institutes'] = $this->education->getInstitutes();
        $data['educations'] = $this->education->getEducations();

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
        }

    }

}