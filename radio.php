
<?php
include 'connectdb.php';
?>
<?php
   $query = "SELECT * FROM patient";
   $result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Which patient do you want to Assign or Unassign?</br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="patients" value="';
        echo $row["ohip"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
   }
   mysqli_free_result($result);
?>
