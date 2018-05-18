

<?php
  include 'dblammy.php';

  if (isset($_POST["submit"])){
 
  $name = $_POST["name"];
  $pic1 = $_POST["pic1"];
  $pic2 = $_POST["pic2"];
  $pic3 = $_POST["pic3"];
  $pic4 = $_POST["pic4"];
  $map = $_POST["map"];
  $type = $_POST["type"];
  $address = $_POST["address"];
  $tel = $_POST["tel"];
  $openhour = $_POST["openhour"];
  $endhour = $_POST["endhour"];
  $cost = $_POST["cost"];

$sql = "INSERT INTO restaurant(name, pic1, pic2, pic3, pic4, map, type, address, tel, openhour, endhour, cost)
VALUES ('$name', '$pic1', '$pic2', '$pic3', '$pic4', $'map', $'type', $'address', $'tel', $'openhour', $'endhour', $'cost')";

if($conn ->query($sql) === TRUE) {
   echo "New record created successfully";
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}
}

?>
 
 <!DOCTYPE html>
 <html lang="ja">
 <head>
 	<title>addrestaurant</title>
 	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>

 		<div class="maindiv center">
        	<div id="header">
            	<img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">  
        	</div>
        <hr>
        	<div class="add">
				<h1>Add restaurant</h1>
    				<form action="addrestaurant.php" method="POST">
        				<div class="form"><br>
        					<input type="text" name="name" placeholder="Restaurant Name" required><br>
        					<input type="file" name="pic1" placeholder="pic1" required><br>
        					<input type="file" name="pic2" placeholder="pic2" required><br>
        					<input type="file" name="pic3" placeholder="pic3" required><br>
        					<input type="file" name="pic4" placeholder="pic4" required><br>	
                  			<input type="text" name="map" placeholder="Map" required><br>
                			<input type="text" name="address" placeholder="Address" required><br>
                  			<input type="tel" name="tel" placeholder="Telephone Number" required><br>
                  			<input type="time" name="openhour" placeholder="Openhour" required>
                  			<input type="time" name="endhour" placeholder="Endhour" required><br>
                  			<input type="text" name="cost" placeholder="Average Cost" required><br><br>

                  			<button type ="submit" class="mainbutton submit" name="submit">Add</button>
                		</div>
                	</form>
            </div>
        <hr>
        	<button type ="submit" class="mainbutton submit" name="submit">Logout</button>
        </div>

 </body>
 </html>