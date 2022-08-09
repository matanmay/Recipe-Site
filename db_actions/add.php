<?php
require_once "db.php";
$mail = $_POST['email'];
$password = $_POST['password'];
$activation_key= rand(1,10000);
$bool_false=0;

//add sql here
$sql= "INSERT INTO `tbl_users` (`mail`, `password`, `activation_key`, `isActive`) VALUES ('$mail', '$password', '$activation_key', '$bool_false');";
if ($conn->query($sql))
{
    $return_url = "mail_resgister_verification.php?mail=$mail&activation=$activation_key";
    ?>
    <h2> Please Confirm Your Account</h2>
    <p>
    Hello <?php echo $mail;?>, someone just signed up to the website Food Lovers, with your mail. <br>
    If it wasn't you please ignore this mail. <br>
    If you signed up,<a href=<?php echo $return_url;?>> please click here to activate your account!  </a>

    </p>
<?php
}
else
{
    echo "<script type='text/javascript'>
    let answer = window.confirm('User is already exist, please click on OK if you want to login else click Cancel to register');
    if (answer) 
    {
        window.location.replace('../login.php');
    }
    else 
    {
        window.location.replace('../register.php');
    } </script>";
}?>