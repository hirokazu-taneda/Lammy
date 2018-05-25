<html>
    <head>
        <title>My Page</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

            <script>
            function myFunction(userid) {
                var values = document.getElementById("userid").value;
                var txt;
                var r = confirm("Are you sure to delete?");
                if (r == true) {
                    document.location.href = "remove.php?ProfileID="+values+"";
                    txt = "";
                } else {
                    txt = "Cancel button is clicked.";
                }
            }
            </script>
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
                <div class="mypage">
                    <img src="images/user_profpic/usericon.png" class="userprofpic">
                    <form>
                        <input type="text" name="name" placeholder="Name"><br>
                        <input type="email" name="email" placeholder="Email" required><br>
                        <input type="password" name="password" placeholder="Password"><br>
                        <input type="password" name="cpassword" placeholder="Confirm Password"><br>
                        <p class="plabel">Gender
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                        </p>
                        <p class="plabel">Age <input type="number" name="age" min="1" max="110" placeholder="Age"></p>
                        <br><br>
                        <button class="mainbutton button1">Edit</button>
                    </form>
                </div>
            </div>
            <div id="footer">
                <hr>
                <button class="mainbutton logout">Logout</button>
                <button class="mainbutton button2" onclick="myFunction('3')">Delete</button>
                <input type="hidden" id="userid" name="userid" value=3>
            </div>
        </div>     
    </body>
</html>