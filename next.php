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
<h1>UnAssign Confirmation</h1>
<hr>
<?php
include 'connectdb.php';
?>
<?php
$answer = $_POST["doctors"];
$ohip = $_POST['patients'];


$query = "DELETE FROM treats WHERE docLicNum='".$answer."' AND ohip='".$ohip."'";
echo "Doctor has been unassigned from patient!Go home to see update";
echo "<br>";
 if (!mysqli_query($connection, $query)) {
        die("Error: delete failed" . mysqli_error($connection));
    }
   




?>

<form action="home2.php" method="post">
<input type="submit" value="home">
</form>

</body>
</html>
