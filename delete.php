 <?php 
        include 'dblammy.php';

            if (isset($_POST["submit"])){

            $name = $_POST["name"];
            $email = $_POST["email"];
      
            $sql ="DELETE * FROM userinfo WHERE name = '$name' AND email = '$email'";
            $result = $conn->query($sql);

            if($conn->query($sql) === TRUE) {
            echo "Record is deleted successfully";
             } else {
             echo"Error during deleting record:" . $conn->error;
            }

            }


?>

       


<!DOCTYPE html>
<html lang="ja">
<head>
	<title>delete page</title>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">

    <script>
            function myFunction(userid,myname) {
                var values = document.getElementById(userid).value;
                var nameval = document.getElementById(myname).value;                
                var txt;
                var r = confirm("Do you want to delete " + nameval + "?");
                if (r == true) {
                    document.location.href = "remove.php?ProfileID="+values+"";
                    txt = "";
                } else {
                    txt = "<h4 id=error>Cancel button is clicked.</h4>";
                }
                document.getElementById("demo").innerHTML = txt;
            }
    </script>


</head>
<body>
 	

<div class="maindiv center">
        <div id="header">
            <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">  
        </div>
        <hr>
        	<div class="login">
        		<h1>Delete Account</h1>
		
                <button class="mainbutton submit" onclick="myFunction('user1','Ryan')">Delete</button>
          				
			</div>
</div>

</body>
</html>