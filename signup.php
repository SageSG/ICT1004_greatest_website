<?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$userDetails = $userClass->userDetails($_SESSION['uid']);
include('session.php');
$userDetails = $userClass->userDetails($session_uid);

$errorMsg = '';

if (!empty($_POST['cca'])) {
    //database connection
    $servername = "localhost";
    $username = "sqldev";
    $password = "password";
    $dbname = "project";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //insert value to database
    $uid = $_POST['uid'];
    $bname = $_POST['bname'];
    $stmt = $conn->prepare("INSERT INTO basketball(bname,uid) VALUES (?,?)");
    $stmt->bind_param("si", $bname, $uid);
    $stmt->execute();
    //result
    echo "New records created successfully";
    //close connection
    $stmt->close();
    $conn->close();
}

if (!empty($_POST['dele'])) {
    //database connection
    $servername = "localhost";
    $username = "sqldev";
    $password = "password";
    $dbname = "project";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = $conn->prepare("select * from users, basketball where users.uid = basketball.uid;");
    $query->execute();
    $query->bind_result($uid, $email, $password, $username, $name, $profile_pic, $google_auth_code, $bid, $bname, $uid);
    while ($query->fetch()) {
        $bid;
    }
    if ($bid != null) {
        $bid;
        $query2 = $conn->prepare("delete from project.basketball where bid=" . $bid);
        if ($query2->execute()) {
            echo "Removed from basketball cca";
        }
        $query2->close();
    }
    //close connection
    $query->close();
    //$query2->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <?php
        include "head.php";
        ?>
        <title>Basketball</title>
        <link rel="stylesheet" href="css/basketball.css">
    </head>
    <body>
        <?php
        include "navbar.php";
        ?>
        <main>

            <button onclick="topFunction()" id="myBtn" title="Go to top">Top <img src="images/download.png" width="25px"></button>

            <section class="bb-part1">
                <section class="bb-header">
                    <div class="bb-content">
                        <h4 style="font-size:1.8vw;">Miracle's</h4>
                        <hr class="bb">
                        <h1 style="font-size:5vw;">Basketball</h1>
                        <hr class="bb">             
                        <?php
                        if ($_SESSION['uid']) {
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='uid' value='" . $_SESSION['uid'] . "'>";
                            echo "<input type='hidden' name='bname' value='basketball'>";
                            echo "<input type='submit' class='btn btn-primary btn-lg' name='cca' value='Direct Signup'>";
                            echo "</form>";
                            echo "<br>";
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='uid' value='" . $_SESSION['uid'] . "'>";
                            echo "<input type='submit' class='btn btn-primary btn-lg' name='dele' value='Cancel Signup'>";
                            echo "</form>";
                        }
                        ?>
                    </div>
                </section>  
            </section>

            <section class="bb-part2">
                <div class="bb-part2-text">
                    <h1 class="bb-centered2">About Basketball<hr class="ba"></h1>

                    <p style="font-size:2vw;"> 
                        Basketball is a sport played by two teams of five players on a rectangular court. The objective is to shoot a ball through a hoop 18 inches (46 cm) in diameter and 10 feet (3.048 m) high mounted to a backboard at each end.
                    </p>
                </div>
            </section>

            <!--This is the achievement section!-->
            <section class="bb-part3">
                <img src="images/trophies2.jpg" alt="Trophies" usemap="#workmap" width="100%;" height="auto;">
                <map name="workmap" id="map_ID">
                    <area shape="poly" coords="838,64,876,34,906,64,845,191,784,256,894,554,617,554,733,258,607,78,644,34,682,67" alt="2020 Champions - Jr. bryant" data-toggle="modal" data-target="#Trophy1">
                    <div class="modal fade" id="Trophy1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">2020 Champion Trophy</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="trophy-logos" src="images/kobe.png" alt="Jr Bryants logo">
                                    <hr>
                                    Won by Jr. Bryant
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue</button>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    <area shape="poly" coords="1049,70,1080,73,1091,101,1274,101,1291,59,1333,81,1299,167,1240,229,1222,250,1218,306,1199,318,1230,453,1243,497,1265,509,1265,536,1156,545,1097,528,1097,500,1120,491,1140,440,1160,320,1141,302,1141,255,1079,176,1030,102" alt="Most popular team - team titans" data-toggle="modal" data-target="#Trophy2">
                    <div class="modal fade" id="Trophy2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Highest popularity Trophy</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="trophy-logos" src="images/titans.png" alt="titans logo">
                                    <hr>
                                    Won by Team Titans
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue</button>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    <area shape="poly" coords="451,62,484,79,467,154,429,217,374,285,372,346,361,367,407,456,417,534,280,533,286,469,334,368,325,340,329,283,270,211,218,107,223,77,254,67,257,89,350,86,433,92" alt="Game of the year - Game Throwers" data-toggle="modal" data-target="#Trophy3">
                    <div class="modal fade" id="Trophy3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Game of the Year</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img class="trophy-logos" src="images/gamet.png" alt="Game throwers logo">
                                    <hr>
                                    Won by Game Throwers
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Continue</button>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </map>
            </section>

            <script>
                var ImageMap = function (map) {
                    var n,
                            areas = map.getElementsByTagName('area'),
                            len = areas.length,
                            coords = [],
                            previousWidth = 1519;
                    for (n = 0; n < len; n++) {
                        coords[n] = areas[n].coords.split(',');
                    }
                    this.resize = function () {
                        var n, m, clen,
                                x = document.body.clientWidth / previousWidth;
                        for (n = 0; n < len; n++) {
                            clen = coords[n].length;
                            for (m = 0; m < clen; m++) {
                                coords[n][m] *= x;
                            }
                            areas[n].coords = coords[n].join(',');
                        }
                        previousWidth = document.body.clientWidth;
                        return true;
                    };
                    window.onresize = this.resize;
                },
                        imageMap = new ImageMap(document.getElementById('map_ID'));
                imageMap.resize();
            </script>        

            <?php
            if ($_SESSION['uid']) {
            
            }else{
                include "interestform.php";
            }
            
            ?>

        </main>
        <?php
        include "footer.php";
        ?>
    </body>
</html>


