<?php require_once "parts/header.php"; ?>
<?php require_once "db_actions/db.php"; ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
  header('Location: login.php');
  exit;
}
?>

<h2> My Recipes Book!</h2>
<div class="wrap">

  <!-- search -->
  <form class="search" method="GET" action="?">
    <input type="text" name="searchText" class="searchTerm" placeholder="Search Recipe">
    <button type="submit" class="searchButton" id="searchbtn"> search </button>
  </form>
</div>

<br>
<button id="bNameA" onclick="location.href = 'recipes_page.php?dir=nameasc'">Sort by Name ASC</button>
<button id="bNameD" onclick="location.href = 'recipes_page.php?dir=namedesc'">Sort by Name DESC</button>
<button id="bDateA" onclick="location.href = 'recipes_page.php?dir=dateasc'">Sort by Date ASC</button>
<button id="bDateD" onclick="location.href = 'recipes_page.php?dir=datedesc'">Sort by Date DESC</button>


<table class="table" id="tbl">
  <thead>
    <tr>
      <th scope='col'>Recipe's Name</th>
      <th scope='col'>Publish Date</th>
      <th scope='col'>Created By</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $where = "";
    $orderBy = "";
    //$GLOBALS['searchTxt'] ="";
    if (isset($_GET['searchText'])) {
      $GLOBALS['searchTxt'] = $_GET['searchText'];
      $s = $GLOBALS['searchTxt'];
      $where = " AND res_name like '%$s%'";
    }

    if (isset($_GET['dir'])) {
      //echo $_GET['dir'];
      switch ($_GET['dir']) {

        case "nameasc":
          $orderBy = " ORDER BY res_name ASC";
          break;

        case "namedesc":
          $orderBy = " ORDER BY res_name DESC";
          break;

        case "dateasc":
          $orderBy = " ORDER BY publish_date ASC";
          break;

        case "datedesc":
          $orderBy = " ORDER BY publish_date DESC";
          break;

        default:
          $orderBy = "";
          break;
      }
    }
    $mail =  $_SESSION['user_email'];
    $sql = "SELECT * FROM tbl_recipes as R, tbl_shared_recipes as S WHERE R.res_id = S.res_id AND S.did_approve=1 AND S.user_mail = '$mail' $where $orderBy";

    $result = $conn->query($sql);
    ?>
    <!-- While loop here -->
    <?php while ($row = $result->fetch_assoc()) : ?>
      <tr>
        <td><a href="my_recipe.php?id=<?= $row["res_id"] ?>"> <?= $row["res_name"] ?> <a> </td>
        <td><time datetime="<?= $row['publish_date']?>"> <?= $row['publish_date'] ?> </time></td>
        <td><?= $row["author"] ?> </td>
      </tr>

    <?php endwhile; ?>
  </tbody>
</table>
</div>

<?php require_once "parts/footer.php"; ?>