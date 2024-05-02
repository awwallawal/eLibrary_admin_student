<?php
include "feeback_db.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <!-- Feedback Page CSS -->
    <link rel="stylesheet" href="./feedback.css?v=<?php echo time(); ?>>">

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
    
        <section class="student-body ">
        
            <div  class="container">
                <h1 >Feedback Page</h1>
                <hr >
                <div class="feedback_wrapper">
                    <br>
                    <br>
                    <h3>If have any suggestion(s) please comment below.</h3>
                    <form action="" method="post">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Ade Ade">

                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="email@email.com">

                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject matter of feedback">
                        
                        <!-- Form Submit additional inputs -->
                        <input type="hidden" name="_subject" value="New Feedback!">
                        
                        <input type="hidden" name="_autoresponse" value="We value you! We will provide a response within 24 -48 hours.">

                        <input type="hidden" name="_template" value="basic">
                        <!-- End -->
                        <p>
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Kindly provide your message"></textarea>
                        </p>

                        <button type="submit" name="submit" value="reply">Submit</button>
                    </form>

                    <div class="success">
                        <?php

                            if(isset($_POST['submit'])) {
                                $name = mysqli_real_escape_string($conn, $_POST['name']);
                                $email = mysqli_real_escape_string($conn, $_POST['email']);
                                $subject = mysqli_real_escape_string($conn, $_POST['subject']);
                                $message = mysqli_real_escape_string($conn, $_POST['message']);

                                // Construct the SQL query
                                $request_database = "INSERT INTO `feeedback` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message') ";

                                // Execute the query
                                if(mysqli_query($conn, $request_database)) {
                                    // Query executed successfully
                                    // echo "<h3>Feedback submitted successfully.</h3>";

                                    // Retrieve feedback comments from the database
                                    $comment_from_database = "SELECT * FROM `feeedback` ORDER BY `comment_id` DESC";
                                    $result_from_comment = mysqli_query($conn, $comment_from_database);
                                    $count=0;

                                    if(mysqli_num_rows($result_from_comment) > 0) {
                                        // Output feedback comments in a table
                                        echo "<table class='table table-bordered table-hover'>";
                                        while($row = mysqli_fetch_assoc($result_from_comment)) {
                                            $count++;
                                            // Use modulus operator to alternate row colors
                                            $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                            echo "<tr class='$row_class'>";
                                            echo "<td>" . $row['message'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        // No feedback comments found
                                        echo "<p>No feedback comments found.</p>";
                                    }

                                } else {
                                    // Query execution failed
                                    echo "Error: " . mysqli_error($conn);
                                }
                            }


                        ?>
                    
                    </div>

                </div>
                    
            </div>
            
        </section>
    
        <?php
            include "footer.php";
        ?>
    </div>
    

    <script src="./registration_page.js"></script>

    <!-- Email Validator CDN -->
    <script src="https://unpkg.com/validator@latest/validator.min.js"></script>

    <!-- Box Icon Addition -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>