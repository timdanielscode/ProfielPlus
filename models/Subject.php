<?php 

class Subject {

    private $_db;

    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    /* 
     * @author Tim Daniëls
     * Getting subject id name, marks_subjects mark on user id 
     *
     * @param string $user user id
     * return object DB subject
    */
    public function getSubjectMarksOnUserId($id) {

        $sql = "SELECT subjects.id, subjects.subject_name, marks_subjects_users.mark FROM subjects INNER JOIN marks_subjects_users ON marks_subjects_users.subject_id = subjects.id WHERE marks_subjects_users.user_id = ?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }
}