<?php include "template/top.php";?><!doctype html>
<html>
    <head>
    	<title>เข้าสู่ระบบ:SEE-IT Shop</title>
        <?php include "template/header.php";//Include Header
		include "template/pdo.php";//Include PDO 
            function con(){//ข้อมูล Container----->
			$url = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
			$error="";
				if(isset($_GET["error"])){
					$error ="<br><font color='red'>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</font>";
				}else if(isset($_GET["buy"])){
					$error ="<br><font color='red'>กรุณา Login ก่อนทำการสั่งซื้อสินค้า</font>";
				}else if(isset($_GET["pay"])){
					$error ="<br><font color='red'>กรุณา Login ก่อนแจ้งการโอนเงิน</font>";
				}
			echo"	
			<br>
		<form action='checkLogin.php' method='post'>
			<fieldset>
			<legend>Login</legend>
			<div class='form-horizontal col-lg-5 col-md-6 col-sm-8 col-xs-8'><span>".$error."</span><br>
				<label for='username'>Username:</label>
				<input class='form-control' name='username' type='text' placeholder='Username' pattern='[a-zA-Z0-9]{5,20}' autofocus required>
				<label for='password'>Password:</label>
				<input class='form-control' name='password' type='password' placeholder='Enter Your Password' pattern='{8,20}' required>
				<input name='remember' type='checkbox'>
				<label for='remember'>Remember Me</label>";
				if(isset($_GET["buy"])){
				echo "<input type='hidden' name='buy' value='1'>";
				}else if(isset($_GET["pay"])){
				echo "<input type='hidden' name='pay' value='1'>";
				}
				echo "
				<input type='submit' class='form-control'>
			</div>
			</fieldset>
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