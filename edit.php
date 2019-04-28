<!DOCTYPE html>

<html>
<head>
<style>
td.m
{
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

th.m {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
</style>
</head>

<body>

<?php

include("red/topspec.php"); 
include("login.php");

$field = $_POST["yo"];
$valu = $_POST["test"];
$server = $_POST["yuh"];

$sql = "update gmoney set $field='$valu' where server_name='$server'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>


<a href="https://csgdirsvcs.windstream.com:1977/index.php">
<font size="4"> 
<center>Home</center>
</font>
</a>

<?php include("red/bottomspec.php"); ?>

</body>

</html>