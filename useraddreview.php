<?php
session_start();

include 'dblammy.php';

if($_SESSION["userid"] == ""){
    header("Location: loginuser.php");
}

if(isset($_GET["restaurantid"])){
    $restaurantid = $_GET["restaurantid"];

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
}

$errorcode = 0;
$errmsg = "";
$errmsg1 = "";
$y = 0;

$userid = $_SESSION["userid"];

$sql_getuserinfo = "SELECT * FROM userinfo WHERE userid='$userid'";
$getuserinfo = $conn->query($sql_getuserinfo);
$rowuserinfo = $getuserinfo->fetch_assoc();

$profpic = $rowuserinfo["upfile"];

if($profpic == ""){
    $profpic = "usericon.png";
}

$uploadmsg1 = array("", "", "", "");
$uploadmsg2 = array("", "", "", "");
$uploadmsg3 = array("", "", "", "");
$uploadmsg4 = array("", "", "", "");
$uploadmsg5 = array("", "", "", "");





if(isset($_POST["reviewsubmit"])) {

    if(isset($_POST["starrate"])){
        $starrate = $_POST["starrate"];
    } else {
        $errmsg = "Please set star rating. <br>";
        $errorcode = 1;
    }
    
    $restaurantid = $_POST["restaurantid"];
    $review = $_POST["reviewcomment"];
    $reviewcomment = addslashes($review);
    $rev[0] = $_FILES["rev1"]["name"];
    $rev[1] = $_FILES["rev2"]["name"];
    $rev[2] = $_FILES["rev3"]["name"];
    $rev[3] = $_FILES["rev4"]["name"];

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

    //checking for multibyte in 
    if (mb_strlen($review) != strlen($review)) {
        $errmsg1 = "Please input English Characters only. <br>";
        $errorcode = 1;
    } 

    if (str_word_count($review) <= 10) {
        $errmsg = "Please set minimum of 10 words. <br>";
        $errorcode = 1;
    } elseif (str_word_count($review) >= 500){
        $errmsg = "Please set up to 500 words only. <br>";
        $errorcode = 1;
    }

    $revnewname = "";
    $uploadfile = "";

    for($x=1 ; $x <= 4 ; $x++ ){

        $uploadOk = 1;

        if($_FILES["rev$x"]["name"] != ""){
            $target_dir = "images/resto_revpic/";
            $target_file = $target_dir . basename($_FILES["rev$x"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $revnewname = "rev$x" . "_" . $restaurantid . "_" . $userid . "." . $imageFileType;
            $uploadfile = $target_dir . $revnewname;

            echo $revnewname;

            // Check if image file is a actual image or fake image
            if(isset($_POST["reviewsubmit"])) {
                $check = getimagesize($_FILES["rev$x"]["tmp_name"]);
                if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $uploadmsg1[$y] =  "File is not an image. <br>";
                    $uploadOk = 0;
                    $errorcode = 1;
                }
            }

            // Check if file already exists
            if(file_exists($revnewname)) {
                unlink($revnewname);
                //echo "<br>File exist. It is overwritten with new file";
                $uploadOk = 1;
            }

            // Check file size
            if($_FILES["rev$x"]["size"] > 2000000) {
                $uploadmsg2[$y] = "Sorry, your file is too large. <br>";
                $uploadOk = 0;
                $errorcode = 1;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadmsg3[$y] = "Sorry, only JPG, JPEG & PNG files are allowed. <br>";
                $uploadOk = 0;
                $errorcode = 1;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $uploadmsg5[$y] = "Sorry, your file was not uploaded. <br>";
                $errorcode = 1;
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["rev$x"]["tmp_name"], $uploadfile)) {
                    echo "The file ". basename( $_FILES["rev$x"]["name"]). " has been uploaded.";
                } else {
                    $uploadmsg5[$y] = "Sorry, there was an error uploading your file. <br>";
                    $errorcode = 1;
                }
            }
        } 

        $uploadOcheck[$y] = $uploadOk;
        $revdbname[$y] = $revnewname;

        $y++;

    }


    if($errorcode == 0) {
        $sql_savereview = "INSERT INTO addreview (userid, restaurantid, star, comment, pic1, pic2, pic3, pic4) VALUES ('$userid','$restaurantid','$starrate','$reviewcomment','$revdbname[0]','$revdbname[1]','$revdbname[2]','$revdbname[3]')";

        if ($conn->query($sql_savereview) === TRUE) {
            header("Location: userrestaurantdetail.php?restaurantid=$restaurantid");
        } else {
            $errmsg = "Error during Adding Review: " . $conn->error . "<br>";
        }
    }
}

?>


<html>
    <head>
        <title>Add Review</title>
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
                      <li><a class="active" href="#MyPage">My Page</a></li>
                      <li><a href="#Inquiry">Inquiry</a></li>
                    </ul>
                </div>
            </div>
            <div id="maincontent">
                <div class="resdetailcontent">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                        <div class="rev_top">
                            <input type="hidden" name="restaurantid" value="<?php echo $restaurantid; ?>">
                            <h3><?php echo $name; ?></h3>
                            <div class="rating">
                                <fieldset class="starrate">
                                    <input type="radio" id="star5" name="starrate" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                    <!-- <input type="radio" id="star4half" name="starrate" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label> -->
                                    <input type="radio" id="star4" name="starrate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                    <!-- <input type="radio" id="star3half" name="starrate" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label> -->
                                    <input type="radio" id="star3" name="starrate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                    <!-- <input type="radio" id="star2half" name="starrate" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label> -->
                                    <input type="radio" id="star2" name="starrate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                    <!-- <input type="radio" id="star1half" name="starrate" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label> -->
                                    <input type="radio" id="star1" name="starrate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                    <!-- <input type="radio" id="starhalf" name="starrate" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                                </fieldset>
                            </div>
                        </div>
                        <div class="mypage">
                            <textarea name="reviewcomment" placeholder="Review Comment" cols="53" rows="10" required></textarea><br><br>
                            <input type="file" name="rev1"><br><br>
                            <input type="file" name="rev2"><br><br>
                            <input type="file" name="rev3"><br><br>
                            <input type="file" name="rev4"><br><br>
                            <span style="color: red;"><?php echo $errmsg1; echo $errmsg; ?></span>
                            <span style="color: red;">
                                <?php 
                                    for($z = 0; $z <= 3 ; $z++){
                                        echo $uploadmsg1[$z];
                                        echo $uploadmsg2[$z]; 
                                        echo $uploadmsg3[$z]; 
                                        echo $uploadmsg4[$z];
                                        echo $uploadmsg5[$z];   
                                    }
                                ?>
                            </span>
                            <br><br>
                            <input type="reset" value="Reset" class="mainbutton button1">
                            <input type="submit" name="reviewsubmit" value="Submit" class="mainbutton button2">
                        </div>
                    </form>
                </div>
            </div>
            <div id="footer">
                <hr>
                <a href="logout.php"><button class="mainbutton logout">Logout</button></a>
            </div>
        </div>     
    </body>
</html>