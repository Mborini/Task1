<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once './DataBase/SQL.php';

// Create an instance of SQL class
$sql = new SQL();

// Update user profile information if the form is submitted
if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];
    $userId = $_SESSION['user_id'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_picture);
    if (move_uploaded_file($profile_picture_tmp, $target_file)) {
        echo "Profile picture uploaded successfully";
    } else {
        echo "Failed to upload profile picture";
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Call the UpdateUserById() function
    $result = $sql->Updateprofile($email, $hashed_password ,$target_file, $phonenumber, $userId);

    // Check if the update was successful
    if ($result) {
        $_SESSION['message'] = "Profile updated successfully";
    } else {
        $_SESSION['message'] = "Profile update failed";
    }

    // Redirect to profile page
    header("Location: profile.php");
    exit();
}

// Close the database connection
$sql->closeConnection();
?>

<!-- Your HTML code for the profile edit form -->
