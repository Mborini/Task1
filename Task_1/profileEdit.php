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
    <title>Profile Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h2>Profile Management</h2>
        <form action="updateProfile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label>Phone number:</label>
                <input type="text" class="form-control" value="<?php echo $user['phone']; ?> "name="phonenumber">
            </div>
            <div class="form-group">
                <label>Profile Picture:</label>
                <input type="file" class="form-control-file" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
