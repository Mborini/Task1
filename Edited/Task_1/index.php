<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <i class="fas fa-users"></i> User Management
    </a>
    
</nav>
    <div class="container">
        <h2>User Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
            <div>
                
                    <?php
                    if (!empty($_SESSION) && isset($_SESSION['message_Error_Password']) && !empty($_SESSION['message_Error_Password'])) : ?>
                        <div class="alert alert-danger text-center " id="myDiv" role="alert">
                            <?= $_SESSION['message_Error_Password'] ?>
                        </div>
                    <?php
                        $_SESSION['message_Error_Password'] = null;
                    endif;
                    if (!empty($_SESSION) && isset($_SESSION['message_success-regester']) && !empty($_SESSION['message_success-regester'])) : ?>
                        <div class="alert alert-success  text-center " id="myDiv" role="alert">
                            <?= $_SESSION['message_success-regester'] ?>
                        </div>
                    <?php
                        $_SESSION['message_success-regester'] = null;
                    endif;
                    
                    if (!empty($_SESSION) && isset($_SESSION['message_EmptyLogin']) && !empty($_SESSION['message_EmptyLogin'])) : ?>
                        <div class="alert alert-danger text-center " id="myDiv" role="alert">
                            <?= $_SESSION['message_EmptyLogin'] ?>
                        </div>
                    <?php
                        $_SESSION['message_EmptyLogin'] = null;
                    endif;
                    
                    if (!empty($_SESSION) && isset($_SESSION['message_Password updated successfully']) && !empty($_SESSION['message_Password updated successfully'])) : ?>
                        <div class="alert alert-success text-center " id="myDiv" role="alert">
                            <?= $_SESSION['message_Password updated successfully'] ?>
                        </div>
                    <?php
                        $_SESSION['message_Password updated successfully'] = null;
                    endif;
                    ?>
                </div>
                <label>Email:</label>
                <input type="email" class="form-control" name="email" >
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" >
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <div class="text-center mt-4">
               
                <a href="password_resetPage.php">Forgot Password?</a>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="RegistrationPage.php" class="btn btn-secondary">Register</a>
        </div>
    </div>
    
    <script src="./assets/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>