<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database configuration
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
$phonenumber=$_POST['phonenumber'];
    // Update profile information in the database
    $query = "UPDATE users SET email = ?, password = ? , phone=? WHERE id = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $email, $password ,$phonenumber, $_SESSION['user_id']);
    $stmt->execute();
    $_SESSION['message'] = " edit successfully";

    // Redirect to profile page
    header("Location: profile.php");
    
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
