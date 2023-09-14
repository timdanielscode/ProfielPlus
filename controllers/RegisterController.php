<?php 

/* @author Tim Daniëls
 * For registering users
*/

class RegisterController extends Controller {

    public function register() {

        return $this->view('register');
    }

    public function store($request) {

        $db = new Database();
        $db->connect();

        $sql = "INSERT INTO users (firstName, lastName, password, retypePassword, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $db->connection->prepare($sql)->execute(['testdata', 'testdata', 'testdata', 'testdata', date('Y-m-d h:i:s'), date('Y-m-d h:i:s')]);
    }
}