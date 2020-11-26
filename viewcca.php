 <?php
include('config.php');
include('class/userClass.php');
$userClass = new userClass();
$userDetails=$userClass->userDetails($_SESSION['uid']);

include('session.php');
$userDetails=$userClass->userDetails($session_uid);

if ($_SESSION['uid']!="8888")
{
        $url=BASE_URL.'home.php';
	header("Location: $url");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link rel="stylesheet" type="text/css" href="css\style.css" charset="utf-8" />
<html lang="en">
    <head>
        <?php
        include "head.php";
        ?>
        <title>View CCAs</title>
        <style>
            @media screen and (max-width: 800px) {
                #footer{
                position: relative;
                left:0;
                bottom:0;
                width:100%;
            }
            }
            @media screen and (min-width: 801px) {
            html{
                height:100%;
                margin:0;
                padding:0;
            }

            body{
                height:100%;
                margin:0;
                padding:0;
            }

            #wrapper{
                min-height:100%;
                position:relative;
            }

            #footer{
                position: absolute;
                left:0;
                bottom:0;
                width:100%;
            }
}         
        </style>
    </head>
    <body>
        <div id="wrapper">
        <?php
        include "navbar.php";
        ?> 
    <main class="container">  
                	
<div class="settings">
  <h1>Administrator Settings</h1>
</div>
 <?php
$conn=mysqli_connect("localhost","sqldev","password","project");
		$query=$conn->prepare("select * from users, basketball where users.uid = basketball.uid;");
		$query->execute();
			$query->bind_result($uid,$email,$password,$username,$name,$profile_pic,$google_auth_code,$bid,$bname,$uid );
			echo "<table class='table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th scope='col'>UID</td>";
			echo "<th scope='col'>email</td>";
			echo "<th scope='col'>name</td>";
                        echo "<th scope='col'>CCA</td>";
                        echo "<th scope='col'>bid</td>";
                        echo "<th scope='col'>delete</td>";
			echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
			while($query->fetch())
			{
				echo "<tr>";
				echo "<td scope='col'>".$uid."</td>";
				echo "<td scope='col'>".$email."</td>";
				echo "<td scope='col'>".$username."</td>";
                                echo "<td scope='col'>".$bname."</td>";
                                echo "<td scope='col'>".$bid."</td>";
				echo "<td scope='col'><a href='deletecca.php?operation=delete&bid=".$bid."'>delete</a></td>";
				echo "</tr>";	
	
			}
                        echo "</tbody>";
echo "</table><br><br>";
?>
    </main>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div id="footer">
                <?php
                include "footer.php";
                ?>
            </div>
        </div>
</body>
</html>


