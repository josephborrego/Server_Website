
<?php include("login.php"); ?>

<?php

$env = mysqli_real_escape_string($conn, $_REQUEST['env']);
$ho = mysqli_real_escape_string($conn, $_REQUEST['the_host']);
$servName = mysqli_real_escape_string($conn, $_REQUEST['server_name']);
$servIp = mysqli_real_escape_string($conn, $_REQUEST['server_ip']);
$func = mysqli_real_escape_string($conn, $_REQUEST['server_functions']); 
$type = mysqli_real_escape_string($conn, $_REQUEST['type']);
$os = mysqli_real_escape_string($conn, $_REQUEST['os']);
$osversion = mysqli_real_escape_string($conn, $_REQUEST['os_version']);
$ospack = mysqli_real_escape_string($conn, $_REQUEST['ospack']);
$act = mysqli_real_escape_string($conn, $_REQUEST['active']);
$ser = mysqli_real_escape_string($conn, $_REQUEST['service']); 
$dom = mysqli_real_escape_string($conn, $_REQUEST['dom']);
$make = mysqli_real_escape_string($conn, $_REQUEST['make']); 
$model = mysqli_real_escape_string($conn, $_REQUEST['model']); 
$serial = mysqli_real_escape_string($conn, $_REQUEST['seria']); 
$san = mysqli_real_escape_string($conn, $_REQUEST['san_att']); 
$hddnum = mysqli_real_escape_string($conn, $_REQUEST['hddnum']);
$hddsz = mysqli_real_escape_string($conn, $_REQUEST['hddsz']);
$mem = mysqli_real_escape_string($conn, $_REQUEST['mem']);
$bup = mysqli_real_escape_string($conn, $_REQUEST['back']);  
$loc = mysqli_real_escape_string($conn, $_REQUEST['location']);
$loco = mysqli_real_escape_string($conn, $_REQUEST['loc_code']);
$load = mysqli_real_escape_string($conn, $_REQUEST['load_bal']);
$own = mysqli_real_escape_string($conn, $_REQUEST['gr_own']);
$numcpu = mysqli_real_escape_string($conn, $_REQUEST['numcpu']);
$notes = mysqli_real_escape_string($conn, $_REQUEST['notes']);  

 

$sql = "INSERT INTO gmoney (server_name, server_ip, server_functions, 
type, os, os_version, os_pack, active, service, domain,
make, model, `serial`, san_attached, hdd_num, hdd_size, `memory`, location, location_code,
load_balanced, group_ownership, num_cpus, notes, manual, `Host`, environment)
 VALUES ('$servName','$servIp','$func','$type','$os',
 '$osversion','$ospack','$act','$ser','$dom',
 '$make','$model','$serial','$san','$hddnum','$hddsz',
 '$mem','$loc','$loco','$load','$own','$numcpu','$notes', '1', '$ho', '$env');";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

$conn->close();

?>

<a href="https://csgdirsvcs.windstream.com:1977/index.php">Home</a>
