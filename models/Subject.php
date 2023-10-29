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
    public function getSubjectMarksOnUserId() {

        $sql = "SELECT educations_schools_subjects.education_id, subjects.subject_name, marks_subjects_users.mark FROM subjects INNER JOIN educations_schools_subjects ON educations_schools_subjects.subject_id = subjects.id INNER JOIN marks_subjects_users ON marks_subjects_users.subject_id = subjects.id ";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}