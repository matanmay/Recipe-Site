<?php require_once "db_actions/db.php"; ?>

<?php
if (isset($_GET['ing'])) {
    $id = $_GET['ing'];
    $tblName = 'tbl_ingredients';
    $whereField = 'ing_id';
    $nameField = 'ing_name';
} else if (isset($_GET['act'])) {
    $id = $_GET['act'];
    $tblName = 'tbl_actions';
    $whereField = 'act_id';
    $nameField = 'action';
}
$res_id = $_GET['res'];

$sql = "DELETE FROM $tblName WHERE $tblName.$whereField = $id AND $tblName.res_id = $res_id;";
echo $sql;
if ($conn->query($sql)) {
    echo  "<script> alert('Deleted Succesfully'); </script>";
    header("Location: my_recipe.php?id=$res_id");
}


?>