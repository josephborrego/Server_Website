<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styleIndexFont.css">
<style>
a {
  width: 150px;
  height: 150px;
  vertical-align: middle;
  text-align: center;
}
</style>
</head>

<body>
<?php include("red/topspec.php");?>

<div>
<form action="parse.php" method="post">

	<label for="grew">ServiceNow Ticket Number</label>
	<input id="grew" type="text" name="service">

	<label for="server">Server Name</label>
	<input type="text" id="server" name="server_name">

	<label for="serverip">Server IP</label>
	<input type="text" id="serverip" name="server_ip">

	<label for="function">Server Function</label>
	<input type="text" id="function" name="server_functions">

	<label for="function">Host</label>
	<input type="text" id="function" name="the_host">

	<label for="production">Server Type</label>
	<select id="production" name="type">
		<option value="Virtual">Virtual</option>
		<option value="Physical">Physical</option>
		<option value="Appliance">Appliance</option>
		<option value="Other">Other</option>
	</select>

	<label for="env">Environment</label>
	<select id="env" name="env">
		<option value="Production">Production</option>
		<option value="Development">Development</option>
		<option value="Test">Test</option>
		<option value="Sandbox">Sandbox</option>
	</select>

	<label for="theos">Operating System </label>
	<select id="theos" name="os">
		<option value="Windows">Windows</option>
		<option value="NetWare">NetWare</option>
		<option value="Linux">Linux</option>
		<option value="Other">Other</option>
	</select>
	
	<label for="osversion">OS Version </label>
	<input type="text" id="osversion" name="os_version">
	
	<label for="ospack">OS Service Pack </label>
	<input type="text" id="ospack" name="ospack">

	<label for="theact">Active </label>
	<select id="theact" name="active">
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>

	<label for="auth">Domain </label>
	<select id="auth" name="dom">
		<option value="Centrify">Centrify</option>
		<option value="CSO">CSO</option>
		<option value="PAETEC-DM">PAETEC-DM</option>
		<option value="CORP.VOX.COM">CORP.VOX.COM</option>
		<option value="HostedSolutions">HostedSolutions</option>
		<option value="Cavalier">Cavalier</option>
		<option value="Local">Local</option>
		<option value="Other">Other</option>
	</select>

	<label for="themake">Make</label>
	<input type="text" id="themake" name="make">

	<label for="themodel">Model </label>
	<input type="text" id="themodel" name="model">
	
	<label for="cereal">Serial Number </label>
	<input type="text" id="cereal" name="seria">

	<label for="san">SAN Attached </label>
	<select id="san" name="san_att">';
		<option value="Yes">Yes</option>
		<option value="No">No</option>
	</select>

	<label for="numc">Number of CPUs </label>
	<input id="numc" type="text" name="numcpu">	

	<label for="hdd">HDD Number </label>
	<input type="text" id="hdd" name="hddnum">

	<label for="hddsz">HDD Size (GB) </label>
	<input type="text" id="hddsz" name="hddsz">

	<label for="mem">Memory (GB) </label>
	<input type="text" id="mem" name="mem">

	<label for="back">Backup </label>
	<select id="back" name="back">
		<option value="TestDev">TestDev</option>
		<option value="Production">Production</option>
	</select>

	<label for="theloc">Location </label>
	<input type="text" id="theloc" name="location">	

	<label for="codez">Location Code </label>
	<input type="text" id="codez" size=100 name="loc_code">

	<label for="loadb">Load Balanced With </label>
	<input id="loadb" type="text" name="load_bal">

	<label for="grew">Group Owner </label>
	<input id="grew" type="text" name="gr_own">

	<label for="grew">Additional notes </label>
	<input id="grew" type="text" name="notes">
	
	<input type="submit" value="Submit">
</form>
</div>

<a href="https://csgdirsvcs.windstream.com:1977/index.php">
<font size="6"> 
<center>Home</center>
</font>
</a>

</body>
</html>













