<?php include "template/top.php";
ob_start()?>
<!doctype html>
<html>
    <head>
    	<title>แจ้งการโอนเงิน:SEE-IT SHOP</title>
        <?php include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox
		include "template/pdo.php";//Include PDO
		if(!isset($_SESSION["username"])){
			header("location:login.php?pay=1");
			}
		if(isset($_POST["name"])){
		$name=$_POST["name"];
		$date=$_POST["date"];
		$pay=$_POST["pay"];
		$bank=$_POST["bank"];
		$orderId=$_POST["orderId"];
		$slip="image/payslip/".$orderId.".jpg";
		move_uploaded_file($_FILES["slip"]["tmp_name"],$slip);
		$etc=$_POST["etc"];
		$address=$_POST["address"];
		$district=$_POST["district"];
		$postCode=$_POST["code"];
		$own=$_POST["own"];
		$pdo->exec("insert into pay value('$orderId','$name','$date','$pay','$bank','$slip','$etc','$address','$district','$postCode','$own')");
		$pdo->exec("update orders set orderStatus='pay'where orderId='$orderId'");
		}
		
		
            function con(){//ข้อมูล Container----->
			echo"			
				<form action='pay.php' method='post' enctype='multipart/form-data'>
					<fieldset>
					<legend>แจ้งการโอนเงิน</legend>
					<div class='form-horizontal'>
					<label for='orderId'>หมายเลขใบสั่งซื้อ:</label>
					<input name='orderId' type='number' placeholder='กรุณาใส่รหัสการสั่งซื้อ' class='form-control' autofocus required>
					<label for='name'>ชื่อนามสกุลผู้สั่งซื้อ:</label>
					<input class='form-control' name='name' type='text' placeholder='กรุณาใช้ชื่อเดียวกับบัญชีธนาคาร' required>
					<label for='date'>วันที่และเวลาที่โอน:</label>
					<input class='form-control' name='date' type='text' placeholder='Ex. 26/3/2558 22.33 น.' required>
					<label for='pay'>จำนวนเงินที่โอน:</label>
					<input class='form-control' name='pay' type='text' placeholder='ควรลงท้ายด้วยเศษสตางค์' required>
					<label for='bank'>ธนาคารและสาขาที่โอน:</label>
					<input class='form-control' name='bank' type='text' placeholder='เพื่อความสดวกในการตรวจสอบ'>
					<label for='slip'>หลักฐานการโอน:</label>
					<input name='slip' type='file' required><label for='slip'>รายละเอียดอื่นๆ:</label>
					<textarea class='form-control' name='etc' placeholder='รายละเอียดอื่นๆ' rows='10'></textarea><br>
					</fieldset>
					<fieldset>
					<legend>ที่อยู่สำหรับการจัดส่งสินค้า</legend>
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
					<label for='hid'>ผู้ทำรายการ:</label>
					<input name='hid' type='text' disabled value='".$_SESSION["username"]."'>
					<input name='own' type='hidden' value='".$_SESSION["username"]."'><br>
					<br><input type='submit' class='form-control'>		
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