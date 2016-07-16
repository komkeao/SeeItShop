<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    <?php
		include "template/pdo.php";//Include PDO 
		$name=$_POST["name"];//รับค่า
		$id=$_POST["id"];
		$num=$_POST["num"];
		$url=$_POST["url"];
		addCart($id,$num,$name);
		function addCart($id, $num,$name) { // function ในการเพิ่มสินค้า
			if(isset($_SESSION["cart"])) {//เชคว่ามีตระกร้าอยู่แล้วหรือไม่
				$max = count($_SESSION["cart"]); //เชค Array ว่ามีกี่ช่อง
				for($i=0;$i<$max;$i++){
					if($id==($_SESSION["cart"][$i]["id"])){//เชคว่ามีสินค้าอยู่แล้วหรือไม่ ถ้ามี ก็อัพเดตจำนวนสินค้าแล้วออกจา Loop
						$_SESSION["cart"][$i]["num"] = $num;
						break;
					}else if($i==(($max-1))){//ถ้าเชคถึงตัวสุดท้ายแแล้วไม่มี ให้เพิ่มสินค้าเป็นชิ้นใหม่
						$_SESSION["cart"][$max]["id"] = $id; //กำหนดค่าให้ตัวแปร SESSION
						$_SESSION["cart"][$max]["num"] = $num;
						$_SESSION["cart"][$max]["name"] = $name;
					}
				}			
			} else { //ถ้าไม่มีก็สรา้งตะกร้าใหม่
				$_SESSION["cart"] = array();
				$_SESSION["cart"][0]["id"] = $id; 
				$_SESSION["cart"][0]["num"] = $num; 
				$_SESSION["cart"][0]["name"] = $name; 
			}
		} 	
		echo "<title>".$name.":SEE-IT Shop</title>";
		include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox		
        function con($name,$url,$id){//ข้อมูล Container----->
			echo "		<br><br><br><br><br><br>	<div align='center' style='font-size:150%'>
			เพิ่มสินค้า ".$name." ลงตะกร้าสินค้าเรียบร้อยแล้ว<br>
			<a href='list.php'>เลือกสินค้าเพิ่ม</a><br>
			<a href='order.php'>ดูตะกร้าสินค้า </a>
			</div>
			";
		} ?>           
        <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
        	<?php con($name,$url,$id); ?>
        </div>
        <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
         	<?php con($name,$url,$id);?>
        </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>