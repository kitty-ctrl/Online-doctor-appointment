<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['doctorSession']))
{
header("doctor_login.php");
}
$usersession = $_SESSION['doctorSession'];
$res="SELECT * FROM doctor WHERE doctorId='$usersession'";
$result = mysqli_query($conn, $res);
$userRow=mysqli_fetch_array($result,MYSQLI_ASSOC);



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
        <div style="width: 25%;">
                    <ul class="nav side-nav" style="padding: 0.5%;padding-top:15%;">
                        <li class="active" align="center">
                            <a href="doctordashboard.php" style="color: white;text-decoration:none"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="active1" align="center">
                            <a href="addschedule.php" style="color: white;text-decoration:none"><i class="fa fa-fw fa-table"></i> Doctor Schedule</a>
                        </li>
                    </ul>
        </div>

            <div>
                <div style="margin-left:1%;margin-top:3%;padding:1%;">
                        <div>
                            <h2 style="font-family:'Roboto', sans-serif;letter-spacing:3px;font-size:xx-large;">
                            Dashboard
                            </h2>
                        </div>
                        <br>
                        <br>
                    <div>
                       <div style="background-color: #0c7cd5;color:white">
                        <h3 style="padding: 1%;font-family:'Roboto', sans-serif;">Appointment List</h3>
                        </div>
                        
                        <div style="padding-top: 2%;">
                        <table>
                            <thead>
                                <tr>
                                    <th style="padding:1%"><input type="text" class="form-control" placeholder="patient Ic" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Contact No." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Day" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Start" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="End" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Complete" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                </tr>
                            </thead>
                            
                            <?php 
                            $res=mysqli_query($conn,"SELECT a.*, b.*,c.*
                                                    FROM patient a
                                                    JOIN appointment b
                                                    On a.idPatient = b.patientIc
                                                    JOIN doctorschedule c
                                                    On b.scheduleId=c.scheduleId
                                                    Order By appId desc");
                                  if (!$res) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                }
                            while ($appointment=mysqli_fetch_array($res)) {
                                
                                if ($appointment['status']=='process') {
                                    $status="danger";
                                    $icon='remove';
                                    $checked='';

                                } else {
                                    $status="success";
                                    $icon='ok';
                                    $checked = 'disabled';
                                }
                                echo "<tbody>";
                                echo "<tr style='background-color:#dff0d8'>";
                                    echo "<td style='text-align:center;padding:1%'>" . $appointment['patientIc'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['patientLastName'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['patientPhone'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['email'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['scheduleDay'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['scheduleDate'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['startTime'] . "</td>";
                                    echo "<td style='text-align:center'>" . $appointment['endTime'] . "</td>";
                                    echo "<td style='text-align:center'><span class='glyphicon glyphicon-".$icon."' aria-hidden='true'></span>".' '."". $appointment['status'] . "</td>";
                                    echo "<form method='POST'>";
                                    echo "<td style='text-align:center'><input type='checkbox' name='enable' id='enable' value='".$appointment['appId']."' onclick='chkit(".$appointment['appId'].",this.checked);' ".$checked."></td>";
                                    echo "<td style='text-align:center'><a href='#' id='".$appointment['appId']."' class='delete'><input type='checkbox' aria-hidden='true'></input></a></td>";
                               
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div style='padding:2%;'align='right'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                       echo "<button style='background-color:#0c7cd5;color:white;font-size:16px;padding:0.5%' type='submit' value='Submit' name='submit'>Update</button>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                    </div>
                </div>
<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   req.open("GET", url, true);
   req.send(null);
}
</script>


 
                </div>
            </div>
        </div>

        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteappointment.php",
   data: info,
   success: function(){
 }
});
  $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
 }
return false;
});
});
</script>
       
    </body>
</html>