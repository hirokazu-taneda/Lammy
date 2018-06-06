
<?php
session_start();

    include 'dblammy.php';

        if (isset($_POST["submit"])){

        $email = $_POST["email"];
        $pass1 = $_POST["pass1"];
      
            $sql ="SELECT * FROM userinfo WHERE email = '$email' AND pass1 = '$pass1'";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc()){
               
                $_SESSION["email"] = $row['email'];
                $_SESSION["pass1"] = $row['Pass1'];
            
            echo "Hello, " . $_SESSION["name"] . "! Nice to see you today!<br>";
            echo "<a href='logout.php'><button>Logout</button></a>";
            }

        } else

            { echo "<a href='maypage.php'>Login</a>";
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
                    <input type="button" class="mainbutton register admin" value="Admin" onClick="location.href='adminlogin.php'">
                </div>
        </div>
        <hr>
        <div class="login">
            <h1>Login</h1>
                <form action="loginuser.php" method="POST">
                    <input type="text" name="email" placeholder="E-mail" required><br>
                    <input type="password" name="pass1" placeholder="Password" required><br><br>
                
                    <button type="submit" class="mainbutton submit" onClick="location.href='userhome.php'">Login</button><br><br>
                </form>
                    
                    <b>If you forget your password<a href="forgetpass.php"> Click</a>here.</b><br><br>

                        <input type="button" class="mainbutton register" value="Register" onClick="location.href='register.php'">
        </div>
    </div>
</body>
</html>









