<?php
// deleteuser.php

// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare the delete statement
    $query = "DELETE FROM users WHERE id = '$id'";

    // Execute the delete statement
    if (mysqli_query($conn, $query)) {
        // Redirect back to the user list page
        header("Location: allusers.php");
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>
