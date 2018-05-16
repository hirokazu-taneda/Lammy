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

  

  if ($pass1 == $pass2) {
      $sql = "INSERT INTO userinfo(name, email, pass1, age, gender, question, upfile)
      VALUES ('$name', '$email', '$pass1', '$age', '$gender', '$question', '')";

      if($conn ->query($sql)){
       echo "New record created successfully";
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
    			 <form action="register.php" method="POST">
        			<div class="form"><br>
        				<input type="file" name="upfile" size="400" value="picture" class= "pic" ><br>
        				<p>upload your pic here!</p>
        					
                  <input type="text" name="name" placeholder="Name" class= "name" required><br>
        					
                  <input type="text" name="email" placeholder="E-mail" class= "email" required><br>
                  
        					
                  <input type="password" name="pass1" placeholder="Password" class="pass" required><br>
                  
        					
                  <input type="password" name="pass2" placeholder="comfirm password" required><br><br>
                  
                  <?php
                    if ($error == 1) {
                      echo "Password does not match. Please set same password in confirm password.<br><br>";
                    }

                  ?>
          
            					<select name="age" required>
           							<option value="" disabled selected>Age</option>
              						<option value="u19" >Under 19</option>
              						<option value="20_24">20~24</option>	
              						<option value="25_29">25~29</option>
              						<option value="30_34">30~34</option>
              						<option value="35_39">35~39</option>
              						<option value="over40">over 40</option>
                          
          						</select><br><br>
        
        					<input type="radio" name="gender" value="male" required>Male
            			<input type="radio" name="gender" value="female">Female<br>
                  

        					
        					<input type="text" name="question" class= "login" placeholder="What is your favorite food?" required><br>
                  
        			</div>
    			
    		<br>
        	   <button type ="submit" class="mainbutton submit" name="submit">Register</button>
          	 <button type ="reset" class="mainbutton register">Reset</button><br>
            </form>
        </div>

    </div>    	
</body>
</html>






