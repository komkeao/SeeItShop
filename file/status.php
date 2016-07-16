<?php include "template/top.php";?><!doctype html>
<html>
    <head>
    	<title>สถานะการโอนเงิน:SEE-IT Shop</title>
        <?php include "template/header.php";//Include Header
		include "template/pdo.php";//Include PDO 		
           $temp=$pdo->query("select * from orders order by orderId DESC");
		   $text="";
		  while($data=$temp->fetch()){
			 if($data["orderStatus"]=="pay"){
								$k="<a href='./image/payslip/".$data["orderId"].".jpg'>pay</a>";
								}else{
								$k=$data["orderStatus"];
								}
				$l="<a href='viewCart.php?orderId=".$data["orderId"]."'>ดูข้อมูล</a>";
			 $text.="
						<tr>
							<td>".$data["orderId"]."</td>
							<td>".$data["orderUsername"]."</td>
							<td>".$data["orderDate"]."</td>
							<td>".$k."</td>
							<td>".$l."</td>
						</tr>";
			  }
		   
		    function con(){//ข้อมูล Container----->
			global $text;
			echo "
			<div align='center'><h1>สถานะการโอนเงิน</h1></div>
								<br><br><table border='2' class='table'>
								<th>Id</th>
								<th>ผู้จ่าย</th>
								<th>วันเวลาที่จ่าย</th>
								<th>สถานะ</th>
								<th>รายการสินค้า</th>
								".$text."<tr>					
							</table>
			
			
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