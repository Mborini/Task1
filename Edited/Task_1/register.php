<?php
require_once './DataBase/SQL.php';

$sql = new SQL();

session_start();

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_tmp = $_FILES['profile_picture']['tmp_name'];

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message_Errorformat'] = "Invalid email format";
        header("Location: RegistrationPage.php");
        exit();
    } else {
        // Move uploaded profile picture to server
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_picture);
        if (move_uploaded_file($profile_picture_tmp, $target_file)) {
            echo "Profile picture uploaded successfully";
        } else {
            echo "Failed to upload profile picture";
        }

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
if($sql->check_email($email)){
     $success = $sql->addUser($email, $hashed_password, $target_file, $phonenumber);

    if ($success) {
        $_SESSION['message_success-regester'] = "You can sign in now.";
        header("Location: index.php");
exit();
    } }else{
        
        $_SESSION['message_check_email'] = "Email is exest ... please Enter another email";
        header("Location: RegistrationPage.php");
exit();


    }
       
    }
}

// Redirect to registration page or display error message

?>
