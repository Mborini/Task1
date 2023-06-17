<?php
session_start();

// Database configuration
require_once './DataBase/SQL.php';

// Create an instance of SQL class
$sql = new SQL();

// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Prepare the delete statement
    $result = $sql->DeleteUserById($id);
}
$_SESSION['deleteuser']="User Deleted";
header("Location: allusers.php");
// Close the database connection
$sql->closeConnection(); 
?>
