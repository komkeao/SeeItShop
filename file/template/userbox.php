<script>
function loginf(){
	var username;
	var password;
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
 	 	if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("user").innerHTML=xmlhttp.responseText; 
    	}
  	}
 		username=document.getElementById("u").value;
		password=document.getElementById("p").value;
  		var url="template/login.php?username="+username+"&password="+password;
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
}
function logoutf(){
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
 	 	if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("user").innerHTML=xmlhttp.responseText; 
				document.getElementById("user").className="hidden-xs";
    	}
  	}
  		var url="template/logout.php";
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
}
</script>
<?php

if(!isset($_SESSION["name"])){
	echo "
	<div id='user' class='hidden-xs'>
		<img id='up' src='image/logo50th.png' class='img-responsive '>
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
}else{
	echo "
		<div id='user' class='hidden-xs img-resize' align='center'>
		<img class='class='img-resize' id='up' src='".$_SESSION["picture"]."'>
		<div align='center'>
			".$_SESSION["username"]."<br>".$_SESSION["name"]."<br>
			<button type='button' class='btn btn-default' onClick='logoutf()'>Log Out</button>
		</div> <br>
	</div>";
	}
?>