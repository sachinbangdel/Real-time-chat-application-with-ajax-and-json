<?php
session_start();
$ind=$_GET["id"];
$_SESSION["data"][$ind]=array("","");
header("Location:index.php");
?>