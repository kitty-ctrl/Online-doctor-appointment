<?php
include 'config.php';

session_start();
if (isset($_POST['login']))
{
$doctorId = mysqli_real_escape_string($conn,$_POST['doctorId']);
$password  = mysqli_real_escape_string($conn,$_POST['password']);

$res = mysqli_query($conn,"SELECT * FROM doctor WHERE doctorId = '$doctorId'");

$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
	$_SESSION['doctorSession'] = $row['doctorId'];
	echo"<script>alert('Login Success')</script>";
    echo "<script>location.replace('doctordashboard.php');</script>";
} 
else {
echo"<script>alert('Wrong input');</script>";
}
}
?>
    <?php include('hedder.php'); ?>
    <div id="background1">
	<div class="login">
	<a href="main.php"><i class="clos-btn fas fa-times"></i></a><br/><br/><br/>
	<h1 align="center" style="color: purple;">DOCTOR</h1><br/>
    <div style="padding-left:40%">
		<i class="fas fa-user-md" style="font-size: 60px;color:crimson"></i><br/><br/><br/>
		</div>
		<form enctype="multipart/form-data" method="post" role="form">
			 <div class="fields">
				 <div class="email">
					 <label>
					 <i class="far fa-id-badge" style="margin:15px 10px -3px 25px;font-size:120%;color:crimson"></i>
						 <input type="text" name="doctorId"  class="e-input" value="" placeholder="Doctor ID" required>
					</label><br><br>
				 </div><br/><br/>
					<div class="email">
					<label>
					<i class="fas fa-key" style="margin:15px 10px -3px 25px;font-size:120%;color:crimson"></i>
						<input type="password" name="password" class="pass-input"  value="" placeholder="Password" required>
					</label><br><br>
					</div>
					<br/><br/>
					
					<button name="login" type="login" placeholder="login" class="signin-button">Login</button> <br>
			 </div>

                </div>
        </div>
        <script>
            var back = document.getElementById("background1");
            
            back.onclick = function(event) {
              if (event.target == back) {
                back.style.display = "none";
              }
            }
            </script>
            

	</body>
	</html>