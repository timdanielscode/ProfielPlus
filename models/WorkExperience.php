<?php 

class WorkExperience {

    /* 
     * @author Tim Daniëls
     * Creating database instance for the connection
    */    
    public function __construct() {

        $this->_db = new Database();
        $this->_db->connect();
    }

    /* 
     * @author Tim Daniëls
     * Inserting work experiences
     *
     * @param array $data user html input data (associative)
     * @param string $userId user session id
    */
    public function insert($data, $userId) {

        $sql = "INSERT INTO job_experiences (user_id, job_title, employer, start_date, end_date, details, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->_db->connection->prepare($sql)->execute([

            $userId,
            $data['jobTitle'], 
            $data['employer'], 
            $data['startDate'],
            $data['endDate'], 
            $data['details'],
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s')
        ]);
    }

    /* 
     * @author Tim Daniëls
     * Fetching work experiences
    */
    public function getAll() {

        $sql = "SELECT * FROM job_experiences";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /* 
     * @author Tim Daniëls
     * Fetching work experiences on id
     * 
     * @param string $id experiences id
    */   
    public function get($id) {

        $sql = "SELECT * FROM job_experiences WHERE id = $id";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetch();
    }

    /* 
     * @author Tim Daniëls
     * Update work experiences on id
     * 
     * @param array $data experience data
     * @param string $id experiences id
    */   
    public function updateOnId($data, $id) {

        $sql = "UPDATE job_experiences SET employer=?, job_title=?, start_date=?, end_date=?, details=?, updated_at=? WHERE id = $id";
        $this->_db->connection->prepare($sql)->execute([
    
            $data['employer'], 
            $data['jobTitle'],
            $data['startDate'], 
            $data['endDate'], 
            $data['details'], 
            date('Y-m-d h:i:s')
        ]);
    }

    /* 
     * @author Tim Daniëls
     * Delete work experiences on id
     * 
     * @param string $id experiences id
    */   
    public function delete($id) {

        $sql = "DELETE FROM job_experiences WHERE id = $id";
        $this->_db->connection->prepare($sql)->execute();
    }
}