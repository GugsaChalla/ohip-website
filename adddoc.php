<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OHIP INFO</title>
<link rel="stylesheet"href="ohip.css"/>
</head>
<body>

<?php
//Connects to Database
   include 'connectdb.php';
?>
<h1>Inserting Doctors</h1>
<hr>
<ol>
<?php


    //Set Variables   

   $docLicNum= $_POST["docLicNum"];
   $firstName = $_POST["firstName"];
   $lastName =$_POST["lastName"];
   $speciality= $_POST["speciality"];
   $licenseDate= $_POST["datelicensed"];
   $hosWorksAt=$_POST["hospital"];

    //select rows where the docLicNum is equal to the docLicNum value from the radio button the user chose
   $query2= "SELECT * FROM doctor WHERE docLicNum='".$docLicNum."'";
    $result = mysqli_query($connection,$query2);
     //check if license number is taken
     if (mysqli_num_rows($result)!=0) {
       echo "This doctor license number is already taken ";
       
    }
     if (!$result) {
        die("databases query failed.");
    }
   //inserts info user entered into the doctor table
   $query = 'INSERT INTO doctor values("' . $docLicNum . '","' . $firstName . '","' . $lastName . '","' . $speciality . '","' . $licenseDate . '","' . $hosWorksAt . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed " . mysqli_error($connection));
    
}
   echo "This doctor was added!";
   //close connection
   mysqli_close($connection);
?>

<form action="home2.php" method="post">
<br>
<input type="submit" value="Home">
</form>
</ol>
</body>
</html>
