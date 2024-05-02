<?php
    include "./circulation_addbook_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circulation Books Upload</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./circulation_addbook.css?v=<?php echo time(); ?>">

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
            // include "./addbook_db.php";
        ?>
    
        <section class="homepage-bodyy">
            <div class="boxx">
                <h1>Circulation Books Upload</h1>
                <hr>
                <form action="" method="post">
                        <label for="name">Book Id</label>
                        <input type="text" name="book_id" id="book_id" placeholder="9078">

                        <label for="name">Book Name</label>
                        <input type="text" name="book_name" id="book_name" placeholder="Advcanced Calculus">

                        <label for="name">Book Author(s)</label>
                        <input type="text" name="book_authors" id="book_authors" placeholder="Joanne Rowlings">

                        <label for="name">Book Edition/Year</label>
                        <input type="text" name="book_edition" id="book_edition" placeholder="3rd/2009">

                        <label for="name">Book Status</label>
                        <input type="text" name="book_status" id="book_status" placeholder="Available">

                        <label for="name">Book Quantity</label>
                        <input type="number" name="book_quantity" id="book_quantity" placeholder="1">

                        <label for="name">Department</label>
                        <input type="text" name="department" id="department" placeholder="Computer Science">

                        <!-- <label for="book_link">Book Link</label> -->
                        <!-- <input type="text" name="book_link" id="book_link" placeholder="https://www.jumpshare.com/bx_pow"> -->

                        <!-- <label for="name">Upload</label>
                        <input type="file" name="upload" id="upload" > -->

                        <button type="submit" name="submit" value="reply">Submit</button>
                    </form>

                    <div class="success">
                        <?php
                                if(isset($_POST['submit'])) {
                                    // Database connection
                                    // $conn = mysqli_connect("localhost", "username", "password", "database");
                                
                                    // Check connection
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                
                                    // Escape user inputs for security
                                    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);
                                    $book_name = mysqli_real_escape_string($conn, $_POST['book_name']);
                                    $book_authors = mysqli_real_escape_string($conn, $_POST['book_authors']);
                                    $book_edition = mysqli_real_escape_string($conn, $_POST['book_edition']);
                                    $book_status = mysqli_real_escape_string($conn, $_POST['book_status']);
                                    $book_quantity = mysqli_real_escape_string($conn, $_POST['book_quantity']);
                                    $department = mysqli_real_escape_string($conn, $_POST['department']);
                                    $book_link = '';
                                
                                    // Construct the SQL query to push information into the MySQL database
                                    $push_information_database = "INSERT INTO `circulation_book_upload`(`book_id`, `book_name`, `book_authors`, `book_edition`, `book_status`, `book_quantity`, `department`, `book_link`) 
                                                                    VALUES ('$book_id', '$book_name', '$book_authors', '$book_edition', '$book_status', '$book_quantity', '$department', '$book_link')";
                                
                                    // Execute query
                                    if(mysqli_query($conn, $push_information_database)) {
                                        echo "<h4>Book: ($book_name)successfully inserted into the Circulation Books database.</h4>";
                                    } else {
                                        // Query execution failed
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                
                                    // Close connection
                                    mysqli_close($conn);
                                }
                        ?>
                    
                    </div>
                
            </div>
     
        </section>
    
        <?php
            include "footer.php";
        ?>
    </div>
    

    
    <script src="./app.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>