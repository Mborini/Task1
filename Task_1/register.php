<?php 
// Database connection code

$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start or resume the session
session_start();

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $profile_picture = $_FILES['profile_picture'];

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format";
        header("Location: RegistrationPage.php");
        exit();
    } else {
        // Move uploaded profile picture to server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            echo "Profile picture uploaded successfully";
        } else {
            echo "Failed to upload profile picture";
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user details into database
        $sql = "INSERT INTO users (email, password, profile_picture,phone) VALUES ('$email', '$hashed_password', '$target_file','$phonenumber')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['message'] = " registered successfully";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['message'] = "Error: " ;
        }
    }

}

// Redirect to registration page or display error message
header("Location: RegistrationPage.php");
exit();
