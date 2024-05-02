<?php
    include "./admin_update_password_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update Password</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./admin_update_password.css?v=<?php echo time(); ?>">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

</head>
<body>
    <div class="wrapper">
        <?php
            include "navbar.php";
        ?>
    
        <section class="profile_body">
            <div class="profile_box">
                <h3>Update Password</h3>

                <div class="update_container">
                    <p>Please fill in your details to change password</p>
                    <form action="./admin_update_password_db.php" method="post">
                        <input type="text" name="username" id="username" placeholder="username" required>
                        <input type="email" name="email" id="email" placeholder="email@email.com" required>
                        <input type="password" name="password" id="password" placeholder="new password" required>
                        <button type="button" id="show_password"></button>
                        <button type="submit" name="submit">Update Password</button>
                        
                    </form>

                </div>
                
            </div>
     
        </section>
    
        <?php
            include "footer.php";
        ?>
    </div>
    

    
    <script src="./admin_update_password.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>