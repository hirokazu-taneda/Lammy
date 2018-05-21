
<?php
session_start();

   include 'dblammy.php';

            if (isset($_POST["submit"])){

            $email = $_POST["email"];
            $adminpass = $_POST["adminpass"];
      
            $sql ="SELECT * FROM admin WHERE email = '$email' AND adminpass = '$adminpass'";
            $result = $conn->query($sql);

            if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {   
                $_SESSION["email"] = $row['email'];
                $_SESSION["adminpass"] = $row['adminpass'];
            
            echo "Hello, " . $_SESSION["admin"] . "! Nice to see you today!<br>";
            echo "<a href='logout.php'><button>Logout</button></a>";
            }
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
               
        </div>
        <hr>
        <div class="login">
            <h1>Admin Login</h1>
            <form action="loginadmin.php" method="POST">
                <input type="email" name="email" placeholder="E-mail" required><br>
                <input type="password" name="adminpass" placeholder="Password" onClick="adminhome.php"required><br><br>
                <button type="submit" class="mainbutton submit">Login</button><br><br>
            </form>
        </div>
    </div>
</body>
</html>