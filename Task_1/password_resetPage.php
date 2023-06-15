<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-12 mt-5">
        <h2>Password Reset</h2>
        <form action="reset_password.php" method="POST">
           
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <button type="submit" name="reset" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>