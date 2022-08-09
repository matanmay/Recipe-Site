<?php 
    session_start();
    session_destroy();
    setcookie("user_email",$_POST['user_email'], time()-1 );
    header('location: login.php');
?>