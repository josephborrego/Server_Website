<!DOCTYPE html>
<html>
<head>
<style>

td.m{
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th.m {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

div.a {
  text-align: center;
}

div.b {
  text-align: left;
}

div.c {
  text-align: right;
}


</style>
</head>
<body>

<?php
include("red/topspec.php");
 ?>

<br>

<table style="width:90%">

<div class="a">
<th><a href="https://csgdirsvcs.windstream.com:1977/index.php">
<font size="4">Home </font>
</a></th>
</div>

<div class="b">
<th> <form action="search.php" method="post">
<input type="text" name="param">
<button type="submit">Search</button>
</form> </th>
</div>

<div class="c">
<th>
<form action="down.php" method="post">
<input type='submit' value='Export' name='Export'>
</th>
</div>

</table>


<br>

<?php

$servername = "localhost:3306";
$username = "ndssupport";
$password = "Ra1n1ng1";
$dbname = "acilds";
$con = new mysqli($servername, $username, $password, $dbname);
 if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$ser = $_POST["param"];
$vm="VM";  
$host="Host";	
$mem="Memory";	
$vlan = "VLAN";	
$ip="IP"; 
$ip6="IP6"; 
$clus="Cluster";
$osc="Osconfig";
$dns="DNS";		
$cpus="CPUs";

$ser=$_POST["param"];
echo" Displaying \"$ser\" results <br><br>";
$sql = "SELECT * FROM acilds.gmoney WHERE sname LIKE '%{$ser}%' OR DNS LIKE '%{$ser}%'";

echo "<table width='100%' border='2' height ='10'>
<tr>
<th>$vm</th> <th>Server Function</th><th>$dns</th> <th>$cpus</th> <th>$mem</th> <th>$host</th>
<th>$clus</th> <th>$osc</th>
 </tr> ";

$res = $con->query($sql);
$user_arr[] = array("VM","Server Function","DNS","CPUs","Memory","Host","Cluster","OSconfig","\r\n");

while($row = $res->fetch_assoc()) 
{
	$davm = $row["$vm"];

	//add server function here
	$func ="funky";	

	$dadns = $row["$dns"];
	$cp = $row["$cpus"];
	$memo = $row["$mem"]; 

	//this is for a specific use case where memory has two values
	if(strpos($memo, ',') !== false) {
	$hold = '"' . $memo . '"';
	$memo = $hold;
	}

	$ho = $row["$host"];
	$c = $row["$clus"];
	$o = $row["$osc"];
	$user_arr[] = array($davm,$func,$dadns,$memo,$prod,$ho,$c,$o,"\r\n");

	echo "<tr>
	<td>".$row["$vm"]."</td>
	<td>$func</td> 
	<td>".$row["$dns"]."</td> 
	<td>".$row["$cpus"]."</td> 
	<td>".$row["$mem"]."</td> 
	<td>".$row["$host"]."</td> 
	<td>".$row["$clus"]."</td> 
	<td>".$row["OS according to the configuration file"]."</td>
	</tr>";  
	$serialize_user_arr = serialize($user_arr);
} 		
echo "</table>";
$con->close();
?>

<p>
<textarea name='export_data' style='display: none;'><?php echo $serialize_user_arr; ?></textarea>
</form>
</p>

<?php include("red/bottomspec.php"); ?>

<a href="https://csgdirsvcs.windstream.com:1977/index.php">
<font size="6"> 
<center>Home</center>
</font>
</a>

</body>
</html>