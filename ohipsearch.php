<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP INFO</title>

<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Patient Info</h1>
<hr>
<?php
$ohip = $_POST['ohip'];
 $query2= "SELECT * FROM patient WHERE ohip='".$ohip."'";
    $result2 = mysqli_query($connection,$query2);
$query= "SELECT  patient.firstname, patient.lastname, doctor.firstName, doctor.lastName FROM ((patient INNER JOIN treats ON patient.ohip = treats.ohip)INNER JOIN doctor ON treats.docLicNum = doctor.docLicNum) WHERE treats.ohip='".$ohip."'";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
     if (mysqli_num_rows($result2)==0) {
        die("Error. This OHIP number doesn't exist.");
}


$counter = mysqli_num_rows($result2);	

 while ($row = mysqli_fetch_assoc($result)) {
        if ($counter>0){
	echo " Patient Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $counter=0;
        echo "<br>These are the doctors that treat this patient:<br>";
}
	echo"<br>";
         echo "   Doctor Name: " . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
?>
<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>
</body>
</html>
