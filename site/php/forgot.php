<?php
    /* Reset your password form, sends reset.php password link */
    require 'db.php';
    session_start();

    // Check if form submitted with method="post"
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        if($result->num_rows == 0) {
            $_SESSIOM['message'] = "User with that email doesn't exist!";
            header("location: error.php");
        }else {
            $user = $result->fetch_assoc();
            $email = $user['email'];
            $hash = $user['hash'];
            $first_name = $user['first_name'];

            // Session message to display on success.php
            $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
            . " for a confirmation link to complete your password reset!</p>";

            // Send registration confirmation link (reset.php)
            $to = $email;
            $subject = 'Password Reset Link (luikzc@gmail.com)';
            $message_body = '
            Hello ' . $first_name . ',

            You have requested password reset:

            Please click this link to reset your password:

            http://localhost/site/php/reset.php?email=' . $email . '&hash=' . $hash;

            $headers = 'From: luikzc@gmail.com' . "\r\n";
            mail($to, $subject, $message_body, $headers);
            header("location: success.php"); 
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Your Password</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <?php include '../css/css.html'; ?>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet">
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
                    <li><a href="php/form.php">Contact</a></li>
                    <li class="active" id="current"><a href="login_form.php">Login</a></li>
                    <li class="active"><a href="sign_up_form.php">Sign Up</a></li> 
                </ul>
            </nav>
            <section class="sec1"></section>
            <img class="myBtn" src="../images/back-to-top.png" title="Go to top">
             <div class="form">
                <h1>Reset Your Password</h1>
                <form action="forgot.php" method="post">
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="email" required autocomplete="off" name="email">
                    </div>
                    <button class="button button-block">Reset</button>
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
