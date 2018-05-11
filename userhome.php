<html>
    <head>
        <title>User Home</title>
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
                            <form action="/action_page.php">
                              <input type="text" placeholder="Search.." name="search">
                              <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="mainright">
                        <div id="topmap"></div>
                    </div>
                </div>
                <div id="homebottom">
                    <div class="rescontainer">
                        <div class="restaurantcard">
                            <div class="rescard_top">
                                <h3>Restaurant A</h3>
                                <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="rescard_img">
                                <img class="res_profpic" src="images/resto_mainpic/dummy_mainpic_1.jpg" alt="restaurant mainpicture">
                            </div>
                            <div class="rescard_info">
                                <p class="res_details"><strong>Type of Food:</strong> Italian</p>
                                <p class="res_details"><strong>Address:</strong> Ayala Center Cebu</p>
                                <p class="res_details"><strong>Telephone:</strong> 032-123-1234</p>
                                <p class="res_details"><strong>Open Hours:</strong> 8:00am - 9:00pm</p>
                            </div>
                            <div id="rescard_map">
                            </div>
                            <div class="rescard_bottom">
                                <i class="fas fa-heart"></i>: 500
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
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