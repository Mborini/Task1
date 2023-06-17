<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once './DataBase/SQL.php';

$sql = new SQL();
$user = $sql->getUserById($_SESSION['user_id']);
$sql->closeConnection();

// Close the database connection (commented out since the code doesn't include a closeConnection() method)

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include './includes/header.php'; ?>
    <div class="container">
        <h2>Profile Management</h2>
        <form action="updateProfile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" value="<?php echo $user['password']; ?>" name="password">
            </div>
            <div class="form-group">
                <label>Phone number:</label>
                <input type="text" class="form-control" name="phonenumber" value="<?php echo $user['phone']; ?>">
            </div>
            <div class="form-group">
                <img id="profile-picture-preview-img" src="<?php echo $user['profile_picture']; ?>" width="10%" height="10%" alt="Profile Picture Preview" />
            </div>
            <div class="form-group">
                <label>Profile Picture:</label>
                <input type="file" class="form-control-file"  name="profile_picture" onchange="previewProfilePicture(event)">
            </div>
            <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
        </form>
    </div>
    
    <script>
        function previewProfilePicture(event) {
            var output = document.getElementById('profile-picture-preview-img');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
