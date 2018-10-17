<?php 
	include 'Shop.php';

	function discountByPrice($arr, $price, $dis) {
		foreach ($arr as $key => $arrNew) {
			if ($arrNew['price'] >= $price) {
				$arr[$key]['discount'] = $dis;
			}
		}
		return $arr;
	}
?>
<h4>In danh sách những sản phẩm có giá >=700 sẽ được giảm giá 30%</h4>
<table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		$Mobile = discountByPrice($Mobile, 700, 30); 
		display($Mobile);
	 ?>
</table>