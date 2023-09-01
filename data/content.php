<?php 
$starttime = explode(' ',microtime());
require_once "class/class_index.php";
//if(@styem::check("index.php")==false){    die("从何而来");};
$type=strtolower(@$_GET['scrtype']);


$file="template/special/" . $type . ".php";

switch($type){
	default:
	if(file_exists($file)){
		include($file);
	}else{
			print <<<a
			 <script>
			 $(function(){
				layer.alert("暂未上线"); 
			 });
			 
			 </script>
a;
			 
	}

	breaK;
}





?>












