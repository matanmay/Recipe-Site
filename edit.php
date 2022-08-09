<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
    header('Location: login.php');
    exit;
}
?>

<h4> Write here your update: </h4>

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
if (isset($_POST['update'])) {
    $toUp =  $_POST['toUp'];
    $sql = "UPDATE $tblName SET $nameField ='$toUp' WHERE $tblName.$whereField = $id AND $tblName.res_id = $res_id;";
    if ($conn->query($sql)) {
        echo  "<script> alert('Updated Succesfully'); </script>";
        header("Location: my_recipe.php?id=$res_id");
    }
}

$sql = "SELECT * FROM $tblName WHERE $tblName.$whereField = $id AND $tblName.res_id = $res_id;";
$result = $conn->query($sql)->fetch_assoc();
?>
<form method="post">
    <div class="form-group">
        <input type="text" value="<?= $result[$nameField]; ?>" name="toUp" id="toUp" class="form-control" />
        <input type="submit" name="update" value="update" class="btn-primary forum-control" />
    </div>
</form>
<?php require_once "parts/footer.php"; ?>