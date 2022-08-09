<?php require_once "db_actions/db.php";
session_start();
if (!isset($_SESSION["user_email"])) //not connected
{
    header('Location: login.php');
    exit;
}
$res_num =$_GET["res_num"]; 
$mail = $_SESSION["user_email"];

$upd = "UPDATE tbl_shared_recipes SET did_approve = 1 WHERE tbl_shared_recipes.user_mail = '$mail' AND tbl_shared_recipes.res_id =  '$res_num';";
if ( $conn->query ($upd))
{
 header("Location: index.php");
}
