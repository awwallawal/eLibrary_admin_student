<!DOCTYPE html>
<html>

<head>
    <title>Book Request Form DB</title>
</head>

<body>
    <center>
        <?php
        session_start();
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "library_database");

        // Check connection
        if($conn == true){
            // echo "<h3>Connection Successful.</h3>";
        }


        
        if(isset($_POST['submit'])) {
            // Retrieve username and password from the form submission
            $book_id = 0;
            $book_name = $_POST['book_name'];
            $book_authors = $_POST['book_authors'];
            $approval_status = 'Not Approved';
            $issue_date = 'Pending';
            $return_date = 'Pending';
            $profile_page = "./student_profile.php";

            // Check if the 'login_user' session variable is set
            if (isset($_SESSION['login_user'])) {


                // Assuming $conn is your MySQL connection object
                mysqli_query($conn, "INSERT INTO `book_request_form`(`username`,`book_id`, `book_name`, `book_authors`, `approval_status`, `issue_date`, `return_date`) VALUES ('".$_SESSION['login_user']."','$book_id','$book_name','$book_authors','$approval_status','$issue_date','$return_date')");
                
                echo "<h3>Successfully requested for the book : $book_name.</h3>";
                echo "<a href ='$profile_page'>Back to your profile page</a><br>";
            } else {
                echo "<h3>Error: User is not logged in.</h3>";
            }
        }
    
        
        // Close connection
        mysqli_close($conn);
        ?>


        


    </center>
</body>

</html>
