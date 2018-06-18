<?php
 
  session_start();
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
  $add_cost_error = "";
  $add_openh_error = "";
  

     //error message
    if(mb_strlen($name) > 50 ) {
                      $add_name_error = " Please sepcify up to 50 words only.";
                      $error = 1;
                      }
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $name)) {
                      $add_name_error = "Please type name using half size alphanumeric characters.";
                      $error = 1;
                      } 
    
    if(mb_strlen($type) > 20 ) {
                      $add_type_error = " Please sepcify up to 20 words only.";
                      $error = 1;
                      }
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $type)) {
                      $add_type_error = "Please input type of food using half size alphanumeric characters.";
                      $error = 1;
                      } 

    if(mb_strlen($address) > 50 ) {
                      $add_address_error = " Please sepcify up to 50 words only.";
                      $error = 1;
                      }
                      elseif (!preg_match("/^[a-zA-Z0-9]+$/", $address)) {
                      $add_address_error = "Please type address using half size alphanumeric characters.";
                      $error = 1;
                      } 

    if(mb_strlen($tel) > 15 ) {
                      $add_tel_error = " Please sepcify up to 15 words only.";
                      $error = 1;
                      }
                      elseif (!preg_match("/^[0-9]+$/", $tel)) {
                      $add_tel_error = "Please type name using half size alphanumeric characters.";
                      $error = 1;
                      } 
    if(mb_strlen($cost) > 10 ) {
                      $add_cost_error = " Please sepcify up to 10 words only.";
                      $error = 1;
                      }
                      elseif (!preg_match("/^[0-9]+$/", $tel)) {
                      $add_cost_error = "Please type cost using half size alphanumeric characters.";
                      $error = 1;
                      } 

    if($openhour < $endhour ) {
                      $add_openh_error = " Please set correct hours.";
                      $error = 1;
                      }

  

                    




$sql = "INSERT INTO restaurant(name, pic1, pic2, pic3, pic4, map, type, address, tel, openhour, endhour, cost)
VALUES ('$name', '$pic1', '$pic2', '$pic3', '$pic4', '$map', '$type', '$address', '$tel', '$openhour', '$endhour', '$cost')";


if($conn ->query($sql) === TRUE) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
<?php
if(isset($_POST['map'])){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['map']);
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>

 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyALPX-lQlH3QgLe5dz4xQ3eHYML6X4rNEk"></script>   
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>
 		<div class="maindiv center">
        	<div id="header">
            	<img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">  
        	</div>
        <hr>
        	<div class="add">

				<h1>Add restaurant</h1>
    				<form action="userhome.php" method="POST">
        				<div class="form"><br>
        					<input type="text" name="name" placeholder="Restaurant Name" required><br>
        					<input type="file" name="pic1" placeholder="pic1" required><br>
        					<input type="file" name="pic2" placeholder="pic2" required><br>
        					<input type="file" name="pic3" placeholder="pic3" required><br>
        					<input type="file" name="pic4" placeholder="pic4" required><br>	
                  			<input type="text" name="map" placeholder="Map" required><br>

                            
                            <div id='address-examples'></div>

                            <?php 
// function to geocode address, it will return false if unable to geocode address
                            function geocode($address){
 
    // url encode the address
                            $address = urlencode($address);
     
    // google map geocode api url
                            $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyALPX-lQlH3QgLe5dz4xQ3eHYML6X4rNEk";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>

                        
                            <input type="text" name="type" placeholder="type" required><br>
                			<input type="text" name="address" placeholder="Address" required><br>
                  			<input type="tel" name="tel" placeholder="Telephone Number" required><br>
                  			<input type="time" name="openhour" placeholder="Openhour" required>
                  			<input type="time" name="endhour" placeholder="Endhour" required><br>
                  			<input type="text" name="cost" placeholder="Average Cost" required><br><br>

                            <?php
                                if (isset($add_name_error)) {
                                echo "<span style='color:#ff0000;'>$add_name_error</span><br>";
                                }

                                if (isset($add_type_error)) {
                                echo "<span style='color:#ff0000;'> $add_type_error</span><br>";
                                }

                                if (isset($add_address_error)) {
                                echo "<span style='color:#ff0000;'> $add_address_error</span><br>";
                                }

                                if (isset($add_tel_error)) {
                                echo "<span style='color:#ff0000;'> $add_tel_error</span><br>";
                                }

                                if (isset($add_cost_error)) {
                                echo "<span style='color:#ff0000;'> $add_cost_error</span><br>";
                                }

                                if (isset($add_openh_error)) {
                                echo "<span style='color:#ff0000;'> $add_openh_error</span><br>";
                                }

                            




                            ?>
                    

                  			<button type ="submit" class="mainbutton submit" name="submit">Add</button>
                		</div>
                	</form>
                     <div id="gmap_canvas" style=" z-index: 1; height: 300px; width: 300px"></div>
                    <div id='map-label'></div>
            </div>
        <hr>
        	<button type ="submit" class="mainbutton submit" name="submit">Logout</button>
        </div>

 </body>
 </html>
 