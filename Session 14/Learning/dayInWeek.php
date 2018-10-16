<?php 
	echo '<h1>Kiểm tra ngày trong tuần</h1>';
	for ($i = 1; $i <= 10; $i++) {
		switch ($i) {
			case 2:
			case 3:
			case 4:
			case 5:
			case 6:
			case 7:
				echo '<br>'.$i.': Thứ '.$i; //Nháy đơn biến bên trong sẽ thành chuỗi ($i)
				break;
			case 8:
				echo "<br>$i: Chủ nhật"; //Nháy đôi gọi biến bên trong được
				break;
			default:
				echo '<br>'.$i.' Không phải ngày trong tuần';
				break;
		}
	}
 ?>