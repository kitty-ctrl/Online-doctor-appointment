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
    <div>
    <div class="body1">
        <table class="ab">
          <tr >
            <td style="padding: 30px;"><a href="home.php"><button class="b c" ><i class="fas fa-home" style="font-size: 23px;"></i></br>HOME</button></a></td>
            <td style="padding: 30px;"><a href="doctors.php"><button class="b d" ><i class="fas fa-user-md" style="font-size: 23px;"></i></br>DOCTORS</button></a></td>
            <td style="padding: 30px;"><a href="aboutus.php"><button class="b e" ><i class="fas fa-users" style="font-size: 23px;"></i></br><pre>ABOUT US</pre> </button></a></td>
            <td style="padding: 30px;"><a href="contactus.php"><button class="b f" ><i class="fab fa-whatsapp" style="font-size: 23px;"></i></br><pre>CONTACT US</pre> </button></a></td>
            <td style="padding: 30px;"><button id="mybtn" class="b g" ><i class="fas fa-sign-in-alt"  style="font-size: 23px;"></i></br> LOGIN </button></td>
          </tr>

        </table>
        <img src="img/medical.png" alt="medical logo" class="h" />
        <div style="margin: -17% 0% 0% 50%;position:absolute; color: rgb(85, 42, 165);">
            <div>
                <h1 style="font-size: 50px;">Welcome to our online doctor</h1> 
                <h1 style="font-size: 50px;padding-left: 25%;">appointment</h1> 
            </div>
             <div>
                 <h1 style="font-size: 120%;padding-left: 5%;">This is Doctor Schedule.Please <a href="patient_login.php"><button class="a"> login </button></a> to make an appointment.</h1>
                </div>
        </div>
                <div class="modal animate" id="background">
            <div class="body2">
            <i class="close fas fa-times"></i><br/><br/><br/>
                <h1 class="h1">LOGIN</h1><br/><br/><br/>
                <i class="fas fa-user" style="font-size: 50px;padding-left:40%;color:crimson"></i><br/><br/><br/>
              <div style="padding-left: 17%;height: fit-content;position: relative;">
              <table style="padding-left: 7%;">
                <tr>
                    <td style="padding: 2%;width: 5%;"><i class="fas fa-user-injured" style="font-size: 24px;color:crimson"></i></td>
                    <td style="padding-left: 14%;"><label for="show"><a href="patient_login.php" style="text-decoration: none; color: purple;"><h4>PATIENT </h4></a></label></td>
                </tr>
                <tr>
                     <td style="padding: 2%;width: 5%;"><i class="fas fa-user-md" style="font-size: 24px;color:crimson"></td>
                     <td style="padding-left: 14%;"><a href="doctor_login.php" style="text-decoration: none; color: purple;"><h4>DOCTOR </h4></a></td>
                </tr>
            </table>
            </div>
                  
                  
            </div>
        </div>
        <script>
            var back = document.getElementById("background");
            
            var btn = document.getElementById("mybtn");
            
            var span = document.getElementsByClassName("close")[0];
            
            btn.onclick = function() {
              back.style.display = "block";
            }
            
            span.onclick = function() {
              back.style.display = "none";
            }
            
            back.onclick = function(event) {
              if (event.target == back) {
                back.style.display = "none";
              }
            }
            </script>
            
      </div>
    </div>
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
</body>
</html>