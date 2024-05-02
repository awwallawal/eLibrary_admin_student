<!DOCTYPE html>
<html>

<head>
    <title>Admin Profile DB</title>
</head>

<body>
    <center>
        <?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "library_database");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        } else {
            // echo "<h3>Salaam Alaikum Awwal</h3>";
        }



        if(isset($_POST['submit'])){
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $email = $_REQUEST['email'];
            $homepage = "index.php";
        
            $username = mysqli_real_escape_string($conn, $username); // Escape username
            $password = mysqli_real_escape_string($conn, $password); // Escape password
            $email = mysqli_real_escape_string($conn, $email); // Escape email
        
            // Construct the SQL query to update password
        
            $update_password = mysqli_query($conn, "UPDATE `admin_info` SET `password` = '$password' WHERE `username` = '$username' AND `email` = '$email';");
        
            if ($update_password) {
                echo "<h1>Password updated successfully.</h1>";
                echo "Return to <a href='" . htmlspecialchars($homepage) . "' target='_blank'>Homepage</a>";
            } else {
                echo "Error updating password: " . mysqli_error($conn);
                echo "<p>Kindly check the username and password matches the ones used for initial registration</p>";
                echo "$username";
                echo "$email";
            }
        }
        ?>
    </center>
</body>

</html>
