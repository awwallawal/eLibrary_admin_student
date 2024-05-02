<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Requested</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./book_request.css?v=<?php echo time(); ?>">

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
            include "./book_request_db.php";
        ?>
    
        <section class="homepage-bodyy">
            <div class="boxx">
                <h1>Book Request</h1>
                <hr>

                <a href="./book_request_form.php" target="_blank"><button class="add_new">New Book Request</button></a>
                <br>
                <br>
                <br>
                <!-- Books List Search Bar -->

                <div class="search_form">
                    <form action="" method="post" name="search_form">

                        <input type="text" name="search" id="search" placeholder="Search books by book name...." required>

                        <button type="submit" name="books_search" id="books_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>
                    </form>

                    


                    <div class="table_container">
                    <!-- Search Bar Logic -->
                    
                    <?php

                            if(isset($_SESSION['login_user']) && $_SESSION['login_user'] !== '') {
                                $username = $_SESSION['login_user'];
                                

                                if(isset($_POST['books_search'])) {

                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT * FROM `book_request_form` WHERE username= '$username' AND `book_name` LIKE '%$_POST[search]%' ORDER BY `book_name` ASC ");
    
    
                                    if(mysqli_num_rows($check_database_for_username_requests)==0){
                                        echo "<h3>Sorry! No book found. Try searching again.</h3>";
    
                                    } else {
                                    
                                    // <!-- Book Display Logic when clicking on the search bar-->
    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Book Authors"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Issue Date"; echo "</th>";
                                    echo "<th>";  echo "Return Date"; echo "</th>";
                                    echo "</tr>";
    
                                    $count=0;
    
                                    while($row = mysqli_fetch_assoc($check_database_for_username_requests)) {
                                        $count++;
                                        // Use modulus operator to alternate row colors
                                        $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                        echo "<tr class='$row_class'>";
    
                                        echo "<td>"; echo $row['username']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['booK_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    }
                                } else {
                                    // <!-- Book Display Logic Without clicking on the search bar-->
                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT * FROM `book_request_form` WHERE username= '$username' ORDER BY `book_request_form`.`book_name` ASC ");
    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Book Authors"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Issue Date"; echo "</th>";
                                    echo "<th>";  echo "Return Date"; echo "</th>";
                                    echo "</tr>";
    
                                    $count=0;
    
                                    while($row = mysqli_fetch_assoc($check_database_for_username_requests)) {
                                        $count++;
                                        // Use modulus operator to alternate row colors
                                        $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                        echo "<tr class='$row_class'>";
    
                                        echo "<td>"; echo $row['username']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['book_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    
                           
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
    
    <script src="./app.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>