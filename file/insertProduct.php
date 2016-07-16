<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    	<title>เพิ่มสินค้า:SEE-IT Shop</title>
        <?php include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox
            function con(){//ข้อมูล Container----->
			echo"
			<br><br>
			<form action='addProduct.php' method='post' enctype='multipart/form-data'>
				<fieldset>
				<legend>เพิ่มรายการสินค้า</legend>
				<label for=\"title\" >ชื่อสินค้า:</label>
				<input type='text' name='title' class='form-control' placeholder='ใส่ชื่อสินค้า' required>
				<label for=\"detail\">รายละเอียดสินค้า:</label>
				<textarea class='form-control' rows='10' name='detail' placeholder='รายละเอียดสินค้า' required></textarea>
				<label for=\"tag\">แท็ก:</label>
				<input type='text' class='form-control' name='tag' placeholder='ใส่ tag คั่นด้วย ,' required>
				<div class=\"form-horizontal col-lg-5 clo-md-6 col-sm-8 col-xs-8\">
					<label for=\"price\">ราคาสินค้า:</label>
					<input type='tag' class='form-control' name='price' placeholder='ราคาสินค้า' required><label for=\"file\">รูปสินค้า:</label>
								
					<input type='file' class='form-control' name='file'>
					<label for=\"disable\">ชื่อผู้ขาย:</label>
					<input type='text' class='form-control' value='Administrator' name='disable' disabled>
					<input type='hidden' value='Administrator' name='seller'>	<br><br>
				</div>			
				<div align='center'><input type='submit' class='form-control'></div>		
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