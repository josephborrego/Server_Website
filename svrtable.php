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
<?php	include("red/topspec.php"); ?>

<br>


<table>
<th>
<form action="search.php" method="post">
<input type="text" name="param">
<button type="submit">Search</button>
</form> 
</th>

<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>

<th>
<form action="down.php" method="post">
<input type='submit' value='Export' name='Export'>
</th>
</table>


<?php

include("login.php");
include("test.php");

$result = mysqli_query($conn,"select * from gmoney");

$user_arr[] = array("Name","Function","Host","Cluster","Type","IP","OS","CPU","\r\n");

echo "<table border='1'> <tr>
<th>Name</th>
<th>Function</th>
<th>Host</th>
<th>Cluster</th>
<th>Type</th>
<th>IP</th>
<th>OS</th>
<th>CPU</th>
</tr>";

while($row = mysqli_fetch_array($result)){

$servName = $row["server_name"];
$funk = $row["server_functions"];
$host = $row["Host"]; 
$clust = $row["cluster"];
$type = $row["type"];
$ip = $row["server_ip"];
$os = $row["$os"];
$cpu = $row["num_cpus"];
$user_arr[] = array($servName,$funk,$host,$clust,$type,$ip,$os,$cpu,"\r\n");

echo "<tr>";
echo "<td><a href='view.php?id=".$row['server_name']."'>".$row['server_name']."</a></td>";
echo"
<td>" . $row["server_functions"] . "</td> 
<td>" . $row["Host"] . "</td>
<td>" . $row["cluster"] . "</td>
<td>" . $row["type"] . "</td>
<td>" . $row["server_ip"] . "</td>
<td>" . $row["os"] . "</td>
<td>" . $row["num_cpus"] . "</td> ";
echo "</tr> ";

$serialize_user_arr = serialize($user_arr);
}

echo "</table>";

echo"<br><br><br><br>";

mysqli_close($conn);


?>


<p>
<textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
</form>
</p>

<?php	include("red/bottomspec.php"); ?>

<a href="https://csgdirsvcs.windstream.com:1977/index.php">
<font size="6"> 
<center>Home</center>
</font>
</a>

</body>

</html>