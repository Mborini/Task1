<?php
session_start();
if ($_SESSION['user']['role'] == 'user') {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>All Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php
    // Database configuration
    $conn = mysqli_connect("localhost", "root", "", "users");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve all users from the database
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    // Get the count of users
    $userCount = mysqli_num_rows($result);

    // Close the database connection
    mysqli_close($conn);
    ?>

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
        <h2>All Users <span class="navbar-text ml-auto">
                <?php echo $userCount; ?>
            </span></h2>
        <?php
        // Check if any users were found
        if ($userCount > 0) {
            echo '<table class="table">';
            echo '<thead class="thead-light">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>Role</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Iterate through each user and display their details in a table row
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['phone'] . '</td>';
                echo '<td>' . $row['role'] . '</td>';
                echo '<td>';
                echo '<a href="deleteuser.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>';
                echo '<a href="edituser.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No users found.";
        }
        ?>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
