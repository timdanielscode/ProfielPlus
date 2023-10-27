<?php 

/* @author Tim Daniëls
 * Work experience functionality
*/

class WorkExperienceController extends Controller {

    private function redirect($inputName, $path) {

        if(isset($inputName) === false) {
            
            redirect($path);
        }
    }

    private function validationRules($startDate) {

        return Validate::rules([

            'employer' => ['required' => true, 'max' => 30, 'special' => true],
            'jobTitle' => ['required' => true, 'max' => 50, 'special' => true],
            'startDate' => ['required' => true],
            'endDate' => ['required' => true, 'later' => [$startDate]],
            'details' => ['required' => true, 'max' => 250, 'special' => true]
        ]);
    }

    public function index() {

        $workExpierence = new WorkExperience();
        $data['jobExperiences'] = $workExpierence->getAll();

        return $this->view('work-experience/index', $data);
    }

    public function create() {

        $data = [];

        return $this->view('work-experience/create', $data);
    }

    public function store($request) {

        $this->redirect('submit', '/profile/' . $_SESSION['userId'] . '/work-experience');
        $this->validationRules($request['startDate']);

        if(Validate::validated() === true) {

            $workExpierence = new WorkExperience();
            $workExpierence->insert($request, $_SESSION['userId']);

            $_SESSION['create'] = 'Successvol nieuwe werkervaring toegevoegd!';
            redirect('/profile/' . $_SESSION['userId'] . '/work-experience');
        } else {

            $data['errors'] = Validate::errors();
            $data['data'] = $request;

            return $this->view('work-experience/create', $data);
        }
    }

    public function edit() {

        $id = $_GET['id'];

        $workExpierence = new WorkExperience();
        $data['jobExperience'] = $workExpierence->get($id);

        return $this->view('work-experience/edit', $data);
    }

    public function update($request) {

        $this->redirect('submit', '/profile/' . $_SESSION['userId'] . '/work-experience');
        $this->validationRules($request['startDate']);

        $workExpierence = new WorkExperience();

        if(Validate::validated() === true) {

            $workExpierence->updateOnId($request, $request['id']);
            $_SESSION['update'] = 'Successvol werkervaring aangepast!';
            redirect('/profile/' . $_SESSION['userId'] . '/work-experience');
        } else {

            $data['errors'] = Validate::errors();
            $data['jobExperience'] = $workExpierence->get($request['id']);

            return $this->view('work-experience/edit', $data);
        }
    }

    public function delete($request) {

        $workExpierence = new WorkExperience();
        $workExpierence->delete($request['id']);
        $_SESSION['delete'] = 'Successvol werkervaring verwijderd!';

        redirect('/profile/' . $_SESSION['userId'] . '/work-experience');
    }
}