<?php
    session_start();

    /* A session starts once a student logs in using his/her username and password. Hence the starting point of the session is the student_login.php page. */
?>
<header>
    <div class="logo">
        <a href="./index.php" target="_blank"><img src="./image/school_logo.png" alt=""></a>
        <p>E-Library</p>
    </div>
    <?php
    /* if(isset($_SESSION['login_user']) ) this would also work */
    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user'])) {
    ?>
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./student_profile.php">My Profile</a></li>
            <li><a href="./books_login.php">Books</a></li>
            <li><a href="./logout.php">Logout</a></li>
            <li><a href="./feedback.php">Feedback</a></li>
            <li><a href="./book_request.php">Books Requested</a></li>
        </ul>
    </nav>
    <p style="display: flex; justify-content:center; align-items:flex-end; gap:0.7rem;"> 
    <?php echo "<img src='../student/image/" . $_SESSION['pic'] . "' alt='Student Image' style='width: 3rem; height: 3rem; border-radius: 50%;'>" . $_SESSION['login_user']; ?> 
    </p>
    <?php
        } else {
    ?>
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./books.php">Books</a></li>
            <li><a href="./student_login.php">Student-Login</a></li>
            <li><a href="./feedback.php">Feedback</a></li>
        </ul>
    </nav>
    <?php
        }
    ?>
</header>
