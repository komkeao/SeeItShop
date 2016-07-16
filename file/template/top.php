<?php
include "template/pdo.php";
session_start();
if(!isset($_SESSION["name"])){
	if(isset($_COOKIE["username"])){
		$username=$_COOKIE["username"];
		$data=$pdo->query("select * from user where username='$username'");
		if($session=$data->fetch()){//Username and Password are Correct
			$_SESSION["name"]=$session["name"];
			$_SESSION["picture"]=$session["picture"];
			$_SESSION["username"]=$session["username"];
		}
	}
}
?>