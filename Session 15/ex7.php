<?php 
	include 'Shop.php';

	function removeProductByPriceAndDiscount($a, $price, $discount) {
		foreach ($a as $key => $aNew) {
			if (($aNew['price'] < $price) && ($aNew['discount'] > $discount)){
				unset($a[$key]);
			}
		}
		return $a;
	}
?>
<h4>Loại bỏ những sản phẩm có giá < 700 và giảm giá > 12% ra</h4>
<table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		$Mobile = removeProductByPriceAndDiscount($Mobile, 700, 12); 
		display($Mobile);
	 ?>
</table>