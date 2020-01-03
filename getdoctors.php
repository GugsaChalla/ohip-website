<?php

//Set Variables
$answer = $_POST['morethanone'];
$order  = $_POST['more'];
//check how the user wants to display the doctors
if ($answer == "fName"){
    if($order == "ascend"){
$query = "SELECT * FROM doctor  ORDER BY firstName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
//display doctors
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
}
//check how the user wants to display doctors
elseif($order == "descend"){
$query = "SELECT * FROM doctor ORDER BY firstName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
//display info
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
}
}

elseif($answer == "lName"){
	if($order == "ascend"){
$query = "SELECT * FROM doctor ORDER BY lastName ASC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);

}
//check
elseif($order == "descend"){

$query = "SELECT * FROM doctor ORDER BY lastName DESC";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who are you looking up? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="doctors" value="';
        echo $row["docLicNum"];
        echo '">' . $row["firstName"] . " " . $row["lastName"] . "<br>";
   }
   mysqli_free_result($result);
}

}

else{
echo "Go back and select how you would like the info to be displayed!Thank You!</br>";
}
?>
