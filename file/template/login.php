<?php 
		include "pdo.php";
		session_start();
		$username=$_GET["username"];
		$password=$_GET["password"];
		$data=$pdo->query("select * from user where username='$username' and password='$password'");
		if($session=$data->fetch()){//Username and Password are Correct
			$_SESSION["name"]=$session["name"];
			$_SESSION["picture"]=$session["picture"];
			$_SESSION["username"]=$session["username"];
			if(isset($_POST["remember"])){
				setcookie("username",$session["username"],time()+(60*60*24*30));
			}
			echo "
		<div class='img-resize' align='center'>
		<img class='class='img-resize' id='up' src='".$_SESSION["picture"]."'>
		<div align='center'>
			".$_SESSION["username"]."<br>".$_SESSION["name"]."<br>
			<button type='button' class='btn btn-default' onClick='logoutf()'>Log Out</button>
		</div> <br>
	</div>";
			}else{
					echo "
	<div>
		<img id='up' src='image/logo50th.png' class='img-responsive'>
		<form class='form-inline' style='text-align:center'>
			<div class='form-group'>
				<input type='text' class='form-control'  placeholder='Username' id='u' name='username'>
			</div><br>
			<div class='form-group'>
				<input type='password' class='form-control' placeholder='Password' id='p' name='password'>
			</div><br>
			<input name='remember' type='checkbox'>
				<label for='remember'>Remember Me</label><br>
			<button type='button' class='btn btn-default' onClick='loginf()'>Sign in</button>
		</form>
	</div>";
			}
?>