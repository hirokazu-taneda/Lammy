<?php
session_start();

include 'dblammy.php';

$restaurantid = $_GET["restaurantid"];
$buttondisable = "class='mainbutton button2'";

if($_SESSION["userid"] == ""){
    header("Location: loginuser.php");
}

$userid = $_SESSION["userid"];

$sql_getuserinfo = "SELECT * FROM userinfo WHERE userid='$userid'";
$getuserinfo = $conn->query($sql_getuserinfo);
$rowuserinfo = $getuserinfo->fetch_assoc();

$profpic = $rowuserinfo["upfile"];

if($profpic == ""){
    $profpic = "usericon.png";
}


    //Get User information 
    $sql_getuser = "SELECT * FROM userinfo WHERE userid='$userid'";
    $getuser = $conn->query($sql_getuser);
    
    $row = $getuser->fetch_assoc();
    
        $username = $row["name"];

    //Get restaurant information from database.
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

    //Check if user is already reviewed restaurant.
    $sql_getreview = "SELECT * FROM addreview WHERE userid='$userid' AND restaurantid='$restaurantid'";
    $getreview = $conn->query($sql_getreview);
    
    $row = $getreview->fetch_assoc();
    
    //if user already give review comment to this restaurant, user cannot give comment again.
    if($row > 1){
        $buttondisable = "class='mainbutton button3' disabled";
    }

?>



<html>
    <head>
        <title>Restaurant Detail</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="images/favicon.png" />
    </head>
    <body>
        <div class="maindiv center">
            <div id="header">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
                <a href="mypage.php"><img src="images/user_profpic/<?php echo $profpic; ?>" width="50" height="50" style="border-radius: 50%; margin-left: 700px;" ></a>
                <div class="menubar">
                    <ul>
                      <li><a href="userhome.php">Home</a></li>
                      <li><a href="#MyPage">My Page</a></li>
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
                            <div><a href="useraddreview.php?restaurantid=<?php echo $restaurantid; ?>"><button <?php echo $buttondisable; ?>>Add Comment</button></a></div>
                        </div>
                    </div>

                    <?php
                            $sql_getrestaurant = "SELECT * FROM addreview WHERE restaurantid='$restaurantid'";
                            $getrestaurant = $conn->query($sql_getrestaurant);

                            if ($getrestaurant->num_rows > 0) {
                                while($row = $getrestaurant->fetch_assoc()) {
                                $userid = $row["userid"];

                                $revpic1 = $row["pic1"];
                                $revpic2 = $row["pic2"];
                                $revpic3 = $row["pic3"];
                                $revpic4 = $row["pic4"];


                                $sql_getuserid = "SELECT * FROM userinfo WHERE userid='$userid'";
                                $getuserid = $conn->query($sql_getuserid);
                                $rowuser = $getuserid->fetch_assoc()
       
                    ?>
                    <div class="rev_card">
                        <div class="rev_left">
                            <img class="rev_userpic"  src="images/user_profpic/reviewicon.jpg"><br>
                            <h4><?php echo $rowuser["name"]; ?></h4>
                        </div>
                        <div class="rev_right">
                            <div class="rating1">
                                <?php $revstar = $row["star"]; ?>
                                <span class="fa fa-star <?php if($revstar >= 1){ echo 'checked'; }?>"></span>
                                <span class="fa fa-star <?php if($revstar >= 2){ echo 'checked'; }?>"></span>
                                <span class="fa fa-star <?php if($revstar >= 3){ echo 'checked'; }?>"></span>
                                <span class="fa fa-star <?php if($revstar >= 4){ echo 'checked'; }?>"></span>
                                <span class="fa fa-star <?php if($revstar == 5){ echo 'checked'; }?>"></span>
                            </div>
                            <div class="rev_comment">
                                <?php echo $row["comment"]; ?>
                            </div>
                            <div class="rev_pics">
                                <?php
                                    if($revpic1 != "") {
                                       echo "<img src='images/resto_revpic/$revpic1' width='75' height='75'> ";
                                    }
                                    if($revpic2 != "") {
                                       echo "<img src='images/resto_revpic/$revpic2' width='75' height='75'> ";
                                    }
                                    if($revpic3 != "") {
                                       echo "<img src='images/resto_revpic/$revpic3' width='75' height='75'> ";
                                    }
                                    if($revpic4 != "") {
                                       echo "<img src='images/resto_revpic/$revpic4' width='75' height='75'> ";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                            } else {
                                echo "<br><span style='margin-left:5px;' class='red'>0 results</span>";
                            }
                    ?>
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
