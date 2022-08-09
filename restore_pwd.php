<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>
<?php
if (isset($_GET['secret'])) {
    $user_email = $_GET["secret"];
    $sql = "SELECT * FROM `tbl_users` WHERE mail='$user_email'";
    $results =  $conn->query($sql);
    if ($results->num_rows < 0) {
        die("This user doesn't exist");
    }
}

if (isset($_POST['restore_password'])) {
    $user_email = $_GET["secret"];
    $user_password = $_POST['user_password'];
    $sql =  "UPDATE tbl_users SET `password`='$user_password' WHERE mail = '$user_email'";
    $results =  $conn->query($sql);
    if ($results) {
        echo "<script>
                            alert('Your new password was created successfully');
                             window.location.href='login.php';
                        </script>";
    } else {
        echo "Your new password was not created";
        echo $conn->error;
    }
}
?>
<form method="POST">
    <div class="col-8 col-md-6">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="user_password" name="user_password" minlength="4" required>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="restore_password" value="Add">Submit</button>
</form>
<?php require_once "parts/footer.php"; ?>