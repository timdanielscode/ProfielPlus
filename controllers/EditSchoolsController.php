<?php 

class EditSchoolsController extends Controller {
    
    public function show () {

        $education = new Education();

        $data['institutes'] = $education->getInstitutes();
        $data['educations'] = $education->getEducations();
        $data['subjects'] = $education->getSubjects();

        $this->view('editSchools', $data);
    }

}