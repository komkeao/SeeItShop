<?php include "template/top.php";?><!doctype html>
<html>
    <head>
    	<title>สถานะการโอนเงิน:SEE-IT Shop</title>
        <?php include "template/header.php";//Include Header
		include "template/pdo.php";//Include PDO 
		    function con(){//ข้อมูล Container----->
			global $text;
			echo "
			  <div align='center' style='font-size:150%;'>
  <h1><font color='blue' style='text-shadow:gray 10px 10px 10px;'>Developer Team</font></h1><br><br>
  <img src='image/profilePicture/Administrator.jpg' class='img-thumbnail' width='40%'><br>
  <font color='red' style='text-shadow:black 7px 7px 6px;'>Database And Structure Design</font><br>
  <font color='blue' style='text-shadow:black 7px 7px 6px;'>นายคมเคียว ตั้งประเสริฐ<br>573020361-9</font><br><br>
   <img src='image/nam.jpg' class='img-thumbnail' width='40%'><br>
  <font color='red' style='text-shadow:black 7px 7px 6px;'>Document Writer</font><br>
  <font color='blue' style='text-shadow:black 7px 7px 6px;'>นางสาวชลภัท เมฆพงษ์สาโรจน์<br>573020370-8</font><br><br>
   <img src='image/fon.jpg' class='img-thumbnail' width='40%'><br>
  <font color='red' style='text-shadow:black 7px 7px 6px;'>Graphic Design</font><br>
  <font color='blue'style='text-shadow:black 7px 7px 6px;'> นางสาวคุณัญญา ยุปาระมี<br>573021086-0</font>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </div> 
			
		";//ข้อมูล Container<------------
			}
	?>
		         
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