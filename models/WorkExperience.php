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


}