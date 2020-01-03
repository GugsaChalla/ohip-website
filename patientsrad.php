<?php
session_start();
?>
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

<h1>Assign/Unassign Doctors To Patients</h1>
<hr>
<?php
$ohip = $_POST['patients'];
$_SESSION["transfer"]=$ohip;
$query= "SELECT patient.ohip, doctor.docLicNum, patient.firstname, patient.lastname, doctor.firstName, doctor.lastName
FROM ((treats
INNER JOIN patient ON patient.ohip = treats.ohip)
INNER JOIN doctor ON treats.docLicNum = doctor.docLicNum) WHERE treats.ohip = '".$ohip."'";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }

$query2= "SELECT patient.ohip, doctor.docLicNum, patient.firstname, patient.lastname, doctor.firstName, doctor.lastName FROM ((treats INNER JOIN patient ON patient.ohip = treats.ohip) INNER JOIN doctor ON treats.docLicNum = doctor.docLicNum) WHERE treats.ohip !='".$ohip."' ORDER BY doctor.firstName "; 

$query3= "SELECT *FROM doctor ";
    $result2 = mysqli_query($connection,$query3);
    if (!$result2) {
        die("databases query failed.");
    }
$counter= mysqli_num_rows($result);
echo "Doctors Who Treat This Patient:</br>";
echo "<form action='next.php' method='post'>";
echo "<input type='text' style='display:none'  name='patients' value='".$ohip."'>";
 while ($row = mysqli_fetch_assoc($result)) {

//if ($counter=4){
//	$namedoc4=$row["docLicNum"];
  //      $counter=$counter-1;
//}
//if ($counter=3){
//	$namedoc3=$row["docLicNum"];
//	$counter=$counter-1;
//}
//if ($counter=2){
//	$namedoc2=$row["docLicNum"];
//	$counter=$counter-1;

//}

        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];    
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
 //	$namedoc=$row["docLicNum"];
  } 

  mysqli_free_result($result);
echo "<input type='submit' value='Unassign'>";
echo "</form>";





echo "<hr>";
echo "<form action='nextassign.php' method='post'>";

echo "Which doctor do you want to assign to patient?</br>";
   while ($row = mysqli_fetch_assoc($result2)) {

//if($namedoc1<>$row["docLicNum"] && $namedoc2<>$row["docLicNum"] && $namedoc3<>$row["docLicNum"] && $namedoc4<>$row["docLicNum"]){

        echo '<input type="radio" name="assign" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
              
//	}
    //$namedoc1=$row["docLicNum"];   
}
mysqli_free_result($result2);
echo "<input type='text' style='display:none' name='patients' value='".$ohip."'>";
//echo "<p>Which doctor do you want to assign to this patient?</p>";
//echo "<label>Doctor License Number</label>";
//echo "<input type='text' name='assign'>";
echo "<input type='submit' value='Assign'>";
echo "</form>";

?>

</body>
</html>
