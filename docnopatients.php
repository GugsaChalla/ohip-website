<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP INFO</title>
<!-- Connects file to CSS-->
<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php
//Connects to database
include 'connectdb.php';
?>
<h1>Doctor's With No Patients</h1>
<hr>
<?php
//select from doctor and treats where doctor rows have no ohip number
$query= "SELECT doctor.firstName, doctor.lastName FROM treats RIGHT JOIN doctor ON treats.docLicNum = doctor.docLicNum WHERE ohip IS NULL";
  $result = mysqli_query($connection,$query);
if (!$result) {
        die("databases query failed.");
    }
//Check if there are no doctors without patients
if (mysqli_num_rows($result)==0) {
	die("There are currently no doctors without patients.");
}
//Display info
   while ($row = mysqli_fetch_assoc($result)) {
        
         echo  "Doctor Name: " . $row["firstName"]. " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);


?>

<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>


</body>
</html>
