<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location:main.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($conn,"SELECT * FROM doctor WHERE doctorId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
$date = mysqli_real_escape_string($conn,$_POST['date']);
$scheduleday  = mysqli_real_escape_string($conn,$_POST['scheduleday']);
$starttime     = mysqli_real_escape_string($conn,$_POST['starttime']);
$endtime     = mysqli_real_escape_string($conn,$_POST['endtime']);
$bookavail         = mysqli_real_escape_string($conn,$_POST['bookavail']);

$query = " INSERT INTO doctorschedule (  scheduleDate, scheduleDay, startTime, endTime,  bookAvail)
VALUES ( '$date', '$scheduleday', '$starttime', '$endtime', '$bookavail' ) ";

$result = mysqli_query($conn, $query);
if( $result )
{
?>
<script type="text/javascript">
alert('Schedule added successfully.');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Added fail. Please try again.');
</script>
<?php
}

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
                    <ul class="side-nav" style="padding: 0.5%;padding-top:15%;">
                        <li class="active1" align="center">
                            <a href="doctordashboard.php" style="color: white;text-decoration:none"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="active" align="center">
                            <a href="addschedule.php" style="color: white;text-decoration:none"><i class="fa fa-fw fa-table"></i> Doctor Schedule</a>
                        </li>
                    </ul>
        </div>

        <div>
                <div style="margin-left:1%;margin-top:3%;padding:1%;">
                    
                    <div>
                    <h2 style="font-family:'Roboto', sans-serif;letter-spacing:3px;font-size:xx-large;">
                            Doctor Schedule
                            </h2>
                        </div>
                        <br>
                        <br>
                    <div>
                        <div style="background-color: #0c7cd5;color:white">
                        <h3 style="padding: 1%;font-family:'Roboto', sans-serif;">Add Schedule</h3>
                        </div>

                        <div>
                            <br>
                               <div style="box-shadow: 8px 8px 8px gainsboro, 8px 8px 8px gainsboro; background-image: radial-gradient(rgb(255, 255, 255),rgb(166, 199, 204)); ">
                                <form class="form-horizontal" method="post">
                                    <br>
                                 <div style="padding-left: 3%;display:flex">
                                  <label style="font-size: larger;font-weight:bold" for="date">
                                   Date
                                   <span style="color: red;">
                                    *
                                   </span>
                                  </label>
                                   <div style="display:flex;padding-left: 10%;">
                                    <div class="input-group-addon">
                                     <i class="fa fa-calendar">
                                     </i>
                                    </div>
                                    <input style="background-color: bisque;border:none" id="date" name="date" type="date" required/>
                                   </div>
                                 </div>
                                 <div style="padding-left: 3.5%;display:flex;padding-top:3%">
                                  <label style="font-size: larger;font-weight:bold" for="scheduleday">
                                   Day
                                   <span style="color: red;">
                                    *
                                   </span>
                                  </label>
                                  <div style="padding-left: 10%;">
                                   <select  style="background-color: bisque;width:150%;font-size:large;border:none" id="scheduleday" name="scheduleday" required>
                                    <option value="Monday">
                                     Monday
                                    </option>
                                    <option value="Tuesday">
                                     Tuesday
                                    </option>
                                    <option value="Wednesday">
                                     Wednesday
                                    </option>
                                    <option value="Thursday">
                                     Thursday
                                    </option>
                                    <option value="Friday">
                                     Friday
                                    </option>
                                    <option value="Saturday">
                                     Saturday
                                    </option>
                                    <option value="Sunday">
                                     Sunday
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div style="padding-left: 3%;display:flex;padding-top:3%">
                                  <label style="font-size: larger;font-weight:bold" for="starttime">
                                   Start Time
                                   <span style="color: red;">
                                    *
                                   </span>
                                  </label>

                                  <div style="display:flex;padding-left: 5.5%;">
                                    <div class="input-group-addon">
                                    <i class="far fa-clock"></i>
                                    </div>
                                    <input style="background-color: bisque;width:200%;font-size:large;border:none" id="starttime" name="starttime" type="time" required/>
                                   </div>
                                 </div>
                                 <div style="padding-left: 3%;display:flex;padding-top:3%">
                                  <label style="font-size: larger;font-weight:bold" for="endtime">
                                   End Time
                                   <span style="color: red;">
                                    *
                                   </span>
                                  </label>
                                  <div style="display:flex;padding-left: 6%;">
                                    <div class="input-group-addon">
                                    <i class="far fa-clock"></i>
                                    </div>
                                    <input style="background-color: bisque;width:150%;font-size:large;border:none" id="endtime" name="endtime" type="time" required/>
                                   </div>
                                 </div>
                                 <div style="padding-left: 3%;display:flex;padding-top:3%">
                                  <label style="font-size: larger;font-weight:bold" for="bookavail">
                                   Availabilty
                                   <span style="color: red;">
                                    *
                                   </span>
                                  </label>
                                  <div style="padding-left: 5.8%;">
                                   <select style="background-color: bisque;width:150%;font-size:large;border:none" id="bookavail" name="bookavail" required>
                                    <option value="available">
                                     available
                                    </option>
                                    <option value="notavail">
                                     notavail
                                    </option>
                                   </select>
                                  </div>
                                 </div>
                                 <div style="margin-left:18%;padding-top:2%;">
                                   <button style="background-color:#0c7cd5;color:white;font-size:16px;padding:0.5% ;cursor:pointer" name="submit" type="submit">
                                    Submit
                                   </button>
                                 </div>
                                </form>
                            </div>                        
                        </div>
                    </div>
                    <br><br>
                 
                    <div>

                        <div style="background-color: #0c7cd5;color:white">
                            <h3 style="padding: 1%;font-family:'Roboto', sans-serif;">List of Patients</h3>
                            
                        </div>

                        <div style="padding-top: 2%;">
                        <table >
                            <thead>
                                <tr >
                                    <th style="padding:1%"><input type="text" class="form-control" placeholder="scheduleId" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="scheduleDate" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="scheduleDay" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="startTime." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="endTime" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="bookAvail" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                </tr>
                            </thead>
                            
                            <?php 
                            $result=mysqli_query($conn,"SELECT * FROM doctorschedule");
                            

                                  
                            while ($doctorschedule=mysqli_fetch_array($result)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr style='background-color:#dff0d8'>";
                                    echo "<td style='text-align:center;padding:1%'>" . $doctorschedule['scheduleId'] . "</td>";
                                    echo "<td style='text-align:center'>" . $doctorschedule['scheduleDate'] . "</td>";
                                    echo "<td style='text-align:center'>" . $doctorschedule['scheduleDay'] . "</td>";
                                    echo "<td style='text-align:center'>" . $doctorschedule['startTime'] . "</td>";
                                    echo "<td style='text-align:center'>" . $doctorschedule['endTime'] . "</td>";
                                    echo "<td style='text-align:center'>" . $doctorschedule['bookAvail'] . "</td>";
                                    echo "<form method='POST'>";
                                    echo "<td style='text-align:center'><a href='#' id='".$doctorschedule['scheduleId']."' class='delete'><input type='checkbox' aria-hidden='true'></input></a>
                            </td>";
                               
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                        ?>
                        </div>
                    </div>
                </div>
            </div>

 <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var id = element.attr("id");
var info = 'id=' + id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteschedule.php",
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