<?php
session_start();

include 'dblammy.php';

if(isset($_GET["searchname"])){
    $searchname = $_GET["searchname"];

    $sql_restaurantsearch = "SELECT * FROM restaurant WHERE name LIKE '%$searchname%'";
    $restaurantsearch = $conn->query($sql_restaurantsearch);
}


?>

<html>
    <head>
        <title>User Home</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <div class="maindiv center">
            <div id="header">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                <a href="mypage.php"><img src="images/user_profpic/usericon.png" width="50" style="border-radius: 50%; margin-left: 700px;" ></a>
                <div class="menubar">
                    <ul>
                      <li><a class="active" href="#home">Home</a></li>
                      <li><a href="mypage.php">My Page</a></li>
                      <li><a href="#Inquiry">Inquiry</a></li>
                    </ul>
                </div>
            </div>
            <div id="maincontent">
                <div id="hometop">
                    <div class="mainleft">
                        <div class="search-container">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                              <input type="text" placeholder="Search.." name="searchname">
                              <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <br><br>
                            <a class="alink" href="userrestaurantlist.php">Restaurant List</a>
                        </div>
                    </div>
                    <div class="mainright">
                        <div id="topmap"></div>
                    </div>
                </div>
                <div id="homebottom">
                    <div class="rescontainer">
                        <?php
                            if(isset($_GET["searchname"])){
                                if ($restaurantsearch->num_rows > 0) {
                                    while($row = $restaurantsearch->fetch_assoc()) {
                                    $restaurantid = $row["restaurantid"];
                                    $name = $row["name"];
                                    $type = $row["type"];
                                    $address = $row["address"];
                                    $tel = $row["tel"];
                                    $openhour = $row["openhour"];
                                    $endhour = $row["endhour"];
                                    $cost = $row["cost"];
                                    $pic1 = $row["pic1"];
                                    $pic2 = $row["pic2"];
                                    $pic3 = $row["pic3"];
                                    $pic4 = $row["pic4"];
                                    $star = $row["star"];
                                    $map = $row["map"];
                                    $heart = $row["heart"];
                        ?>
                                    <div class="restaurantcard">
                                        <div class="rescard_top">
                                            <h3><?php echo $name; ?></h3>
                                            <div class="rating">
                                                <span class="fa fa-star <?php if($star >= 1){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 2){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 3){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 4){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star == 5){ echo 'checked'; }?>"></span>
                                            </div>
                                        </div>
                                        <div class="rescard_img">
                                            <img class="res_profpic" src="images/resto_mainpic/<?php echo $pic1; ?>" alt="restaurant mainpicture">
                                        </div>
                                        <div class="rescard_info">
                                            <p class="res_details"><strong>Type of Food:</strong> <?php echo $type; ?></p>
                                            <p class="res_details"><strong>Address:</strong> <?php echo $address; ?></p>
                                            <p class="res_details"><strong>Telephone:</strong> <?php echo $tel; ?></p>
                                            <p class="res_details"><strong>Open Hours:</strong> <?php echo $openhour; ?></p>
                                        </div>
                                        <div id="rescard_map">
                                        </div>
                                        <div class="rescard_bottom">
                                            <i class="fas fa-heart"></i>: <?php echo $heart; ?>
                                        </div>
                                    </div>
                        <?php
                                    }
                                } else {
                                    echo "Restaurant is not found";
                                }
                            } else {
                                $sql_getrestaurant = "SELECT * FROM restaurant ORDER BY heart DESC LIMIT 5";
                                $getrestaurant = $conn->query($sql_getrestaurant);

                                if ($getrestaurant->num_rows > 0) {
                                    while($row = $getrestaurant->fetch_assoc()) {
                                    $restaurantid = $row["restaurantid"];
                                    $name = $row["name"];
                                    $type = $row["type"];
                                    $address = $row["address"];
                                    $tel = $row["tel"];
                                    $openhour = $row["openhour"];
                                    $endhour = $row["endhour"];
                                    $cost = $row["cost"];
                                    $pic1 = $row["pic1"];
                                    $pic2 = $row["pic2"];
                                    $pic3 = $row["pic3"];
                                    $pic4 = $row["pic4"];
                                    $star = $row["star"];
                                    $map = $row["map"];
                                    $heart = $row["heart"];
                        ?>
                                    <div class="restaurantcard">
                                        <div class="rescard_top">
                                            <h3><?php echo $name; ?></h3>
                                            <div class="rating">
                                                <span class="fa fa-star <?php if($star >= 1){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 2){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 3){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star >= 4){ echo 'checked'; }?>"></span>
                                                <span class="fa fa-star <?php if($star == 5){ echo 'checked'; }?>"></span>
                                            </div>
                                        </div>
                                        <div class="rescard_img">
                                            <img class="res_profpic" src="images/resto_mainpic/<?php echo $pic1; ?>" alt="restaurant mainpicture">
                                        </div>
                                        <div class="rescard_info">
                                            <p class="res_details"><strong>Type of Food:</strong> <?php echo $type; ?></p>
                                            <p class="res_details"><strong>Address:</strong> <?php echo $address; ?></p>
                                            <p class="res_details"><strong>Telephone:</strong> <?php echo $tel; ?></p>
                                            <p class="res_details"><strong>Open Hours:</strong> <?php echo $openhour; ?></p>
                                        </div>
                                        <div id="rescard_map">
                                        </div>
                                        <div class="rescard_bottom">
                                            <i class="fas fa-heart"></i>: <?php echo $heart; ?>
                                        </div>
                                    </div>
                        <?php
                                    } 
                                }else {
                                    echo "0 results";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="footer">
                <hr>
                <a href="logout.php"><button class="mainbutton logout">Logout</button></a>
            </div>
        </div>     
    </body>
</html>

<!-- Map for Top Map -->
<script>
  function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var uluru2 = {lat: -25.363, lng: 131.044};

    var map = new google.maps.Map(document.getElementById('topmap'), {
      zoom: 4,
      center: uluru
    });
    var map2 = new google.maps.Map(document.getElementById('rescard_map'), {
      zoom: 4,
      center: uluru2
    });

    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
    var marker2 = new google.maps.Marker({
      position: uluru2,
      map: map
    });

  }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYfwbzAF4iTRKhRUn8tnXyd7wdENDZbA4&callback=initMap">
</script> 