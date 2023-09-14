<?php 

class User {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    public function insert($data) {

        $sql = "INSERT INTO users (firstName, lastName, email, password, retypePassword, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->_db->connection->prepare($sql)->execute([

            $data['firstName'], 
            $data['lastName'],
            $data['email'], 
            $data['password'], 
            $data['retypePassword'], 
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s')
        ]);
    }
}