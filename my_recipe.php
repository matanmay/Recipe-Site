<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
  header('Location: login.php');
  exit;
}
?>


</div>
</div>
<script type="text/javascript">
  $(function() {
    $("#term").autocomplete({
      source: 'user_search.php',
    });
  });
</script>

<?php
if (isset($_GET['id'])) {
  $res_id = $_GET['id'];
  //Title of Recpie//
  $sql = "SELECT * FROM tbl_recipes WHERE res_id=$res_id";
  $result = $conn->query($sql);
?>
  <?php $row = $result->fetch_assoc();  ?>
  <h2> <?= $row["res_name"] ?> </h2>
  <p><?= $row["description"] ?> </p>
<?php
}
//author


$sql_author = "SELECT * FROM tbl_recipes WHERE res_id=$res_id";
$author_result = $conn->query($sql);
while ($row = $author_result->fetch_assoc()) :
  $author = $row["author"];
endwhile;


echo "<h3> Ingridents: </h3>";
//Ingridents//
$sql = "SELECT * FROM tbl_ingredients WHERE res_id=$res_id";
$result = $conn->query($sql);
?>
<!-- While loop here -->
<?php while ($row = $result->fetch_assoc()) : ?>
  <div id="I<?= $row["ing_id"] ?>"> <input type="checkbox" value="I<?= $row["ing_id"] ?>" name="<?= $row["ing_id"] ?>" class="checked">
    <?= $row["ing_name"] ?> <a href="edit.php?res=<?= $row["res_id"] ?>&ing=<?= $row["ing_id"] ?>">Edit</a> | <a href="delete.php?res=<?= $row["res_id"] ?>&ing=<?= $row["ing_id"] ?>">Delete</a>
  </div>
<?php endwhile; ?>
<?php
//Instrucation//
echo "<h3> Instruction: </h3>";
$sql = "SELECT * FROM tbl_actions WHERE res_id=$res_id";
$result = $conn->query($sql);
?>
<!-- While loop here -->
<?php while ($row = $result->fetch_assoc()) : ?>
  <div id="A<?= $row["act_id"] ?>">
    <input type="checkbox" value="A<?= $row["act_id"] ?>" name="<?= $row["act_id"] ?>" class="checkedAction"> <?= $row["action"] ?> <a href="edit.php?res=<?= $row["res_id"] ?>&act=<?= $row["act_id"] ?>">Edit</a> | <a href="delete.php?res=<?= $row["res_id"] ?>&act=<?= $row["act_id"] ?>">Delete</a>
  </div>
<?php endwhile; ?>

<div>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <img src="images/share.svg" class="img-fluid"> Share Recipes
  </button>
</div>

<!-- Modal -->
<?php
$mail = $_SESSION["user_email"];
?>
<div class="modal fade ui-front" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <img src="images/share.svg" class="img-fluid"> Who can see this recipe? </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <h5> Who can see this recipe? </h5> -->
      <table class="table" id="tbl">
        <thead>
          <tr>
            <th scope='col'>Mail</th>
          </tr>
        </thead>
        <tbody> <?php
                $shared_users = "SELECT `user_mail` FROM `tbl_shared_recipes` WHERE res_id=$res_id AND did_approve=1";

                $results_users = $conn->query($shared_users);
                ?>
          <!-- While loop here -->
          <?php while ($row = $results_users->fetch_assoc()) : ?>
            <tr>
              <td> <?php
                    echo $row["user_mail"];
                    echo "</td>";
                    if ($author == $mail) {
                      $lmail = $row["user_mail"];
                      if ($lmail != $author) {
                        echo "<td> <a href='leave_recipe.php?res=$res_id&lmail=$lmail&author=$author'>Remove</a> </td>";
                      } else {
                        echo "<td> Author </td>";
                      }
                    }

                    ?>
            </tr>

          <?php endwhile; ?>
        </tbody>
      </table>

      <?php

      if ($author != $mail) {
        //not author 
      ?>
        <div class="modal-body">
          <form method="POST" action="leave_recipe.php?res=<?= $res_id ?>&lmail=<?= $mail ?>">
            <!-- <div class="mb-3">
                    <label for="username" class="form-label">Mail</label>
                    <input type="email" class="form-control" id="mail" aria-describedby="usernameHelp" placeholder="example@mail.com" minlength="2" required>
                </div> -->



            <h6> Are you sure you want to leave ? </h6>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Leave Recipe</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        </div>
        </form>
    </div>
  </div>

<?php } else { //author
?>

  <div class="modal-body ui-front">
    <!--Autocomplete-->
    <h5>Search User to Add</h5>
    <form id="removeUser" action="add_user_to_recipe.php?res=<?= $res_id ?>" method="POST">
      <input type="text" name="term" id="term" placeholder="search here...." class="form-control">

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
  </div>
  </form>
  <script type="text/javascript">
    $(function() {

      $("#term").autocomplete({
        source: 'user_search.php',
      });

    });
    $('#myModal').on('shown', function() {
      $(".pac-container").css("z-index", $("#myModal").css("z-index"));
    });
  </script>
<?php } ?>
</div>

<?php require_once "parts/footer.php"; ?>