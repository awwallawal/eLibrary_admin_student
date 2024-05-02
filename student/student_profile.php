<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./student_profile.css?v=<?php echo time(); ?>">

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
            include "./student_profile_db.php";
        ?>
    
        <section class="profile_body">
            <div class="profile_box">
                <div class="profile_heading">
                    <h3>Student Profile</h3>
                    <form action="" method="post">
                        <button class="btn btn-default profile_btn">Edit Profile</button>
                    </form>
                </div>
                
                <div class="profile_wrapper">
                    <?php 
                      $get_user_login_info = mysqli_query($conn,"SELECT * FROM  student_info WHERE user_name = '$_SESSION[login_user]';");
                    ?>

                    <div class="profile_subheading">
                        <p>My Profile</p>

                        <p class="welcome">Welcome : &nbsp;
                            <?php echo $_SESSION['login_user'];?>
                        </p>
                    </div>

                    <div class="image_container">
                    <?php
                        $user_info = mysqli_fetch_assoc($get_user_login_info);

                        echo "<div><img src = '../student/image/". $_SESSION['pic']."' alt='Student Image' style='width: 8rem; height: 8rem;'/></div>";
                    ?>
                    </div>

                    <div class="information_container">
                        <?php 
                            echo "<table class='table table-bordered'>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>First Name</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['first_name'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Middle Name</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['middle_name'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Last Name</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['last_name'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Gender</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['gender'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Address</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['address'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Email</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['email'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Phone</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['phone'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Matric Number</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['matric_number'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                                echo "<tr>";
                                    echo "<td>";
                                        echo "<p>Course</p>";
                                    echo "</td>";

                                    echo "<td>";
                                        echo "<p>" . $user_info['course'] . "</p>";
                                    echo "</td>";
                                echo "</tr>";

                            echo "</table>";
                        
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