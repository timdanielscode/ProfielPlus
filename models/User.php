<?php 

class User {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    public function insert($data) {

        $sql = "INSERT INTO users (firstName, lastName, email, password, retypePassword, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->_db->connection->prepare($sql)->execute([

            $data['firstName'], 
            $data['lastName'],
            $data['email'], 
            password_hash($data['password'], PASSWORD_DEFAULT), 
            password_hash($data['retypePassword'], PASSWORD_DEFAULT),
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s')
        ]);
    }
}