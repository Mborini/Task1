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
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>  
<?php include './includes/header.php'; ?>
   
    <div class="container mt-5"> 
        
        <h2 class="text-center mb-5"> <i class="fa-regular fa-address-card fa-2xl"></i> User Profile</h2>
        <div class="card w-25 m-auto ">
            <div class="card-body ">
                
                <div class="text-center mb-4">
                    <img src="<?php echo $user['profile_picture']; ?>" alt="User Photo" style="max-width: 200px;" class="img-fluid rounded-circle">
                    <h5 class="card-title"><?php echo $user['email']; ?> </h5>
                </div>
                <div class="text-center">
                    <a href="profileEdit.php" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./assets/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
