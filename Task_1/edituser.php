<?php
// updateuser.php

$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];

    // Retrieve the user data from the database based on the ID
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "User not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
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
        <h2>Update User</h2>
        <form action="updateuser.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Role:</label>
                <input type="text" class="form-control" id="Role" name="Role" value="<?php echo $user['role']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>