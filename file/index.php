<?php include "template/top.php";?>
<!doctype html>
<html>

    <head>
    	<title>SEE-IT Shop Online Store At KKU</title>
        <?php include "template/pdo.php";
		include "template/header.php";//Inclusde Header
		include "template/userbox.php";//Include Userbox
		$data=$pdo->query("select * from product order by productId DESC");
		$text="";
		$i=0;
		while($i<5){
			$list=$data->fetch();
			$text.="
			<div width='100%'><table border='0'  style='background-color:rgba(255,255,255,0.1); border-radius:10px;'>
				<tr style='border-radius:10px'><td width='25%'><a href='product.php?id=".$list['productId']."'  >
				<div style='margin:3%;' ><img class'img-responsive'
				 src='image/Product/".$list['productId'].".jpg' width='100%' align='left'></div></td></a><td>			
				<font size='+1'><b>ชื่อสินค้า : </b><a href='product.php?id=".$list['productId']."' >".$list['productName']."</a></b></font><br>
				<font size='+1'><b>ราคา : </b>".$list['productPrice']."</b></font><br>
				<font size='+1'><b>ผู้ประกาศขายสินค้า :</b> ".$list['seller']."</b></font></td></tr>
			</table><br></div>
			";		
			$i++;
		}
        function con($text){//ข้อมูล Container----->
			echo"
				<div align='center'>
				<br>
				
				</div>				
				<img src='image/l.gif' class='img-responsive' style='max-width:70%'>
				<a href='product.php?id=4' ><img src='image/1.jpg' class='img-responsive' style='max-width:100%'></a>
				<a href='product.php?id=5' ><img src='image/2.jpg' class='img-responsive' style='max-width:100%'></a>
				<br><br>
				<img src='image/new.jpg' class='img-responsive'><hr>
				".$text."			
			";//ข้อมูล Container<------------
		}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            	<?php con($text); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             	<?php con($text);?>
            </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>