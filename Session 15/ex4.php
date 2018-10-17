<?php 
	include 'Shop.php';

	function addNewProduct($a, $key, $name, $image, $price, $discount) {
		$a[$key]['name'] = $name;
		$a[$key]['image'] = $image;
		$a[$key]['price'] = $price;
		$a[$key]['discount'] = $discount;
		return $a;
	}
?>
<h4>Thêm sản phẩm Sony Eperia, sony.jpg, 500, 10 vào danh sách và in danh sách ra</h4>
 <table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		$Mobile = addNewProduct($Mobile, 'sony', 'Sony Eperia', 'image/sony.jpg', 500, 10); 
		display($Mobile);
	 ?>
</table>