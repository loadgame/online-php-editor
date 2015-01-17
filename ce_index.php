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

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a723ed39c028645e0ec3c88741d09c03";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</html>
  
