<?php 
require_once("ce_checksession.php");

$data = $_POST["data"];
$fn = $_POST["filename"];

//if ($fn=="index.html") exit();

$fp = fopen($fn, "w");
if($fp) 
{ 

    $flag=fwrite($fp,$data);
    echo "Write ".$flag." Bytes"; 
} 
else 
{ 
    echo "@@@@@@@ Open File Error @@@@@@@@@"; 
} 
fclose($fp); 

