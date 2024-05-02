<!DOCTYPE html>
<html>

<head>
    <title>Administrator Registeration Page</title>
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
        }


        $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
        $middle_name = mysqli_real_escape_string($conn, $_REQUEST['middle_name']);
        $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
        $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
        $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
        $staff_id = mysqli_real_escape_string($conn, $_REQUEST['staff_id']);
        $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
        $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
        $picture = 'p.jpg';

        $homepage = "./index.php";
        $count = 0;
        $registrationpage = "./admin_registration_page.php";


        // Check if username already exists
        $sql_user_name = "SELECT username FROM `admin_info` WHERE username = '$username'";
        $result_user_name = mysqli_query($conn, $sql_user_name);
        /** If the query returns true that the database contains the username the connection should go ahead. We will later stop this using the count variable in conjuction with the fetch_assoc() function*/     
        if (!$result_user_name) {
            die("Error in SQL query: " . mysqli_error($conn));
        }

        // Check if the username already exists and then if this evaluates to true increase the count number 
        while ($row_user_name = mysqli_fetch_assoc($result_user_name)) {
            if ($row_user_name['username'] == $username) {
                $count++;
            }
        }
        
        // We will be stopping the duplicate username from being posted into the database using this logic.
        if ($count == 0) {

            // Post user information into the database only when the count is zero i.e. no similar username in the database (Remember this was the first line of code to confirm that the form can indeed connect to the database and post information into the admininfo table )

            $sql_insert = "INSERT INTO `admin_info`(`id`, `first_name`, `middle_name`, `last_name`, `gender`, `address`, `email`, `phone`, `staff_id`, `username`, `password`, `picture`) VALUES ('','$first_name','$middle_name','$last_name','$gender','$address','$email','$phone','$staff_id','$username','$password','$picture')";

            if (mysqli_query($conn, $sql_insert)) {

                echo "<script type='text/javascript'>alert('Registration Successful.');</script>";

                echo "<h3>Registration successful.<br>"
                    . "Kindly check your email for confirmation,"
                    . "to view the provided information username($username), password($password)</h3>"
                    . "<a href ='$homepage'>Back to Homepage</a> ";

            } else {
                echo "<script type='text/javascript'>alert('Error in registration.');</script>";
            }
            
        } else {
            echo "<script type='text/javascript'>alert('Username already exists.');</script>"
                 . "<a href ='$registrationpage'>Back to Registration Page</a> ";
        }


        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
