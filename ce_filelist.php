<html>
<head>
<xscript src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<xscript src="jquery-1.11.2.min.js"></script>

<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>

<body>
 

 



<div class="container">

<?php
    require_once("ce_checksession.php");

?>




<br />
<br />

<?php

    function uppath($path){
        $a= explode( '/', $path ) ;
        $i=count($a);
        $last=$a[$i-1];
        return substr($path, 0, -strlen($last)-1);
    }


    $path=$_GET['path'];
    if ($path=='') $path=getcwd();

    
?>

<input id='path' class="form-control" value='<?php echo $path; ?>'></input>
<input id='file' class="form-control" ></input>
<br />
<br />
<a class="btn btn-default" href=http://ace.c9.io/#nav=howto&api=document>doc</a>
<button class="btn btn-default" onclick="refreshAll();">refresh</button> 
<button class="btn btn-default" id='' onclick="foo();">test</button>
<button class="btn btn-default" id="a">load</button>
<button class="btn btn-default" id='b'>save</button>
<a class="btn btn-default" href=ce_logout.php>logout <?php echo $user; ?></a>
<br />
<br />
<?php

 

 


$uppath=uppath($path);
echo uppath($path);
echo "<br />";

echo '<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> ';
echo "<a href=ce_filelist.php?path=".$uppath.">..</a><br />";
$dir = dir($path);

$fileArr   =   array();
$dirArr   =   array();

while (($file = $dir->read()) !== false)
{
    
    
    if (($file!='.') && ($file!='..') )
    {
        if (!is_file($path."/".$file)) {
            
            $dirArr[]= $file;
            
            //echo "[D]<a href=ce_filelist.php?path=".$path."/".$file.">".$file."</a><br />";
        } else  {
            $fileArr[]= $file;
            //echo "<a href='javascript:void(0)' class='file' onclick='myloadFile(\"".$path."/".$file."\");'>".$file."</a><br />";
        }
    }
      
}

$dir->close();

//array_multisort($isdir,SORT_DESC,$time,SORT_DESC,$fileArr);   
sort($fileArr);
sort($dirArr);
 

foreach ($dirArr as $key => $file){
    echo '<span class="glyphicon glyphicon-folder-close"  ></span> ';
    echo "<a href=ce_filelist.php?path=".$path."/".$file.">".$file."</a><br />";
}
foreach ($fileArr as $key => $file){
    
    echo '<span class="glyphicon glyphicon-list-alt"  ></span> ';
  echo "<a href='javascript:void(0)' class='file' onclick='myloadFile(\"".$path."/".$file."\");'>".$file."</a><br />";
}
   
    

?>

    
<script language="javascript" type="text/javascript">

    function foo() {
        //$("#alert").alert("open");
        //$(".alert").show();
        //$("#alert").alert("close");
        
        //alert('hello');
    }

    function refreshAll() {
        //parent.frames["right"].location.reload();
        parent.frames["right"].setString('');
        location.reload();
    }
    

    function myloadFile(s){
        $.ajax({ 
            url:"ce_loadfile.php",
            data:{fn:s},
    	    type:"get", 
    	    cache:false,
            success: function(data){
       		    parent.frames["right"].setString(data);
                $("#file").val(s);
            },
    	    error:function() { alert("faile");},
         });
         $("#alert").alert();
    }


$(document).ready(function(){

        $("#a").click(function() {
            //alert(parent.frames["right"].location.href);
            
            $("#file").val("");
            
            $.get("ce_loadfile.php",function(data,textStatus){
                if (textStatus='success')
                parent.frames["right"].setString(data);
            });
            
        });

        $(".filxe").click(function() {

            $.get("ce_loadfile.php",function(data,textStatus){
            
                if (textStatus='success')
                parent.frames["right"].setString(data);
            
            });
        });

        $("#b").click(function() {
                lines=parent.frames["right"].getname();
                $.post("ce_savefile.php",
                  {
                  
                    filename:$("#file").val(),
                    data:lines
                  },
                  function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                  });
		
        });
});

</script>

</body>
</html>
