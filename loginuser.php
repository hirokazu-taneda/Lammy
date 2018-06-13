<?php
session_start();

    include 'dblammy.php';

        $error = 0;

        if (isset($_POST["submit"])){

            $email = $_POST["email"];
            $pass1 = $_POST["pass1"];

            $login_pass_error = "";
            $login_email_error ="";

            unset($login_pass_error, $login_email_error);

            if(mb_strlen($pass1) < 6) {
                    $login_pass_error = " Please set minimum of 6 characters.";
                    $error = 1;
                    } elseif(mb_strlen($pass1) > 10) {

                    $login_pass_error = " Please set name maximum of 10 characters.";
                    $error = 1;
                    } elseif($pass1 !== $email){
                        
                    $login_email_error = "Email and Password did not match. Please try again.";
                    $error = 1;
                    }   
                   
      
            $sql = "SELECT * FROM userinfo WHERE email = '$email' AND pass1 = '$pass1'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    $_SESSION["pass1"] = $row['pass1'];
                    $_SESSION["userid"] = $row['userid'];
                    $_SESSION["email"] = $row['email'];

                    header("Location: userhome.php");
                }
            } else { 
                $error = 1;
            }
        }
        
     
        
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="maindiv center">
        <div id="header">
            <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                <div class="adminbutton">
                    <input type="button" class="mainbutton register admin" value="Admin" onClick="location.href='loginadm.php'">
                </div>
        </div>
        <hr>
        <div class="login">

            <h1>Login</h1>
                <form action="loginuser.php" method="POST">
                    <input type="text" name="email" placeholder="E-mail" required><br>
                    <input type="password" name="pass1" placeholder="Password" required><br><br>

                     <?php 

                        if (isset($login_email_error)) {
                        echo "<span style='color:#ff0000;'> $login_email_error</span><br>";
                        }

                        if (isset($login_pass_error)) {
                        echo "<span style='color:#ff0000;'> $login_pass_error</span><br>";
                        }

                    ?>

                    <button type="submit" class="mainbutton submit" name="submit">Login</button><br><br>
                </form>
                    
                    <b>If you forget your password<a href="forgetpass.php"> Click </a>here.</b><br><br>

                        <input type="button" class="mainbutton register" value="Register" onClick="location.href='register.php'">
        </div>
    </div>
</body>
</html>









