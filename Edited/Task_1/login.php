<?php
session_start();
// Database configuration
require_once './DataBase/SQL.php';

$sql = new SQL();

// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $sql->getUserByEmail($email);

    if ($user) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];

            $_SESSION['user'] = array(
                'id' => $user['id'],
                'email' => $user['email'],
                'image' => $user['profile_picture'],
                'role' => $user['role'],
            );

            if ($user['role'] == 'admin') {
                header("Location: allusers.php");
                $_SESSION['message_adminlogin'] = "login success";
                exit();
            } else {
                header("Location: profile.php");
                $_SESSION['message_login'] = "login success";
                exit();
            }
        } else {
            header("Location: index.php");
            $_SESSION['message_Error_Password'] = "Invalid Email or Password";
            exit();
        }
    } else {
        header("Location: index.php");
        $_SESSION['message_EmptyLogin'] = "Inter Your Email And password";
        exit();
    }
}
header("Location: index.php");
