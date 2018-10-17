<?php 
	include 'Shop.php';

	function displayProductDiscounted($a) {
		foreach ($a as $key => $aNew) {
			$a[$key]['price'] -= $a[$key]['price']*$a[$key]['discount']/100;
		}
		return $a;
	}
?>
<h4>In ra danh sách sản phẩm, với giá tính luôn giảm giá</h4>
 <table>
	<tr>
		<th> Tên sản phẩm</th>
		<th> Hình ảnh</th>
		<th> Giá </th>
		<th> Giảm giá (%)</th>
	</tr>
	<?php
		$Mobile = displayProductDiscounted($Mobile); 
		display($Mobile);
	 ?>
</table>