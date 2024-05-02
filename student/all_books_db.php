<!DOCTYPE html>
<html>

<head>
    <title>Books</title>
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
        } else {
            // echo "<h3>Salaam Alaikum Awwal</h3>";
        }

        
        
        

        
        ?>
    </center>
</body>

</html>
