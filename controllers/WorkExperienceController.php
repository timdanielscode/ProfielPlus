<?php 

/* @author Tim Daniëls
 * Work experience functionality
*/

class WorkExperienceController extends Controller {

    public function create() {

        return $this->view('work-experience/create');
    }

    public function store($request) {

        if(isset($request['submit']) === true) {

            $workExpierence = new WorkExperience();
            $workExpierence->insert($request, $_SESSION['userId']);

            redirect('/profile/' . $_SESSION['userId'] . '/work-experience');
        }
    }
}