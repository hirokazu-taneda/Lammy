<html>
<head>
  <title>User Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style1.css">
</head>
<body>
	<?php
		include 'dblogin.php';
		// need to check
		    $email = $_POST["email"];
            $password = $_POST["pass"];
      
            $sql ="SELECT * FROM loginform WHERE User = '$name' AND Pass = '$password'";
            $result = $conn->query($sql);

            if()



	?>
	<div class="maindiv center">
		 <div id="header">
            <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                
        </div>
        
	        <div class="main">
	        	<h1>Delete Account</h1><br><br><br><br>
	        	<form action="userlogin.php" method="POST">
	                <input type="text" name="email" placeholder="Email" required><br>
	                <input type="password" name="pass1" placeholder="Password" required><br><br><br><br><br>
	                <button type='delete' class="delete" name='action' value='del' >Delete</button>
	                <button type='reset' class="reset" name='action' value='reset' >Reset</button>
	            </form>
	        </div>
	     	
        <div id="footer" >
				<input type="button" class="logout" onclick=="location.href='userlogin.php'" value="Logout" >
		 </div>
	</div>
</body>


</html>