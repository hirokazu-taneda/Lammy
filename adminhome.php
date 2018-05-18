<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    </head>
    <body>
        <div class="maindiv center">
            <div id="adminheader">
                <img src="images/lammylogo.png" width="200" style="margin: 5 0 5 10;">
            </div>
            <div id="maincontent">
            	<div class="tabcontainer">
	                <div class="tab">
	                  <button class="tablinks" onclick="openCity(event, 'restaurant')">Restaurant</button>
	                  <button class="tablinks" onclick="openCity(event, 'user')">User</button>
	                  <button class="tablinks" onclick="openCity(event, 'comment')">Comment</button>
	                </div>
                	<div id="restaurant" class="tabcontent">
                		<button class="mainbutton button2">Add</button>
	                    <table class="list">
	                        <tr>
	                            <th style="width: 550px;"class="adminlistth"></th>
	                            <th style="width: 250px;"class="adminlistth"></th>
	                        </tr>                    	
	                        <tr class="listtr">
	                        	<td class="listtd">Restaurant A</td>
	                        	<td class="listtd">
	                        		<button class="mainbutton button2">Edit</button>
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">Restaurant B</td>
	                        	<td class="listtd">
	                        		<button class="mainbutton button2">Edit</button>
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">Restaurant C</td>
	                        	<td class="listtd">
	                        		<button class="mainbutton button2">Edit</button>
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">Restaurant D</td>
	                        	<td class="listtd">
	                        		<button class="mainbutton button2">Edit</button>
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                    </table>
	                </div>
	                <div id="user" class="tabcontent">
	                    <table class="list">
	                        <tr>
	                            <th style="width: 550px;"class="adminlistth"></th>
	                            <th style="width: 250px;"class="adminlistth"></th>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User A</td>
	                        	<td class="listtd bRight">
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User B</td>
	                        	<td class="listtd bRight">
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User C</td>
	                        	<td class="listtd bRight">
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User D</td>
	                        	<td class="listtd bRight">
	                        		<button class="mainbutton button1">Delete</button>
	                        	</td>
	                        </tr>
	                    </table>
	                </div>
	                <div id="comment" class="tabcontent">
	                    <table class="list">
	                        <tr>
	                            <th style="width: 200px;"class="adminlistth"></th>
	                            <th style="width: 600px;"class="adminlistth"></th>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User A</td>
	                        	<td class="listtd">This is Comment A. Please this is just a comment.</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User B</td>
	                        	<td class="listtd">This is Comment B. Please this is just a comment.</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User C</td>
	                        	<td class="listtd">This is Comment C. Please this is just a comment.</td>
	                        </tr>
	                        <tr class="listtr">
	                        	<td class="listtd">User D</td>
	                        	<td class="listtd">This is Comment D. Please this is just a comment.</td>
	                        </tr>
	                    </table>
	                </div>	                
	            </div>
            <script>
            openCity(event, "Employee")
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tabcontent.length; i++) {
                    tablinks[i].classList.remove("active");
                }
                document.getElementById(cityName).style.display = "block";
                if (evt) {evt.currentTarget.classList.add("active");}
            }
            </script>
            
            <script>
            var mybtn = document.getElementsByClassName("tablinks")[0];
            mybtn.click();
            </script>
            <br><br>
           	</div>
            <hr>   
            <div id="footer">
                <hr>
                <button class="mainbutton logout">Logout</button>
            </div>
        </div>     
    </body>
</html>