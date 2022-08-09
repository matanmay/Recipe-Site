<?php
$servername = "localhost";
$username="root";
$password = ""; // change this to empty string if you are using xampp and not mamp
$conn = new mysqli($servername,$username,$password);
if ($conn->connect_error) {
    echo "<h2>error connecting to db</h2>";
    die();
}
$dbName = "project";

if (!$conn->select_db($dbName))
{
    echo "The DB is invalid";
}
