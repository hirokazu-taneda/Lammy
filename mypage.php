<?php
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
                  $regist_upfile_error ="";

                  // $fileType = pathinfo($_FILES["upfile"]["name"], PATHINFO_EXTENSION);
                  // $target_file = $target_dir . basename($_FILES["fileToUpload"]["size"]);

                  unset($regist_name_error, $regist_pass_error, $regist_q_error, $regist_upfile_error);

                  if(isset($_POST["submit"])) {
                  if($upfile> 2097152) {
                        $regist_upfile_error = "Sorry, your file is too large.";
                        $error = 1;
                      }                  
                  

                  if($upfile != "jpg" && $upfile != "jpeg" && $upfile != "png") {
                        $regist_upfile_error = "Please set JPG or JPEG or PNG.";
                        $error = 1;
                       }
                  }


                  if(mb_strlen($name) < 2) {

                      $regist_name_error = " Please set name minimum of 2 characters.";
                      $error = 1;
                      } elseif(mb_strlen($name) > 10) {

                      $regist_name_error = " Please set name maximum of 10 characters.";
                        $error = 1;
                      } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $name)) {
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
                      VALUES ('$name', '$email', '$pass1', '$age', '$gender', '$question', '$upfile')";

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

<html>
    <head>
        <title>My Page</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <div class="maindiv center">
            <div id="header">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                <div class="menubar">
                    <ul>
                      <li><a href="userhome.php">Home</a></li>
                      <li><a class="active" href="#MyPage">My Page</a></li>
                      <li><a href="#Inquiry">Comment</a></li>
                    </ul>
                </div>
            </div>
            <div id="maincontent">
                <div class="mypage">
                    <img src="images/user_profpic/usericon.png" class="userprofpic">
                    <form>
                        
                        <input type="file" name="upfile" size="400" value="picture" class= "pic" required><br>
                        <input type="text" name="name" required value="<?php $name; ?>"><br>
                        <input type="email" name="email" required value="<?php $email; ?>"><br>
                        <input type="password" name="password" required value="<?php $pass1; ?>"><br>
                        <input type="password" name="cpassword" placeholder="Confirm password" required><br>
                        
                            <input type="radio" name="gender" value="<?php $age; ?>"> Male
                            <input type="radio" name="gender" value="<?php $gender; ?>"> Female
                        <select name="age" required>
                            <option value="" disabled selected>Age</option>
                            <option value="u19" >Under 19</option>
                            <option value="20_24">20~24</option>  
                            <option value="25_29">25~29</option>
                            <option value="30_34">30~34</option
                            <option value="35_39">35~39</option>
                            <option value="over40">Over 40</option>
                          
                         </select><br><br>
                         
                        <button class="mainbutton button1">Edit</button>
                    </form>
                </div>

            </div>
             <?php

                  if (isset($upfile) > 200000) {
                  echo "<span style='color:#ff0000;'>Sorry, your file is too large.</span><br>";
                  }

                  
                  if (isset($upfile) != "jpg" && isset($upfile) != "jpeg" && isset($upfile) != "png") {
                  echo "<span style='color:#ff0000;'>Please set JPG or JPEG or PNG.</span><br>";
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
            <div id="footer">
                <hr>
                <button class="mainbutton logout">Logout</button>
                <button class="mainbutton button1">Delete</button>
            </div>
        </div>     
    </body>
</html>