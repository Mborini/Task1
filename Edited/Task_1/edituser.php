<?php
// updateuser.php

require_once './DataBase/SQL.php';

$sql = new SQL();



// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL parameter
    $id = $_GET['id'];
$user = $sql->getUserById($id);
    
  
    if (!$user) {
        echo "User not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}

$sql->closeConnection();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
   
<?php include './includes/header.php'; ?>
    <div class="container">
        <h2>Update User</h2>
        <form action="updateuser.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>

            <div class="form-group">
    <label for="role">Role:</label>
    <select class="form-control" id="role" name="role" required>
        <option value="admin" <?php if ($user['role'] === 'admin') echo 'selected'; ?>>Admin</option>
        <option value="user" <?php if ($user['role'] === 'user') echo 'selected'; ?>>User</option>
       
    </select>
</div>
            
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
            </div>
            <?php
            
            
            ?>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" value="<?php echo $user['password'] ?>" name="password" required>
            </div>
            
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>