<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>

<?php
if (isset($_SESSION["user_email"])) //if connected not can signin
{
    header('Location: index.php');
    exit;
}
?>

<?php
if (isset($_POST['login_form'])) {
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $login = "SELECT mail, password, isActive FROM tbl_users WHERE mail='$mail' AND password='$password ' AND isActive='1';";
    $select = mysqli_query($conn, $login);
    if (mysqli_num_rows($select) > 0) { //is right
        session_start(); //creating session   
        if ($_POST['remember_me'] === "1") {
            setcookie("user_email", $_POST['email'], time() + 60 * 60 * 24 * 7);
        }
        $_SESSION['user_email'] = $mail;
        header('Location: index.php');
        exit;
    } else { //is worng
        //check active or not
        $notActive = "SELECT mail, password, isActive FROM tbl_users WHERE mail='$mail' AND password='$password ' AND isActive='0';";
        $selectNoActive = mysqli_query($conn, $notActive);
        if (mysqli_num_rows($selectNoActive) > 0) { ?>
            <div class="alert alert-danger col-8 col-md-6" role="alert">
                Please activate your account
            </div>
        <?php
        } else //problem in email or/and password
        {
        ?>
            <div class="alert alert-danger col-8 col-md-6" role="alert">
                Please check again your details
            </div>
<?php
        }
    }
}
?>
<h2>Please sign in</h2>
<!--Form of Login-->

<form method="POST">
    <div class="col-8 col-md-6">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="name@example.com" id="email" name="email" aria-describedby="emailHelp" required>
    </div>
    <div class="col-8 col-md-6">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" minlength="4" required>
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="1" name="remember_me"> Remember me
        </label>
    </div>
    <button name='login_form' class="btn btn-primary" type="submit"> Submit</button>
</form>

<!--link of forgeting-->
<div>
    <a href="forgot_pwd.php">Forgot Password?</a>
</div>

</main>
<?php require_once "parts/footer.php"; ?>