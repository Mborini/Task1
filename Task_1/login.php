<?php
session_start();
// Database configuration
// Database connection code
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    // ...
    // Retrieve user from database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

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
            $_SESSION['message'] = "Invalid password";
        }
    } else {
        $error = "User not found";
    }
}
