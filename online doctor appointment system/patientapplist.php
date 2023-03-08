<?php
session_start();
include_once 'config.php';
$session=$_SESSION[ 'patientSession'];
$res=mysqli_query($conn, "SELECT a.*, b.*,c.* FROM patient a
	JOIN appointment b
		On a.idpatient = b.patientIc
	JOIN doctorschedule c
		On b.scheduleId=c.scheduleId
	WHERE b.patientIc ='$session'");
	if (!$res) {
		die( "Error running $sql: " . mysqli_error());
	}
	$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
	<body>
    <div >
        <div class="ph" style="display: flex;">
        <table style="width: 40%;">
            <tr>
                <td align="center"><img src="img/logo.png" height="50" width="80" ></td>
                <td align="center"><button class="pl"><a href="patient.php" style="text-decoration: none;color:darkmagenta;" >Home</a></button></td>
                <td align="center"><button class="pl"><a href="patientapplist.php?idpatient=<?php echo $userRow['idpatient']; ?>" style="text-decoration: none;color:darkmagenta;">Appointment</a</button></td>
            </tr>
        </table>
        <div style="padding-left: 47%;padding-top:1.5%">
        <button class="pl" style="width: 120%;" id="small"><a href="#"  style="text-decoration: none;color:darkmagenta;"><i class="fa fa-user"></i> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><i class="fas fa-sort-down"></i></a></button>
        </div>
        </div>
        <div class="modal2" id=background2 style="width:100%;height:100%">
        <div class="bc" align="right">
            <ul style="list-style: none;">
                <li align="center"><button class="pg" style="width: 70%;color:darkmagenta;"><a href="profile.php?patientId=<?php echo $userRow['idpatient']; ?>" style="text-decoration:none;color: darkmagenta;"><i class="fa fa-user"></i>     Profile</a></button></li>
                <li align="center"><button class="pg" style="width: 70%;"><a style="text-decoration:none;color:darkmagenta;" href="patientapplist.php?patientId=<?php echo $userRow['idpatient']; ?>"><i class="far fa-calendar-check"></i>     Appointment</a></button></li>
                <li align="center"><button class="pg" style="width: 70%;"><a style="text-decoration:none;color:darkmagenta;" href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i>     Log Out</a></button></li>
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
		
			
				
<?php


echo "<div>";
echo "<div style='margin-left:3%;margin-top:3%;padding:1%;'>";
echo "<div >";
echo "<h1 style='font-family:Roboto, sans-serif;letter-spacing:2px;font-size:50px;font-weight:lighter'>Your appointment list. </h1>";
echo "</div>";
echo "<br><br>";
echo "<div style='border-style:solid;width:90%;border-color:#ddd;'>";
echo "<div style='background-color: #0c7cd5;color:white;'>";
echo "<h3 style='padding: 1%;font-family:Roboto, sans-serif;'>List of Appointment</h3>";
echo "</div>";
echo "<div style='padding:1%'>";
echo "<table style='width:100%'>";
echo "<thead>";
echo "<tr style='color: #666666;'>";
echo "<th style='padding:1%'>App Id</th>";
echo "<th>patientIc </th>";
echo "<th>patientLastName </th>";
echo "<th>scheduleDay </th>";
echo "<th>scheduleDate </th>";
echo "<th>startTime </th>";
echo "<th>endTime </th>";
echo "<th>Print </th>";
echo "</tr>";
echo "</thead>";
$res = mysqli_query($conn, "SELECT a.*, b.*,c.*
		FROM patient a
		JOIN appointment b
		On a.idPatient = b.patientIc
		JOIN doctorschedule c
		On b.scheduleId=c.scheduleId
		WHERE b.patientIc ='$session'");

if (!$res) {
die("Error running $sql: " . mysqli_error());
}


while ($userRow = mysqli_fetch_array($res)) {
echo "<tbody>";
echo "<tr style='background-color:#dff0d8' align='center'>";
echo "<td style='padding:1%'>" . $userRow['appId'] . "</td>";
echo "<td>" . $userRow['patientIc'] . "</td>";
echo "<td>" . $userRow['patientFirstName'] . "</td>";
echo "<td>" . $userRow['scheduleDay'] . "</td>";
echo "<td>" . $userRow['scheduleDate'] . "</td>";
echo "<td>" . $userRow['startTime'] . "</td>";
echo "<td>" . $userRow['endTime'] . "</td>";
echo "<td><a href='invoice.php?appid=".$userRow['appId']."'><button type='submit' aria-hidden='true'></button</a> </td>";
}

echo "</tr>";
echo "</tbody>";
echo "</table>";

?>
	</div>
</div>
</div>
</div>
</body>
</html>