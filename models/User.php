<?php 

class User {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    public function insert() {

        $sql = "INSERT INTO users (firstName, lastName, password, retypePassword, createdAt, updatedAt) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->_db->connection->prepare($sql)->execute(['testdata', 'testdata', 'testdata', 'testdata', date('Y-m-d h:i:s'), date('Y-m-d h:i:s')]);
    }
}