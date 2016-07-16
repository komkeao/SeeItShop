<?php include "template/top.php";
ob_start()?>
<!doctype html>
<html>
    <head>
    <script>
    	function cal(data,i){
			document.location = "order.php?action=update&ar=" + i + "&num=" + data.value;	
	}
    </script>
    	<title>ตะกร้าสินค้า : SEE-IT SHOP</title>
        <?php		
			include "template/pdo.php";//Include PDO 
			include "template/header.php";//Include Header
			include "template/userbox.php";//Include Userbox
			if(isset($_GET["action"])){
				if($_GET["action"]=="update"){	
					$_SESSION["cart"][($_GET["ar"])]["num"]=$_GET["num"];
					header("location:order.php");			
				}else if($_GET["action"]=="remove"){
					unset($_SESSION["cart"][($_GET["ar"])]);
					$_SESSION["cart"] = array_values($_SESSION["cart"]);
				}else if($_GET["action"]=="clear"){
					unset($_SESSION["cart"]);
				}
			}
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
						<td><input type='number' min='1' max='5' value='".($_SESSION["cart"][$i]["num"])."' onChange='cal(this,$i)'></td>
						<td>".(($data["productPrice"])*($_SESSION["cart"][$i]["num"])).".00</td>
						<td><a href='order.php?action=remove&ar=$i'>ลบ</a></td>
					</tr>";
					$sum +=($data["productPrice"])*($_SESSION["cart"][$i]["num"]);
					$qty +=($_SESSION["cart"][$i]["num"]);
			}
		}
			function con($text,$sum,$qty){
				if(isset($_SESSION["cart"][0]["num"])){
					echo "
						<div align='center'><img src='image/buy.jpg'  class='img-responsive' width='80%'></div>
						<br><br><table border='2' class='table'>
						<th>#</th>
						<th>ชื่อสินค้า</th>
						<th>จำนวน</th>
						<th>ราคา</th>
						<th>ลบสินค้า</th>".$text."<tr>
						<td>\$</td>
						<td><b>รวม</b></td>
						<td>$qty</td>
						<td>$sum.00</td>
						<td><b><a href='order.php?action=clear'>ลบทั้งหมด</a><b></td></tr></table>
						<br><br>
						<div align='right' style='font-size:150%'>
						<a href='buy.php'>ยืนยันการสั่งซื้อ</a>
						</div>
						";	
				}else{
					echo "<div align='center'><h1><img src='image/buy.jpg' class='img-responsive'  width='80%'></h1></div>
						<br><br><br><br><br>
						<div align='center' style='font-size:130%'>ไม่มีสินค้าในตะกร้า!!!<br>
						<a href='list.php'>เลือกสินค้าใหม่</a></div>
					";	
				}		
			}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con($text,$sum,$qty); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             <?php con($text,$sum,$qty);?>
            </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>