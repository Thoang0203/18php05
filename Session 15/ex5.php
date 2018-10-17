<?php 
	include 'Shop.php';

	function displayByPrice($a, $price) {
		foreach ($a as $key => $aNew) {
			if ($aNew['price'] >= $price) {
			echo '<tr><td>'.$a[$key]['name'].'</td>
			<td><img src='.$a[$key]['image'].'></td>
			<td>'.$a[$key]['price'].'</td>
			<td>'.$a[$key]['discount'].'</td><tr>';
			}
		}
	}
 ?>
 <h4>Hiển thị danh sách sản phẩm có giá >=600 ra</h4>
 <table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		displayByPrice($Mobile, 600);
	 ?>
</table>