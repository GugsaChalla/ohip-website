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
<h1>Hospital Change</h1>
<hr>
<?php
$old=$_POST['old'];
$new=$_POST['new'];

if($old== 'select'){
 die("Go back and select the hospital you want to update.");
}
$query = "UPDATE hospital SET name='".$new."' WHERE hosCode='".$old."'";
   if (!mysqli_query($connection, $query)) {
        die("Error: update failed" . mysqli_error($connection));
    }
   echo "Hospital Name has been updated.";

?>
<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>
</body>
</html>
