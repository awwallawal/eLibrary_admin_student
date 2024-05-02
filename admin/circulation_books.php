<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circulation Books List</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./circulation_books.css?v=<?php echo time(); ?>">

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
            include "./circulation_books_db.php";
        ?>
    
        <section class="homepage-bodyy">
            <div class="boxx">
                <h1>Circulation Books List</h1>
                <hr>
                <!-- Books List Search Bar -->

                <div class="search_form">
                    <form action="" method="post" name="search_form">

                        <input type="text" name="search" id="search" placeholder="Search books by book name...." required>

                        <button type="submit" name="books_search" id="books_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        

                    </form>


                    <div class="table_container">
                        <!-- Book Delete Logic -->
                        <?php
                            if(isset($_POST['delete'])){
                                $book_id = $_POST['book_id'];
                                mysqli_query($conn,"DELETE FROM `circulation_book_upload` WHERE `book_id` = $book_id");
                                echo "$book_id successfully deleted";
                            }
                            ?>

                        <!-- Search Bar Logic -->
                        <?php
                            if(isset($_POST['books_search'])) {
                                $check_book_name = mysqli_query($conn, "SELECT * FROM `circulation_book_upload` WHERE `book_name` LIKE '%$_POST[search]%' ORDER BY `book_name` ASC");

                                if(mysqli_num_rows($check_book_name)==0){
                                    echo "<h3>Sorry! No book found. Try searching again.</h3>";

                                } else {
                                      // <!-- Book Display Logic when clicking on the search bar-->

                                    echo "<table class='table table-bordered table-hover'>";
                                            echo "<tr style='background-color: #ae9c94;'>";
                                            // Table Header 
                                            echo "<th>";  echo "Book Id"; echo "</th>";
                                            echo "<th>";  echo "Book Name"; echo "</th>";
                                            echo "<th>";  echo "Book Author(s)"; echo "</th>";
                                            echo "<th>";  echo "Book Edition"; echo "</th>";
                                            echo "<th>";  echo "Book Status"; echo "</th>";
                                            echo "<th>";  echo "Book Quantity"; echo "</th>";
                                            echo "<th>";  echo "Department"; echo "</th>";
                                            echo "<th>";  echo "Delete"; echo "</th>";
                                            // echo "<th>";  echo "Download"; echo "</th>";
                                            echo "</tr>";
            
                                            $count=0;

                                    while($row = mysqli_fetch_assoc($check_book_name)) {
                                                $count++;
                                                // Use modulus operator to alternate row colors
                                                $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                                echo "<tr class='$row_class'>";
            
                                                echo "<td>"; echo $row['book_id']; echo "</td>";
                                                echo "<td>"; echo $row['book_name']; echo "</td>";
                                                // echo "<td>"; echo "<a href='" . $row['book_link'] . "' target='_blank' class='download'>" . $row['book_name'] . "</a>"; echo "</td>";
                                                echo "<td>"; echo $row['book_authors']; echo "</td>";
                                                echo "<td>"; echo $row['book_edition']; echo "</td>";
                                                echo "<td>"; echo $row['book_status']; echo "</td>";
                                                echo "<td>"; echo $row['book_quantity']; echo "</td>";
                                                echo "<td>"; echo $row['department']; echo "</td>";
                                                echo "<td style='width: 5%;'>";
                                                echo "<form method='post' action='' style='width: 100%;'>";
                                                echo "<input type='hidden' name='book_id' value='" . $row['book_id'] . "' style='width: 100%;'>";
                                                echo "<button type='submit' name='delete' style='width: 100%; background-color: red; font-size: 1rem;'>Delete</button>";
                                                echo "</form>";
                                                echo "</td>";
                                                // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                            
                                                echo "</tr>";

                                    }
                                    echo "</table>";

                                }
                            } else {
                                // <!-- Book Display Logic Without clicking on the search bar-->


                                $books_request_database = mysqli_query($conn,"SELECT * FROM `circulation_book_upload` ORDER BY `circulation_book_upload`.`book_name` ASC ;");

                                echo "<table class='table table-bordered table-hover'>";
                                echo "<tr style='background-color: #ae9c94;'>";
                                // Table Header 
                                echo "<th>";  echo "Book Id"; echo "</th>";
                                echo "<th>";  echo "Book Name"; echo "</th>";
                                echo "<th>";  echo "Book Author(s)"; echo "</th>";
                                echo "<th>";  echo "Book Edition"; echo "</th>";
                                echo "<th>";  echo "Book Status"; echo "</th>";
                                echo "<th>";  echo "Book Quantity"; echo "</th>";
                                echo "<th>";  echo "Department"; echo "</th>";
                                echo "<th>";  echo "Delete"; echo "</th>";
                                // echo "<th>";  echo "Download"; echo "</th>";
                                echo "</tr>";

                                $count=0;

                                while($row = mysqli_fetch_assoc($books_request_database)) {
                                    $count++;
                                    // Use modulus operator to alternate row colors
                                    $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                    echo "<tr class='$row_class'>";

                                    echo "<td>"; echo $row['book_id']; echo "</td>";
                                    echo "<td>"; echo $row['book_name']; echo "</td>";
                                    // echo "<td>"; echo "<a href='" . $row['book_link'] . "' target='_blank' class='download'>" . $row['book_name'] . "</a>"; echo "</td>";
                                    echo "<td>"; echo $row['book_authors']; echo "</td>";
                                    echo "<td>"; echo $row['book_edition']; echo "</td>";
                                    echo "<td>"; echo $row['book_status']; echo "</td>";
                                    echo "<td>"; echo $row['book_quantity']; echo "</td>";
                                    echo "<td>"; echo $row['department']; echo "</td>";
                                    echo "<td style='width: 5%;'>";
                                    echo "<form method='post' action='' style='width: 100%;'>";
                                    echo "<input type='hidden' name='book_id' value='" . $row['book_id'] . "' style='width: 100%;'>";
                                    echo "<button type='submit' name='delete' style='width: 100%; background-color: red; font-size: 1rem;'>Delete</button>";
                                    echo "</form>";
                                    echo "</td>";
                                     // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                
                                    echo "</tr>";
                                }

                                echo "</table>";

                                
                       
                            }
                        ?>

                        
                    
                    </div>
                    
                </div>
                <a href="./addbook.php"><button class="add_new">Add New Book</button></a>

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