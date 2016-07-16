<?php include "template/top.php";
setcookie("username","",time()-3600);
session_destroy();

?>
<!doctype html>
<html>
    <head>
    	<title>ออกจากระบบ:SEE-IT Shop</title>
        <META HTTP-EQUIV="Refresh" CONTENT="5;URL=index.php">        
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="ซื้อของ,ขายของ,ร้านค้าออนไลน์,ราคาถูก,ซื้อ,ขาย,สีอิฐชอบ,see-it">
        <meta name="description" content="ศูนย์กลางการซื้อขายแลกเปลี่ยนสินค้าไอทีและเทคโนโลยีแห่งใหม่ของชาวเลือดสีอิฐ ตอบสนองทุกความต้องการเพียงปลายนิ้วสัมผัส">
        <meta name="author" content="นายคมเคียว ตั้งประเสริฐ">  
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">               
    </head>    
    <body>    
    	<div class="container">
        <!--Header-->
            <div id="header">
                <a href="index.php"><img id="up" src="image/logo.png" class="img-responsive"></a>
                <ul class="nav nav-tabs ">
                    <li><a href="index.php">หน้าหลัก</a></li>
                    <li><a href="list.php">รายการสินค้า</a></li>
                    <li role="presentation" class="dropdown">
    					<a data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:inherit;">
             	             สั่งซื้อสินค้า<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                        	<li><a href="order.php">ตะกร้า</a></li>
                            <li><a href="buy.php">ยืนยันการสั่งซื้อ</a></li>
                          	<li><a href="pay.php">แจ้งการโอนเงิน</a></li>
                        </ul>
  					</li>
                    <li role="presentation" class="dropdown">
    					<a data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:inherit;">
             	            บัญชีผู้ใช้ <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                        <!--<li class=\"visible-xs\">--><li><a href=login.php>เข้าสู่ระบบ</a></li>
                          	<li><a href="register.php">สมัครสมาชิก</a></li>	
                        </ul>
  					</li>
                </ul>
            </div>
        <!--Container--> 
        <div style="overflow:hidden;" class="col-lg-12">  
        <?php
            function con(){//ข้อมูล Container----->
			echo"	
			<br><br><br><br><br>
			<div align='center'>
			<font color='green' size='+3'>ออกจากระบบเสร็จสมบูรณ์!!!</font><br>
			<font size='+1'>ลาก่อน ".$_SESSION["name"]."</font><br><br></div>
		";//ข้อมูล Container<------------
			}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            	<?php con(); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             	<?php con(); ?>
            </div>
           	<?php include "template/details.php"; ?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php"; ?><!--Footer-->
	</body>
</html>
