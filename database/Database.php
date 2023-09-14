<?php 

class Database {

    private $_host, $_username, $_password, $_database;

    public function connect() {

        $config = parse_ini_file('config.ini');
        if(!empty($config) && $config !== null) {
            $this->set($config);

            try {
                new PDO("mysql:host=$this->_host;dbname=$this->_database", $this->_username, $this->_password);
                
                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    private function set($details) {

        $this->_host = $details['host'];
        $this->_username = $details['username'];
        $this->_password = $details['password'];
        $this->_database = $details['database'];
    }
}