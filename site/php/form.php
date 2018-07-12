<?php include('form_process.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/form.css">
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
                    <li class="current"><a href="../php/form.php">Contact</a></li>
                    <li class="active"><a href="login_form.php">Login</a></li>
                    <li class="active"><a href="sign_up_form.php">Sign Up</a></li> 
                </ul>
            </nav>
            <section class="sec1"></section>
            <img class="myBtn" src="../images/back-to-top.png" title="Go to top">
                <div class="container">  
                  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <h3>Contact Us</h3>
                    <h4>Contact us today, we'll reply you within 24 hours!</h4>
                    <fieldset>
                      <input name="name" placeholder="Your name" type="text" value="<?= $name ?>" tabindex="1" autofocus>
                      <span class="error"><?= $name_error ?></span>
                    </fieldset>
                    <fieldset>
                      <input name="email" placeholder="Your Email Address" type="text" value="<?= $email ?>" tabindex="2">
                      <span class="error"><?= $email_error ?></span>
                    </fieldset>
                    <fieldset>
                      <input name="subject" placeholder="Subject" type="text" value="<?= $sub ?>" tabindex="3">
                      <span class="error"><?= $subject_error ?></span>
                    </fieldset>
                    <fieldset>
                      <textarea name="message" placeholder="Type your Message Here...." value="<?= $message ?>" tabindex="4" ></textarea>
                    </fieldset>
                    <fieldset>
                      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                    </fieldset>
                    <div class="success"><?= $success ?></div>
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
    </body>
</html>