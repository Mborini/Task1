<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include './includes/header.php'; ?>
    <div class="container w-50">
        <h2>User Information</h2>
        <form action="insertuser.php" class="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="role"> <i class="fa-solid fa-gamepad"></i> Role:</label>
                <select class="form-control" id="role" name="role" required>
                     <option value="user">User</option> 
                     <option value="admin">Admin </option>
                  
                </select>
            </div>
            <div class="form-group">
                <label for="phone"><i class="fa-solid fa-phone-volume"></i> Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password"> <i class="fa-solid fa-lock"></i> Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Profile Picture:</label>
                <input type="file" class="form-control-file w-25" name="profile_picture">
            </div>
            <input type="hidden" name="id">
            <button type="submit" class="btn btn-primary">Add <i class="fa-solid fa-user-plus"></i></button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
