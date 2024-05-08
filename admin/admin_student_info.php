<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./admin_student_info.css?v=<?php echo time(); ?>">

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
            include "./admin_student_info_db.php";
        ?>
    
        <section class="homepage-bodyy">
            <div class="boxx">
                <h1>Students Information</h1>
                <hr>

                <div class="search_form">

                    <div class="search_bars_container">

                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="search" id="search" placeholder="Search student by surname...." required>

                        <button type="submit" name="students_search" id="students_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>

                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="usernamesearch" id="usernamesearch" placeholder="Search student by username...." required>

                        <button type="submit" name="username_search" id="username_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>


                        <form action="" method="post" name="search_form" class="search_formm">

                        <input type="text" name="matricsearch" id="matricsearch" placeholder="Search student by matric number...." required>

                        <button type="submit" name="matric_search" id="matric_search"><span><ion-icon name="search-sharp"></ion-icon></span></button>

                        </form>

                    </div>


                    <div class="table_container">
                    
                    
                        <?php
                            if(isset($_POST['students_search'])) {
                                /*<!-- Search Bar Logic based on surname --> */
                                $check_last_name = mysqli_query($conn, "SELECT * FROM `student_info` WHERE `last_name` LIKE '%$_POST[search]%' ORDER BY `last_name` ASC");

                                if(mysqli_num_rows($check_last_name)==0){
                                    echo "<h3>Sorry! Student Information not found. Try searching again.</h3>";

                                } else {
                                      // <!-- Book Display Logic when clicking on the search bar-->

                                    echo "<table class='table table-bordered table-hover'>";
                                            echo "<tr style='background-color: #ae9c94;'>";
                                            // Table Header 
                                            echo "<th>";  echo "First Name"; echo "</th>";
                                            echo "<th>";  echo "Middle Name"; echo "</th>";
                                            echo "<th>";  echo "Last Name"; echo "</th>";
                                            echo "<th>";  echo "Email"; echo "</th>";
                                            echo "<th>";  echo "Phone"; echo "</th>";
                                            echo "<th>";  echo "Matric No"; echo "</th>";
                                            echo "<th>";  echo "Username"; echo "</th>";
                                            echo "<th>";  echo "Password"; echo "</th>";
                                            // echo "<th>";  echo "Download"; echo "</th>";
                                            echo "</tr>";
            
                                            $count=0;

                                    while($row = mysqli_fetch_assoc($check_last_name)) {
                                                $count++;
                                                // Use modulus operator to alternate row colors
                                                $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                                echo "<tr class='$row_class'>";
            
                                                echo "<td>"; echo $row['first_name']; echo "</td>";
                                                echo "<td>"; echo $row['middle_name']; echo "</td>";
                                                echo "<td>"; echo $row['last_name']; echo "</td>";
                                                echo "<td>"; echo $row['email']; echo "</td>";
                                                echo "<td>"; echo $row['phone']; echo "</td>";
                                                echo "<td>"; echo $row['matric_number']; echo "</td>";
                                                echo "<td>"; echo $row['user_name']; echo "</td>";
                                                echo "<td>"; echo $row['password']; echo "</td>";
                                                // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                            
                                                echo "</tr>";

                                    }
                                    echo "</table>";

                                }
                            } elseif (isset($_POST['username_search'])) {
                                /*<!-- Search Bar Logic based on username --> */
                                $check_last_name = mysqli_query($conn, "SELECT * FROM `student_info` WHERE `user_name` LIKE '%$_POST[usernamesearch]%' ORDER BY `last_name` ASC");

                                if(mysqli_num_rows($check_last_name)==0){
                                    echo "<h3>Sorry! Student Information not found. Try searching again.</h3>";

                                } else {
                                      // <!-- Book Display Logic when clicking on the search bar-->

                                    echo "<table class='table table-bordered table-hover'>";
                                            echo "<tr style='background-color: #ae9c94;'>";
                                            // Table Header 
                                            echo "<th>";  echo "First Name"; echo "</th>";
                                            echo "<th>";  echo "Middle Name"; echo "</th>";
                                            echo "<th>";  echo "Last Name"; echo "</th>";
                                            echo "<th>";  echo "Email"; echo "</th>";
                                            echo "<th>";  echo "Phone"; echo "</th>";
                                            echo "<th>";  echo "Matric No"; echo "</th>";
                                            echo "<th>";  echo "Username"; echo "</th>";
                                            echo "<th>";  echo "Password"; echo "</th>";
                                            // echo "<th>";  echo "Download"; echo "</th>";
                                            echo "</tr>";
            
                                            $count=0;

                                    while($row = mysqli_fetch_assoc($check_last_name)) {
                                                $count++;
                                                // Use modulus operator to alternate row colors
                                                $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                                echo "<tr class='$row_class'>";
            
                                                echo "<td>"; echo $row['first_name']; echo "</td>";
                                                echo "<td>"; echo $row['middle_name']; echo "</td>";
                                                echo "<td>"; echo $row['last_name']; echo "</td>";
                                                echo "<td>"; echo $row['email']; echo "</td>";
                                                echo "<td>"; echo $row['phone']; echo "</td>";
                                                echo "<td>"; echo $row['matric_number']; echo "</td>";
                                                echo "<td>"; echo $row['user_name']; echo "</td>";
                                                echo "<td>"; echo $row['password']; echo "</td>";
                                                // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                            
                                                echo "</tr>";

                                    }
                                    echo "</table>";

                                }
                            } elseif (isset($_POST['matric_search'])) {
                                /*<!-- Search Bar Logic based on matricnumber --> */
                                $check_last_name = mysqli_query($conn, "SELECT * FROM `student_info` WHERE `matric_number` LIKE '%$_POST[matricsearch]%' ORDER BY `last_name` ASC");

                                if(mysqli_num_rows($check_last_name)==0){
                                    echo "<h3>Sorry! Student Information not found. Try searching again.</h3>";

                                } else {
                                      // <!-- Book Display Logic when clicking on the search bar-->

                                    echo "<table class='table table-bordered table-hover'>";
                                            echo "<tr style='background-color: #ae9c94;'>";
                                            // Table Header 
                                            echo "<th>";  echo "First Name"; echo "</th>";
                                            echo "<th>";  echo "Middle Name"; echo "</th>";
                                            echo "<th>";  echo "Last Name"; echo "</th>";
                                            echo "<th>";  echo "Email"; echo "</th>";
                                            echo "<th>";  echo "Phone"; echo "</th>";
                                            echo "<th>";  echo "Matric No"; echo "</th>";
                                            echo "<th>";  echo "Username"; echo "</th>";
                                            echo "<th>";  echo "Password"; echo "</th>";
                                            // echo "<th>";  echo "Download"; echo "</th>";
                                            echo "</tr>";
            
                                            $count=0;

                                    while($row = mysqli_fetch_assoc($check_last_name)) {
                                                $count++;
                                                // Use modulus operator to alternate row colors
                                                $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                                echo "<tr class='$row_class'>";
            
                                                echo "<td>"; echo $row['first_name']; echo "</td>";
                                                echo "<td>"; echo $row['middle_name']; echo "</td>";
                                                echo "<td>"; echo $row['last_name']; echo "</td>";
                                                echo "<td>"; echo $row['email']; echo "</td>";
                                                echo "<td>"; echo $row['phone']; echo "</td>";
                                                echo "<td>"; echo $row['matric_number']; echo "</td>";
                                                echo "<td>"; echo $row['user_name']; echo "</td>";
                                                echo "<td>"; echo $row['password']; echo "</td>";
                                                // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                            
                                                echo "</tr>";

                                    }
                                    echo "</table>";

                                }
                            } else {
                                // <!-- Book Display Logic Without clicking on the search bars-->


                                $names_request_database = mysqli_query($conn,"SELECT * FROM `student_info` ORDER BY `student_info`.`last_name` ASC ;");

                                echo "<table class='table table-bordered table-hover'>";
                                echo "<tr style='background-color: #ae9c94;'>";
                                // Table Header 
                                echo "<th>";  echo "First Name"; echo "</th>";
                                echo "<th>";  echo "Middle Name"; echo "</th>";
                                echo "<th>";  echo "Last Name"; echo "</th>";
                                echo "<th>";  echo "Email"; echo "</th>";
                                echo "<th>";  echo "Phone"; echo "</th>";
                                echo "<th>";  echo "Matric No"; echo "</th>";
                                echo "<th>";  echo "Username"; echo "</th>";
                                echo "<th>";  echo "Password"; echo "</th>";
                                // echo "<th>";  echo "Download"; echo "</th>";
                                echo "</tr>";

                                $count=0;

                                while($row = mysqli_fetch_assoc($names_request_database)) {
                                    $count++;
                                    // Use modulus operator to alternate row colors
                                    $row_class = $count % 2 == 0 ? "even-row" : "odd-row";
                                    echo "<tr class='$row_class'>";

                                    echo "<td>"; echo $row['first_name']; echo "</td>";
                                    echo "<td>"; echo $row['middle_name']; echo "</td>";
                                    echo "<td>"; echo $row['last_name']; echo "</td>";
                                    echo "<td>"; echo $row['email']; echo "</td>";
                                    echo "<td>"; echo $row['phone']; echo "</td>";
                                    echo "<td>"; echo $row['matric_number']; echo "</td>";
                                    echo "<td>"; echo $row['user_name']; echo "</td>";
                                    echo "<td>"; echo $row['password']; echo "</td>";
                                     // echo "<td>"; echo "<a href='" . $row['Download'] . "' target='_blank' class='download'>Download</a>"; echo "</td>";
                                
                                    echo "</tr>";
                                }

                                echo "</table>";

                                
                       
                            }
                        ?>
                    
                    </div> 
                    
                </div>
                <a href="./registration_page.php"><button class="add_new">Add New Student</button></a>

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