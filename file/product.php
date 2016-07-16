<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>    	
        <?php
		include "template/pdo.php";//Include PDO 
		$id=$_GET["id"];
		$temp=$pdo->query("select * from product where productId='$id'");
		$data=$temp->fetch();
		echo "<title>".$data["productName"].":SEE-IT Shop</title>";
		include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox		
            function con($data){//ข้อมูล Container----->
				echo"<h1 style='font-size:200%'>".$data['productName']."</h1><hr><br>
				<div align='center'>
					<img src='image/Product/".$data['productId'].".jpg' class='img-responsive img-thumbnail ' style='max-width:60%'></img>
				</div>
				<br><br><div style='font-size:150%; color:blue;'>
				<b>ราคาสินค้า : </b>".$data['productPrice']." บาท
				<br><b>ผู้ลงประกาศขายสินค้า : </b>".$data['seller']."<br><div style='font-size:100%; color:black;'>
				
				<b>สั่งซื้อทันที : </b>
				";
				include "template/addCart.php";
				echo "</div>
				</div><br>
				<div style='font-size:150%'>
					".$data['productDetail']."
					<br><br>
					<div style='font-size:80%'><b>Tag: </b><span>".$data["tag"]."</span></div>
				</div>
				
				<br><br>
			";//ข้อมูล Container<------------
			}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con($data); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             <?php con($data);?>
            </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>