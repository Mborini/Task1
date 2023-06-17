<!DOCTYPE html>
<html>

<head>
    <title>All Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .user-photo {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    require_once './DataBase/SQL.php';
   session_start();
    $sql = new SQL();
    
    $users = $sql->getAllUsers();
    $sql->closeConnection();
    
    // Retrieve all users from the database
    
    // Close the database connection
    ?>

    <?php include './includes/header.php'; ?>

    <div class="container">
    <div class="d-flex justify-content-between">
    <div>
            <h2>All Users <span class="navbar-text ml-auto">
                    <?php echo count($users); ?>
                </span>
            </h2>
        </div>
        <div>
      
        <form class="form-inline" action="adduser.php" class="" method="POST">
                <button href="../adduser.php" class="btn btn-outline-success  mt-3 " type="submit">
                <i class="fa-solid fa-plus fa-beat-fade" style="color: #000000;"></i>
                </button>
            </form>

        </div>
    </div>
        <div>  <?php
                    if (!empty($_SESSION) && isset($_SESSION['deleteuser']) && !empty($_SESSION['deleteuser'])) : ?>
                        <div class="alert alert-danger text-center " id="myDiv" role="alert">
                            <?= $_SESSION['deleteuser'] ?>
                        </div>
                    <?php
                        $_SESSION['deleteuser'] = null;
                    endif;?>
            <?php
        // Check if any users were found
        if (count($users) > 0) {
            echo '<table class="table">';
            echo '<thead class="thead-light">';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Photo</th>';
            echo '<th>Email</th>';
            echo '<th>phone</th>';
            echo '<th>Role</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            // Iterate through each user and display their details in a table row
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td><img src="' . $user['profile_picture'] . '" alt="User Photo" class="user-photo"></td>';
                echo '<td>' . $user['email'] . '</td>'; 
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td>' . $user['role'] . '</td>';
                
                echo '<td>';
                echo '<a href="deleteuser.php?id=' . $user['id'] . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash fa-bounce"></i></a>';
                echo '<a href="edituser.php?id=' . $user['id'] . '" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen fa-shake"></i></a>';
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./assets/script.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>