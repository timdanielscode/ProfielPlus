<?php 

class Subject {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    /* 
     * @author Tim Daniëls
     * Getting educations_schools_subjects education_id, subjects name, marks_subjects mark
     *
     * return object DB subject
    */
    public function getSubjecstMarksOnUserId($userId) {

        $sql = "SELECT educations_schools_subjects.education_id, educations_schools_subjects.school_id, subjects.subject_name, marks_subjects_users.mark FROM subjects INNER JOIN educations_schools_subjects ON educations_schools_subjects.subject_id = subjects.id INNER JOIN marks_subjects_users ON marks_subjects_users.subject_id = subjects.id WHERE marks_subjects_users.user_id = $userId";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}