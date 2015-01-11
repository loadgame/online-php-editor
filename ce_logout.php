<?php
    //from login.php
    
    session_start(); 
    $_SESSION['user']='';
    
    echo "<script>location.href='ce_login.php';</script>"; 

