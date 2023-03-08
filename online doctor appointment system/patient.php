<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['patientSession']))
{
header("Location:patient_login.php");
}
$usersession = $_SESSION['patientSession'];
$sql = "SELECT * FROM patient WHERE idpatient='$usersession'";
$result = mysqli_query($conn, $sql);
$userRow=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online doctor appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="body1">
        <div class="ph" style="display: flex;">
        <table style="width: 40%;">
            <tr>
                <td align="center"><img src="img/logo.png" height="50" width="80" ></td>
                <td align="center"><button class="pl"><a href="#" style="text-decoration: none;color: darkmagenta;" >Home</a></button></td>
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
            <section id="promo-1" class="content-block promo-1 min-height-600px bg-offwhite">
			<div class="container2" style="font-family:'Roboto', sans-serif;">
				<div class="row">
						
						
						<?php if ($userRow['patientMaritialStatus']=="") {
					
								echo "<div>";
                echo "<div style='width:50%;background-color:#F2DEDE;;font-size:20px;padding:1%;color:crimson;'>";
									echo " <i class='fa fa-info-circle'></i>  <strong>Please complete your profile.</strong>" ;
                  echo "</div>";
							
							} else {
							}
							?>
							<h2 style="padding: 1%;letter-spacing:1px;">Hey <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?>. Make appointment today!</h2>
							<div class="input-group" style="margin-bottom:10px;display:flex">
								<div class="input-group-addon">
									<i class="fa fa-calendar" ></i>
								</div>
								<input type="date" style="width: 49%;background-color:#dff0d8;border-style: none;font-size:large;"  id="date" name="date" value="<?php echo date("Y-m-d")?>" onchange="showUser(this.value)"/>
							</div>
						<script>
						function showUser(str) {
						
						if (str == "") {
						document.getElementById("txtHint").innerHTML = "No data to be shown";
						return;
						} else {
						if (window.XMLHttpRequest) {
						xmlhttp = new XMLHttpRequest();
						} else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
						}
						};
						xmlhttp.open("GET","getschedule.php?q="+str,true);
						console.log(str);
						xmlhttp.send();
						}
						}
						</script>
						
							<div >
								<div style="width:100%;font-size:20px;padding:1%;">
									<div id="txtHint"></div>
								</div>
							</div>
					</div>
				</div>
			</div>
		</section>
    </div>
    </body>
</html>