<?php

// Set Variables
$answer = $_POST['doctors'];

// select from a join of the hospital and doctor table where docLicNum equals the license number of the doctor selected by the user
$query = "SELECT * FROM doctor INNER JOIN hospital ON doctor.hosWorksAt = hospital.hosCode WHERE docLicNum='".$answer."'";
   $result = mysqli_query($connection,$query);
//Check if the user selects a doctor
if (mysqli_num_rows($result)==0){
	echo "Please Select a Doctor";
        echo "<br>";
}
  
 if (!$result) {
        die("databases query failed.");
    }
//Display info
   while ($row = mysqli_fetch_assoc($result)) {
        
         echo "Doctor's License Number: &nbsp" . $row["docLicNum"]. "|  Name: " . $row["firstName"]. " " . $row["lastName"]. "| &nbsp Speciality: " . $row["speciality"] . "|&nbsp Date Licensed: " . $row["licenseDate"] . "|&nbsp Works At: " . $row["name"]. "<br>";
   }
   mysqli_free_result($result);
   
mysqli_close($connection);


?>
