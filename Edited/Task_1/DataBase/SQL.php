<?php
require_once 'DBconection.php';

class SQL extends DB {
    // Get the count of users
    public function getUserCount() {
        $query = "SELECT COUNT(*) AS count FROM users";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    // Get all users
    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public function addUser($email, $password, $profile_picture, $phonenumber)
    {
        $query = "INSERT INTO users (email, password, profile_picture, phone) VALUES (?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$email, $password, $profile_picture, $phonenumber]);
    
        return $stmt->rowCount() > 0;
    }
    

    // Get user by ID
    public function getUserById($id){
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            return $user;
        } else {
            $error = "User not found";
            return null;
        }
    }
    public function getUserByEmail($email){
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            return $user;
        } else {
            $error = "User not found";
            return null;
        }
    }

    // Update user by ID
    public function updateUserById($email, $password, $role, $phonenumber, $userId) {
        $query = "UPDATE users SET email = ?, password = ?, role = ?, phone = ? WHERE id = ?";
    
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $role);
        $stmt->bindParam(4, $phonenumber);
        $stmt->bindParam(5, $userId);
        $stmt->execute();
        
        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function Updateprofile($email, $hashed_password, $target_file,$phonenumber,  $userId) {
        $query = "UPDATE users SET email = ?,profile_picture=?, password = ?, phone = ? WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$email, $target_file,$hashed_password, $phonenumber, $userId]);
        
        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function DeleteUserById($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$id]);
    
    }
    
    public function updatePassword($phone, $hashedPassword)
    {
        $query = "UPDATE users SET password = ? WHERE phone = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $hashedPassword);
        $stmt->bindParam(2, $phone);
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }
    
    public function check_email($email)
    {  $query = "SELECT * FROM users where email=$email";
        if ($query) { // if there is an error in the connection or if there is syntax error in the SQL.
            return false;
    }
else {return true;
}}
    public function insertUser($email, $hashedPassword, $phone, $role, $profile_picture) {
        $query = "INSERT INTO users (email, password, phone, role, profile_picture) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->execute([$email, $hashedPassword, $phone, $role, $profile_picture]);
        
        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // Close the database connection
    public function closeConnection() {
        $this->con = null;
    }
}
