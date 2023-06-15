<?php
session_start();

// updateuser.php

// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter exists in the URL
if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User not found";
        exit();
    }
    if ($_POST['phone'] == $user['phone']) {
        header("Location: confirm_password.php");
        $_SESSION['phone'] = $_POST['phone'];
        exit;
    } else {
        $email = urlencode($email);
        $email1 = str_replace('@', '%40', $email);
        header("Location: enter_phone.php?email=" . $email1);
        $_SESSION['message'] = "Invaled phone number";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

// Close the database connection
mysqli_close($conn);
