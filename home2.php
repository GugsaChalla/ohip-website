<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<!-- Home Page-->

<title>OHIP info</title>

<!-- Link CSS Style Sheet -->

<link rel="stylesheet"href="ohip.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<?php
//Connect webpage to database
include 'connectdb.php';
?>

<h1>Welcome to the OHIP information site</h1>
<hr>

<!-- Area of page where you can see doctor names -->

<h4>List All the Names of  OHIP Doctors</h4>
<form action="doctorlist.php" method="post">

<input type="radio"name="morethanone" value="fName" checked>Order by first name<br>
<input type="radio"name="morethanone" value="lName">Order by last name<br>

<input type="radio"name="more" value="ascend" checked>Display in ascending order<br>
<input type="radio"name="more" value="descend">Display in descending order<br>
<br>
<input type="submit" value="List">
</form>

<?php
//close connection to database
mysqli_close($connection);
?>
<hr>

<!-- Area of page where you can see doctors licensed before a certain date. -->

<h4>List All the Info on Doctors Who Were Registered Before a Specific Date</h4>

<form action="docdatelist.php" method="post">
<label>Date</label>
<input type="date" name="date" maxlength="12">
<br>
<br>
<input type="submit" value="List" id="dateSearch">
</form>


<form action="adddoc.php" method="post">
<hr>

<!-- Area of page where you can add a doctor. -->

<h4>Enter New Doctor</h4>
<label>Doc License Num</label>
<input type="text" name="docLicNum" maxlength="4">
<label>First Name</label>
<input type="text" name="firstName" maxlength="20">
<label>Last Name</label>
<input type="text" name="lastName" maxlength="20"><br>
<br>
<label>Specialty</label>
<input type="text" name="speciality" maxlength=20">
<label>Date Licensed</label>
<input type="date" name="datelicensed">


<label>Works at Hospital:</label>
<input type="text"name="hospital" id="BBC"  maxlength="3" required>
<br>
<br>
<input type="submit" id="addDoc" value="Add">
</form>
<hr>

<!-- Area of page where you can delete a doctor -->

<h4>Delete Doctor</h4>
<form action="deletedoc.php" method="post">
<label>Doc License Num</label>
<input type="text" name="docLicNum" maxlength="4">

<br>
<br>
<input type="submit" value="Delete" id="delete">
</form>
<hr>

<!-- Area of page where you can update hospital name-->

<h4>Update Hospital Name</h4>
<form action="updatehosp.php" method="post">
<label>Change</label>


<select name ="old">
<option>select</option>
<option value="ABC">(London,ON) ABC</option>
<option value="BBC">(London,ON) BBC</option>
<option value="DDE">(Victoria,ON) DDE</option>
</select>

<!--<input type="text" name="old" maxlength="25">-->
<label>To</label>
<input type="text" name="new" maxlength="20">
<br>
<br>
<input type="submit" id="updateHospital" value="Update">
</form>
<hr>

<!-- Area of page where you can list all hospital info -->

<h4>List Hospital Info</h4>
<form action="listhosp.php" method="post">
<input type="submit" value="List" id="displayHospital">
</form>
<hr>
<h4>Use OHIP Number to find patient info</h4>
<form action="ohipsearch.php" method="post">
<label>OHIP Number</label>
<input type="text" name="ohip" maxlength="9">
<br>
<br>
<input type="submit" id="ohipPatient">
</form>
<hr>

<!-- Area of page where you can assign doctors to patients/unassign -->

<h4>Assign Doctor to Patient</h4>
<form action="patientsrad.php" method="post">
<?php
//Connects to code in this file
include 'radio.php';
?>
<input type="submit" id="assign" name="patient" value="Go">
</form>

<hr>

<!-- Area of page where you can see doctors with no patients-->

<h4>Show Doctors With No Patients</h4>
<form action="docnopatients.php" method="post">

<input type="submit" value="Display">
</form>
</body>
</html>

