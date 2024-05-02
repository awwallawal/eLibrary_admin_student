<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Request Form</title>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./book_request_form.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="wrapper">
        <?php
            include "navbar.php";
            // include "book_request_form_db.php"
        ?>
    
        <section class="student-bodyyy">


            <div class="box">
            <div class="form-logo"><h2>Book Request Form</h2></div>
                <form action="./book_request_form_db.php" method="post">
                
                
                <label for="book_name">Book Name:</label>
                <input type="text" name="book_name" id="book_name">
                
                <label for="author">Author</label>
                <input type="text" name="book_authors" id="book_authors">
                
                <label for="approval_status" style="display: none;">Approval Status</label>
                <input type="text" name="approval_status" id="approval_status"  style="display: none;">

                <label for="issue_date" style="display: none;">Issue Date</label>
                <input type="text" name="issue_date" id="issue_date" style="display: none;">
                
                <label for="return_date" style="display: none;">Return Date</label>
                <input type="text" name="return_date" id="return_date" style="display: none;">            

                <button type="submit" value="Submit" name="submit">Submit</button>

            </form>
                
            </div>
        </section>
    
        <?php
            include "footer.php";
        ?>
        
    </div>
    

    <script src="./student_login.js"></script>

    <!-- Box Icon Addition -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>