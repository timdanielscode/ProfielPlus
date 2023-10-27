<?php 

/* @author Tim Daniëls
 * Work experience functionality
*/

class WorkExperienceController extends Controller {

    public function create() {

        $data = [];

        return $this->view('work-experience/create', $data);
    }

    public function store($request) {

        if(isset($request['submit']) === true) {

            Validate::rules([

                'employer' => ['required' => true, 'max' => 30, 'special' => true],
                'startDate' => ['required' => true],
                'endDate' => ['required' => true, 'later' => [$request['startDate']]]
            ]);

            if(Validate::validated() === true) {

                $workExpierence = new WorkExperience();
                $workExpierence->insert($request, $_SESSION['userId']);

                redirect('/profile/' . $_SESSION['userId'] . '/work-experience');
            } else {

                $data['errors'] = Validate::errors();
                $data['data'] = $request;

                return $this->view('work-experience/create', $data);
            }
        }
    }
}