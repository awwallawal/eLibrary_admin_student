<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./issued_books.css?v=<?php echo time(); ?>">

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
            include "./issued_books_db.php";
        ?>
    
        <section class="homepage-bodyy">
            <div class="boxx">
                <h1>Issued Books</h1>
                <hr>

                <!-- <a href="./book_request_form.php" target="_blank"><button class="add_new">New Book Request</button></a> -->
                
                <!-- Books List Search Bar -->

                <div class="search_form">
                    <div class="search_bars_container">

                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="search" id="search" placeholder="Search by book name...." required>

                        <button type="submit" name="books_search" id="books_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>

                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="usernamesearch" id="usernamesearch" placeholder="Search by username...." required>

                        <button type="submit" name="username_search" id="username_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>


                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="matricsearch" id="matricsearch" placeholder="Search by matric number...." required>

                        <button type="submit" name="matric_search" id="matric_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>

                    </div>

                    


                    <div class="table_container">
                                            
                    

                    <?php

                            // if(isset($_SESSION['login_user']) && $_SESSION['login_user'] !== '') {
                            //     $username = $_SESSION['login_user'];
                                

                                if(isset($_POST['books_search'])) {

                                    // $check_database_for_username_requests = mysqli_query($conn, "SELECT student_info.matric_number, book_request_form.username,book_id,book_name,book_authors,issue_date,return_date FROM book_request_form inner join student_info ON book_request_form.username = student_info.user_name WHERE book_request_form.approval_status = 'Not Approved' AND `book_name` LIKE '%$_POST[search]%' ORDER BY `book_name` ASC ");

                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT student_info.matric_number, book_request_form.username,book_id,book_name,book_authors, approval_status, issue_date,return_date FROM book_request_form inner join student_info ON book_request_form.username = student_info.user_name WHERE book_request_form.approval_status = 'Approved' AND `book_name` LIKE '%" . $_POST['search'] . "%' ORDER BY `book_request_form`.`return_date` ASC");

    
    
                                    if(mysqli_num_rows($check_database_for_username_requests)==0){
                                        echo "<h3>Sorry! No book found. Try searching again.</h3>";
    
                                    } else {
                                    
                                    // <!-- Book Display Logic when clicking on the search bar-->
    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Matric Number"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Author"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Revoke Book"; echo "</th>";
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
                                        echo "<td>"; echo $row['matric_number']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['book_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        echo "<td style='width: 5%;'>";
                                        echo "<form method='post' action='' style='width: 100%;'>";
                                        echo "<input type='hidden' name='book_name' value='" . $row['book_name'] . "' style='width: 100%;'>";
                                        echo "<input type='hidden' name='username' value='" . $row['username'] . "' style='width: 100%;'>";
                                        echo "<button type='submit' name='revoke' style='width: 100%; background-color: yellow; font-size: 1rem;'>Revoke</button>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    }
                                } elseif (isset($_POST['username_search'])) {

                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT student_info.matric_number, book_request_form.username,book_id,book_name,book_authors, approval_status, issue_date,return_date FROM book_request_form inner join student_info ON book_request_form.username = student_info.user_name WHERE book_request_form.approval_status = 'Approved' AND `username` LIKE '%" . $_POST['usernamesearch'] . "%' ORDER BY `book_request_form`.`return_date` ASC");

    
    
                                    if(mysqli_num_rows($check_database_for_username_requests)==0){
                                        echo "<h3>Sorry! No book found. Try searching again.</h3>";
    
                                    } else {
                                    
                                    // <!-- Book Display Logic when clicking on the search bar-->
    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Matric Number"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Author"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Revoke Book"; echo "</th>";
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
                                        echo "<td>"; echo $row['matric_number']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['book_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        echo "<td style='width: 5%;'>";
                                        echo "<form method='post' action='' style='width: 100%;'>";
                                        echo "<input type='hidden' name='book_name' value='" . $row['book_name'] . "' style='width: 100%;'>";
                                        echo "<input type='hidden' name='username' value='" . $row['username'] . "' style='width: 100%;'>";
                                        echo "<button type='submit' name='revoke' style='width: 100%; background-color: yellow; font-size: 1rem;'>Revoke</button>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    }
                                } elseif (isset($_POST['matric_search'])) {

                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT student_info.matric_number, book_request_form.username,book_id,book_name,book_authors, approval_status, issue_date,return_date FROM book_request_form inner join student_info ON book_request_form.username = student_info.user_name WHERE book_request_form.approval_status = 'Approved' AND `matric_number` LIKE '%" . $_POST['matricsearch'] . "%' ORDER BY `book_request_form`.`return_date` ASC");

    
    
                                    if(mysqli_num_rows($check_database_for_username_requests)==0){
                                        echo "<h3>Sorry! No book found. Try searching again.</h3>";
    
                                    } else {
                                    
                                    // <!-- Book Display Logic when clicking on the search bar-->
    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Matric Number"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Author"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Revoke Book"; echo "</th>";
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
                                        echo "<td>"; echo $row['matric_number']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['book_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        echo "<td style='width: 5%;'>";
                                        echo "<form method='post' action='' style='width: 100%;'>";
                                        echo "<input type='hidden' name='book_name' value='" . $row['book_name'] . "' style='width: 100%;'>";
                                        echo "<input type='hidden' name='username' value='" . $row['username'] . "' style='width: 100%;'>";
                                        echo "<button type='submit' name='revoke' style='width: 100%; background-color: yellow; font-size: 1rem;'>Revoke</button>";
                                        echo "</form>";
                                        echo "</td>";                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    }
                                } else {
                                    // <!-- Book Display Logic Without clicking on the search bar-->
                                    // $check_database_for_username_requests = mysqli_query($conn, "SELECT * FROM `book_request_form` ORDER BY `book_request_form`.`book_name` ASC ");
                                    
                                    /* Uses a query parameter to only show books that have not been approved. If the book has been approved by the Admin, it wont be shown on the Books Requested List. */

                                    // $check_database_for_username_requests = mysqli_query($conn, "SELECT * FROM `book_request_form` WHERE approval_status = 'Not Approved' ORDER BY `book_request_form`.`book_name` ASC");

                                    
                                    $check_database_for_username_requests = mysqli_query($conn, "SELECT student_info.matric_number, book_request_form.username,book_id,book_name,book_authors, approval_status, issue_date,return_date FROM book_request_form inner join student_info ON book_request_form.username = student_info.user_name WHERE book_request_form.approval_status = 'Approved' ORDER BY `book_request_form`.`return_date` ASC; ");

                                    
                                    
                                    echo "<table class='table table-bordered table-hover'>";
                                    echo "<tr style='background-color: #ae9c94;'>";
                                    // Table Header 
                                    echo "<th>";  echo "Username"; echo "</th>";
                                    echo "<th>";  echo "Matric Number"; echo "</th>";
                                    echo "<th>";  echo "Book Name"; echo "</th>";
                                    echo "<th>";  echo "Author"; echo "</th>";
                                    echo "<th>";  echo "Approval Status"; echo "</th>";
                                    echo "<th>";  echo "Revoke Book"; echo "</th>";
                                    echo "<th>";  echo "Issue Date"; echo "</th>";
                                    echo "<th>";  echo "Return Date"; echo "</th>";
                                    echo "</tr>";
                                    
                                    $count=0;
                                    
                                    while($row = mysqli_fetch_assoc($check_database_for_username_requests)) {
                                        $todaysDate = date('d-m-Y');
                                        $returnDate = $row['return_date'];
                                        $count++;
                                        // Use modulus operator to alternate row colors
                                        $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                        echo "<tr class='$row_class'>";
    
                                        echo "<td>"; echo $row['username']; echo "</td>";
                                        echo "<td>"; echo $row['matric_number']; echo "</td>";
                                        echo "<td>"; echo $row['book_name']; echo "</td>";
                                        echo "<td>"; echo $row['book_authors']; echo "</td>";
                                        echo "<td>"; echo $row['approval_status']; echo "</td>";
                                        // echo "<td style='width: 5%;'>";
                                        // echo "<form method='post' action='' style='width: 100%;'>";
                                        // echo "<input type='hidden' name='book_name' value='" . $row['book_name'] . "' style='width: 100%;'>";
                                        // echo "<input type='hidden' name='username' value='" . $row['username'] . "' style='width: 100%;'>";
                                        // echo "<button type='submit' name='revoke' style='width: 100%; background-color: yellow; font-size: 1rem;'>Revoke</button>";
                                        // echo "</form>";
                                        // echo "</td>";
                                        echo "<td style='width: 5%;'>";
                                        echo "<div style='width: 100%;'>";
                                                if($todaysDate > $returnDate) {
                                                    echo "<p style='color:red'>Expired</p>";
                                                } else {
                                                    echo "<p style='color:green'>Borrowed</p>";
                                                }
                                        echo "</div>";
                                        echo "</td>";                                      
                                        echo "<td>"; echo $row['issue_date']; echo "</td>";
                                        echo "<td>"; echo $row['return_date']; echo "</td>";                                
                                        echo "</tr>";
                                    }
    
                                    echo "</table>";
    
                                    
                           
                                }
                            // }
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