<?php
session_start();
// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
       
        header("Location: enter_phone.php?email=" . $email);
        exit();
    } else {
        header("Location: password_resetPage.php");
        $_SESSION['message'] = "The Email Was Not Found";
        exit();
    }
}

// Close the database connection
mysqli_close($conn);
