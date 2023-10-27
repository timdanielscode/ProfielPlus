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

    public function insert($data) {

        $sql = "INSERT INTO job_experiences (job_id, user_id, employer, start_date, end_date, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->_db->connection->prepare($sql)->execute([

            1, 
            $_SESSION['userId'],
            $data['employer'], 
            $data['startDate'],
            $data['endDate'], 
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s'),
        ]);
    }


}