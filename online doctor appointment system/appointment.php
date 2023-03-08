<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['patientSession']))
{
header("Location:main.php");
}
$session= $_SESSION['patientSession'];
if (isset($_GET['scheduleDate']) && isset($_GET['appid'])) {
	$appdate =$_GET['scheduleDate'];
	$appid = $_GET['appid'];
}
$sqli ="SELECT a.*, b.* FROM doctorschedule a INNER JOIN patient b
WHERE a.scheduleDate='$appdate' AND scheduleId='$appid' AND b.idpatient='$session'";
$res = mysqli_query($conn, $sqli);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);

if (isset($_POST['appointment'])) {
$patientIc = mysqli_real_escape_string($conn,$userRow['idpatient']);
$scheduleid = mysqli_real_escape_string($conn,$appid);
$symptom = mysqli_real_escape_string($conn,$_POST['symptom']);
$comment = mysqli_real_escape_string($conn,$_POST['comment']);
$avail = "notavail";


$query = "INSERT INTO appointment (  patientIc , scheduleId , appSymptom , appComment  )
VALUES ( '$patientIc', '$scheduleid', '$symptom', '$comment') ";

$sql = "UPDATE doctorschedule SET bookAvail = '$avail' WHERE scheduleId = $scheduleid" ;
$scheduleres=mysqli_query($conn,$sql);
if ($scheduleres) {
	$btn= "disable";
} 


$result = mysqli_query($conn,$query);
if( $result )
{
?>
<script type="text/javascript">
alert('Appointment made successfully.');
</script>
<?php
header("Location: patientapplist.php");
}
else
{
	echo mysqli_error($conn);
?>
<script type="text/javascript">
alert('Appointment booking fail. Please try again.');
</script>
<?php
header("Location:patient.php");
}
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointment</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
	<body>
    <div style="background-color: #EAEAEA !important;">
        <div class="ph" style="display: flex;">
        <table style="width: 40%;">
            <tr>
                <td align="center"><img src="img/logo.png" height="50" width="80" ></td>
                <td align="center"><button class="pl"><a href="patient.php" style="text-decoration: none;color: darkmagenta;" >Home</a></button></td>
                <td align="center"><button class="pl"><a href="patientapplist.php?idpatient=<?php echo $userRow['idpatient']; ?>" style="text-decoration: none;color:darkmagenta;">Appointment</a</button></td>
            </tr>
        </table>
        <div style="padding-left: 47%;padding-top:1.5%">
        <button class="pl" style="width: 120%;" id="small"><a href="#"  style="text-decoration: none;color: darkmagenta;"><i class="fa fa-user"></i> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?><i class="fas fa-sort-down"></i></a></button>
        </div>
        </div>
        <div class="modal2" id=background2 style="width:100%;height:100%">
        <div class="bc" align="right">
            <ul style="list-style: none;">
                <li align="center"><button class="pg" style="width: 70%;"><a href="profile.php?patientId=<?php echo $userRow['idpatient']; ?>" style="text-decoration:none;color: darkmagenta;"><i class="fa fa-user"></i>     Profile</a></button></li>
                <li align="center"><button class="pg" style="width: 70%;"><a style="text-decoration:none;color: darkmagenta;" href="patientapplist.php?idpatient=<?php echo $userRow['idpatient']; ?>"><i class="far fa-calendar-check"></i>     Appointment</a></button></li>
                <li align="center"><button class="pg" style="width: 70%;"><a style="text-decoration:none;color: darkmagenta;" href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i>     Log Out</a></button></li>
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
		<div>
			<section style="padding-bottom: 50px; padding-top: 50px;" >
					<div style="width: 75%;padding-left:13%">	
							
						
						<div>
							<div style="background-color: white;padding:3%">
								
								
								<div>
									<div style="background-color: white;padding:2%;border-color: #ddd;border-style:solid">
										
										
										<form class="form" role="form" method="POST" accept-charset="UTF-8">
											<div style="border-color:#ddd;border-style:solid;">
												<div style="color: #333;background-color: #f5f5f5;border-color:#ddd;border-style:dotted;padding:2%"><h3>Patient Information</h3></div>
												<div style="padding: 2%;">
												<div style="padding: 2%;">
													Patient Name: <?php echo $userRow['patientFirstName'] ?> <?php echo $userRow['patientLastName'] ?><br>
													</div>
													<div style="padding-left: 2%;">
													Patient IC: <?php echo $userRow['idpatient'] ?><br>
													</div>
													<div style="padding: 2%;">
													Contact Number: <?php echo $userRow['patientPhone'] ?><br>
													</div>
													<div style="padding-left: 2%;">
													Address: <?php echo $userRow['patientAddress'] ?>
													</div>
												</div>
											</div>
											<br><br>
											<div style="border-color:#ddd;border-style:solid;">
												<div style="color: #333;background-color: #f5f5f5;border-color:#ddd;border-style:dotted;padding:2%"><h3>Appointment Information</h3></div>
												<div style="padding: 2%;">
												<div style="padding: 2%;">
													Day: <?php echo $userRow['scheduleDay'] ?><br>
												</div>
												<div style="padding-left: 2%;">
													Date: <?php echo $userRow['scheduleDate'] ?><br>
												</div>
												<div style="padding: 2%;">
													Time: <?php echo $userRow['startTime'] ?> - <?php echo $userRow['endTime'] ?><br>
												</div>
												</div>
											</div>
											<br><br>
											
											<div>
												<label for="recipient-name"><h3>Symptom:</h3></label><br>
												<input type="text" style="border-style: solid;border-color:#ddd;width:100%;height: 6%;" name="symptom" required>
											</div>
											<br><br>
											<div >
												<label for="message-text"><h3>Comment:</h3></label>
												<textarea style="border-style: solid;border-color:#ddd;width:100%;height: 8%" name="comment" required></textarea>
											</div>
											<br>
											<br>
											<div >
												<input type="submit" name="appointment" id="submit" style="background-color:#0c7cd5;color:white;font-size:16px;padding:1%;cursor:pointer" value="Make Appointment">
											</div>
										</form>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
					
				</body>
			</html>