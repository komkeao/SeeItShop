<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>

<?php
include "template/pdo.php";
$s=$pdo->query("select * from product order by productId DESC");		
$Num_Rows=0;
while($s->fetch()){
	$Num_Rows++;
	}
$Per_Page = 2; 
if(isset($_GET["Page"])){
$Page = $_GET["Page"];
}else{
	$Page=1;
}
$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
$text="";
$obj="select * from product order  by productId ASC LIMIT ".$Page_Start." , ".$Per_Page."";
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
?>

<br>
<?php echo $text;?>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?php
if($Prev_Page)
{	
	echo " <a href='test.php?Page=".$Prev_Page."'>Back</a> ";
}
for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='test.php?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
?>
</body>
</html>