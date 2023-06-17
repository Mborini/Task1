<?php
session_start();
// Database configuration
require_once './DataBase/SQL.php';

$sql = new SQL();


if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = $sql->getUserByEmail($email);

    if ($user) {
        $_SESSION['auth_reset']= 'true';
        header("Location: enter_phone.php?email=" . $email);
        exit();
    } else {
        header("Location: password_resetPage.php");
        $_SESSION['message_Email Was Not Found'] = "The Email Was Not Found";
        exit();
    }
}

// Close the database connection
$sql->closeConnection();
