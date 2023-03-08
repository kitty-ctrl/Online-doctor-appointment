<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: main.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($conn,"SELECT * FROM doctor WHERE doctorId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
$doctorFirstName = $_POST['doctorFirstName'];
$doctorLastName = $_POST['doctorLastName'];
$doctorPhone = $_POST['doctorPhone'];
$doctorEmail = $_POST['doctorEmail'];
$doctorAddress = $_POST['doctorAddress'];

$res=mysqli_query($conn,"UPDATE doctor SET doctorFirstName='$doctorFirstName', doctorLastName='$doctorLastName', doctorPhone='$doctorPhone', doctorEmail='$doctorEmail', doctorAddress='$doctorAddress' WHERE doctorId=".$_SESSION['doctorSession']);

header( 'Location: doctorprofile.php' ) ;

}





?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
      
           <div>  
        <div class="ph" style="display: flex;">
        <table style="width: 40%;">
            <tr>
                <td align="center"><img src="img/logo.png" height="50" width="80" ></td>
                <td align="center"><button class="dl"><a style="text-decoration: none;color: darkmagenta;" href="doctordashboard.php">Welcome Dr <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></a></button></td>
            </tr>
        </table>
        <div style="padding-left: 47%;padding-top:1.5%">
        <button class="pl" style="width: 120%;" id="small"><a href="#"  style="text-decoration: none;color: darkmagenta;"><i class="fas fa-user-md"></i> <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?><i class="fas fa-sort-down"></i></a></button>
        </div>
        </div>
        <div class="modal2" id=background2 style="width:100%;height:100%">
        <div class="gc" align="right">
            <ul style="list-style: none;">
                <li align="center"><button class="pg" style="width: 70%;"><a href="doctorprofile.php" style="text-decoration: none;color: darkmagenta;"><i class="fa fa-user"></i>     Profile</a></button></li>
                <li align="center"><button class="pg" style="width: 70%;"><a href="logout.php?logout" style="text-decoration: none;color: darkmagenta;"><i class="fa fa-fw fa-power-off"></i>     Log Out</a></button></li>
            </ul> 
            </div>      
            </div>
            <script>
            var back = document.getElementById("background2");
            
            var btn = document.getElementById("small");
            
            btn.onclick = function() {
              back.style.display = "block";
            }
            
            back.onclick = function(event) {
              if (event.target == back) {
                back.style.display = "none";
              }
            }
            </script>
           </div>
           <div style="display: flex;">
        <div style="width: 15%;">
                    <ul class="nav side-nav" style="padding: 0.5%;padding-top:15%;">
                        <li class="active1" align="center">
                            <a href="doctordashboard.php" style="color: white;text-decoration:none"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="active1" align="center">
                            <a href="addschedule.php" style="color: white;text-decoration:none"><i class="fa fa-fw fa-table"></i> Doctor Schedule</a>
                        </li>
                    </ul>
        </div>
        <div style="margin-left:1%;margin-top:3%;padding:1%;width:100%">
                    
                    <div>
                            <h2 style="font-family:'Roboto', sans-serif;letter-spacing:3px;font-size:xx-large;">
                            Doctor Profile
                            </h2>
                        </div>
                        <br>
                        <br>
                    <div style="width: 100%;">

                    <div style="background-color: #0c7cd5;color:white">
                        <h3 style="padding: 1%;font-family:'Roboto', sans-serif;"> <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?></h3>
                        </div>

                        <div class="panel-body">
                          <div >
            <section style="padding-bottom: 50px; padding-top: 50px;box-shadow: 8px 8px 8px gainsboro, 8px 8px 8px gainsboro;">
                <div>
                        
                        <div >
                            <div > 
                                    <div style="padding-left:20%">
                                        
                                        
                                        <table style="width:70%" >
                                            <tbody>
                                                
                                                
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">Doctor ID</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['doctorId']; ?></td>
                                                </tr>
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">IC Number</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['icDoctor']; ?></td>
                                                </tr >
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">Address</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['doctorAddress']; ?></td>
                                                </tr>
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">Contact Number</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['doctorPhone']; ?>
                                                    </td>
                                                </tr>
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">Email</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['doctorEmail']; ?>
                                                    </td>
                                                </tr>
                                                <tr style="background-color:#dff0d8">
                                                    <td style="padding: 1%;font-size:large">Birthdate</td>
                                                    <td style="padding: 1%;font-size:large"><?php echo $userRow['doctorDOB']; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="padding: 2%;padding-left:60%" >
									<button  type="button" style="padding: 1%;background-color:#286090;color:white;cursor:pointer" id="mybtn">Update Profile</button>
									</div>
                                
                            </div>
                            
                        </div>
                    <div class="modal3" id="background">

                    <div style="background-color:white;width:40%;margin-top:7%;margin-left:25%;padding: 2%;box-shadow: 8px 8px 8px gainsboro, 8px 8px 8px gainsboro;">
								<i class="close1 fas fa-times"></i>
									<div style="padding-top: 3%;">
										<h4  style="font-size:150%;font-family:Helvetica Neue,Helvetica;">Profile Update</h4>
									</div>
                            <br><br>
                                    <div >
                        
                                        <form action="<?php $_PHP_SELF ?>" method="post" >
                                            <table  style="width: 100%;">
                                                <tbody>
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">IC Number:</td>
                                                        <td style="padding: 1%;font-size:large"><?php echo $userRow['icDoctor']; ?></td>
                                                    </tr>
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">First Name:</td>
                                                        <td style="padding: 1%;"><input type="text" style="border-style:none;font-size:large;background-color:#dff0d8" name="doctorFirstName" value="<?php echo $userRow['doctorFirstName']; ?>"  /></td>
                                                    </tr>
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">Last Name</td>
                                                        <td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="doctorLastName" value="<?php echo $userRow['doctorLastName']; ?>"  /></td>
                                                    </tr>
                                        
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">Phone number</td>
                                                        <td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="doctorPhone" value="<?php echo $userRow['doctorPhone']; ?>"  /></td>
                                                    </tr>
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">Email</td>
                                                        <td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="doctorEmail" value="<?php echo $userRow['doctorEmail']; ?>"  /></td>
                                                    </tr>
                                                    <tr style="background-color:#dff0d8">
                                                        <td style="padding: 1%;font-size:large">Address</td>
                                                        <td style="padding: 1%;"><textarea style="border-style: none;font-size:large;background-color:#dff0d8" name="doctorAddress"  ><?php echo $userRow['doctorAddress']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td style="padding: 1%;font-size:large" >
                                                            <input type="submit" style="padding: 1%;background-color:#286090;color:white;cursor:pointer" name="submit" value="Update Info"></td>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                                
                                                
                                            </form>
                                </div>
                            </div>
                            <br /><br/>
                        </div>
                        
                    </div>
                        </div>
        </div>
                </div>
            </div>
            <script>
            var bak = document.getElementById("background");
            
            var bn = document.getElementById("mybtn");
            
            var span = document.getElementsByClassName("close1")[0];
            
            bn.onclick = function() {
              bak.style.display = "block";
            }
            
            span.onclick = function() {
              bak.style.display = "none";
            }
            
            bak.onclick = function(event) {
              if (event.target == bak) {
                bak.style.display = "none";
              }
            }
            </script>
    </body>
</html>