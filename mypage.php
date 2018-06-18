<?php
  session_start();

include 'dblammy.php';

if($_SESSION["userid"] == ""){
header("Location: loginuser.php");
}
$userid = $_SESSION["userid"];
// var_dump($userid);


                  //from database
                  $sql_getuserinfo = "SELECT * FROM userinfo WHERE userid='$userid'";
                  $getuserinfo = $conn->query($sql_getuserinfo);
                  $rowuserinfo = $getuserinfo->fetch_assoc();

                  $name = $rowuserinfo["name"];
                  $email = $rowuserinfo["email"];
                  $pass1 = $rowuserinfo["pass1"];
                  $pass2 = $rowuserinfo["pass2"];
                  $age = $rowuserinfo["age"];
                  $gender = $rowuserinfo["gender"];
                  $question = $rowuserinfo["question"];
                  $upfile = $rowuserinfo["upfile"];

                  if($upfile == ""){
                      $upfile = "usericon.png";
                  }
                  $error = 0;


//from form
                  if(isset($_POST["Edit"])){

                  $name=$_POST["name"];

                  $pass1=$_POST["pass1"];
                  $pass2=$_POST["pass2"];
                  $age = $_POST["age"];
                  $gender = $_POST["gender"];
                  $upfile = $_FILES["upfile"]["name"];


//Upload Image processing
    $target_dir = "images/user_profpic/";
    $target_file = $target_dir . basename($_FILES["upfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["upfile"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $regist_upfile_error = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($upfile)) {
        unlink($upfile);
        $uploadOk = 1;
    }


    // Check file size
    if ($_FILES["upfile"]["size"] > 2097152) {
        $regist_upfile_error = "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $regist_upfile_error = "Please set JPG or JPEG or PNG. ";
        $uploadOk = 0;
    }


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_upfile_error = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["upfile"]["name"]). " has been uploaded.";
        } else {
            $_upfile_error = "Sorry, there was an error uploading your file.";
            $uploadOk == 0;
        }
    }




                  if(mb_strlen($name) < 2) {

                      echo " Please set name minimum of 2 characters.";
                      $error = 1;
                      } elseif(mb_strlen($name) > 10) {

                      $regist_name_error = " Please set name maximum of 10 characters.";
                        $error = 1;
                      } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $name)) {
                      $regist_name_error =  "Please type name using half size alphanumeric characters.";
                      $error = 1;
                      
                      } 
  
                      
                  if(empty($pass1) || empty($pass2)) {  //if pass1 or pass2 is empty
        
                      echo "Please set your password";
                      $error = 1;
                      } 
                      elseif (mb_strlen($pass1) < 6) {
                      echo " Please set password minimum of 6 characters.";
                      $error = 1;
                      } 
                      elseif (mb_strlen($pass1) > 10 ) {
                      echo "Please set password maximum of 10 characters.";
                      $error = 1;
                      } 
                      elseif($pass1 !== $pass2) {
                      echo "Password does not match. Please set same password in confirm password field.";
                      $error = 1;
                      } 
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $pass1)) {
                      echo "Please type password using half size alphanumeric characters.";
                      $error = 1;
                      } 

                      

// UPDATE table_name
// SET column1=value1,column2=value2,...
// WHERE some_column=some_value;

                      

                  if ($error == 0 && $pass1 == $pass2 && $uploadOk == 1) {
                      $sql = "UPDATE userinfo SET name='$name',pass1='$pass1',gender='$gender',age='$age',upfile='$upfile' WHERE userid='$userid'";


                  if($conn ->query($sql)){
    
                      header("Location: mypage.php");
                      } else {
                      echo "Error:" . $sql . "<br>" . $conn->error;
                      }
                      } else {
                      $error = 1;
                      $upfile = $rowuserinfo["upfile"];
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
                    <img src="images/user_profpic/<?php echo $upfile; ?>" class="userprofpic" height="200">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
                        
                        <input type="file" name="upfile" id="upfile" class="pic"><br>
                        <input type="text" name="name"  value="<?php echo $name; ?>" required><br>
                        <input type="email" name="email"  value="<?php echo $email; ?>" disabled><br>
                        <input type="password" name="pass1"  value="<?php echo $pass1; ?>" required><br>
                        <input type="password" name="pass2" placeholder="Confirm password" required><br>
                        
                            <input type="radio" name="gender" value="male" <?php if($gender == 'male'){echo 'checked=checked';} ?>> Male
                            <input type="radio" name="gender" value="female" <?php if($gender == 'female'){echo 'checked=checked';} ?>> Female

                        <select name="age" required>
                            <option value="u19" <?php if($age == "u19"){echo "selected";} ?>>Under 19</option>
                            <option value="20_24" <?php if($age == "20_24"){echo "selected";} ?>>20~24</option>  
                            <option value="25_29" <?php if($age == "25_29"){echo "selected";} ?>>25~29</option>
                            <option value="30_34" <?php if($age == "30_34"){echo "selected";} ?>>30~34</option>
                            <option value="35_39" <?php if($age == "35_39"){echo "selected";} ?>>35~39</option>
                            <option value="over40" <?php if($age == "over40"){echo "selected";} ?>>Over 40</option>
                         </select><br><br>
                         
                        <button class="mainbutton button1" name="Edit">Edit</button>
                    </form>
                </div>

            </div>

             <?php

                  if (isset($_POST["Edit"])){


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

                  echo $regist_upfile_error;
                  }
                  
                  ?>
            <div id="footer">
                <hr>
                <a href="logout.php"><button class="mainbutton logout">Logout</button></a>
                <button class="mainbutton button1">Delete</button>
            </div>
        </div>     
    </body>
</html>