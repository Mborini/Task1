<?php
session_start();
// Database configuration
require_once './DataBase/SQL.php';

$sql = new SQL();

// Check if the ID parameter exists in the URL
if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $user = $sql->getUserByEmail($email);

    if (!$user) {
        echo "User not found";
        exit();
    }

    // Validate phone number
    if (empty($_POST['phone'])) {
        $_SESSION['empty_phone'] = "Phone number is required";
        header("Location: enter_phone.php?email=" . urlencode($email));
        exit();
    }

    if ($_POST['phone'] == $user['phone']) {
        $_SESSION['phone'] = $_POST['phone'];
        header("Location: confirm_password.php");
        $_SESSION['phoneError'] = $_POST['phoneError'];
        exit();
    } else {
        $email = urlencode($email);
        $email1 = str_replace('@', '%40', $email);
        header("Location: enter_phone.php?email=" . $email1);
        $_SESSION['message_Invaled phone number'] = "Invaled phone number";
          exit();
    }
} 

// Close the database connection
$sql->closeConnection();
