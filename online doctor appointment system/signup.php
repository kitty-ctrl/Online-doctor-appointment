<?php
	include('config.php');
    session_start();
	if(isset($_POST['signup']))
    {
    $patientFirstName = $_POST['patientFirstName'];
    $patientLastName = $_POST['patientLastName'];
	$email = $_POST['email'];
    $patientGender = $_POST['patientGender'];
    $month = $_POST['month'];
     $day  = $_POST['day'];
     $year = $_POST['year'];
     $patientDOB = $year . "-" . $month . "-" . $day;
	$password = ($_POST['password']);
	$cpassword = ($_POST['confirm_password']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM patient WHERE email='$email'";
		$result = mysqli_query($conn, $sql);	
      if ($result->num_rows > 0) {
	 echo "<script>alert('Sorry, user already exist!');</script>";
     if ($conn->query($sql) == TRUE) {
        echo "<script>location.replace('signup.php');</script>";
       } else {
        echo "<script>alert('There was an Error')<script>" . $sql . "<br>" . $conn->error;
       }
	 }
	else{
        $idpatient=uniqid();
	$sql = "INSERT INTO patient (password, patientFirstName, patientLastName,  patientDOB, patientGender, email,idpatient)
	VALUES ('$password', '$patientFirstName', '$patientLastName','$patientDOB','$patientGender','$email','$idpatient')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Wow! User Registration Completed.');</script>";
        echo "<script>location.replace('patient_login.php');</script>";
    } else {
        echo "<script>alert('Woops! Something Wrong Went.')</script>";
    }
    }
} 
else {
    echo "<script>alert('Password Not Matched.')</script>";
}
    }
?> 


<?php include('hedder.php'); ?>
<div id="background1">
	<div class="signu">
	<a href="patient_login.php"><i class="clos-btn fas fa-times" style="color: black;"></i></a><br/>
	<h1 style="color: purple;padding-left:4%;font-family: 'Roboto', sans-serif;letter-spacing:2px">Sign Up</h1><br/><br/>
	<h3 style="color: purple;padding-left:4%;font-family: 'Roboto', sans-serif;letter-spacing:2px">It's free and always will be.</h3><br/>
		<form enctype="multipart/form-data" method="post" role="form">
		<div class="fields1" style="display: flex;">
				 <div class="email" style="width:45%;">
					 <label>
						 <input style="width: 80%;" type="Firstname" name="patientFirstName"   value="" placeholder="Firstname" required>
					</label>
				 </div>
				 <div style="padding-left: 4%;">
					<div class="email" style="width:130%;padding-top:3%;padding-left:4%;">
					<label>
						<input style="width: 80%;" type="Lastname" name="patientLastName"  value="" placeholder="Lastname" required>
					</label>
					<br/><br/>
					</div>
					</div>
					<br/><br/>
					</div>
					<br/>
					<div class="fields">
						<div class="email" style="width: 75%;padding-bottom:2%">
					<input type="email" name="email" value=""  placeholder="Your Email"  required/>
						</div>
						<br/>
						<div class="email" style="width: 75%;padding-bottom:2%">
                    <input type="password" name="password" value=""  placeholder="Password"  required/>
						</div>
						<br/>
					<div class="email" style="width: 75%;padding-bottom:2%">
                    <input type="password" name="confirm_password" value="" placeholder="Confirm Password"  required/>
					</div>
					</div>
					<br/>
					<h3 style="padding-left:3%;font-weight:bold;color:purple;font-family: 'Roboto', sans-serif;">Birth Date</h3>
					<div style="display: flex;">
                                            
                                            <div class="dropdown">
                                                <select name="month" class = "value" required>
                                                    <option value="">Month</option>
                                                    <option value="01">Jan</option>
                                                    <option value="02">Feb</option>
                                                    <option value="03">Mar</option>
                                                    <option value="04">Apr</option>
                                                    <option value="05">May</option>
                                                    <option value="06">Jun</option>
                                                    <option value="07">Jul</option>
                                                    <option value="08">Aug</option>
                                                    <option value="09">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>
                                            </div>
                                            <div class="dropdown">
                                                <select name="day" class = "value" required>
                                                    <option value="">Day</option>
                                                    <option value="01">1</option>
                                                    <option value="02">2</option>
                                                    <option value="03">3</option>
                                                    <option value="04">4</option>
                                                    <option value="05">5</option>
                                                    <option value="06">6</option>
                                                    <option value="07">7</option>
                                                    <option value="08">8</option>
                                                    <option value="09">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>
                                                </select>
                                            </div>
                                            <div class="dropdown">
                                                <select name="year" class = "value" required>
                                                    <option value="">Year</option>
        
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
													<option value="1981">2014</option>
                                                    <option value="1982">2015</option>
                                                    <option value="1983">2016</option>
                                                    <option value="1984">2017</option>
                                                    <option value="1985">2018</option>
                                                    <option value="1986">2019</option>
                                                    <option value="1987">2020</option>
                                                    <option value="1988">2021</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
										<div style="font-family: 'Roboto', sans-serif; padding-left:3%">
										<label style="font-family: 'Roboto', sans-serif;">Gender : </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="patientGender" value="male" required/>Male
                                        </label>
                                        <label class="radio-inline" >
                                            <input type="radio" name="patientGender" value="female" required/>Female
                                        </label>
										</div>
										<br/>
										<h5 style="font-family: 'Roboto', sans-serif; padding-left:3%;font-weight:lighter">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</h5>
                                        <br />
                            <div align="center">
					<button name="signup" type="submit" placeholder="signup" class="signup-button">SignUp</button> <br>
                      </div>
				</form>
				
		
	</div>
</div>
</div>
<div >
<div class="body3">
    <div class="getin">
            <h1 style="font-size: 300%;padding-bottom: 2%;" align="center">Get in Touch</h1>
            <hr style="color: green;width:800px;padding-left:3%;">
            <h2 style="color: gray; padding-top: 3%; padding-left: 3%; " align="center">Feel free to drop us a line to contact us</h2>
        </div><br/><br/>
        <div>
            <div class="column">
                <table >
                    <tr>
                        <td style="padding: 1%;width:5%;"><img src="img/icon1.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                        <td style="padding: 1%;"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">Branding</h4></td>
                        <td style="padding: 1%;width:5%;"><img src="img/icon2.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                        <td style="padding: 1%"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">Web Design</h4></td>
                        <td style="padding: 1%;width:5%;"><img src="img/icon3.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                        <td style="padding: 1%"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">Social Marketing</h4></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                        <td></td>
                        <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                        <td></td>
                        <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                    </tr>
                </table>
         </div>
         <br/><br/><br/>
         <div class="column1">
            <table style="padding-bottom: 15%;">
                <tr>
                    <td style="padding: 1%;width:5%;"><img src="img/icon4.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                    <td style="padding: 1%;"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">SEO</h4></td>
                    <td style="padding: 1%;width:5%;"><img src="img/icon5.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                    <td style="padding: 1%"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">Mobile Apps</h4></td>
                    <td style="padding: 1%;width:5%;"><img src="img/icon6.jpg" height="40" width="40" alt="" style="border-radius: 50%;"></td>
                    <td style="padding: 1%"><h4 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 190%;font-weight:normal;">Corporate Literture</h4></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                    <td></td>
                    <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                    <td></td>
                    <td style="padding-top: 1%;"><p>Retro chillwave YOLO four loko photo booth. Brooklyn kale chips, seitan hella 3 wolf moon slow-carb paleo.</p></td>
                </tr>
            </table>
         </div>
     </div>
<?php include('footer.php'); ?>
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