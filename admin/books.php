<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./books.css?v=<?php echo time(); ?>">

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
            include "./books_db.php";
        ?>
    
        <section class="homepage-bodyy">
        <div class="boxx">
            <h2>Books Categories</h2>
            
            <div class="book_categories">
                <h3 class="category_heading">Downloadable Books</h3>
                <p class="category_text">This section in the library contains a wonderful and mammoth number of free to download books spanning a wide range of subjects for your reading pleasure! Explore our collection and dive into captivating stories, insightful essays, and informative guides.</p>
                <a href="./download_books.php"><button class="call_to_action">Check Out Our Free To Download Books</button></a>
            </div>
                
            <div class="book_categories">
                <h3 class="category_heading">Circulation Books</h3>
                <p class="category_text">Discover an array of fascinating books available for circulation in our library. From best-selling novels to academic textbooks, our collection caters to diverse interests and knowledge seekers. Start your journey of exploration and enlightenment today!</p>
                <a href="./circulation_books.php"><button class="call_to_action">Check Out Our Circulation Books</button></a>
            </div>
                
            <div class="book_categories">
                <h3 class="category_heading">Reference Books</h3>
                <p class="category_text">Delve into a treasure trove of reference materials designed to enrich your learning experience. Whether you're conducting research, studying for exams, or simply seeking reliable information, our reference books provide invaluable resources to support your academic pursuits.</p>
                 <a href="./reference_books.php"><button class="call_to_action">Check Out Our Reference Books</button></a>           
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