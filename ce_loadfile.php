<?php 

require_once("ce_checksession.php");

$filename= $_GET["fn"];
//echo $filename;
$fp = fopen($filename, "r"); 
if($fp) 
{ 
	for($i=1;! feof($fp);$i++) 
	{ 
		echo fgets($fp); 
	} 
} 
else 
{ 
	echo "open file [$filename] fail"; 
} 
fclose($fp); 
