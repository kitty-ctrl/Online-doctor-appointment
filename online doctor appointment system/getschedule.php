<?php
session_start();
include_once 'config.php';
$q = $_GET['q'];
$res = mysqli_query($conn,"SELECT * FROM doctorschedule WHERE scheduleDate='$q'");
if (!$res) {
die("Error running $sql: " . mysqli_error());
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <?php
        if (mysqli_num_rows($res)==0) {
        echo "<div style='width:70%;background-color:#F2DEDE;;font-size:20px;padding:1%;color:crimson;' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
        
        } else {
        echo "   <table>";
            echo " <thead>";
                echo " <tr style='background-color:#79ff7980'>";
                    echo " <th style='width:10%;padding:1%'>App Id</th>";
                    echo " <th style='width:10%;'>Day</th>";
                    echo " <th style='width:10%;'>Date</th>";
                    echo "  <th style='width:10%;'>Start Time</th>";
                    echo "  <th style='width:10%;'>End Time</th>";
                    echo " <th style='width:10%;'>Availability</th>";
                    echo "  <th style='width:10%;'>Book Now!</th>";
                echo " </tr>";
            echo "  </thead>";
            echo "  <tbody>";
                while($row = mysqli_fetch_array($res)) {
                ?>
                <tr style="background-color:#d4d4d49e;">
                    <?php
                    if ($row['bookAvail']!='available') {
                    $avail="background-color:#f86060;color:white;border-radius:9%;padding-left:5px;padding-right:5px;";
                    $btnclick="background-color:#f86060;color:white;border-radius:9%;padding-left:5px;padding-right:5px;text-decoration:none;pointer-events:none;";
                    } else {
                    $avail="background-color:#5c5cff;color:white;padding-left:5px;padding-right:5px;border-radius:9%";
                    $btnclick="background-color:#5c5cff;color:white;padding-left:5px;padding-right:5px;border-radius:9%;text-decoration:none";
                    }

                    echo "<td align='center'style='font-size:15px;font-weight:bold;padding:1%'>" . $row['scheduleId'] . "</td>";
                    echo "<td align='center' style='font-size:15px;font-weight:bold;'>" . $row['scheduleDay'] . "</td>";
                    echo "<td align='center'style='font-size:15px;font-weight:bold;'>" . $row['scheduleDate'] . "</td>";
                    echo "<td align='center'style='font-size:15px;font-weight:bold;'>" . $row['startTime'] . "</td>";
                    echo "<td align='center'style='font-size:15px;font-weight:bold;'>" . $row['endTime'] . "</td>";
                    echo "<td align='center'style='font-size:15px;font-weight:bold;'> <span style='".$avail."'>". $row['bookAvail'] ."</span></td>";
                    echo "<td align='center'style='font-size:15px;font-weight:bold;' ><a  href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."' style='".$btnclick."' role='button' >Book Now</a></td>";
                    ?>
                    
                    </script>
                  
                </tr>
                
                <?php
                }
                }
                ?>
            </tbody>   
        </body>
    </html>