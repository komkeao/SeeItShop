<?php include "template/top.php";?><!doctype html>
<html>
    <head>
    	<title>รายการสินค้า:SEE-IT Shop</title>
        <?php 
		include "template/pdo.php";
		include "template/header.php";//Include Header
		include "template/userbox.php";//Include Userbox
		$Num_Rows=0;
		if(isset($_GET["keyword"])){
			$key=$_GET["keyword"];
			$s=$pdo->query("select * from product where productName like '%$key%' order by productId DESC");
				while($s->fetch()){
					$Num_Rows++;
				}
		}else if(isset($_GET["tag"])){//มีการส่งสินtagค้ามา
			$tag=$_GET["tag"];
			$s=$pdo->query("select * from product where tag like '%$tag%' order by productId DESC");
				while($s->fetch()){
					$Num_Rows++;
				}
			}else{//ถ้าไม่มีการส่ง Keyword มาค้นหา ให้แสดงสินค้าทั้งหมด
				$s=$pdo->query("select * from product order by productId DESC");		
				while($s->fetch()){
					$Num_Rows++;
				}
			}//////////////////////ระบบแบ่งหน้าสินค้า///////////////////
			$Per_Page = 5; 
			if(isset($_GET["Page"])){
			$Page = $_GET["Page"];
			}else{
				$Page=1;
			}
			$Prev_Page = $Page-1;
			$Next_Page = $Page+1;
			$Page_Start = (($Per_Page*$Page)-$Per_Page);
			if($Num_Rows<=$Per_Page){
				$Num_Pages =1;
			}
			else if(($Num_Rows % $Per_Page)==0){
				$Num_Pages =($Num_Rows/$Per_Page) ;
			}
			else{
				$Num_Pages =($Num_Rows/$Per_Page)+1;
				$Num_Pages = (int)$Num_Pages;
			}
					$text="";
					if(isset($_GET["keyword"])){
						$key=$_GET["keyword"];
						$obj="select * from product where productName like '%$key%' order  by productId DESC LIMIT ".$Page_Start." , ".$Per_Page."";
						$index="&keyword=$key";
						
					}else if(isset($_GET["tag"])){//มีการส่งสินtagค้ามา
						$tag=$_GET["tag"];
						$obj="select * from product where tag like '%$tag%' order  by productId DESC LIMIT ".$Page_Start." , ".$Per_Page."";
						$index="&tag=$tag";
						
					}else{//ถ้าไม่มีการส่ง Keyword มาค้นหา ให้แสดงสินค้าทั้งหมด
						$obj="select * from product order  by productId DESC LIMIT ".$Page_Start." , ".$Per_Page."";
						$index="";
					}					
			$objQuery  = $pdo->query($obj);
					while($objResult=$objQuery->fetch())
			{
			$text.="
				<div width='100%'><table border='0'  style='background-color:rgba(255,255,255,0.1); border-radius:10px;'>
				<tr style='border-radius:10px'><td width='25%'><a href='product.php?id=".$objResult['productId']."'  >
				<div style='margin:3%;' ><img class'img-responsive'
				 src='image/Product/".$objResult['productId'].".jpg' width='100%' align='left'></div></td></a><td>			
				<font size='+1'><b>ชื่อสินค้า : </b><a href='product.php?id=".$objResult['productId']."' >".$objResult['productName']."</a></b></font><br>
				<font size='+1'><b>ราคา : </b>".$objResult['productPrice']."</b></font><br>
				<font size='+1'><b>ผู้ประกาศขายสินค้า :</b> ".$objResult['seller']."</b></font></td></tr>
			</table><br></div>
			";		
			}		
        function con($text){//ข้อมูล Container----->
		global $Num_Rows,$Prev_Page,$Num_Pages,$Page,$Next_Page,$index;
			echo"
			<br><div align='center'>
			<img src='image/list.jpg' class='img-responsive' width='80%'></div>	<hr>	
			".$text."<br>";//ข้อมูล Container<------------
			echo "<div align='center' style='font-size:130%'>พบสินค้าทั้งหมด ". $Num_Rows." ชิน: ".$Num_Pages." หน้า <br>";
			if($Prev_Page)			{	
				echo " <a href='$_SERVER[SCRIPT_NAME]?Page=".$Prev_Page.$index."'>ก่อนหน้า</a> ";
			}
			for($i=1; $i<=$Num_Pages; $i++){
				if($i != $Page){
					echo " <a href='$_SERVER[SCRIPT_NAME]?Page=".$i.$index."'>[$i]</a> ";
				}
				else{
					echo "<b> $i </b>";
				}
			}
			if($Page!=$Num_Pages){
				echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page".$index."'>หน้าถัดไป</a> ";
			}
echo "</div>";
		}?>           
        <div class="col-xs-8 hidden-xs"id="conL"><!--เนื้อหาด้านซ้าย-->
            <?php con($text); ?>
        </div>
        <div class="col-xs-12 visible-xs" id="conS"><!--เนื้อหา Smart Phone-->
             <?php
			 echo "<div align='left'><label for='kw'>ค้นหาสินค้า</label></div>
    <input id='kw' type='text' name='keyword'  class='form-control' value='";
    if(isset($_GET['keyword'])){
		echo $_GET['keyword'];}
        echo"' placeholder='ใส่ Keyword' required='required'><input style='margin-top:2px' type='submit' value='ค้นหา' class='btn-default
    '></form>";
	 con($text);?>
        </div>
           	<?php include "template/details.php";?><!--เนื้อหาฝั่งขวา-->    			
        	<?php include "template/footer.php";?><!--Footer-->
	</body>
</html>