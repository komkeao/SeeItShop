<?php session_start();
setcookie("username","",time()-3600);
session_destroy();
	echo "
	
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
	";
			
?>