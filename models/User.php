<?php 

class User {

    private $_db;

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
     * Inserting users 
     *
     * @param array $data user html input data (associative)
    */
    public function insert($data) {

        $sql = "INSERT INTO users (firstName, lastName, email, password, created_at, updated_at, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->_db->connection->prepare($sql)->execute([

            $data['firstName'], 
            $data['lastName'],
            $data['email'], 
            password_hash($data['password'], PASSWORD_DEFAULT), 
            date('Y-m-d h:i:s'), 
            date('Y-m-d h:i:s'),
            1
        ]);
    }

    /* 
     * @author Tim Daniëls
     * Getting user id based on users email 
     *
     * @param string $user user email
     * return object DB user id
    */
    public function getUserId($user) {

        if(!empty($user) && $user !== null) {

            $sql = "SELECT id FROM users WHERE email = ?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$user]);

            return $stmt->fetch();
        }
    }

    /* 
     * @author Tim Daniëls
     * Getting user details based on user id
     *
     * @param string $user user id
     * return object DB user record
    */
    public function getDetails($userId) {

        if(!empty($userId) && $userId !== null) {

            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$userId]);

            return $stmt->fetch();
        }
    }

    /* 
     * @author Tim Daniëls
     * Update user details based on user id
     *
     * @param array $details user details (firstname, lastname, email)
     * @param string $userId user id
    */
    public function updateDetails($details, $userId) {

        if(!empty($details) && $details !== null) {

            $sql = "UPDATE users SET firstName=?, lastName=?, email=?, updated_at=? WHERE id = $userId";
            $this->_db->connection->prepare($sql)->execute([
    
                $details['firstName'], 
                $details['lastName'],
                $details['email'], 
                date('Y-m-d h:i:s')
            ]);
        }
    }

    /* 
     * @author Tim Daniëls
     * Checking for existing email based on user email and user id
     *
     * @param string $email user email
     * @param string $userId user id
     * @return mixed object user record | object empty record
    */    
    public function getUniqueEmail($email, $userId) {

        if(!empty($email) && $email !== null && !empty($userId) && $userId !== null) {

            $sql = "SELECT email FROM users WHERE email = ? AND NOT id = ?";
            $stmt = $this->_db->connection->prepare($sql);
            $stmt->execute([$email, $userId]);
    
            return $stmt->fetch();
        }
    }

    /* 
     * @author Tim Daniëls
     * Updating user password
     *
     * @param string $password user password
     * @param string $userId user id
    */       
    public function updatePassword($password, $userId) {

        if(!empty($password) && $password !== null && !empty($userId) && $userId !== null) {

            $sql = "UPDATE users SET password=?,updated_at=? WHERE id = $userId";
            $this->_db->connection->prepare($sql)->execute([
    
                $password, 
                date('Y-m-d h:i:s')
            ]);
        }
    }

    public function getCredentials ($email, $password) {
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user !== false && password_verify($password, $user["password"])) {

            $_SESSION["loggedIn"] = true;
            $_SESSION["user"] = $email;
            $_SESSION["userId"] = $this->getUserId($email)['id'];
           
            return true;
        } 

        return false;
    }
    

    /**
     * fetching all email adresses into an array
     */
    public function getAllEmailAdresses() {
        $sql = "SELECT email from users";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * delete Selected User and all its data
    */
    public function deleteUser($email) {
        $userId = getUserId($email);

        $sql = "DELETE FROM users WHERE id=?;
        DELETE FROM education_schools_users WHERE user_id=?;
        DELETE FROM diplomas_achieved WHERE user_id=?;
        DELETE FROM hobby_user WHERE user_id=?;
        DELETE FROM job_experiences WHERE user_id=?;
        DELETE FROM marks_subjects_users WHERE user_id=?;
        ";
        $stmt = $this->_db->connection->prepare($sql);
        $stmt->execute([$userId, $userId, $userId, $userId, $userId, $userId]);
        
    }
    
}