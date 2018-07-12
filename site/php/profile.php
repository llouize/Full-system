<?php
    /* Displays user information and some useful messages */
    session_start();

    // Check if user is logged in using the session variable
    if($_SESSION['logged_in'] != 1) {
        $_SESSION['message'] = "You must log in before viewing your profile page!";
        header("location: error.php");
    }else {
        // Makes it easier to read
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $active = $_SESSION['active'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome <?= $first_name . ' ' . $last_name ?></title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <?php include '../css/css.html'; ?>
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/menu-icon.js"></script>
        <script type="text/javascript" src="../js/back-top.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <nav>
                <div class="logo">Logo</div>
                <div class="zoom-bar"></div>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <ul>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="form.php">Contact</a></li>
                    <li class="active" id="current"><a href="login_form.php">Login</a></li>
                    <li class="active"><a href="sign_up_form.php">Sign Up</a></li> 
                </ul>
            </nav>
            <section class="sec1"></section>
            <img class="myBtn" src="../images/back-to-top.png" title="Go to top">
             <div class="form">
                <h1>Welcome</h1>
                <p class="info-message">
                    <?php
                        // Display message about account verification link only once
                        if(isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            // Don't annoy the user with more messages upon page refresh
                            unset($_SESSION['message']);
                        }
                    ?>
                </p>
                
                <?php
                    // Keep reminding the user this account is not active, until they activate
                    if(!$active) {
                        echo 
                        '<div class="info">
                        Account is unverified, please confirm your email by clicking
                        on the email link!
                        </div>';
                    }
                ?>
                
                <h2><?php echo $first_name . ' ' . $last_name; ?></h2>
                <p class="info-message"><?= $email ?></p>
                <a class="button-name" href="logout.php"><button class="button button-block" name="logout">Log Out</button></a>
            </div>
            <div class="social-media">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
            <footer>
                <p>&copy; Logo . 2018</p>
            </footer>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/index.js"></script>
    </body>
</html>
