<?php
require_once "db_actions/db.php";
if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM tbl_users WHERE tbl_users.mail LIKE '{$_GET['term']}%' LIMIT 25";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['mail'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>