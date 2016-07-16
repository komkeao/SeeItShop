<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    <script>
function vaEmail(){
	document.getElementById("email").className = "form-control  thinking";
	var xmlhttp;
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function(){
 	 	if (xmlhttp.readyState==4 && xmlhttp.status==200){
			if(xmlhttp.responseText==1){
				document.getElementById("email").className=" approved form-control"; 
				}else if(xmlhttp.responseText==2){
				
				document.getElementById("email").focus();
				document.getElementById("email").select();
				document.getElementById("email").className=" denied form-control"; 
				}
    		}
  		}
 		var email = document.getElementById("email").value;
  		var url="template/vaEmail.php?email="+email;
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
	function vaName(){
		document.getElementById("username").className = "form-control  thinking";
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		}
		else{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
				if(xmlhttp.responseText==1){
					document.getElementById("username").className=" approved form-control"; 
					document.getElementById("text").innerHTML="";
				}else if(xmlhttp.responseText==2){					
					document.getElementById("username").focus();
					document.getElementById("username").select();
					document.getElementById("username").className=" denied form-control"; 
					document.getElementById("text").innerHTML="Username is not available<br>";
				}
			}
		}
		var name = document.getElementById("username").value;
		var url="template/vaName.php?name="+name;
		xmlhttp.open("GET",url,true);
		xmlhttp.send();
	}
