<?php

class Hobby {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    /* 
     * @author Tim Daniëls
     * Getting hobby, file extension and user ids
     *
     * @param string $userId user id
     * return object DB hobby
    */
    public function getHobbyUserId($userId) {

        $sql = "SELECT hobby, file_extension, user_id from hobbies WHERE user_id = $userId";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /* 
     * @author Tim Daniëls
     * Getting hobby description on user id 
     *
     * @param string $userId user id
     * return object DB hobby
    */
    public function getHobbyDescription($userId) {

        // previously used table: hobby_description, changed to users table 
        $sql = "SELECT hobby_description from users WHERE id = $userId";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }
}