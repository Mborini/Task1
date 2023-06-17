<?php
// insertuser.php

// Database configuration
require_once './DataBase/SQL.php';

// Create an instance of SQL class
$sql = new SQL();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_picture);
        if (move_uploaded_file($profile_picture_tmp, $target_file)) {
            echo "Profile picture uploaded successfully";
        } else {
            echo "Failed to upload profile picture";
        }
    // Update the user in the database
    $result = $sql->insertUser($email, $hashedPassword, $phone, $role, $target_file);
   
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

// Close the database connection
$sql->closeConnection();

header("Location: allusers.php");
