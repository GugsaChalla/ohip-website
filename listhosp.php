 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP INFO</title>
<!-- Connects to CSS file -->
<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php
//Connects to Database
include 'connectdb.php';
?>
<h1>Hospital Info</h1>
<hr>
<?php
$join= "INNER JOIN hospital ON doctor.docLicNum = hospital.headDoc";
 
$query= "SELECT hospital.name,hospital.headDocStartDate, doctor.firstName, doctor.lastName FROM doctor INNER JOIN hospital ON doctor.docLicNum = hospital.headDoc ORDER BY name";
  $result = mysqli_query($connection,$query);
if (!$result) {
        die("databases query failed.");
    }
   while ($row = mysqli_fetch_assoc($result)) {
        
         echo "  Hospital Name: " . $row["name"]. "&nbsp &nbsp| Head Doctor Name: " . $row["firstName"]. " " . $row["lastName"] . "| &nbsp Date Started As Head: " . $row["headDocStartDate"] . "<br>";
   }
   mysqli_free_result($result);

?>
<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>
</body>
</html>