</script>
    	<title>สมัครสมาชิก:SEE-IT SHOP</title>
        <?php 	include "template/header.php";//Include Header
				include "template/pdo.php";//Include PDO 
			
    function con(){//ข้อมูล Container----->
		echo"		
			<h1 align=\"center\" >สมัครสมาชิก</h1>		<br><br>	
			<form method='post' action='registerCheck.php' enctype='multipart/form-data' name='formRegister'>
				<fieldset>
				<legend>Login</legend>
				<div class=\"form-horizontal col-lg-5 clo-md-6 col-sm-8 col-xs-10\">
				<label for=\"username\">Username:</label>
				<input class=\"form-control\" name=\"username\" id='username' type=\"text\" 
				placeholder=\"5-20 Word\" pattern=\"[a-zA-Z0-9]{5,20}\" onBlur='vaName()' autofocus required>
				<span id='text'></span>
				<label for=\"password\">Password:</label>
				<input class=\"form-control\" name=\"password\" type=\"password\" placeholder=\"8-20 Word\" pattern=\"{8,20}\" required>
				<label for=\"email\">E-mail:</label>
				<input class=\"form-control\" id=\"email\" name=\"email\"type=\"email\" required placeholder=\"Enter your email\" 
				onBlur=\"vaEmail()\" autocomplete='off' >
				</fieldset>
				<fieldset>
				<legend>User Details</legend>
				<div class=\"form-horizontal col-lg-5 clo-md-6 col-sm-8 col-xs-10\">
				<label for=\"name\">Name:</label>
				<input class=\"form-control\" name=\"name\" type=\"text\" placeholder=\"ใส่ชื่อของคุณ\" pattern=\"{5,20}\" required>
				<div><label for=\"sex\">Sex:</label><br>
				<select name=\"sex\" required>
				<option value=\"male\">Male</option>
				<option value=\"female\">Female</option>
				</select></div>
				<label for=\"picture\">Picture:</label>
				<input class=\"form-control\" name=\"picture\" type=\"file\" required>
				<label for=\"tel\">Telphone:</label>
				<input class=\"form-control\" name=\"tel\" type=\"text\" placeholder=\"Telephone\" required>
				</div>
				</fieldset>
				<fieldset>
				<legend>Adress</legend>
				<div class=\"form-horizontal col-lg-5 clo-md-6 col-sm-8 col-xs-10\">
				<label for=\"address\">Address:</label>
				<textarea name=\"address\" cols=\"50\" rows=\"5\" class=\"form-control\" placeholder=\"Enter Your Address\"></textarea>
				<div><label for=\"district\">District:</label><br>
				<select name=\"district\" class=\"form-control\">
						<option value=\"กระบี่\"กระบี่</option>
						<option value=\"กรุงเทพมหานคร\">กรุงเทพมหานคร</option>
						<option value=\"กาญจนบุรี\">กาญจนบุรี</option>
						<option value=\"กาฬสินธุ์\">กาฬสินธุ์</option>
						<option value=\"กำแพงเพชร\">กำแพงเพชร</option>
						<option value=\"ขอนแก่น\">ขอนแก่น</option>
						<option value=\"จันทบุรี\">จันทบุรี</option>
						<option value=\"ฉะเชิงเทรา\">จันทบุรี</option>
						<option value=\"ชลบุรี\">ชลบุรี</option>
						<option value=\"ชัยนาท\">ชัยนาท</option>
						<option value=\"ชัยภูมิ\">ชัยภูมิ</option>
						<option value=\"ชุมพร\">ชุมพร</option>
						<option value=\"ตรัง\">ตรัง</option>
						<option value=\"ตราด\">ตราด</option>
						<option value=\"ตาก\">ตาก</option>
						<option value=\"นครนายก\">นครนายก</option>
						<option value=\"นครปฐม\">นครปฐม</option>
						<option value=\"นครพนม\">นครพนม</option>
						<option value=\"นครราชสีมา\">นครราชสีมา</option>
						<option value=\"นครศรีธรรมราช\">นครศรีธรรมราช</option>
						<option value=\"นครสวรรค์\">นครสวรรค์</option>
						<option value=\"นนทบุรี\">นนทบุรี</option>
						<option value=\"นราธิวาส\">นราธิวาส</option>
						<option value=\"น่าน\">น่าน</option>
						<option value=\"บึงกาฬ\">บึงกาฬ</option>
						<option value=\"บุรีรัมย์\">บุรีรัมย์</option>
						<option value=\"ปทุมธานี\">ปทุมธานี</option>
						<option value=\"ประจวบคีรีขันธ์\">ประจวบคีรีขันธ์</option>
						<option value=\"ปราจีนบุรี\">ปราจีนบุรี</option>
						<option value=\"ปัตตานี\">ปัตตานี</option>
						<option value=\"พระนครศรีอยุธยา\">พระนครศรีอยุธยา</option>
						<option value=\"พะเยา\">พะเยา</option>
						<option value=\"พังงา\">พังงา</option>
						<option value=\"พัทลุง\">พัทลุง</option>
						<option value=\"พิจิตร\">พิจิตร</option>
						<option value=\"พิษณุโลก\">พิษณุโลก</option>
						<option value=\"ภูเก็ต\">ภูเก็ต</option>
						<option value=\"มหาสารคาม\">มหาสารคาม</option>
						<option value=\"มุกดาหาร\">มุกดาหาร</option>
						<option value=\"ยะลา\">ยะลา</option>
						<option value=\"ยโสธร\">ยโสธร</option>
						<option value=\"ระนอง\">ระนอง</option>
						<option value=\"ระยอง\">ระยอง</option>
						<option value=\"ราชบุรี\">ราชบุรี</option>
						<option value=\"ร้อยเอ็ด\">ร้อยเอ็ด</option>
						<option value=\"ลพบุรี\">ลพบุรี</option>
						<option value=\"ลำปาง\">ลำปาง</option>
						<option value=\"ลำพูน\">ลำพูน</option>
						<option value=\"ศรีสะเกษ\">ศรีสะเกษ</option>
						<option value=\"สกลนคร\">สกลนคร</option>
						<option value=\"สงขลา\">สงขลา</option>
						<option value=\"สตูล\">สตูล</option>
						<option value=\"สมุทรปราการ\">สมุทรปราการ</option>
						<option value=\"สมุทรสงคราม\">สมุทรสงคราม</option>
						<option value=\"สมุทรสาคร\">สมุทรสาคร</option>
						<option value=\"สระบุรี\">สระบุรี</option>
						<option value=\"สระแก้ว\">สระแก้ว</option>
						<option value=\"สิงห์บุรี\">สิงห์บุรี</option>
						<option value=\"สุพรรณบุรี\">สุพรรณบุรี</option>
						<option value=\"สุราษฎร์ธานี\">สุราษฎร์ธานี</option>
						<option value=\"สุรินทร์\">สุรินทร์</option>
						<option value=\"สุโขทัย\">สุโขทัย</option>
						<option value=\"หนองคาย\">หนองคาย</option>
						<option value=\"หนองบัวลำภู\">หนองบัวลำภู</option>
						<option value=\"อำนาจเจริญ\">อำนาจเจริญ</option>
						<option value=\"อุดรธานี\">อุดรธานี</option>
						<option value=\"อุทัยธานี\">อุทัยธานี</option>
						<option value=\"อุบลราชธานี\">อุบลราชธานี</option>
						<option value=\"อ่างทอง\">อ่างทอง</option>
						<option value=\"เชียงราย\">เชียงราย</option>
						<option value=\"เชียงใหม่\">เชียงใหม่</option>
						<option value=\"เพชรบุรี\">เพชรบุรี</option>
						<option value=\"เพชรบูรณ์\">เพชรบูรณ์</option>
						<option value=\"เลย\">เลย</option>
						<option value=\"แพร่\">แพร่</option>
						<option value=\"แม่ฮ่องสอน\">แม่ฮ่องสอน</option>
				</select>
				</div>
				<label for=\"code\">Post-Code:</label>
				<input class=\"form-control\" name=\"code\" type=\"text\" placeholder=\"Code\" pattern=\"[0-9]{5}\"required><br><br>
				<input type=\"submit\" class=\"form-control\"></div>
				</fieldset><br>
		</form>
			";//ข้อมูล Container<------------
			}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con(); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             <?php con();?>
            </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>