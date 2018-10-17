<!-- Cho một danh sách 3 sản phẩm gồm:
(Tên sản phẩm, hình ảnh, giá, giảm giá (%))
1. IphoneX, iphonex.jpg, 1000, 20
2. J7prime, j7prime.jpg, 600, 15
3. Oppo, oppo.jpg, 700, 0
Câu 1: Trình bày danh sách sản phẩm theo mảng 2 chiều và 
in danh sách sản phẩm ra (hiển thị hình ảnh lên)
Câu 2: Những sản phẩm có giá >=700 sẽ được giảm giá 30%, In danh sách sản phẩm ra
Câu 3: Bỏ sản phẩm Oppo ra khỏi danh sách và in danh sách ra
Câu 4: Thêm sản phẩm Sony Eperia, sony.jpg, 500, 10
vào danh sách và in danh sách ra
Câu 5: Hiển thị danh sách sản phẩm có giá >=600 ra
Câu 6: In ra danh sách sản phẩm, với giá tính luôn giảm giá
Câu 7: Loại bỏ những sản phẩm có giá <700 và giảm giá >12% ra -->

<?php 
	$Mobile = array(
		'iphone' => array(
			'name' => 'IphoneX',
			'image' => 'image/iphonex.jpg',
			'price' => 1000,
			'discount' => 20
		),
		'samsung' => array(
			'name' => 'J7prime',
			'image' => 'image/j7prime.jpg',
			'price' => 600,
			'discount' => 15
		),
		'oppo' => array(
			'name' => 'Oppo',
			'image' => 'image/oppo.jpg',
			'price' => 700,
			'discount' => 0
		),
	);
	function display($arr) {
		foreach ($arr as $arrNew) {
			echo '<tr><td>'.$arrNew['name'].'</td>
			<td><img src='.$arrNew['image'].'></td>
			<td>'.$arrNew['price'].'</td>
			<td>'.$arrNew['discount'].'</td><tr>';
		}
	}
?>
<link rel="stylesheet" type="text/css" href="shop.css">

<a href="ex1.php">Câu 1</a>
<a href="ex2.php">Câu 2</a>
<a href="ex3.php">Câu 3</a>
<a href="ex4.php">Câu 4</a>
<a href="ex5.php">Câu 5</a>
<a href="ex6.php">Câu 6</a>
<a href="ex7.php">Câu 7</a>