<?php
include("login.php");

$id = $_GET["nutz"];
echo "<br>";
echo "the id is    $id";
echo "<br>";

$query = "DELETE FROM acilds.vinfo WHERE VM = '$id'";
if (mysqli_query($conn, $query)) {
     // echo "Record deleted successfully";
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }
  $conn->close();
header("Location: test.php"); 


?>
