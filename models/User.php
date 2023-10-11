<?php 

class User {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    public function insert($data) {

        $sql = "INSERT INTO users (firstName, lastName, email, password, created_at, updated_at, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->_db->connection->prepare($sql)->execute([

            $data['firstName'], 
            $data['lastName'],
            $data['email'], 
            password_hash($data['password'], PASSWORD_DEFAULT), 
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s'),
            1
        ]);
    }


    public function getCredentials ($username, $password) {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user !== false && password_verify($password, $user["password"])) {
            echo "success";
        } else {
            echo "go home filthy hacker";
        }
        
    }
    
    
}