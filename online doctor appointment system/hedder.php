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
        <table class="ab">
          <tr >
          <td style="padding: 30px;"><a href="home.php"><button class="b c" ><i class="fas fa-home" style="font-size: 23px;"></i></br>HOME</button></a></td>
            <td style="padding: 30px;"><a href="doctors.php"><button class="b d" ><i class="fas fa-user-md" style="font-size: 23px;"></i></br>DOCTORS</button></a></td>
            <td style="padding: 30px;"><a href="aboutus.php"><button class="b e" ><i class="fas fa-users" style="font-size: 23px;"></i></br><pre>ABOUT US</pre> </button></a></td>
            <td style="padding: 30px;"><a href="contactus.php"><button class="b f" ><i class="fab fa-whatsapp" style="font-size: 23px;"></i></br><pre>CONTACT US</pre> </button></a></td>
            <td style="padding: 30px;"><button id="mybtn" class="b g" ><i class="fas fa-sign-in-alt"  style="font-size: 23px;"></i></br> LOGIN </button></td>
          </tr>

        </table>
        
        <div class="modal animate" id="background">
            <div class="body2">
            <i class="close fas fa-times"></i><br/><br/><br/>
                <h1 class="h1">LOGIN</h1><br/><br/><br/>
                <i class="fas fa-user" style="font-size: 50px;padding-left:40%;color:crimson"></i><br/><br/><br/>
              <div style="padding-left: 17%;height: fit-content;position: relative;">
              <table style="padding-left: 7%;">
                <tr>
                    <td style="padding: 2%;width: 5%;"><i class="fas fa-user-injured" style="font-size: 24px;color:crimson"></i></td>
                    <td style="padding-left: 14%;"><a href="patient_login.php" style="text-decoration: none; color: purple;"><h4>PATIENT </h4></a></td>
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
            