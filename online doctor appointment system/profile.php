<?php
session_start();
include_once 'config.php';
if(!isset($_SESSION['patientSession']))
{
header("Location:main.php");
}
$usersession = $_SESSION['patientSession'];
$sql = "SELECT * FROM patient WHERE idpatient='$usersession'";
$result = mysqli_query($conn, $sql);
$userRow=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<?php
if (isset($_POST['submit'])) {

$patientFirstName = $_POST['patientFirstName'];
$patientLastName = $_POST['patientLastName'];
$patientMaritialStatus = $_POST['patientMaritialStatus'];
$patientDOB = $_POST['patientDOB'];
$patientGender = $_POST['patientGender'];
$patientAddress = $_POST['patientAddress'];
$patientPhone = $_POST['patientPhone'];
$patientEmail = $_POST['patientEmail'];
$patientId = $_POST['patientId'];


$res=mysqli_query($conn,"UPDATE patient SET patientFirstName='$patientFirstName', patientLastName='$patientLastName', patientMaritialStatus='$patientMaritialStatus', patientDOB='$patientDOB', patientGender='$patientGender', patientAddress='$patientAddress', patientPhone=$patientPhone, email='$patientEmail' WHERE idpatient='$usersession'");

header( 'Location: profile.php' ) ;
}
?>
<?php
$male="";
$female="";
if ($userRow['patientGender']=='male') {
$male = "checked";
}elseif ($userRow['patientGender']=='female') {
$female = "checked";
}
$single="";
$married="";
$separated="";
$divorced="";
$widowed="";
if ($userRow['patientMaritialStatus']=='single') {
$single = "checked";
}elseif ($userRow['patientMaritialStatus']=='married') {
$married = "checked";
}elseif ($userRow['patientMaritialStatus']=='separated') {
$separated = "checked";
}elseif ($userRow['patientMaritialStatus']=='divorced') {
$divorced = "checked";
}elseif ($userRow['patientMaritialStatus']=='widowed') {
$widowed = "checked";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
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
		
		<div style=" background-color: #EAEAEA !important;">
			<div style="padding-bottom: 190px; padding-top: 50px;">
				<div style="width: 60%;padding-left:22%">
						
                <div >
							<div style="background-color: white;padding:3%">
                            <div>
									<div style="background-color: white;padding:2%;">
									<h3 style="font-family:'Roboto', sans-serif;letter-spacing:3px;font-size:xx-large;font-weight:lighter">Patient Profile</h3>
									<br>
                                    <div >
												<div style="color: #333;background-color: #f5f5f5;border-color:#ddd;padding:2%"><h3> <?php echo $userRow['patientFirstName']; ?> <?php echo $userRow['patientLastName']; ?> </h3></div>
                                                <div style="padding: 3%;">
												<div style="padding: 2%;border-color: #ddd;border-style:solid">
										
										
										<table style="width: 100%;" align="center"  >
											<tbody>
												
												
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientMaritialStatus</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['patientMaritialStatus']; ?></td>
												</tr>
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientDOB</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['patientDOB']; ?></td>
												</tr>
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientGender</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['patientGender']; ?></td>
												</tr>
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientAddress</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['patientAddress']; ?>
													</td>
												</tr>
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientPhone</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['patientPhone']; ?>
													</td>
												</tr>
												<tr style="background-color:#dff0d8">
													<td style="padding: 1%;font-size:large">PatientEmail</td>
													<td style="padding: 1%;font-size:large" align="center"><?php echo $userRow['email']; ?>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div style="padding: 2%;" align="right">
									<button  type="button" style="padding: 1%;background-color:#286090;color:white;cursor:pointer" id="mybtn">Update Profile</button>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
							</div></div></div>
		</div>
					<div class="modal3" id="background">
								<div style="background-color:white;width:40%;margin-top:4%;margin-left:28%;padding: 2%;">
								<i class="close1 fas fa-times"></i>
									<div style="padding-top: 3%;">
										<h4  style="font-size:150%;font-family:Helvetica Neue,Helvetica;">Profile Update</h4>
									</div>
									<br><br>
									<div >
									<form action="<?php $_PHP_SELF ?>" method="post" >
											<table style="width: 100%;" >
												<tbody>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">IC Number:</td>
														<td style="padding: 1%;font-size:large"><?php echo $userRow['idpatient']; ?></td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">First Name:</td>
														<td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="patientFirstName" value="<?php echo $userRow['patientFirstName']; ?>"  /></td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Last Name</td>
														<td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="patientLastName" value="<?php echo $userRow['patientLastName']; ?>"  /></td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Maritial Status:</td>
														<td style="padding: 1%;">
															<div style="padding-top:1%">
																<label ><input type="radio"  name="patientMaritialStatus" value="single" <?php echo $single; ?>>Single</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="patientMaritialStatus" value="married" <?php echo $married; ?>>Married</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="patientMaritialStatus" value="separated" <?php echo $separated; ?>>Separated</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="patientMaritialStatus" value="divorced" <?php echo $divorced; ?>>Divorced</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="patientMaritialStatus" value="widowed" <?php echo $widowed; ?>>Widowed</label>
															</div>
														</td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">DOB</td>
										
														<td style="padding: 1%;">
														
																
																<div class="input-group">
																	
																		<i class="fa fa-calendar">
																		</i>
																	
																	<input style="border-style: none;font-size:large;background-color:#dff0d8" id="patientDOB" name="patientDOB" placeholder="YYYY/MM/DD" type="date" value="<?php echo $userRow['patientDOB']; ?>"/>
																</div>
														
														</td>
														
													</tr>
													
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Gender</td>
														<td style="padding: 1%;">
															<div class="radio">
																<label><input type="radio" name="patientGender" value="male" <?php echo $male; ?>>Male</label>
															</div>
															<div class="radio">
																<label><input type="radio" name="patientGender" value="female" <?php echo $female; ?>>Female</label>
															</div>
														</td>
													</tr>
												
													
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Phone number</td>
														<td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="patientPhone" value="<?php echo $userRow['patientPhone']; ?>"  /></td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Email</td>
														<td style="padding: 1%;"><input type="text" style="border-style: none;font-size:large;background-color:#dff0d8" name="patientEmail" value="<?php echo $userRow['email']; ?>"  /></td>
													</tr>
													<tr style="background-color:#dff0d8">
														<td style="padding: 1%;font-size:large">Address</td>
														<td style="padding: 1%;"><textarea style="border-style: none;font-size:large;background-color:#dff0d8" name="patientAddress"  ><?php echo $userRow['patientAddress']; ?></textarea></td>
													</tr>
													<tr>
													<td></td>
														<td style="padding: 1%;font-size:large">
														<input type="submit" style="padding: 1%;background-color:#286090;color:white;cursor:pointer" name="submit"  value="Update Info"></td>
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