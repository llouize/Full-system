<?php
    /* Database connection settings */
    $host = 'localhost';
    $user = 'root';
    $pass = 'yourpassword';
    $db = 'accounts';
    $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
?>
