<?php
// updateuser.php

// Database configuration
require_once './DataBase/SQL.php';

// Create an instance of SQL class
$sql = new SQL();

// Check if the ID parameter exists in the URL
if (isset($_POST['id'])) {
    // Get the ID from the URL parameter
    $id = $_POST['id'];

}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
  
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Update the user in the database
    $result = $sql->updateUserById($email, $hashedPassword,$role, $phone, $id);
   
    if ($result) {
        echo "User updated successfully";
        // Redirect to profile page or any other desired page
        header("Location: allusers.php");
        exit();
    } else {
        echo "Failed to update user";
        // Handle the error scenario
    }
}

header("Location: allusers.php");
// Close the database connection
$sql->closeConnection();
