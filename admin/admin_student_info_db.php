<!DOCTYPE html>
<html>

<head>
    <title>Student Information Database</title>
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
            // echo "<h3>Salaam Alaikum Awwal Akolade</h3>";
        }
  
        ?>
    </center>
</body>

</html>
