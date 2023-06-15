<?php
// updateuser.php

// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter exists in the URL
if (isset($_POST['id'])) {
    // Get the ID from the URL parameter
    $id = $_POST['id'];

    // Retrieve the user data from the database based on the ID
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $role = $_POST['Role'];
    $phone = $_POST['phone'];

    // Update the user's information in the database
    $query = "UPDATE users SET email = '$email', role = '$role', phone = '$phone' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Redirect back to the user list page
        header("Location: allusers.php");
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);