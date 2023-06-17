<?php
session_start();

require_once './DataBase/SQL.php';
$sql = new SQL();

// Check if the ID parameter exists in the session
if (isset($_SESSION['phone'])) {
    if ($_POST['new_password'] != $_POST['confirm_password']) {
        $_SESSION['message_no match'] = 'no match the Password';
        header("Location: confirm_password.php");
        exit();
    } else {
        $hashedPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $result = $sql->updatePassword($_SESSION['phone'], $hashedPassword);
        $_SESSION['message'] = null;
        if ($result) {
            // Password updated successfully
            $_SESSION['message_Password updated successfully'] = "Password updated successfully.";
            $_SESSION['phone']=null;
            $_SESSION['auth_reset']=null;
            header("Location: index.php");

            exit();
        } else {
            $_SESSION['message'] = "Phone number not found.";
            header("Location: confirm_password.php");
            exit();
        }
    }
} else {
    echo "Invalid request";
    exit();
}
