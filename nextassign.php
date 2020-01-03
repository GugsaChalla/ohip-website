
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
<h1>Assign Confirmation</h1>
<hr>
<?php
$ohip  = $_POST['patients'];
$answer = $_POST['assign'];

$query='INSERT INTO treats(ohip, docLicNum) VALUES("'.$ohip.'", "'.$answer.'")';
//$query = 'INSERT INTO treats VALUES("' . $ohip . '" , "' . $docLicNum . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed " . mysqli_error($connection));
    }
   echo "The doctor was assigned to this patient!";
//   mysqli_close($connection);

?>
<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>

