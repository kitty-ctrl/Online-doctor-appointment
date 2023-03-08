<?php 
include 'config.php';

session_start();

if (isset($_POST['login']))
{
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password  = mysqli_real_escape_string($conn,$_POST['password']);

$sql = "SELECT * FROM patient WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) 
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['patientSession'] = $row['idpatient'];
echo"<script>alert('Login Success')</script>";
    echo "<script>location.replace('patient.php');</script>";
} 
else {
echo "<script>alert('wrong password please check your password ');</script>";
}
}
else{
	echo"<script>alert('User does not exist please SignUp')</script>";
}
}
?>

<?php include('hedder.php'); ?>
<div id="background1">
	<div class="login">
	<a href="main.php"><i class="clos-btn fas fa-times"></i></a><br/><br/><br/>
	<h1 align="center" style="color: purple;">PATIENT</h1><br/>
		<div style="padding-left:40%">
		<i class="fas fa-user-injured" style="font-size: 60px;color:crimson"></i><br/><br/><br/>
		</div>
		<form enctype="multipart/form-data" method="post" role="form">
			 <div class="fields">
				 <div class="email">
					 <label>
					 <i class="far fa-id-badge" style="margin:15px 10px -3px 25px;font-size:120%;color:crimson"></i>
						 <input type="email" name="email"  class="e-input" value="" placeholder="email" required>
					</label><br><br>
				 </div><br/><br/>
					<div class="email">
					<label>
					<i class="fas fa-key" style="margin:15px 10px -3px 25px;font-size:120%;color:crimson"></i>
						<input type="password" name="password" class="pass-input"  value="" placeholder="password" required>
					</label><br><br>
					</div>
					<br/><br/>
					
					<button name="login" type="login" placeholder="login" class="signin-button">Login</button> <br>
			 </div>


				</form>
				<div class="link">
                  Don't have account? <a href="signup.php">SignUp Now</a>
				</div>
		
	</div>
</div>
</div>
<div>
<?php include('footer.php'); ?>
</div>
</body>
</html>
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
	


	
	
