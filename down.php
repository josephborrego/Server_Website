<?php

$filename = 'serverTable_'.date('mdY_h').'.csv';
$export_data = unserialize($_POST['export_data']);
$file = fopen($filename,"w");
foreach ($export_data as $line){fputs($file, implode($line, ',')."\n"); }
fclose($file);

// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=".$filename);
header("Content-Type: application/csv; "); 

readfile($filename);

// deleting file
//unlink($filename);
exit();

?>