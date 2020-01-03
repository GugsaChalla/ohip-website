
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
<h1>Deleted Doctors</h1>
<hr>
<ol>
<?php

$answer = $_POST['delete'];

if ($answer == "yes"){
$query = "DELETE FROM doctor WHERE docLicNum='".$_SESSION["transfer"]."'";
   if (!mysqli_query($connection, $query)) {
        die("Error: delete failed" . mysqli_error($connection));
    }
   echo "This doctor was deleted!";
//   echo"<form action='home2.php' method='post'><br>";
  // echo "<input type='submit' value='Home'>";
   //echo "</form>";
}
if ($answer == "no"){
   echo "The doctor was not deleted. You may return home";
}
?>
   <form action="home2.php" method="post">
<br>  
 <input type="submit" value="Home">
   </form>
</body>
</html>
