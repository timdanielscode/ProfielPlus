<?php

class HobbyController extends Controller {

    public function create() {
        return $this->view('profile/hobby/create');
    }

    public function edit() {
        return $this->view('profile/hobby/edit');
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

                        
                $targetDirectory = "uploads/"; // Specify the directory where you want to store the uploaded files
            
                if (!is_dir($targetDirectory)) {
                    mkdir($targetDirectory, 0755, true); // Create the directory if it doesn't exist
                }
            
                $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Define an array of allowed file extensions
                $allowedExtensions = array("jpg", "jpeg", "png", "gif");
                
                if (in_array($fileType, $allowedExtensions)) {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                        // File uploaded successfully
                        // You can now insert the file information into the database
                        $filePath = $targetFile;
                
                        try {
                            $stmt3 = $pdo->prepare("INSERT INTO images (file_path) VALUES (?)");
                            $stmt3->bindParam(1, $filePath);
                            $stmt3->execute();
                
                            echo "Image uploaded and inserted into the database successfully.";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                
                        $image_id = $pdo->lastInsertId();
                        $sql2 = "INSERT INTO hobby_user (hobby_id, user_id, image_id) VALUES (:hobbyId, :user_id, :image_id)";
                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->bindParam(":hobbyId", $hobbyId, PDO::PARAM_INT); 
                        $stmt2->bindParam(":user_id", $user_id, PDO::PARAM_INT);
                        $stmt2->bindParam(":image_id", $image_id, PDO::PARAM_INT);
                        $stmt2->execute();
                
                        $pdo->commit(); // Commit the transaction
                
                        echo "Hobby successfully added to the database!";
                    }
                } else {
                    echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                }
            } catch (PDOException $e) {
            $pdo->rollBack(); // Roll back the transaction in case of an error
            die("Database connection error: " . $e->getMessage());
        }
            }
            header('Location: http://localhost/profile/1/hobby/create');
            // or die();
            exit();
        }
    }
