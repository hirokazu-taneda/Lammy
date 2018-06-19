<?php
session_start();
include 'dblammy.php';

$userid = $_GET["userid"];

$sql = "DELETE FROM userinfo WHERE userid='$userid'";

if ($conn->query($sql) === TRUE) {
    header("Location: adminhome.php");
    die;
} else {
    echo "Error during deleting record:" .$conn->error;
}
?>