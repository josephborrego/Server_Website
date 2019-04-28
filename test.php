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

echo "<br>";

include("login.php");

$arr = array();
$manarr = array();

$save = "select server_name, server_functions, type, domain, location, notes from gmoney";
$res = mysqli_query($conn, $save);
while($row =  mysqli_fetch_assoc($res)){ $arr[] = $row; }

$manual = "select * from gmoney where manual='1' ";
$res = mysqli_query($conn, $manual);
while($yo =  mysqli_fetch_assoc($res)){ $manarr[] = $yo;  }

foreach($files as $file){ $header = 0;
$handle = fopen($file, "r");
while(($line = fgetcsv($handle)) !== FALSE)	{ //each row
if($header == 0){ $header = 1; continue; }	//removes column names
$count = 0;

foreach($line as $elem)	{ //go through each line in the csv, seperate array into individual words
	if($file == 'yo\vInfo.csv'){ 
		switch($count){
		case 0:$name=$elem;break;	case 4:$dns=$elem;break;	
		case 12:$cpu=$elem;break;	case 14:$memory=$elem;break;
		case 51:$path=$elem;break;	case 57:$cluster=$elem;break;	
		case 58:$host=$elem;break;	case 59: $os = $elem; 	$var++;
		
		$sql = "INSERT into gmoney (server_name, dns, num_cpus,  `memory`, location_code, cluster, `Host`, os, edit, manual) 
		VALUES ('$name', '$dns', '$cpu', '$memory', '$path', '$cluster', '$host', '$os', 'vinfo', '0')"; 
			 } //switch
	$count++;		} //if
							   	   
	if($file == 'yo\big.csv'){		//could always set an or condition for multiple files
		switch($count){
		case 0:$name=$elem;break;	case 2:$mem=$elem;break;
		case 3:$host=$elem;break;	case 4:$dns=$elem;break;	
		case 5:$type=$elem;break;	case 6:$ipp=$elem;break;
		case 7:$os=$elem;break;		case 8:$cpu=$elem; 	$var++;
		
		$sql = "insert into gmoney (server_name,  `memory`, `Host`, dns, os, num_cpus, type, server_ip, edit, manual)
		 VALUES ( '$name', '$mem', '$host', '$dns', '$os', '$cpu', '$type', '$ipp', 'bigfix', '0') "; 		
					} //switch
	$count++;	} //if
	} //foreach

if(mysqli_query($conn, $sql)){		 } 
else{	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);	}	

}	//while
fclose($handle); } //foreach file


//delete duplicates
// vinfo > bigfix
$sql = "delete t1 from gmoney t1 inner join gmoney t2 where t1.ID < t2.ID and t1.server_name = t2.server_name";
if(mysqli_query($conn, $sql)){		 } 
else{	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);	}	


//update server functions, type, location, and notes in all rows
foreach($arr as $data){
$num = 0;
foreach($data as $wurd){
switch($num){
	case 0:$sname=$wurd; break;	case 1:$func=$wurd; break;
	case 2:$type=$wurd; break;	case 3:$loc=$wurd; break;
	case 4:$notes=$wurd;
	$upd = "update gmoney set server_functions='$func', type='$type', location='$loc', notes='$notes' where server_name='$sname' ";
	if(mysqli_query($conn, $upd)){		 } 
	else{	echo "ERROR: Could not able to execute $upd. " . mysqli_error($conn);
		
		} $num++; //switch
	}	//wurd
}	//arr
}

$c = 0;
foreach($manarr as $str){
foreach($str as $word){
switch($c) {
case 0:$id=$word; break;	case 1:$sname=$word; break;		case 2:$func=$word; break;	case 3:$dom=$word; break;	
case 4:$loc=$word; break;	case 5:$notes=$word; break;		case 6:$typea=$word; break;	case 7:$env=$word; break;
case 8:$servip=$word;break;	case 9:$os=$word;break;			case 10:$osv=$word;break;	case 11:$ospac=$word;break;	
case 12:$act=$word;break;	case 13:$serv=$word;break;		case 14:$make=$word;break;	case 15:$model=$word; break;
case 16:$seria=$word;break;	case 17:$sanatt=$word;break;	case 18:$hddn=$word;break;	case 19:$hddsz=$word;break;	
case 20:$mem=$word;break;	case 21:$back=$word;break;		case 22:$loco=$word;break;	case 23:$loadb=$word; break;
case 24:$grown=$word;break;	case 25:$numc=$word;break;		case 26:$hoest=$word;break;	case 27:$manual=$word;break;	
case 28:$edit=$word;break;	case 29:$dns=$word;break;		case 30:$ip=$word;break;	case 31:$cluster=$word; 

$var++;

$sql = "INSERT INTO gmoney (server_name, server_ip, server_functions, type, os, os_version, os_pack, active, service, domain,
make, model, `serial`, san_attached, hdd_num, hdd_size, `memory`, location, location_code, load_balanced, group_ownership, num_cpus, notes, manual)
VALUES ('$sname', '$ip', '$func', '$typea', '$os', '$osv', '$ospac', '$act', '$serv', '$domain',
'$make', '$model', '$seria', '$sanatt', '$hddn', '$hddsz', '$mem', '$location', '$loco',
'$loadb', '$grown', '$numc', '$notes', '$manual');";

if(mysqli_query($conn, $sql)){  } 
else{	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);	}
		
		} $c++;		//switch	
	}	//str
}	//manarr


?>

</body>

</html>