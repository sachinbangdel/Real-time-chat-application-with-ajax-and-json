<?php 

session_start();
	header("Content-Type:application/json;charset=utf-8");
	if(!isset($_SESSION["data"])){
	    $_SESSION["id"]=array();
		$_SESSION["data"]=array();
		$_SESSION["data"][]=array("null","null");
        $_SESSION["id"][]=array("null","null");
	}
	else if(isset($_POST["name"]))
		$_SESSION["data"][]=array($_POST["name"],$_POST["dates"]);

	echo(json_encode($_SESSION["data"]));
?>