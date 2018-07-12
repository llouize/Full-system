<?php
    /* The password reset form, the link to this page is included
       from the forgot.php email message
    */
    require 'db.php';
    session_start();

    // Make sure email and hash variables aren't empty
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
        $email = $mysqli->escape_string($_GET['email']);
        $hash = $mysqli->escape_string($_GET['hash']);

        // Make sure user email with matching hash exist
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");
        if($result->num_rows == 0) {
            $_SESSION['message'] = "You have entered invalid URL for password reset!";
            header("location: error.php");
        }
    }else {
        $_SESSION['message'] = "Sorry, verification failed, try again!";
        header("location: error.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logo</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <?php include '../css/css.html'; ?>
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../js/menu-icon.js"></script>
        <script type="text/javascript" src="../js/back-top.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['login'])) { //user logging in
                require 'login.php';
            }
        }
    ?>
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
                <h1>Choose Your New Password</h1>
                <form action="reset_password.php" method="post">
                    <div class="field-wrap">
                        <label>
                            New Password<span class="req">*</span>
                        </label>
                        <input type="password" required name="newpassword" autocomplete="off">
                    </div>
                    <div class="field-wrap">
                        <label>
                            Confirm Password<span class="req">*</span>
                        </label>
                        <input type="password" required name="confirmpassword" autocomplete="off">
                    </div>
                    <!-- This input field is needed, to get the email of the user -->
                    <input type="hidden" name="email" value="<? $email ?>">
                    <input type="hidden" name="hash" value="<? $hash ?>">
                    <button class="button button-block">Apply</button>
                </form>
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
