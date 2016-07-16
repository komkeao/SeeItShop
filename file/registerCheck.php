<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    	<title>สมัครสมาชิก:SEE-IT SHOP</title>   
        <?php 	include "template/header.php";//Include Header
				include "template/pdo.php";//Include PDO 
				include "template/userbox.php";//Include Userbox
            //ข้อมูล Container----->
			$picture="image/profilePicture/".$_POST["username"].".jpg";
			move_uploaded_file ( $_FILES["picture"]["tmp_name"],$picture);
			$images = $picture;///////////
			$height = 120;      //กำหนดขนาดความสูง
          	$size = getimagesize($images);
         	$width = round($height*$size[0]/$size[1]);
			 if($size[2] == 2) {
				$images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
				}
				$photoX = imagesx($images_orig);
				$photoY = imagesy($images_orig);
				$images_fin = imagecreatetruecolor($width, $height);
				imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
				imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่		
				imagedestroy($images_orig);imagedestroy($images_fin);//ขนาดความกว้่างคำนวนเพื่อความสมส่วนของรูป///////
			$username=$_POST["username"];
			$password=$_POST["password"];
			$email=$_POST["email"];
			$name=$_POST["name"];
			$sex=$_POST["sex"];			
			$tel=$_POST["tel"];
			$district=$_POST["district"];
			$code=$_POST["code"];
			$address=$_POST["address"];
			$pdo->exec("insert into user value('','$username','$password','$name','$address','$district','$code','$email','$tel','$sex','$picture')");
			$data=$pdo->query("select * from user where username='$username' and password='$password'");
			if($session=$data->fetch()){//Username and Password are Correct
			$_SESSION["name"]=$session["name"];
			$_SESSION["picture"]=$session["picture"];
			$_SESSION["username"]=$session["username"];
			}
			function con(){echo"
	<form>
		<fieldset>
		<legend>สมัครสมาชิก</legend><br><br><br><br><br><br><br><br><br><br>
		<div style='text-align:center; color:green; font-size:20pt';>สมัครสมาชิกเรียบร้อย</div>
		<br><br><br><br><br><br><br>
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