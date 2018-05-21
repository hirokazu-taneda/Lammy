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
                        <h3>Restaurant A</h3>
                        <div class="rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <div class="restaurantpics">
                        <img src="images/resto_smallpic/small1.jpg" width="150" height="150">
                        <img src="images/resto_smallpic/small2.jpg" width="150" height="150">
                        <img src="images/resto_smallpic/small3.jpg" width="150" height="150">
                        <img src="images/resto_smallpic/small4.jpg" width="150" height="150">
                    </div>
                    <div class="restaurantdetail">
                        <div class="rev_left1">
                            <div id="detail_map">
                            </div>
                            <div class="heartdiv">
                                <i class="fas fa-heart"></i> 500
                            </div>
                        </div>
                        <div class="rescard_info">
                            <br>
                            <p class="res_details"><strong>Type of Food:</strong> Italian </p>
                            <p class="res_details"><strong>Address:</strong> Ayala Center Cebu </p>
                            <p class="res_details"><strong>Telephone:</strong> 032-123-1234 </p>
                            <p class="res_details"><strong>Open Hours:</strong> 8:00am - 9:00pm </p>
                            <p class="res_details"><strong>Average Cost:</strong> ₱400 </p>
                            <br>
                            <button class="mainbutton button2">Add Comment</button>
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