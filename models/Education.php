<?php

class Education {

    private $_db;

    public function __construct() {
        $this->_db = new Database();
        $this->_db->connect();
    }

    /**
     * retrieving all institutes
    */
    public function getInstitutes() {
        $sql = "SELECT school FROM schools";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([]);

        $institutes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $institutes;
    }
    

    /**
    * retrieving all educations from certain institute
    */
    public function getEducations() {
        $sql = "SELECT education_name FROM educations";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([]);

        $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $educations;
    }
    /**
    * retrieving all subjects based on institute an education program
    */
    public function getSubjects() {
        $sql = "SELECT subject_name FROM subjects";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([]);

        $subjects = $stmt->fetchaLL(PDO::FETCH_ASSOC);
        return $subjects;
    }

    /**
     * getting IDs from selected tables
     */
    private function getSchoolId($name) {
        $sql = "SELECT id FROM schools WHERE school=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
        var_dump($result);

    }

    private function getEducationId($name) {
        $sql = "SELECT id FROM educations WHERE education_name=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];

    }

    /**
     * getting the id of the subject by name.
     */
    private function getsubjectId($name) {
        $sql = "SELECT id FROM subjects WHERE subject_name=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];

    }

    /**
     * user adding an education to his account
     */
    public function userAddsSchool($userId, $hasDiploma, $schoolName, $educationName) {

        $schoolId = $this->getSchoolId($schoolName);
        $educationId = $this->getEducationId($educationName);
        
        // inserting user into the "educations_schools_users" table
        $sql = "INSERT INTO educations_schools_users (education_id, school_id, user_id)
        VALUES (?, ?, ?)";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);

        if ($hasDiploma == "ja") {
            $sql = "INSERT INTO diplomas_achieved (school_id, education_id, user_id)
            VALUES (?, ?, ?)";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$schoolId, $educationId, $userId]);
        }
    }

    /**
     * user adding a subject to his account
     */
     public function userAddsSubject($userId, $subjectName, $mark) {

        $subjectId = $this->getsubjectId($subjectName);

        // checking if the already has this subject added to his account and if so update the mark
        $sql = "SELECT * FROM marks_subjects_users WHERE subject_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$subjectId, $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result == false) {
            $sql = "INSERT INTO marks_subjects_users (mark, subject_id, user_id)
            VALUES (?, ?, ?)";
            $stmt = $this-> _db->connection->prepare($sql);
            $stmt->execute([$mark, $subjectId, $userId]);
        } else {
            $sql = "UPDATE marks_subjects_users SET mark=? WHERE subject_id=? AND user_id=?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$mark, $subjectId, $userId]);
        }
        
        
     }
    
}