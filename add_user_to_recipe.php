<?php require_once "db_actions/db.php"; ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
  header('Location: login.php');
  exit;
}
?>

<?php
$res_id = $_GET['res'];
$mail = $_POST['term'];
$sql = "INSERT INTO `tbl_shared_recipes` (`user_mail`, `res_id`) VALUES ('$mail', '$res_id');";
if ($conn->query($sql)) {
  echo  "<script> alert('Add Succesfully'); </script>";
  header("Location: my_recipe.php?id=$res_id");
} else {
  echo  "<script> alert('Please try again later'); </script>";
  header("Location: my_recipe.php?id=$res_id");
}


?>