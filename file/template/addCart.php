<?php $url = $_SERVER['PHP_SELF']; ?>
<form action='conCart.php' method='post'>
	<input type='number' name='num' value='1' min='1' max='5'><input type='submit' value='เพิ่มสินค้าลงตระกร้า'>
	<input type='hidden' name='url' value='<?php echo $url;?>'>
	<input type='hidden' name='id' value='<?php echo $data['productId'];?>'>
    <input type='hidden' name='name' value='<?php echo $data['productName'];?>'>
</form>