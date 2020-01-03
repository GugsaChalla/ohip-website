<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP INFO</title>
<!-- Connect file to css -->
<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php

//Connect to database
include 'connectdb.php';
?>
<h1>Doctors Around Before Given Date</h1>
<hr>
<?php
include 'getdocinfobydate.php';

mysqli_close($connection);
?>


<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">

</form>
</body>
</html>
