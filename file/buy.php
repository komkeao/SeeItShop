<?php include "template/top.php";
ob_start()?>
<!doctype html>
<html>
    <head>
    	<title>ยืนยันการสั่งซื้อสินค้า : SEE-IT SHOP</title>
        <?php
			include "template/pdo.php";//Include PDO 
			include "template/header.php";//Include Header
			include "template/userbox.php";//Include Userbox	
			if(isset($_SESSION["username"])){
				$text="";
				$sum=0;
				$qty=0;
				if(isset($_SESSION["cart"][0]["num"])){
					for($i=0;$i<count($_SESSION["cart"]);$i++){
						$id=$_SESSION["cart"][$i]["id"];
						$temp=$pdo->query("Select *from product where productId ='$id'");
						$data=$temp->fetch();
						$text.="
						<tr>
							<td>".($i+1)."</td><td>".$data["productName"]."</td>
							<td>".($_SESSION["cart"][$i]["num"])."</td>
							<td>".(($data["productPrice"])*($_SESSION["cart"][$i]["num"])).".00</td>
						</tr>";
						$sum +=($data["productPrice"])*($_SESSION["cart"][$i]["num"]);
						$qty+=($_SESSION["cart"][$i]["num"]);
					}
				}
			}
			function con(){
				global $text;
				global $sum;
				global $qty;
				if(isset($_SESSION["username"])){
					if(isset($_SESSION["cart"])){
						if(isset($_GET["action"])){ //Confirm Cart
						global $pdo;
						$username=$_SESSION["username"];
						$pdo->exec("insert orders(orderUsername,orderDate,orderStatus) values('$username',NOW(),'wait')");
						$temp=$pdo->query("select * from orders order by orderId DESC");
						$t=$temp->fetch();
						$orderid=$t["orderId"];
						$max=count($_SESSION["cart"]); // ดึงจำนวนสินค้าในตะกร้าออกมา
						for($i=0;$i<$max;$i++){ // วนลูปเพื่อเพิ่มรายการสินค้าในตาราง item
							$pid = $_SESSION["cart"][$i]["id"]; // ดึงรหัสสินค้าออกมา
							$num = $_SESSION["cart"][$i]["num"];	 // ดึงจำนวนสินค้าออกมา
							$s = $pdo->exec("INSERT INTO item VALUES ('','$orderid','$pid','$num')");
						}			
							echo "<div align='center'><h1>ยืนยันการสั่งซื้อเรียบร้อยแล้ว</h1></div>
								<br><br><br><br><br>
								<span><font size='+2' color='red'>รหัสการสั่งซื้อ:".$orderid." โปรดจดไว้เพื่อใช้ในการยืนยันการชำระเงิน</font></span>
								<div style='font-size:130%'><b>ช่องทางการชำระเงิน<b></div>										
								<div>									<table class='table'>
										<tr>
										<th colspan='2' style='text-align:center'>ธนาคาร</th>
										<th>ชื่อบัญชี</th>
										<th>ประเภท</th>
										<th>สาขา</th>
										<th>เลขที่บัญชี</th>
										</tr>
										<tr>
										<td align='center'><img src='image/scb.gif'>
										</td>
										<td><input type='radio'>ไทยพาณิชย์</td>
										<td>SEE-IT SHOP</td>
										<td>ออมทรัพย์</td>
										<td>ขอนแก่น</td>
										<td>038-433xxx-x</td>
										</tr>
									</table>
								</div><br><br>
								<div align='center' style='font-size:130%;'><a href='pay.php'>แจ้งการชำระเงิน</a></div>
							";	
							unset($_SESSION["cart"]);
							}else if(isset($_SESSION["cart"][0]["num"])){//My Cart is Avaiable
							echo "
								<div align='center'>
			<img src='image/list.jpg' class='img-responsive' width='80%'></div>
								<br><br><table border='2' class='table'>
								<th>#</th>
								<th>ชื่อสินค้า</th>
								<th>จำนวน</th>
								<th>ราคา</th>
								".$text."<tr>
								<td>\$</td>
								<td><b>รวม</b></td>
								<td>$qty</td>
								<td>$sum.00</td>
								</tr></table>
								<br><br>							
								<div align='right' style='font-size:150%'>
								ท่านได้ซื้อสินค้าทั้งสิน $qty รายการ รวมเป็นเงิน $sum.00 บาท
								<br><br><a href='buy.php?action=confirm'>ยืนยันการสั่งซื้อ</a>
								</div>
								";
						}	
						}else{//My Cart is Empty
							echo "<div align='center'>
			<img src='image/list.jpg' class='img-responsive' width='80%'></div>
								<br><br><br><br><br>
								<div align='center' style='font-size:130%'>ไม่มีสินค้าในตะกร้า!!!<br>
								<a href='list.php'>เลือกสินค้าใหม่</a></div>
							";	
						}
					
				}else{
					header("location:login.php?buy=login");
				}
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