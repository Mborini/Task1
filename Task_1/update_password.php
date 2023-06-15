<?php
session_start();

// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter exists in the URL
if (isset($_SESSION['phone'])) {
    if ($_POST['new_password'] !=  $_POST['confirm_password']) {
        header("Location: confirm_password.php");
        $_SESSION['message'] = 'no match';
        die;
    } else {
        $hashedPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = ? WHERE phone = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $hashedPassword, $_SESSION['phone']);
        $stmt->execute();
        $_SESSION['message'] = null;
        if ($stmt->affected_rows > 0) {
            // Password updated successfully
            header("Location: index.php");
            $_SESSION['message'] = "Password updated successfully.";
            exit();
        } else {
            header("Location: confirm_password.php");
            $_SESSION['message'] = "Email not found.";
            exit();
        }
    }
} else {
    echo "Invalid request";
    exit();
}

// Close the database connection
mysqli_close($conn);
