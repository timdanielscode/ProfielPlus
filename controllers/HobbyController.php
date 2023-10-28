<?php

class HobbyController extends Controller {

    public function create() {


        return $this->view('profile/hobby/create');
    }
    
    public function store($request) {
           print_r($request);


    }

    public function insert() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hobby = $_POST["hname"];

            // Validate or sanitize the input as needed
            // Your database connection and insertion code
            $host = "localhost";
            $username = "root";
            $password = "password";
            $database = "profileapp";

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $pdo->beginTransaction(); // Start a transaction

                //insert new hobby
                $sql = "INSERT INTO hobbies (hobby) VALUES (:hobby)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":hobby", $hobby, PDO::PARAM_STR);
                $stmt->execute();
            
            // Grab last item made
            $hobbyId = $pdo->lastInsertId();

            $user_id = $_SESSION['userId'];

            $sql2 = "INSERT INTO hobby_user (hobby_id, user_id) VALUES (:hobbyId, :user_id)";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->bindParam(":hobbyId", $hobbyId, PDO::PARAM_INT); 
            $stmt2->bindParam(":user_id", $user_id, PDO::PARAM_INT);
            $stmt2->execute();

            $pdo->commit(); // Commit the transaction

             echo "Hobby successfully added to the database!";
            } catch (PDOException $e) {
                $pdo->rollBack(); // Roll back the transaction in case of an error
                die("Error: " . $e->getMessage());
            }
        }
    }
}