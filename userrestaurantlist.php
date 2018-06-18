<?php
session_start();

include 'dblammy.php';

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

$check ="";

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $conn=mysqli_connect("127.0.0.1","root","","lammy");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $total_pages_sql = "SELECT COUNT(*) FROM restaurant";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM restaurant LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn,$sql);


?>

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
                <a href="mypage.php"><img src="images/user_profpic/<?php echo $profpic; ?>" width="50" height="50" style="border-radius: 50%; margin-left: 700px;" ></a>
                <div class="menubar">
                    <ul>
                      <li><a href="userhome.php">Home</a></li>
                      <li><a href="mypage.php">My Page</a></li>
                      <li><a href="#Inquiry">Comment</a></li>
                    </ul>
                </div>
            </div>
            <div id="maincontent">
                <div class="mypage1">
                    <h3>Restaurant List</h3>
                    <div id="res1" class="tabcontent1">
                        <table class="list">
                            <tr>
                                <th style="width: 550px;"class="adminlistth"></th>
                            </tr> 
                            <?php
                                while($row = mysqli_fetch_array($res_data)){
                                    $restaurantid = $row["restaurantid"];
                                    $name = $row["name"];
                                    $pic1 = $row["pic1"];
                            ?>
                            <tr class="listtr">
                                <td class="listtd">
                                    <div style="float:left;"><img src="images/resto_mainpic/<?php echo $pic1; ?>" width="40" style="border-radius: 50%;"></div>
                                   <a href="userrestaurantdetail.php?restaurantid=<?php echo $restaurantid; ?>" style="color:#008dbc;" ><div class="resname"><?php echo $name; ?></div></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>     
                        </table>
                    </div>
                    <div class="pagicontainer"> 
                        <div class="paginationdiv">
                            <div class="pagination">
                                <?php
                                    if($pageno == 1){
                                        echo "<a>&laquo;</a>";
                                    } else {
                                        $before = $pageno-1;
                                        echo "<a href='userrestaurantlist.php?pageno=$before'>&laquo;</a>";
                                    }
                                    for($y = 1; $y <= $total_pages; $y++){
                                        if($pageno == $y){
                                            $check = "class='active'";
                                        }
                                        echo "<a href='userrestaurantlist.php?pageno=$y' $check>$y</a>";
                                        $check = "";
                                    }
                                    if($pageno == $total_pages){
                                        echo "<a>&raquo;</a>";
                                    } else {
                                        $after = $pageno+1;
                                        echo "<a href='userrestaurantlist.php?pageno=$after'>&raquo;</a>";
                                    }
                                ?>
                            </div>
                        </div>
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