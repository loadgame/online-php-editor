<?php

//come from login.php

require_once("ce_config.php");

$user = $_POST['user'];
$pass = $_POST['pass'];

if (($user==$ce_admin) && ($pass==$ce_pass))
{ 

    session_start(); 
    $_SESSION['user']=$ce_admin;
    echo "<script>location.href='ce_index.php';</script>"; 
} 
else 
{ 
    echo "pass error!"; 
    echo "<script>location.href='ce_login.php';</script>"; 
} 


 
 
 
 
