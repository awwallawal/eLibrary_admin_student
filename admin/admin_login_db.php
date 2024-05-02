<!DOCTYPE html>
<html>

<head>
    <title>Admin Logged In</title>
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
        if($conn == true){
            // echo "<h3>Connection Successful.</h3>";
        }

        if(isset($_POST['submit']))
        {
            $count = 0;

            // Retrieve username and password from the form submission
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $homepage = "./index.php";
            $login = "./admin_login.php";
        
            // Ensure proper escaping of user inputs to prevent SQL injection
            $username = mysqli_real_escape_string($conn, $username); // Escape username
            $password = mysqli_real_escape_string($conn, $password); // Escape password
        
            // Construct the SQL query with properly quoted string values
            $check_database_detail = mysqli_query($conn, "SELECT * FROM `admin_info` WHERE username='$username' AND password='$password'");
            $extract_picture_query = mysqli_fetch_assoc($check_database_detail);

             
            $count = mysqli_num_rows($check_database_detail);

            if ($count == 0) {
                echo "<script type='text/javascript'>alert('Username or Password does not exist.');</script>"
                . "<p>The username or password does not exist. </p>"
                . "<p>This is the username and password inputted ($username, $password) </p>"
                . "<p>Kindly check and provide the correct details or click on the forgot password link to reset password. </p>"
                . "<a href ='$login'>Back to Administrator's Login Page</a> ";
            } else {
                
                session_start();

                // Assume $username is already sanitized and validated

                // Set the session variable
                $_SESSION['login_user'] = $username;
                $_SESSION['picture'] = $extract_picture_query['picture'];

                // Check if the session variable is set
                if(isset($_SESSION['login_user'])) {
                    // Session variable set, do something
                    echo "Session variable 'log_user' set successfully.";
                    echo "<h1>Successfully Logged In.</h1><br>"
                    . "<a href ='$homepage'>Back to Homepage</a> ";
                } else {
                    // Session variable not set, handle error
                    echo "Error: Session variable 'log_user' not set.";
                }

                
            }
        }

        
        // Close connection
        mysqli_close($conn);
        ?>


        


    </center>
</body>

</html>
