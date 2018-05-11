
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include 'dblogin.php';
            $name = $_POST["name"];
            $password = $_POST["pass"];
      
            $sql ="SELECT * FROM loginform WHERE User = '$name' AND Pass = '$password'";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {   
                $_SESSION["name"] = $row['User'];
                $_SESSION["pass"] = $row['Pass'];
            
            echo "Hello, " . $_SESSION["name"] . "! Nice to see you today!<br>";
            echo "<a href='logout.php'><button>Logout</button></a>";
            }
      } else
        { echo "<a href='login.html'>Login</a>";
        }
      
    ?>
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
            <form action="userlogin.php" method="POST">
                <input type="text" name="email" placeholder="E-mail" required><br>
                <input type="password" name="pass1" placeholder="Password" required><br><br>
                <button type="submit" class="mainbutton submit">Login</button><br><br>
            </form>

            <b>If you forget your password<a href="userregister.php"> Click</a>here.</b><br><br>

            <input type="button" class="mainbutton register" value="Register" onClick="location.href='register.php'">
        </div>
    </div>
</body>
</html>









