<?php 
	include 'Shop.php';

	function removeProductByName($a, $name) {
		foreach ($a as $key => $aNew) {
			if ($aNew['name'] == $name) {
				unset($a[$key]);
			}
		}
		return $a;
	}
 ?>
 <h4>Bỏ sản phẩm Oppo ra khỏi danh sách</h4>
 <table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		$Mobile = removeProductByName($Mobile, 'Oppo'); 
		display($Mobile);
	 ?>
</table>