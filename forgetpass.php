 <?php

  include 'dblammy.php';

    $name =$row["name"];
    $email =$row["email"];
    $question =$row["question"];
    $pass1 =$row["pass1"];

    $sql = "SELECT * FROM userinfo WHERE name = '$name' AND email = '$email' AND question ="question" ";
    $result = $conn->query($sql);

    if($result ->num_rows >0) {
      while($row = $result->fetch_assoc()){
        
      }
      }else{
  echo "0 result";
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="lammy.css">
    <title>registerpage</title>
    
  </head>
    
  <body>
     <h1>New Password</h1>
     <hr>
    
      <form action="register.php" method="POST">
        <div class="form"><br><div class= "pic"><input type="file" name="upfile" size="400" value="" required></div><br>
          <p>upload your pic here!</p>
        
        <br><div class= "name"><input type="text" name="name" placeholder="Name" required></div><br>
        
        <br><div class= "email"><input type="text" name="email" placeholder="E-mail" required></div><br>
          
          <br><div class= "q"><input type="text" name="question" placeholder="What is your favorite food?" required></div><br>
        
        <br><div class="psw"><input type="password" name="pass" placeholder="Password" required></div><br>
        
        <br><div class="cpsw"><input type="text" name="pass" placeholder="comfirm password" required></div><br>
          
          
      
      <br><button type ="submit" class= "subb">Register</button>
          <button type ="reset" class="resetb">Reset</button>
        </div><br>
      </form>
  </body>
</html>