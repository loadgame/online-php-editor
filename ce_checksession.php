<?php 

session_start();
$user=$_SESSION['user'];
if ($user==NULL) $user="";
if ($user=='') exit();

