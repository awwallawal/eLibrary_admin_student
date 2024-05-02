
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <!-- Registration Page CSS -->
    <link rel="stylesheet" href="./regpage.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <?php
            include "navbar.php";
        ?>
    
        <section class="student-body ">
        
        <div  class="container">
            <h1 >Registeration Form</h1>
            <hr >
                <form action="./registration_page_db.php" method="post">
                    <p >
                    <label for="firstName">First Name:</label>
                    <input type="text" name="first_name" id="firstName">
                    </p>
                    <p >
                    <label for="middleName">Middle Name:</label>
                    <input type="text" name="middle_name" id="middleName">
                    </p>
                    <p>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="last_name" id="lastName">
                    </p>
                    <p>
                    <label for="Gender">Gender:</label>
                    <input type="text" name="gender" id="Gender">
                    </p>
                    <p >
                    <label for="Address">Address:</label>
                    <input type="text" name="address" id="Address">
                    </p>
                    <p >
                    <label for="emailAddress">Email Address:</label>
                    <input type="email" name="email" id="emailAddress">
                    </p>

                    <p >
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone">
                    </p>

                    <p >
                    <label for="matricNUmber">Matric Number:</label>
                    <input type="text" name="matric_number" id="matricNumber">
                    </p>
                    <p >
                    <label for="course">Course:</label>
                    <input type="text" name="course" id="course">
                    </p>
                    <p >
                    <label for="userName">Username:</label>
                    <input type="text" name="user_name" id="userName">
                    </p>
                    <p >
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    </p>
                    <button type="button" id="show_password" >Show Password</button>
                    <button type="submit" class="btn-el">Submit</button>
                </form>    
         </div>
            
        </section>
    
        <?php
            include "footer.php";
        ?>
        
    </div>
    

    <script src="./registration_page.js"></script>



    <!-- Box Icon Addition -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>