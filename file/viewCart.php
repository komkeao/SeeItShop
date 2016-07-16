<?php include "template/top.php";?><!doctype html>
<html>
    <head>
    	<title>ข้อมูลการสั่งซื้อ:SEE-IT Shop</title>
        <?php include "template/header.php";//Include Header
		include "template/pdo.php";//Include PDO 
			$orderId=$_GET["orderId"];
			if(isset($_GET["payit"])){
			$pdo->exec("update orders set orderStatus='จัดส่ง'where orderId='$orderId'");
			
			}
           $temp=$pdo->query("select * from item where orderId='$orderId'");
		   $text="";
		   $address="";
		   $sum=0;
		   $total=0;
		
		  while($data=$temp->fetch()){//ดึงสินค้าจากตารางโดย orderId
			  $oid=$data['productId'];
			  $total+=$data["productQuantity"];
			  $t=$pdo->query("Select *from product where productId ='$oid'");
			  $s=$t->fetch();
			  $p=$s["productPrice"]*$data["productQuantity"];
						
			 $text.="
						<tr><td>".$s["productId"]."</td>
							<td>".$s["productName"]."</td>
							<td>".$data["productQuantity"]." ชิ้น</td>
							<td>".$p." บาท</td>
						</tr>";
						$sum+=$p;
			  }
			  $t=$pdo->query("Select * from pay where orderId ='$orderId'"); //ดึงที่อยู่จากใบสั่งซื้อ
			  $s=$t->fetch();
			 /////////////ดึงหลักฐาน
			  $tempData=$pdo->query("Select * from orders where orderId ='$orderId'"); //ดึงที่อยู่จากใบสั่งซื้อ
			  $pic=$tempData->fetch();
			  $img="";
			 if($pic["orderStatus"]=="pay"||$pic["orderStatus"]=="จัดส่ง"){
								$img="<a href='./image/payslip/".$pic["orderId"].".jpg'>
								<img src='./image/payslip/".$pic["orderId"].".jpg' class='img-responsive'></a>";
								}else{
								$img="ยังไม่มีการแจ้งการจ่ายเงิน";
								}
			  $payIt=$s["pay"];//ดึงสถานะการจัดส่ง
			  $address.="<b>ชื่อ:</b>".$s["name"]."<br><b>ที่อยู่ :</b>".$s["address"]."<br><b>จังหวัด :</b>".$s["district"]."
			  <b><br>รหัสไปรษณีย์ :</b>".$s["postCode"];
			  if(!isset($_GET["payit"])){
				 $address.="<div ><a href='viewCart.php?payit=1&orderId=".$orderId."'><font size='+2'>ยืนยันการจัดส่ง</font></a></div><br><br>";
				  }
		   
		   
		    function con(){//ข้อมูล Container----->
			global $total,$address,$sum,$text,$payIt,$img;
			echo "
			<div align='center'><h1>สินค้าในตะกร้า</h1></div>
								<br><br><h2>รายการสินค้า</h2><hr><table border='2' class='table'>
				<tr>
								<th>รหัสสินค้า</th>
								<th>ชื่อสินค้าห</th>
								<th>จำนวนสินค้า</th>
								<th>ราคา</th>
								</tr>
								".$text."
								<tr><td>#</td>
							<td><b>รวม</b></td>
							<td>".$total." ชิ้น</td>
							<td>".$sum." บาท</td>
						</tr>					
							</table>
							<div align='right'>จำนวนเงินที่จ่าย: ".$payIt." บาท</div><br><br>
							
							<h2>หลักฐานการโอน</h2><hr>
							".$img."						<h2>ที่อยู่การจัดส่งสินค้า</h2>
						<hr>".$address."<br>
			
			
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