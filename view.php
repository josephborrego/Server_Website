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
 <form method="post" action="edit.php">
<?php

include("red/topspec.php"); 
include("login.php");

function display(){
echo "hello".$_POST["test"];
}

$wurd = $_GET['id'];
$sql = "SELECT * FROM acilds.gmoney where server_name='$wurd'";
$result = $conn->query($sql);

echo"<br><br><table width='80%' border='2'>
<tr><th>Field</th><th>$wurd</th><th>Edit</th></tr>";

$count =0;
while ($row = mysqli_fetch_assoc($result)){
 foreach ($row as $field => $value) { 
 echo "<tr><td>$field</td> <td>$value</td>";
	if(($count >= 2 && $count <= 6)){ echo "<td><a href='view.php?c=$field&val=$value&entry=$wurd'>Edit</a></td>"; }
	if($count == 27 && $value == 1 ){ echo "<td><a href='del.php'>Delete</a></td>"; }
	echo"</tr>";
	$count++;
    }
}

if(isset($_GET["c"])){

$fel = $_GET["c"];
$val = $_GET["val"];
$server = $_GET["entry"];

echo "<tr>
<td>$fel <input type='hidden' name='yo' value=$fel></td>
$value <td><input size='50' type='text' name='test' value=$val></td>
<td>$server<input type='hidden' name='yuh' value=$server></td>";
}

echo"</table><br>";

?>

<button type="submit" value="Submit">Update</button>
</form>

<?php include("red/bottomspec.php"); ?>

</body>

</html>