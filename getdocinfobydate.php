<?php
//change the date the user entered into a variable of type time
$time = strtotime($_POST['date']);
//select all values from doctor
$query = "SELECT * FROM doctor";
$result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
//check if the user entered a date
if ($time==null){
	echo "Please Enter a Specific Date.";
        echo "<br>";
}
//display info
   while ($row = mysqli_fetch_assoc($result)) {
        
if ($time>strtotime($row["licenseDate"])){
         echo "  Name: " . $row["firstName"]. " " . $row["lastName"]. "&nbsp| Speciality: " . $row["speciality"] . "&nbsp| Date Licensed: " . $row["licenseDate"] . "<br>";
   }
}
   mysqli_free_result($result);


?>
