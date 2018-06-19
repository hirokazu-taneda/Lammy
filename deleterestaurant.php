<?php
session_start();
include 'dblammy.php';

$restaurantid = $_GET["restaurantid"];

$sql = "DELETE FROM restaurant WHERE restaurantid='$restaurantid'";

if ($conn->query($sql) === TRUE) {
    header("Location: adminhome.php");
    die;
} else {
    echo "Error during deleting record:" .$conn->error;
}
?>
