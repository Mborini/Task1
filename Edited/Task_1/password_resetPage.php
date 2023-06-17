<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

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

        .form-group input[type="email"] {
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <i class="fas fa-users"></i> User Management
        </a>
    </nav>
    <div class="container">
        <h2>Password Reset</h2>
        <form action="reset_password.php" method="POST">
            <?php if (!empty($_SESSION) && isset($_SESSION['message_Email Was Not Found']) && !empty($_SESSION['message_Email Was Not Found'])) : ?>
                <div class="alert alert-danger text-center" id="myDiv" role="alert">
                    <?= $_SESSION['message_Email Was Not Found'] ?>
                </div>
                <?php $_SESSION['message_Email Was Not Found'] = null; ?>
            <?php endif; ?>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" name="reset" class="btn btn-primary">Reset Password</button>
            <a class="nav-link text-center" href="index.php">Back to Login</a>
        </form>
    </div>
    <script src="./assets/script.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
