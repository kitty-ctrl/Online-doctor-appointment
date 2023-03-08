<?php
session_start();
include_once 'config.php';
if (isset($_GET['appid'])) {
$appid=$_GET['appid'];
}
$res=mysqli_query($conn, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.idpatient = b.patientIc
JOIN doctorschedule c
On b.scheduleId=c.scheduleId
WHERE b.appId  =".$appid);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Invoice Template</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <div style="padding-top: 2%;padding-left:14%;">
        
            <table cellpadding="0" cellspacing="0" style="width: 80%;border: 1px solid #eee;box-shadow: 0 0 10px rgb(0 0 0 / 15%);">
            <div>
                <tr>
                    <td colspan="2">
                        <table>
                            <tr>
                                <td style="width:87%">
                                    <img src="img/logo.png" style="width:100%; max-width:300px;padding:2%">
                                </td>
                                
                                <td>
                                    Invoice #: <?php echo $userRow['appId'];?><br>
                                    Created: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr align="right">
                    <td colspan="2" style="padding: 3%;">
                        <table>
                            
                            <tr>
                                <td><?php echo $userRow['patientIc'];?><br>
                                    <?php echo $userRow['patientFirstName'];?> <?php echo $userRow['patientLastName'];?><br>
                                    <?php echo $userRow['email'];?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $userRow['patientAddress'];?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                <tr style="background-color: #eee;padding:2%">
                    <td style="padding: 2%;">
                        Appointment Details
                    </td>
                    
                    <td align="right" style="padding: 2%;">
                        #
                    </td>
                </tr>
                
                <tr >
                    <td style="padding: 2%;">
                        Appointment ID
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                       <?php echo $userRow['appId'];?>
                    </td>
                </tr>
                
                <tr >
                    <td style="padding: 2%;">
                        Schedule ID
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                        <?php echo $userRow['scheduleId'];?>
                    </td>
                </tr>

                <tr >
                    <td style="padding: 2%;">
                        Appointment Day
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                        <?php echo $userRow['scheduleDay'];?>
                    </td>
                </tr>
                

                 <tr>
                    <td style="padding: 2%;">
                        Appointment Date
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                        <?php echo $userRow['scheduleDate'];?>
                    </td>
                </tr>

                 <tr>
                    <td style="padding: 2%;">
                        Appointment Time
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                        <?php echo $userRow['startTime'];?> untill <?php echo $userRow['endTime'];?>
                    </td>
                </tr>

                 <tr >
                    <td style="padding: 2%;">
                        Patient Symptom
                    </td>
                    
                    <td style="padding: 2%;"align="right">
                        <?php echo $userRow['appSymptom'];?> 
                    </td>
                </tr>
                
                
                </div>
            </table>
 
        <div style="padding: 2%;width:75%"align="right">
        <button onclick="myFunction()" >Print this page</button>
</div>
        </div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>
</html>