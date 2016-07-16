<?php
include "pdo.php";
$email=$_GET["email"];
$query=$pdo->query("select * from user where email ='$email'");
if($query->fetch()){
	echo 2;
}else{
	echo 1;
}
?>