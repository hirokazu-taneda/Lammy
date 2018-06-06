<?php
session_start();

include 'dblammy.php';

$restaurantid = 1;

    $sql_getrestaurant = "SELECT * FROM restaurant WHERE restaurantid='$restaurantid'";
    $getrestaurant = $conn->query($sql_getrestaurant);
    
    $row = $getrestaurant->fetch_assoc();
    
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



<html>
    <head>
        <title>Restaurant Detail</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    </head>
    <body>
        <div class="maindiv center">
            <div id="header">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                <div class="menubar">
                    <ul>
                      <li><a href="userhome.php">Home</a></li>
                      <li><a class="active" href="#MyPage">My Page</a></li>
                      <li><a href="#Inquiry">Inquiry</a></li>
                    </ul>
                </div>
            </div>
            <div id="maincontent">
                <div class="resdetailcontent">
                    <div class="rev_top">
                        <h3><?php echo $name; ?></h3>
                        <div class="rating">
                            <span class="fa fa-star <?php if($star >= 1){ echo 'checked'; }?>"></span>
                            <span class="fa fa-star <?php if($star >= 2){ echo 'checked'; }?>"></span>
                            <span class="fa fa-star <?php if($star >= 3){ echo 'checked'; }?>"></span>
                            <span class="fa fa-star <?php if($star >= 4){ echo 'checked'; }?>"></span>
                            <span class="fa fa-star <?php if($star == 5){ echo 'checked'; }?>"></span>
                        </div>
                    </div>
                    <div class="restaurantpics">
                        <img src="images/resto_smallpic/<?php echo $pic1; ?>" width="150" height="150">
                        <img src="images/resto_smallpic/<?php echo $pic2; ?>" width="150" height="150">
                        <img src="images/resto_smallpic/<?php echo $pic3; ?>" width="150" height="150">
                        <img src="images/resto_smallpic/<?php echo $pic4; ?>" width="150" height="150">
                    </div>
                    <div class="restaurantdetail">
                        <div class="rev_left1">
                            <div id="detail_map">
                            </div>
                            <div class="heartdiv">
                                <i class="fas fa-heart"></i> <?php echo $heart; ?>
                            </div>
                        </div>
                        <div class="rescard_info">
                            <br>
                            <p class="res_details"><strong>Type of Food:</strong> <?php echo $type; ?> </p>
                            <p class="res_details"><strong>Address:</strong> <?php echo $address; ?> </p>
                            <p class="res_details"><strong>Telephone:</strong> <?php echo $tel; ?> </p>
                            <p class="res_details"><strong>Open Hours:</strong> <?php echo $openhour; ?> - <?php echo $endhour; ?> </p>
                            <p class="res_details"><strong>Average Cost:</strong> ₱<?php echo $cost; ?> </p>
                            <br>
                            <a href="useraddreview.php?restaurantid=<?php echo $restaurantid; ?>"><button class="mainbutton button2">Add Comment</button></a>
                        </div>
                    </div>
                    <div class="rev_card">
                        <div class="rev_left">
                            <img class="rev_userpic"  src="images/user_profpic/reviewicon.jpg"><br>
                            <h4>User Ryan</h4>
                        </div>
                        <div class="rev_right">
                            <div class="rating1">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="rev_comment">
                                With dozens and dozens of restaurants to choose from, it is easy to get confused with what one should expect from his or her dining out experience. To make it less confusing, one can look at the vast choices of restaurants to choose from as three different types of dining: fast food, family oriented diners, and fine dining....
                            </div>
                            <div class="rev_pics">
                                <img src="images/resto_revpic/rev1.jpg" width="75" height="75">
                                <img src="images/resto_revpic/rev2.jpg" width="75" height="75">
                                <img src="images/resto_revpic/rev3.jpg" width="75" height="75">
                                <img src="images/resto_revpic/rev4.jpg" width="75" height="75">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
                <hr>
                <button class="mainbutton logout">Logout</button>
            </div>
        </div>     
    </body>
</html>

<!-- Map for Top Map -->
<script>
  function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};

    var map = new google.maps.Map(document.getElementById('detail_map'), {
      zoom: 4,
      center: uluru
    });

    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });

  }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYfwbzAF4iTRKhRUn8tnXyd7wdENDZbA4&callback=initMap">
</script> 