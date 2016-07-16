<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    	<title>เพิ่มสินค้า:SEE-IT Shop</title>
        <?php require "template/pdo.php";//Include PDO 
		include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox
			if(isset($_POST["title"])){
			$temp=$pdo->query("select * from product order by productId DESC");
			$t=$temp->fetch();
			$find = "\n";
			$replace = "<br>";
			$arr = $_POST["detail"];
			$detail=str_replace($find,$replace,$arr);
			$id=$t["productId"];
			$id++;
			$picture="image/Product/".$id.".jpg";
			move_uploaded_file ($_FILES["file"]["tmp_name"],$picture);
			$images = $picture;///////////
			$height = 720;      //กำหนดขนาดความสูง
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
			$title=$_POST["title"];
			$price=$_POST["price"];
			$seller=$_POST["seller"];
			$tag=$_POST["tag"];
			$pdo->exec("insert into product value('$id','$title','$detail','$price','$seller','$tag')");
			function con($id){//ข้อมูล Container----->
				
				echo"
					<br><br><br><br><br><br><br><div align='center'><h1 color='green'>เพิ่มสินค้าเรียบร้อย</h1>
					<div style='font-size:150%'><a href='product.php?id=".$id."'>ดูสินค้า</a><br>
						<a href='insertProduct.php'>เพิ่มสินค้าใหม่</a></div>
					</div>	
				";//ข้อมูล Container<------------
			}
			}else{
				function con(){//ข้อมูล Container----->
				echo"<br><br><br><br><br><br><br><div align='center'><h1 color='green'>ไม่สามารถเพิ่มสินค้าได้</h1>
			<h2><a href='insertProduct.php'>กรุณาลองอีกครั้ง</a><h2>
			</div>
			";//ข้อมูล Container<------------
				}
				}
			?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con($id); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             <?php con($id);?>
            </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>