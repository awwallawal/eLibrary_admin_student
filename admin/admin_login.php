

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./admin_login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <?php
            include "navbar.php";
        ?>
    
        <section class="student-bodyyy">


            <div class="box">
            <div class="form-logo"><img src="./image/school_logo.png" alt=""></div>
                <form action="./admin_login_db.php" method="post">
                <p>
                <label for="userName">User Name:</label>
                <input type="text" name="username" id="userName">
                </p>
                <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
                </p>

                <button type="button" id="show_password">Show Password</button>

                <button type="submit" value="Submit" name="submit">Submit</button>
                
                <!-- <input type="submit" value="Submit" name="submit"> -->

                <p class="register">Don't have an account? <span> <a href="./admin_registration_page.php" target="_blank">Sign Up</a></span></p>
                <p><a href="./admin_update_password.php" target="_blank">Forgot password?</a></p>

            </form>
                
            </div>
        </section>
    
        <?php
            include "footer.php";
        ?>
        
    </div>
    

    <script src="./admin_login.js"></script>

    <!-- Box Icon Addition -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>