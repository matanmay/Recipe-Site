<?php 
require_once "db.php";
if(isset($_GET['mail']) && isset($_GET['activation']) )
{
    $mail = $_GET['mail'];
    $active= $_GET['activation'];
    require_once "consts.php";
    if (($conn->query($update_activation))>0)
    {
        echo "Sucess";
        /*creating session */ 
        session_start();
        $_SESSION['user_email'] = $mail;
        /*moving to home page*/
        header('location: ../index.php');
    }
    else{
        echo $fail_msg;
    }
}
else{
    echo $fail_msg;
}
?>


