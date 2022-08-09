<?php require_once "db_actions/db.php";
session_start();
if (!isset($_SESSION["user_email"])) //not connected
{
    header('Location: login.php');
    exit;
}
$res_num =$_GET["res_num"]; 
$mail = $_SESSION["user_email"];


$del = "DELETE FROM tbl_shared_recipes WHERE tbl_shared_recipes.user_mail = '$mail' AND tbl_shared_recipes.res_id =  '$res_num';";
if ( $conn->query ($del))
{
 header("Location: index.php");
}
