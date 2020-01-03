<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP Info</title>

<link rel="stylesheet"href="ohip.css"/>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Doctor Information</h1>
<hr>
<?php
include 'getalldocinfo.php';
?>
<br>
<form action="home2.php" method="post">

<input type="submit" value="Home">
</form>
</body>
</html>
