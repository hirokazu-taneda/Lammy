<html>
    <head>
        <title>Restaurant List</title>
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
            <div id="maincontent" style="min-height: 520px;">
                <div class="centerdiv">
                    <h2>Restaurant List</h2>
                    <table class="list">
                        <tr>
                            <th style="width: 80px;" class="listth"></th>
                            <th style="width: 470px;"class="listth">Restaurants</th>
                            <th style="width: 50px;"class="listth"></th>
                        </tr>
                        <tr class='listtr'>
                            <td class='listtd'></td>
                            <td class='listtd'>Restaurant A</td>
                            <td class='listtd'></td>                                   
                        </tr>
                        <tr class='listtr'>
                            <td class='listtd'></td>
                            <td class='listtd'>Restaurant B</td>
                            <td class='listtd'></td>                                   
                        </tr>
                        <tr class='listtr'>
                            <td class='listtd'></td>
                            <td class='listtd'>Restaurant C</td>
                            <td class='listtd'></td>                                   
                        </tr>
                        <tr class='listtr'>
                            <td class='listtd'></td>
                            <td class='listtd'>Restaurant D</td>
                            <td class='listtd'></td>                                   
                        </tr>
                    </table>




                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a class="active" href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
            <hr>
            <div id="footer">
                <button class="mainbutton logout">Logout</button>
            </div>
        </div>     
    </body>
</html>