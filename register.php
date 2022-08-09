<?php require_once "parts/header.php"; ?>
<script>
  function checkForm(form) {
    if (form.password.value !== form.password2.value) {
      alert("Error: the passwords don't match! ");
      form.password2.focus();
      return false;
    }
    return true;
  }
</script>


<h2>Regsiter Page </h2>

<form method="POST" action="db_actions/add.php" onsubmit="return checkForm(this);">
  <div class="col-8 col-md-6">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" placeholder="name@example.com" id="email" name="email" aria-describedby="emailHelp" required>

  </div>
  <div class="col-8 col-md-6">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" minlength="4" required>
  </div>
  <div class="col-8 col-md-6">
    <label for="exampleInputPassword2" class="form-label">Password Confirmation</label>
    <input type="password" class="form-control" id="password2" name="password2" minlength="4" required>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" value="Add">Submit</button>
</form>
</div>
<?php require_once "parts/footer.php"; ?>