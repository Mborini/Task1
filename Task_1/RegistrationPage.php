<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
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
        .form-group input[type="password"],
        .form-group input[type="file"] {
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

        .profile-picture-preview {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            border: 2px solid #ccc;
            margin-top: 10px;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <i class="fas fa-users"></i> User Management
    </a>
   
</nav>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="profile-picture-preview">
                <img id="profile-picture-preview-img" src="no_image.jpg" width="50%" height="50%" alt="Profile Picture Preview" />
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="number" class="form-control" name="phonenumber" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Profile Picture:</label>
                <input type="file" class="form-control-file" name="profile_picture" onchange="previewProfilePicture(event)" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Login</a>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewProfilePicture(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var previewImg = document.getElementById('profile-picture-preview-img');
                previewImg.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>