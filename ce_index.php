<html>
<?php

  require_once('ce_config.php');
  session_start(); 

  $user=$_SESSION['user'];
  if ($user!=$ce_admin)   {
    echo "<script>location.href='ce_login.php';</script>"; 
    exit();
  }
?>
 


<frameset cols="30%,70%">
  <frame name='left' src="ce_filelist.php" />
  <frame name='right' src="ce_editor.html" />
</frameset>

</html>
  
