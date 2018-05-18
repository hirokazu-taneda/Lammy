<?php 
session_start():

if (!empty($_POST)) {

	if ($_POST['name'] == '') {
		$error['name'] == 'blank';
	}
	if ($_POST['email'] == '') {
		$error['email'] == 'blank';
	}
	if (strlen($_POST['pass1']) < 10) {
		$error['pass1'] == 'length';
	{
	if (strlen($_POST['pass2']) < 10) {
		$error['pass2'] == 'length';
	}
	if ($_POST['age'] == '') {
		$error['age'] == 'blank';
	{
	if ($_POST['gender'] == '') {
		$error['gender'] == 'blank';
	}
	if ($_POST['question'] == '') {
		$error['question'] == 'blank';
	}

	if (empty($error)) {
		$_SESSION['join'] = $_POST;
		header('Location: userhome.php'); 
		exit();
	}
}


 ?>