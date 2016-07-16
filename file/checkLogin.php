<?php include "template/top.php";?>
<!doctype html>
<html>
    <head>
    	<title>เข้าสู่ระบบ:SEE-IT Shop</title>
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
                            <?php if(isset($_POST["username"])){
								echo "<!--<li  class=\"visible-xs\">--><li><a href=\"statusUser.php\">สถานะการจัดส่ง</a></li>
								";
							
							}?>
                        </ul>
  					</li>
                    <li role="presentation" class="dropdown">
    					<a data-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:inherit;">
             	            บัญชีผู้ใช้ <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                        <?php if(isset($_POST["username"])){
								$username=$_POST["username"];
							if($username=="Administrator"){
								echo "<!--<li  class=\"visible-xs\">--><li><a href=\"insertProduct.php\">เพิ่มสินค้า</a></li>
								<!--<li  class=\"visible-xs\">--><li><a href=\"status.php\">สถานะการโอนเงิน</a></li>";
							}
							}?>
                       <!--<li  class=\"visible-xs\">--><li><a href="logout.php">ออกจากระบบ</a></li>	
                        </ul>
  					</li>
                </ul>
            </div>
        <!--Container--> 
        <div style="overflow:hidden;" class="col-lg-12">  
		<?php 
		include "template/pdo.php";//Include PDO 
		$username=$_POST["username"];
		$password=$_POST["password"];
		$data=$pdo->query("select * from user where username='$username' and password='$password'");
		if($session=$data->fetch()){//Username and Password are Correct
			$_SESSION["name"]=$session["name"];
			$_SESSION["picture"]=$session["picture"];
			$_SESSION["username"]=$session["username"];
			if(isset($_POST["remember"])){
				setcookie("username",$session["username"],time()+(60*60*24*30));
			}
			if(isset($_POST["buy"])){//เชคว่าเป็นการลอกอินมาจากหน้าสั่งซื้อหรือไม่
				header("location:buy.php");
				}else if(isset($_POST["pay"])){//เชคว่าเป็นการลอกอินมาจากหน้าจ่ายหรือไม่
				header("location:pay.php");
				}
			}else{
				header("location:login.php?error=error");//รหัสผ่านผิด ให้ Login ใหม่อีกครั้ง
			}
            function con(){//ข้อมูล Container----->
			echo"	
			<br><br><br>
			<div align='center'>
			<font color='green' size='+3'>ล็อกอินสำเร็จ!!!</font><br>
			<font size='+1'>ยินดีต้อนรับ ".$_SESSION["name"]."</font><br><br>
			<a href='index.php'><font size='+2'>กลับไปหน้าแรก</font></a><br></div>
		";//ข้อมูล Container<------------
			}?>           
            <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con(); ?>
            </div>
            <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             	<?php con();?>
            </div>   
           		<?php include "template/details.php";
			include "template/userbox.php";//Include Userbox
				?><!--เนื้อหาฝั่งขวา-->    			
        		<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>