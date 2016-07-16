<?php
include "pdo.php";
$name=$_GET["name"];
$query=$pdo->query("select * from user where username ='$name'");
if($query->fetch()){
	echo 2;
}else{
	echo 1;
}
?>