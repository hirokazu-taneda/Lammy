

<?php
  include 'dblammy.php';

  $error = 0;

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

        $add_name_error = "";
        $add_type_error = "";
        $add_address_error = "";
        $add_tel_error = "";

        unset($add_name_error, $add_type_error, $add_address_error, $add_tel_error);

            if(mb_strlen($name) < 1) {

                $add_name_error = " Please set name minimum of 1 characters.";
                $error = 1;
                } elseif(mb_strlen($name) > 50) {

                $add_name_error = " Please specify up to 50 words only.";
                $error = 1;
                } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $name)) {
                
                $add_name_error = "Please type name using half size alphanumeric characters.";
                $error = 1;
                } 

            if(mb_strlen($type) < 1) {

                $add_type_error = " Please set type of food minimum of 1 characters.";
                $error = 1;
                } elseif(mb_strlen($type) > 20) {

                $add_type_error = " Please specify up to 20 words only.";
                $error = 1;
                } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $type)) {
                
                $add_type_error = "Please input type of food using half size alphanumeric characters.";
                $error = 1;
                } 

            if(mb_strlen($address) < 1) {

                $add_address_error = " Please set address minimum of 1 characters.";
                $error = 1;
                } elseif(mb_strlen($address) > 50) {

                $add_address_error = " Please specify up to 50 words only.";
                $error = 1;
                } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $address)) {
                
                $add_address_error = "Please type address using half size alphanumeric characters.";
                $error = 1;
                } 

            if(mb_strlen($tel) < 1) {

                $add_tel_error = " Please set number minimum of 1 characters.";
                $error = 1;
                } elseif(mb_strlen($tel) > 15) {

                $add_tel_error = " Please specify up to 15 numbers only.";
                $error = 1;
                } elseif (!preg_match("/^[0-9]+$/", $tel)) {
                
                $add_tel_error = "Please type number.";
                $error = 1;
                } 

            if(mb_strlen($cost) < 1) {

                $add_cost_error = " Please set cost minimum of 1 characters.";
                $error = 1;
                } elseif(mb_strlen($cost) > 10) {

                $add_cost_error = " Please specify up to 15 numbers only.";
                $error = 1;
                } elseif (!preg_match("/^[a-zA-Z0-9]+$/", $tel)) {
                
                $add_tel_error = "Please type avarage cost using half size alphanumeric characters.";
                $error = 1;
                } 
            
    
        $sql = "INSERT INTO restaurant(name, pic1, pic2, pic3, pic4, map, type, address, tel, openhour, endhour, cost)
        VALUES ('$name', '$pic1', '$pic2', '$pic3', '$pic4', '$map', '$type', '$address', '$tel', '$openhour', '$endhour', '$cost')";

        if($conn ->query($sql) === TRUE) {
        header("Location: adminhome.php");

        } else {
        $error = 1;
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
        				<div class="form">	
        					<input type="text" name="name" placeholder="Restaurant Name" class="box" required><br><br>
        					   <input type="file" name="pic1" placeholder="pic1"  required><br>
        					   <input type="file" name="pic2" placeholder="pic2"  required><br>
        					   <input type="file" name="pic3" placeholder="pic3"  required><br>
        					   <input type="file" name="pic4" placeholder="pic4" required><br>	
                  			   <input type="text" name="map" placeholder="Map" class="box" required><br>
                               <input type="text" name="type" placeholder="Type of food" class="box" required><br>
                			   <input type="text" name="address" placeholder="Address" class="box" required><br>
                  			   <input type="text" name="tel" placeholder="Telephone Number" class="box" required><br>
                  			   <input type="time" name="openhour" required>
                  			   <input type="time" name="endhour" required><br>
                  			   <input type="text" name="cost" placeholder="Average Cost" class="box" required><br><br>

                                <?php
                                    if (isset($add_name_error)) {
                                        echo "<span style='color:#ff0000;'>$add_name_error</span><br>";
                                    }

                                    if (isset($add_type_error)) {
                                        echo "<span style='color:#ff0000;'>$add_type_error</span><br>";
                                    }

                                    if (isset($add_address_error)) {
                                        echo "<span style='color:#ff0000;'>$add_address_error</span><br>";
                                    }

                                    if (isset($add_tel_error)) {
                                        echo "<span style='color:#ff0000;'>$add_tel_error</span><br>";
                                    }


                                ?>
                  

                  			<button type ="submit" class="mainbutton submit" name="submit">Add</button>
                		</div>
                	</form>
            </div>
        <div id="footer">
                <hr>
                <button class="mainbutton logout">Logout</button>
            </div>
        </div>


 </body>
 </html>