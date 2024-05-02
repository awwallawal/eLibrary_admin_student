<?php
    include "./addbook_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Upload</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./addbook.css?v=<?php echo time(); ?>">

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
                <h1>Upload Books</h1>
                <hr>
                <a href="./download_addbook.php"><button type="button">Upload Downloadable Books</button></a>
                <a href="./circulation_addbook.php"><button type="button">Upload Circulation Books</button></a>
                <a href="./reference_addbook.php"><button type="button">Upload Reference Books</button></a>
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