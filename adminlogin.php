<?php
session_start();

include 'dblammy.php';

$errcode = 0;
$errmsg = "";

//checking if login button is clicked
if(isset($_POST["login"])){
    $email = $_POST["email"];
	$password = $_POST["password"];

    //checking if password input is less than 6 characters
    if(strlen($password) < 6){
        $errmsg = "Please set minimum of 6 characters.";
        $errcode = 1;
    } 

    //checking if password input is more than 10 characters
    if(strlen($password) > 10){
        $errmsg = "Please set maximum of 10 characters.";
        $errcode = 1;
    }

    //processing login process
    if(isset($email) && isset($password) && $errcode == 0) {

        $sql = "SELECT * FROM admin WHERE email='$email' AND adminpass='$password' ";
        $login = $conn->query($sql);
        $count = mysqli_num_rows($login);
        
        $row = $login->fetch_assoc();
        $adminid = $row["adminid"];

        if ($count == 1) {
                
            $_SESSION['adminid'] = $adminid;
            header("Location: adminhome.php"); /* Redirect browser */
            exit();
            
         } else {
            $errmsg = 'Email and Password did not match. Please try again.';
         }
    }
}

?>

<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <div class="maindiv center">
            <div id="adminheader">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
            </div>
            <hr>
            <div id="maincontent">
            	<div class="mypage">
                    <h2>Admin Login</h2>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="email" name="email" placeholder="Email" required>
                        <br>
                        <input type="password" name="password" placeholder="Password" required>
                        <br><br>
                        <span style="color: red;"> <?php echo $errmsg; ?> </span>
                        <br><br>
                        <button class="mainbutton button1" name="login">Login</button>
                    </form>
                </div>
           	</div>
            <hr>   
        </div>     
    </body>
</html>