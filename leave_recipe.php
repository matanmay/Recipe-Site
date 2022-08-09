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
$mail = $_GET['lmail'];
$author = $_GET['author'];
$sign = $_SESSION["user_email"];
$sql = "DELETE FROM tbl_shared_recipes WHERE user_mail='$mail' AND res_id = $res_id;";
//echo $sql;
if ($conn->query($sql)) {
  echo  "<script> alert('Remove Succesfully'); </script>";

  if ($author === $sign) {
    header("Location: my_recipe.php?id=$res_id");
  } else {
    header("Location: recipes_page.php");
  }
}


?>