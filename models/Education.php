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

        $sql = "SELECT * FROM educations_schools_users 
        WHERE education_id=? AND school_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        // if there is no row with this combination of id's
        if ($result == false) {
        // inserting user into the "educations_schools_users" table
        $sql = "INSERT INTO educations_schools_users (education_id, school_id, user_id)
        VALUES (?, ?, ?)";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);
        }
        
        
        
        // check if the diploma already was achieved if not update the DB
        $sql = "SELECT * FROM diplomas_achieved 
        WHERE education_id=? AND school_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        /**
         * check if the user does not already own a version of this diploma 
         * and if he/she sais that they achieved this diploma
         */
        if($result == false && $hasDiploma == "ja"){
            $sql = "INSERT INTO diplomas_achieved (school_id, education_id, user_id)
            VALUES (?, ?, ?)";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$schoolId, $educationId, $userId]);

            /**
             * if user has diploma registered in the db but now filled in no 
             * then the diploma will be removed from the database 
             * */ 
        } else if ($result != false && $hasDiploma == "nee") {
            $sql = "DELETE FROM diplomas_achieved WHERE school_id=? AND education_id=? AND user_id=?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$schoolId, $educationId, $userId]);
        }
        header("Location: /edit-schools");
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

/**
 * ___________________________________________________________________________________________________
 * 
 * ----------------- getting data for editSchool methods: ------------------
 * 
 */
    
 /**
  * select all subject id's and marks of a certain user
  */

/**
 * method for selecting al subjects wit marks
 */  
  public function getUserSubjectsWithMarks($userId) {
    $sql = "SELECT * FROM marks_subjects_users WHERE mark > 0";
    $stmt = $this->_db->connection->prepare($sql);
    $stmt->execute([]);
    $subjectsWithMarks = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $subjectsWithMarks;
  }


/**
 * method for selecting al subjects without marks
 */
  public function getUserSubjectsWithoutMarks($userId) {

  $sql = "SELECT * FROM marks_subjects_users WHERE mark = 0";
  $stmt = $this->_db->connection->prepare($sql);
  $stmt->execute([]);
  $subjectsWithoutMarks = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  return $subjectsWithoutMarks;
  }
    

/**
 * selecting all educations of a certain user
 */

 public function getUserEducations($userId) {
    $sql = "SELECT * FROM educations_schools_users WHERE user_id=?";
    $stmt = $this->_db->connection->prepare($sql);
    $stmt->execute([$userId]);
    $educations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $achievedRaw = [];
    $notAchievedRaw = [];

    foreach($educations as $education) {
        $sql = "SELECT * FROM diplomas_achieved 
        WHERE user_id=? AND school_id=? AND education_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$userId, $education['school_id'], $education['education_id']]);
        
        $isAchieved = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if($isAchieved == false) {
            array_push($notAchievedRaw, $education);
        } else {
            array_push($achievedRaw, $education);
        }
    }

    $achieved = [];
    $notAchieved = [];

    foreach ($notAchievedRaw as $singleNotAchievedRaw) {
        $sql = "SELECT education_name FROM educations WHERE id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$singleNotAchievedRaw['education_id']]);

        $educationName = $stmt->fetch(PDO::FETCH_ASSOC)['education_name'];


        $sql = "SELECT school FROM schools WHERE id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$singleNotAchievedRaw['school_id']]);

        $schoolName = $stmt->fetch(PDO::FETCH_ASSOC)['school'];

        array_push($notAchieved, ["education" => "$educationName", "school" => "$schoolName"]);


    }


    foreach ($achievedRaw as $singleAchievedRaw) {
        $sql = "SELECT education_name FROM educations WHERE id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$singleAchievedRaw['education_id']]);

        $educationName = $stmt->fetch(PDO::FETCH_ASSOC)['education_name'];


        $sql = "SELECT school FROM schools WHERE id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$singleAchievedRaw['school_id']]);

        $schoolName = $stmt->fetch(PDO::FETCH_ASSOC)['school'];

        array_push($achieved, ["education" => "$educationName", "school" => "$schoolName"]);


    }

    return array($achieved, $notAchieved);

  }


  /**
   * ----------------- editSchool methods: ------------------
   */

   /**
    * method to update the Selected row if the data is not dulicate
    */
    public function editEducation($institute, $education, $diplomaAchieved, $userId, $oldEducation, $oldSchool) {

        $schoolId = $this->getSchoolId($institute);
        $educationId = $this->getEducationId($education);

        $oldSchoolId = $this->getSchoolId($oldSchool);
        $oldEducationId = $this->getEducationId($oldEducation);

        // first checking if there is allready a reccord in the db with this info
        $sql = "SELECT * FROM educations_schools_users 
        WHERE education_id=? AND school_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);

        $isduplcate = $stmt->fetch(PDO::FETCH_ASSOC);


        // // updating the table with the new info if that info is no duplicate info
        if ($isduplcate == false) {
            $sql = "UPDATE educations_schools_users
            SET education_id=?, school_id=?
            WHERE education_id=? AND school_id=? AND user_id=?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([
                $educationId, 
                $schoolId,
                $oldEducationId,
                $oldSchoolId,
                $userId]);
        }

        $sql = "SELECT * FROM diplomas_achieved 
        WHERE education_id=? AND school_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);
        $hasDiploma = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hasDiploma == false && $diplomaAchieved == "ja") {
            $sql = "INSERT INTO diplomas_achieved (education_id, school_id, user_id)
            VALUES (?, ?, ?)";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$educationId, $schoolId, $userId]);
        } else if ($hasDiploma !== false && $diplomaAchieved == "nee") {
            $sql = "DELETE FROM diplomas_achieved 
            WHERE education_id=? AND school_id=? AND user_id=?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$educationId, $schoolId, $userId]);
        }
        header("Location: /edit-schools");

    }

/**
 * ----------------- Delete School methods: ------------------
 */
public function deleteSchool($school, $education, $userId) {
    
    $schoolId = $this->getSchoolId($school);
    $educationId = $this->getEducationId($education);

    $sql = "SELECT * FROM educations_schools_users 
    WHERE education_id=? AND school_id=? AND user_id=?";
    $stmt = $this->_db->connection->prepare($sql);
    $stmt->execute([$educationId, $schoolId, $userId]);

    $exists = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM diplomas_achieved 
    WHERE education_id=? AND school_id=? AND user_id=?";
    $stmt = $this->_db->connection->prepare($sql);
    $stmt->execute([$educationId, $schoolId, $userId]);

    $hasDiploma = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($exists !== false) {
        $sql = "DELETE FROM educations_schools_users 
        WHERE education_id=? AND school_id=? AND user_id=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$educationId, $schoolId, $userId]);

        if ($hasDiploma !== false) {
            $sql = "DELETE FROM diplomas_achieved 
            WHERE education_id=? AND school_id=? AND user_id=?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$educationId, $schoolId, $userId]);
        }
    }
    header("Location: /edit-schools");

}

  
}