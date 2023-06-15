<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user information
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
} else {
    $error = "User not found";
    // Handle the error appropriately
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>


<body>  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <i class="fas fa-users"></i> User Management
    </a>
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
            <a class="nav-link" href="./profile.php">
                <i class="fas fa-user-circle"></i> Profile
            </a>
        </li>
    </ul>
    <form class="form-inline" action="logout.php" method="POST">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</nav>

   
    <div class="container"> 
        
        <h2 class="text-center">User Profile</h2>
        <div class="card">
            <div class="card-body">
                
                <div class="text-center mb-4">
                    <img src="<?php echo $user['profile_picture']; ?>" alt="User Photo" style="max-width: 200px;" class="img-fluid rounded-circle">
                    <h5 class="card-title"><?php echo $user['email']; ?> </h5>
                </div>
                <div class="text-center">
                    <a href="profileEdit.php" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>