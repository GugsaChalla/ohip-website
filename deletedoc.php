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
//Connects to database
   include 'connectdb.php';
?>
<h1>Deleted Doctors</h1>
<hr>
<ol>
<?php


   
   //Set Variables
   $docLicNum= $_POST["docLicNum"];
   //transfer docLicNum from home page to showdocdelete.php
   $_SESSION["transfer"]=$docLicNum;  
   //select rows from treats table where docLicNum equals the license Number the user entered into the textbox
   $query2= "SELECT * FROM treats WHERE docLicNum='".$docLicNum."'";
    $result = mysqli_query($connection,$query2);
   
    if (mysqli_num_rows($result)==0){
	die("Go back and enter a valid license number.");
}

    if (!$result) {
        die("databases query failed.");
    }
     if (mysqli_num_rows($result)!=0) {
       echo'<form action="showdocdelete.php" method="post">';
       echo "This doctor treats patients. Are you sure you want to delete?<br>";
       echo '<input type="radio" name="delete" value="yes">Yes';
       echo '<input type="radio" name="delete" value="no">No<br>';
       echo '<input type="submit" name="deletebutton" value="Submit">';
       echo'</form>';       
}

     else{
	 $query = "DELETE FROM doctor WHERE docLicNum='".$docLicNum."'";
   if (!mysqli_query($connection, $query)) {
        die("Error: delete failed" . mysqli_error($connection));
    }
   echo "This doctor was deleted!";
   mysqli_close($connection);
}


?>
</ol>



</body>
</html>
