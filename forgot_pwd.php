<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>

<h2>Forgot your password?</h2>
<p>Change your password in three easy steps. This will help you to secure your password!</p>
<ol class="list-unstyled">
  <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
  <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
  <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
</ol>

<form class="card mt-4" method="POST">
  <div class="card-body">
    <div class="form-group">
      <label for="email-for-pass">Enter your email address</label>
      <input class="form-control" name="user_email" type="email" id="user_email" required="">
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-success" name="forgot_password" type="submit">Get New Password</button>
  </div>
</form>

<?php
if (isset($_POST['forgot_password'])) {
  $user_email = $_POST['user_email'];

  $sql = "SELECT * FROM `tbl_users` WHERE mail='$user_email'";
  $results =  $conn->query($sql); 
  if ($results->num_rows > 0) {
    echo "<br> <h4> Password recovery email </h4>
            <p> Dear user, please click this link in order to create a new password to Food Lovers! <p>";
    $restore_url =  "restore_pwd.php?secret=$user_email";
    echo "<a href='$restore_url'> click here! </a>";
  } else {
    echo "<div role='alert'>
          <strong> Please check again your mail address </strong>
          </div>";
    echo $conn->error;
  }
}
?>

<?php require_once "parts/footer.php"; ?>