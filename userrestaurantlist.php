<html>
    <head>
        <title>Restaurant List</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="icon" type="image/png" href="images/favicon.png" />
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
                <div class="mypage1">
                    <h3>Restaurant List</h3>
                    <?php 
                    for($x=1; $x<=6; $x++){
                    ?>
                    <div id="res<?php echo $x; ?>" class="tabcontent1">
                        <table class="list">
                            <tr>
                                <th style="width: 550px;"class="adminlistth"></th>
                            </tr> 
                            <tr class="listtr">
                                <td class="listtd">Restaurant A</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant B</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant C</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant D</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant E</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant F</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant G</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant H</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant I</td>
                            </tr>
                            <tr class="listtr">
                                <td class="listtd">Restaurant J</td>
                            </tr>                            
                        </table>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="paginationdiv">
                        <div class="pagination">
                            <a href="#">&laquo;</a>
                            <a class="paglinks" onclick="openCity(event, 'res1')">1</a>
                            <a class="paglinks" onclick="openCity(event, 'res2')">2</a>
                            <a class="paglinks" onclick="openCity(event, 'res3')">3</a>
                            <a class="paglinks" onclick="openCity(event, 'res4')">4</a>
                            <a class="paglinks" onclick="openCity(event, 'res5')">5</a>
                            <a class="paglinks" onclick="openCity(event, 'res6')">6</a>
                            <a href="#">&raquo;</a>
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

<script>
openCity(event, "res1")
function openCity(evt, cityName) {
    var i, tabcontent1, paglinks;
    tabcontent1 = document.getElementsByClassName("tabcontent1");
    for (i = 0; i < tabcontent1.length; i++) {
        tabcontent1[i].style.display = "none";
    }
    paglinks = document.getElementsByClassName("paglinks");
    for (i = 0; i < tabcontent1.length; i++) {
        paglinks[i].classList.remove("active");
    }
    document.getElementById(cityName).style.display = "block";
    if (evt) {evt.currentTarget.classList.add("active");}
}
</script>

<script>
var mybtn = document.getElementsByClassName("paglinks")[0];
mybtn.click();
</script>