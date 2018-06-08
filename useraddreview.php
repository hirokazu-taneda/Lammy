<?php
session_start();

include 'dblammy.php';

//$restaurantid = $_GET["restaurantid"];

$restaurantid = 1;
$userid = 1;
$errorcode = 0;
$errmsg = "";
$y = 0;

$uploadmsg1 = array("", "", "", "");
$uploadmsg2 = array("", "", "", "");
$uploadmsg3 = array("", "", "", "");
$uploadmsg4 = array("", "", "", "");


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


if(isset($_POST["reviewsubmit"])) {

    if(isset($_POST["starrate"])){
        $starrate = $_POST["starrate"];
    } else {
        $errmsg = "Please set star rating.";
        $errorcode = 1;
    }
    
    $review = $_POST["reviewcomment"];
    $reviewcomment = addslashes($review);
    $rev[0] = $_FILES["rev1"]["name"];
    $rev[1] = $_FILES["rev2"]["name"];
    $rev[2] = $_FILES["rev3"]["name"];
    $rev[3] = $_FILES["rev4"]["name"];

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
                    $uploadmsg1[$y] =  "File is not an image.";
                    $uploadOk = 0;
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
                $uploadmsg2[$y] = "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadmsg3[$y] = "Sorry, only JPG, JPEG & PNG files are allowed.";
                $uploadOk = 0;
            }
        } 

        $uploadOcheck[$y] = $uploadOk;
        $y++;

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["rev$x"]["tmp_name"], $uploadfile)) {
                echo "The file ". basename( $_FILES["rev$x"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }

    echo $uploadOcheck[0] . "<br>";
    echo $uploadOcheck[1] . "<br>";
    echo $uploadOcheck[2] . "<br>";
    echo $uploadOcheck[3] . "<br>";





    // if($errorcode == 0) {
    //     $sql_savereview = "INSERT INTO addreview (userid, restaurantid, star, comment, pic1, pic2, pic3, pic4) VALUES ('$userid','$restaurantid','$starrate','$reviewcomment','$rev1','$rev2','$rev3','$rev4')";

    //     if ($conn->query($sql_savereview) === TRUE) {
    //         header("Location: userrestaurantdetail.php");
    //     } else {
    //         $errmsg = "Error during Adding Review: " . $conn->error;
    //     }
    // }
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
                            <span style="color: red;"><?php echo $errmsg; ?></span>
                            <span style="color: red;">
                                <?php 
                                    for($z = 0; $z <= 3 ; $z++){
                                        echo $uploadmsg1[$z];
                                        echo $uploadmsg2[$z]; 
                                        echo $uploadmsg3[$z]; 
                                        echo $uploadmsg4[$z];   
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
                <button class="mainbutton logout">Logout</button>
            </div>
        </div>     
    </body>
</html>