<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "lammy";

$conn = mysqli_connect($host, $user, $pass, $db)or
 die ("Database conect failed: " .
      mysqli_connect_error());
?>