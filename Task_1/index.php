<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      
        .container {
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }
    </style>
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
                    if (!empty($_SESSION) && isset($_SESSION['message']) && !empty($_SESSION['message'])) : ?>
                        <div class="alert alert-success text-center " id="myDiv" role="alert">
                            <?= $_SESSION['message'] ?>
                        </div>
                    <?php
                        $_SESSION['message'] = null;
                    endif;
                    ?>
                </div>
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <div class="text-center mt-4">
               
                <a href="password_resetPage.php">Forgot Password?</a>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="register.php" class="btn btn-secondary">Register</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>