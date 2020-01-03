
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP Doctors</title>
<!-- Connects file to CSS-->
<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php
//Connects to database
include 'connectdb.php';
?>
<h1>OHIP Doctors</h1>
<hr>
<form action="showdoctor.php" method="post">
<?php
    //Connects to getdoctors.php
   include 'getdoctors.php';
?>
<br>
<input type="submit" value="show">
</form>
</body>
</html>
