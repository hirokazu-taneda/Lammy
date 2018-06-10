<?php
  session_start();
  include 'dblammy.php';


$error = 0;


  if (isset($_POST["submit"])){

  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass1 = $_POST["pass1"];
  $pass2 = $_POST["pass2"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $question = $_POST["question"];
  $upfile = $_POST["upfile"];
                  
                  $regist_name_error = "";
                  $regist_pass_error = "";
                  $regist_q_error = "";
                  $regist_upfile_error = "";

                  $target_dir = "uploads/";
                  $target_file = $target_dir . basename($_FILES["upfile"]);
                  $uploadOk = 1; //error =1;
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  $check = getimagesize($_FILES["upfile"]);

                  unset($regist_name_error, $regist_pass_error, $regist_q_error, $regist_upfile_error);

                  
                  if($regist_upfile_error !== false) {
                      $regist_upfile_error = " Its wrong file";
                      $error = 1; 
                      } 
                      elseif(file_exists($target_file)) {
                      $regist_upfile_error = "Sorry, file already exists.";
                      $error = 1;
                      }
                      elseif($_FILES["upfile"] > 200000) {
                      $regist_upfile_error = "Sorry, your file is too large.";
                      $error = 1;
                      }
                      elseif($imageFileType != "jpg" && $imageFileType !="png") {
                      $regist_upfile_error ="Sorry, only JPG & PNG files are allowed.";
                      $error = 1;
                      }


                  
                  if(mb_strlen($name) < 2) {
                      $regist_name_error = " Please set name minimum of 2 characters.";
                      $error = 1;
                      } 
                      elseif(mb_strlen($name) > 10) {
                      $regist_name_error = " Please set name maximum of 10 characters.";
                      $error = 1;
                      } 
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $name)) {
                      $regist_name_error = "Please type name using half size alphanumeric characters.";
                      $error = 1;
                      } 
  
                      
                  if(empty($pass1) || empty($pass2)) {  //if pass1 or pass2 is empty
        
                      $regist_pass_error = "Please set your password";
                      $error = 1;
                      } 
                      elseif (mb_strlen($pass1) < 6) {
                      $regist_pass_error = " Please set password minimum of 6 characters.";
                      $error = 1;
                      } 
                      elseif (mb_strlen($pass1) > 10 ) {
                      $regist_pass_error = "Please set password maximum of 10 characters.";
                      $error = 1;
                      } 
                      elseif($pass1 !== $pass2) {
                      $regist_pass_error = "Password does not match. Please set same password in confirm password field.";
                      $error = 1;
                      } 
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $pass1)) {
                      $regist_pass_error = "Please type password using half size alphanumeric characters.";
                      $error = 1;
                      } 


                  if(mb_strlen($question) < 2) {

                      $regist_q_error = " Please set favorite food minimum of 2 characters.";
                      $error = 1;
                      } 

                      elseif(mb_strlen($question) > 10) {
                      $regist_q_error = " Please set favorite food maximum of 10 characters.";
                      $error = 1;
                      } 

                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $question)) {
                      $regist_q_error = "Please input type of food using half size alphanumeric characters.";
                      $error = 1;
                      } 


                  if ($error == 0 && $pass1 == $pass2) {
                      $sql = "INSERT INTO userinfo(name, email, pass1, age, gender, question, upfile)
                      VALUES ('$name', '$email', '$pass1', '$age', '$gender', '$question', 'upfile')";

                  if($conn ->query($sql)){
    
                      header("Location: loginuser.php");
                      } else {
                      echo "Error:" . $sql . "<br>" . $conn->error;
                      }
                      } else {
                      $error = 1;
    
                      }    

                      }

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<title>register</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="maindiv center">
        <div id="header">
            <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">  
        </div>
        <hr>
        <div class="login">
			     <h1>Welcome to Register</h1>
    			 <form action="register.php" method="POST" enctype="multipart/form-data">
        			<div class="form"><br>
                <p>Profile Photo</p>

        				<input type="file" name="upfile" size="200000" value="picture"  ><br><br>
        					
                  <input type="text" name="name" placeholder="Name" required><br>
              	
                  <input type="email" name="email" placeholder="E-mail"  required><br>
                  
                  <input type="password" name="pass1" placeholder="Password"  required><br>
        					
                  <input type="password" name="pass2" placeholder="comfirm password" required><br><br>

        					<input type="radio" name="gender" value="male" required>Male
            			<input type="radio" name="gender" value="female">Female

                    <select name="age" required>
                      <option value="" disabled selected>Age</option>
                        <option value="u19" >Under 19</option>
                        <option value="20_24">20~24</option>  
                        <option value="25_29">25~29</option>
                        <option value="30_34">30~34</option>
                        <option value="35_39">35~39</option>
                        <option value="over40">over 40</option>
                          
                    </select><br><br>
        					
        					<input type="text" name="question" class= "login" placeholder="What is your favorite food?" required><br>
                  
        			</div>

                  <?php

                  if (isset($regist_upfile_error)) {
                  echo "<span style='color:#ff0000;'> $regist_q_error</span><br>";
                  }
                    
                  if (isset($regist_name_error)) {
                  echo "<span style='color:#ff0000;'>$regist_name_error</span><br>";
                  }
                  
                  if (isset($regist_pass_error)) {
                  echo "<span style='color:#ff0000;'>$regist_pass_error</span><br>";
                  }
                  
                  if (isset($regist_q_error)) {
                  echo "<span style='color:#ff0000;'> $regist_q_error</span><br>";
                  }

                  ?>
    			   <br>
        	   <button type ="submit" class="mainbutton submit" name="submit" >Register</button>
          	 
             <button type ="reset" class="mainbutton register">Reset</button><br>
            
            </form>
        </div>
    </div>

</body>
</html>