<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
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
        $matric_number = mysqli_real_escape_string($conn, $_REQUEST['matric_number']);
        $course = mysqli_real_escape_string($conn, $_REQUEST['course']);
        $user_name = mysqli_real_escape_string($conn, $_REQUEST['user_name']);
        $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
        $picture = 's.jpg';
        // $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); // Hash password

        $homepage = "./index.php";
        $count = 0;

        // Check if username already exists
        $sql_user_name = "SELECT user_name FROM `student_info` WHERE user_name = '$user_name'";
        $result_user_name = mysqli_query($conn, $sql_user_name);

        if (!$result_user_name) {
            die("Error in SQL query: " . mysqli_error($conn));
        }

        // Check if the username already exists
        while ($row_user_name = mysqli_fetch_assoc($result_user_name)) {
            if ($row_user_name['user_name'] == $user_name) {
                $count++;
            }
        }

        if ($count == 0) {
            // We are going to insert the data into our database table
            $sql = "INSERT INTO student_info VALUES ('$first_name','$middle_name','$last_name','$gender','$address','$email','$phone','$matric_number','$course','$user_name','$password','$picture')";

            // Check if the query is successful
            if (mysqli_query($conn, $sql)) {

                echo "<script type='text/javascript'>alert('Registration Successful.');</script>";

                echo "<h3>Registration successful.<br>"
                    . "Kindly check your email for confirmation,"
                    . "to view the provided information</h3>"
                    . "<a href ='$homepage'>Back to Homepage</a> ";

            } else {
                echo "<script type='text/javascript'>alert('Error in registration.');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Username already exists.');</script>";
        }


        
      

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>


<!-- 

else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
 -->