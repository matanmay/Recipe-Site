<?php require_once "db_actions/db.php"; ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
    header('Location: login.php');
    exit;
}
?>

    <?php
    $mail = $_SESSION["user_email"];
    $sql = "SELECT tbl_recipes.res_id,tbl_recipes.res_name, tbl_recipes.author FROM tbl_shared_recipes, tbl_recipes WHERE tbl_shared_recipes.res_id = tbl_recipes.res_id AND tbl_shared_recipes.user_mail ='$mail' AND tbl_shared_recipes.did_approve=0;";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) :
        $res_name = $row["res_name"];
        $author_name = $row["author"];
        $res_num = $row["res_id"];

        echo "<script type='text/javascript'>
        let answer = window.confirm('$author_name invited you to $res_name. Would you like to join?');

        if (answer) 
        {
            window.location.replace('confirmRecipe.php?res_num=$res_num');
        }
        else 
        {
            window.location.replace('cancelInvite.php?res_num=$res_num');
        } </script>";
    endwhile;

    ?>

