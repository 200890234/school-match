<?php 
	// $type=$_GET['type'];
	$name=$_GET["name"];
	$val=$_GET["val"];
	$_SESSION[$name]=$val;
	return 1;
 ?>